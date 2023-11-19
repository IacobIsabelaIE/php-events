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
    
    class SpeakerDB
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(ConexiuneDB $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function cautaTotiSpeakerii()
        {
            $speakeri = array();
            $mysqlInstance = $this->dbConnection->connect();
            $fetchedSpeaker = $mysqlInstance->query("SELECT * FROM speaker");
            
            if ($fetchedSpeaker->num_rows > 0) {
                while ($result = $fetchedSpeaker->fetch_assoc()) {
                    $speaker = new Speaker();
                    $speaker->setSpeakerId($result["id"]);
                    $speaker->setNumeSpeaker($result["nume"]);
                    $speaker->setDescriereSpeaker($result["descriere"]);
                    $speaker->setOcupatieSpeaker($result["ocupatie"]);
                    $speaker->setSubiectAbordatSpeaker($result["subiectAbordat"]);
                    array_push($speakeri, $speaker);
                }
            }
            
            $mysqlInstance->close();
            return $speakeri;
        }
        
        public function cautaSpeakerDupaId($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("SELECT * from speaker where id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            $speaker= new Speaker();
            
            if (!$fetchedResult) {
                header("location: index-event.php");
            } else {
                $speaker->setSpeakerId($fetchedResult["id"]);
                $speaker->setNumeSpeaker($fetchedResult["nume"]);
                $speaker->setDescriereSpeaker($fetchedResult["descriere"]);
                $speaker->setOcupatieSpeaker($fetchedResult["ocupatie"]);
                $speaker->setSubiectAbordatSpeaker($fetchedResult["subiectAbordat"]);
                
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $speaker;
        }
        
        public function adaugaSpeaker(Speaker $speaker)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO speaker
            (nume, descriere, ocupatie, subiectAbordat) VALUES
            (?, ?, ? ,?)");
            
            $preparedStatement->bind_param("ssss", $numeSpeaker, $descriereSpeaker, $ocupatieSpeaker, $subiectAbordatSpeaker);
            
            $numeSpeaker = $speaker->getNumeSpeaker();
            $descriereSpeaker= $speaker->getDescriereSpeaker();
            $ocupatieSpeaker = $speaker-> getOcupatieSpeaker();
            $subiectAbordatSpeaker = $speaker ->getSubiectAbordatSpeaker();
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                echo '<div class="message-container error-message">Am întâmpinat o eroare la adăugarea speakerului: ' . $preparedStatement->error . '</div>';
            } else {
                echo '<div class="message-container success-message">Am adăugat speakerului dorit!</div>';
            }
            
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
        
        public function updateSpeaker(Speaker $speaker)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("UPDATE speaker SET nume = ?, descriere = ?, ocupatie = ?, subiectAbordat=? WHERE id = ?");
            
            $preparedStatement->bind_param("ssssi", $numeSpeaker, $descriereSpeaker, $ocupatieSpeaker, $subiectAbordatSpeaker,   $id);
            
            $numeSpeaker = $speaker->getNumeSpeaker();
            $descriereSpeaker = $speaker->getDescriereSpeaker();
            $ocupatieSpeaker = $speaker->getOcupatieSpeaker();
            $subiectAbordatSpeaker = $speaker->getSubiectAbordatSpeaker();
            $id = $speaker->getSpeakerId();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                print("Am intampinat o eroare la editarea speakerului={" . $preparedStatement->error . "}");
                return false;
            } else {
                print("Am editat speakerul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return true;
        }
        
        public function stergeSpeaker($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("DELETE from speaker WHERE id = ?");
            $preparedStatement->bind_param("i", $id);
            $result = $preparedStatement->execute();
            $preparedStatement->close();
            $mysqlInstance->close();
            return $result;
        }
        
    }
?>
</html>


