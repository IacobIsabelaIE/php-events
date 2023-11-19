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
    
    class PartenerDB
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(ConexiuneDB $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function cautaTotiPartenerii()
        {
            $parteneri = array();
            $mysqlInstance = $this->dbConnection->connect();
            $fetchedPartener = $mysqlInstance->query("SELECT * FROM partener");
            
            if ($fetchedPartener->num_rows > 0) {
                while ($result = $fetchedPartener->fetch_assoc()) {
                    $partener = new Partener();
                    $partener->setPartenerId($result["id"]);
                    $partener->setNumePartener($result["nume"]);
                    $partener->setDescrierePartener($result["descriere"]);
                    $partener->setActivitatePartener($result["activitate"]);
                    $partener->setCauzaPartener($result["cauza"]);
                    
                    
                    array_push($parteneri, $partener);
                }
            }
            
            $mysqlInstance->close();
            return $parteneri;
        }
        
        public function cautaPartenerDupaId($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("SELECT * from partener where id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            $partener = new Partener();
            
            if (!$fetchedResult) {
                header("location: index-event.php");
            } else {
                $partener->setPartenerId($fetchedResult["id"]);
                $partener->setNumePartener($fetchedResult["nume"]);
                $partener->setDescrierePartener($fetchedResult["descriere"]);
                $partener->setActivitatePartener($fetchedResult["activitate"]);
                $partener->setCauzaPartener($fetchedResult["cauza"]);
                
                
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $partener;
        }
        
        public function adaugaPartener(Partener $partener)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO partener
            (nume, descriere, activitate, cauza) VALUES
            (?, ?, ?, ?)");
            
            $preparedStatement->bind_param("ssss", $numePartener, $descrierePartener, $activitatePartener, $cauzaPartener);
            
            $numePartener = $partener->getNumePartener();
            $descrierePartener= $partener->getDescrierePartener();
            $activitatePartener = $partener->getActivitatePartener();
            $cauzaPartener = $partener->getCauzaPartener();
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                echo '<div class="message-container error-message">Am întâmpinat o eroare la adăugarea Partenerului: ' . $preparedStatement->error . '</div>';
            } else {
                echo '<div class="message-container success-message">Am adăugat Partenerul dorit!</div>';
            }
            
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
        
        public function updatePartener(Partener $partener)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("UPDATE partener SET nume = ?, descriere = ?, activitate=?, cauza=? WHERE id = ?");
            
            $preparedStatement->bind_param("ssssi", $numePartener, $descrierePartener, $activitatePartener, $cauzaPartener, $id);
            
            
            $numePartener = $partener->getNumePartener();
            $descrierePartener = $partener->getDescrierePartener();
            $activitatePartener = $partener->getActivitatePartener();
            $cauzaPartener = $partener->getCauzaPartener();
            $id = $partener->getPartenerId();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                print("Am intampinat o eroare la editarea partenerului={" . $preparedStatement->error . "}");
                return false;
            } else {
                print("Am editat partenerul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return true;
        }
        
        public function stergePartener($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("DELETE from partener WHERE id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $result = $preparedStatement->execute();
            $preparedStatement->close();
            $mysqlInstance->close();
            return $result;
        }
        
    }
?>
</html>


