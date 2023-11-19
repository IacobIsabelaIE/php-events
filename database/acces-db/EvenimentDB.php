<?php
    
    class EvenimentDB
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(ConexiuneDB $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function cautaToateEvenimentele()
        {
            $events = array();
            $mysqlInstance = $this->dbConnection->connect();
            $fetchedEvents = $mysqlInstance->query("SELECT * FROM eveniment");
            
            if ($fetchedEvents->num_rows > 0) {
                while ($result = $fetchedEvents->fetch_assoc()) {
                    $event = new Eveniment();
                    $event->setEventId($result["id"]);
                    $event->setTitluEveniment($result["titlu"]);
                    $event->setDescriereEveniment($result["descriere"]);
                    $event->setDataEveniment($result["data_ora"]);
                    $event->setLocatie($result["locatie"]);
                    $event->setPartener($result["parteneri"]);
                    $event->setSponsor($result["sponsori"]);
                    $event->setSpeaker($result["speakeri"]);
                    $event->setPretEveniment($result["pret"]);
                    array_push($events, $event);
                }
            }
            
            $mysqlInstance->close();
            return $events;
        }
        
        public function cautaEvenimentDupaId($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("SELECT * from eveniment where id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            $event = new Eveniment();
            
            if (!$fetchedResult) {
                header("location: index-event.php");
            } else {
                $event->setEventId($fetchedResult["id"]);
                $event->setTitluEveniment($fetchedResult["titlu"]);
                $event->setDescriereEveniment($fetchedResult["descriere"]);
                $event->setDataEveniment($fetchedResult["data_ora"]);
                $event->setSponsor($fetchedResult["sponsori"]);
                $event->setPartener($fetchedResult["parteneri"]);
                $event->setSpeaker($fetchedResult["speakeri"]);
                $event->setLocatie($fetchedResult["locatie"]);
                $event->setPretEveniment($fetchedResult["pret"]);
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $event;
        }
        
        public function adaugaEveniment(Eveniment $event)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO eveniment
            (titlu, descriere, data_ora, locatie, parteneri, sponsori, speakeri, pret) VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)");
            
            $preparedStatement->bind_param("sssssssi", $titluEveniment,
                $descriereEveniment, $dataEveniment, $locatie,
                $partener, $sponsor, $speaker, $pretBiletEveniment);
            
            $titluEveniment = $event->getTitluEveniment();
            $descriereEveniment = $event->getDescriereEveniment();
            $dataEveniment = $event->getDataEveniment();
            $partener = $event->getPartener();
            $sponsor = $event->getSponsor();
            $speaker = $event->getSpeaker();
            $locatie = $event->getLocatie();
            $pretBiletEveniment = $event->getPretEveniment();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                print("Am intampinat o eroare la adaugarea eventului={" . $preparedStatement->error . "}");
            } else {
                print("Am adaugat evenimentul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
        
        public function updateEveniment(Eveniment $event)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("UPDATE eveniment SET titlu = ?, descriere = ?, data_ora = ?,
                     locatie = ?, parteneri = ?, sponsori = ?, speakeri=?,  pret = ? WHERE id = ?");
            
            $preparedStatement->bind_param("sssssssii", $titluEveniment,
                $descriereEveniment, $dataEveniment, $locatie,
                $partener, $sponsor, $speaker, $pretBiletEveniment, $id);
            
            $titluEveniment = $event->getTitluEveniment();
            $descriereEveniment = $event->getDescriereEveniment();
            $dataEveniment = $event->getDataEveniment();
            $partener = $event->getPartener();
            $sponsor = $event->getSponsor();
            $speaker = $event->getSpeaker();
            $locatie = $event->getLocatie();
            $pretBiletEveniment = $event->getPretEveniment();
            $id = $event->getEventId();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                print("Am intampinat o eroare la editarea eventului={" . $preparedStatement->error . "}");
                return false;
            } else {
                print("Am editat evenimentul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return true;
        }
        
        public function stergeEveniment($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("DELETE from eveniment WHERE id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $result = $preparedStatement->execute();
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $result;
        }
        
//      public function getSponsori() {
//          $conexiune = new ConexiuneDB();
//          $query = "SELECT id, nume FROM sponsor";
//            $result = $this->$conexiune->query($query);
//
//            $sponsori = array();
//            while ($row = $result->fetch_assoc()) {
//                $sponsori[] = $row;
//            }
//
//            return $sponsori;
//}

    }