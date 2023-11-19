<html>

<style>
    .message-container {
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 300px;
        background-color: #f8f9fa;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        text-align: center;
        margin-top: 20px;
    }

    .error-message {
        color: red;
        font-weight: bold;
    }

    .success-message {
        color: #b3a1e1;
        font-weight: bold;
    }
</style>


<?php
    class SponsorDB
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(ConexiuneDB $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function cautaTotiSponsorii()
        {
            $sponsori = array();
            $mysqlInstance = $this->dbConnection->connect();
            $fetchedSponsor = $mysqlInstance->query("SELECT * FROM sponsor");
            
            if ($fetchedSponsor->num_rows > 0) {
                while ($result = $fetchedSponsor->fetch_assoc()) {
                    $sponsor = new Sponsor();
                    $sponsor->setSponsorId($result["id"]);
                    $sponsor->setNumeSponsor($result["nume"]);
                    $sponsor->setDescriereSponsor($result["descriere"]);
                    array_push($sponsori, $sponsor);
                }
            }
            
            $mysqlInstance->close();
            return $sponsori;
        }
        
        public function cautaSponsorDupaId($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("SELECT * from sponsor where id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            $sponsor = new Sponsor();
            
            if (!$fetchedResult) {
                header("location: index-event.php");
            } else {
                $sponsor->setSponsorId($fetchedResult["id"]);
                $sponsor->setNumeSponsor($fetchedResult["nume"]);
                $sponsor->setDescriereSponsor($fetchedResult["descriere"]);
                
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $sponsor;
        }
        
        public function adaugaSponsor(Sponsor $sponsor)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO sponsor
            (nume, descriere) VALUES
            (?, ?)");
            
            $preparedStatement->bind_param("ss", $numeSponsor, $descriereSponsor);
            
            $numeSponsor = $sponsor->getNumeSponsor();
            $descriereSponsor= $sponsor->getDescriereSponsor();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                echo '<div class="message-container error-message">Am întâmpinat o eroare la adăugarea sponsorului: ' . $preparedStatement->error . '</div>';
            } else {
                echo '<div class="message-container success-message">Am adăugat sponsorul dorit!</div>';
            }
            
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
        
        public function updateSponsor(Sponsor $sponsor)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("UPDATE sponsor SET nume = ?, descriere = ? WHERE id = ?");
            
            $preparedStatement->bind_param("ssi", $numeSponsor, $descriereSponsor, $id);
            
            
            $numeSponsor = $sponsor->getNumeSponsor();
            $descriereSponsor = $sponsor->getDescriereSponsor();
            $id = $sponsor->getSponsorId();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                print("Am intampinat o eroare la editarea sponsorului={" . $preparedStatement->error . "}");
                return false;
            } else {
                print("Am editat sponsorul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return true;
        }
        
        public function stergeSponsor($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("DELETE from sponsor WHERE id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $result = $preparedStatement->execute();
            $preparedStatement->close();
            $mysqlInstance->close();
            return $result;
        }
        
    }
    ?>
</html>


