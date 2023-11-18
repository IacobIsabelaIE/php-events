<?php
    
    class EventDAO
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(DatabaseConnection $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function getAllEvents()
        {
            $events = array();
            $mysqlInstance = $this->dbConnection->connect();
            $fetchedEvents = $mysqlInstance->query("SELECT * FROM eveniment");
            
            if ($fetchedEvents->num_rows > 0) {
                while ($result = $fetchedEvents->fetch_assoc()) {
                    $event = new Event();
                    $event->setEventId($result["id"]);
                    $event->setEventTitle($result["titlu"]);
                    $event->setEventDescription($result["descriere"]);
                    $event->setDateTime($result["data_ora"]);
                    $event->setLocation($result["locatie"]);
                    $event->setPartner($result["parteneri"]);
                    $event->setSponsor($result["sponsori"]);
                    $event->setEventPrice($result["pret"]);
                    array_push($events, $event);
                }
            }
            
            $mysqlInstance->close();
            return $events;
        }
        
        public function getEventById($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("SELECT * from eveniment where id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            $event = new Event();
            
            if (!$fetchedResult) {
                header("location: index-event.php");
            } else {
                $event->setEventId($fetchedResult["id"]);
                $event->setEventTitle($fetchedResult["titlu"]);
                $event->setEventDescription($fetchedResult["descriere"]);
                $event->setDateTime($fetchedResult["data_ora"]);
                $event->setSponsor($fetchedResult["sponsori"]);
                $event->setPartner($fetchedResult["parteneri"]);
                $event->setLocation($fetchedResult["locatie"]);
                $event->setEventPrice($fetchedResult["pret"]);
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $event;
        }
        
        public function addNewEvent(Event $event)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO eveniment
            (titlu, descriere, data_ora, locatie, parteneri, sponsori, pret) VALUES
            (?, ?, ?, ?, ?, ?, ?)");
            
            $preparedStatement->bind_param("ssssssi", $eventTitle,
                $eventDescription, $dateTime, $location,
                $partner, $sponsor, $price);
            
            $eventTitle = $event->getEventTitle();
            $eventDescription = $event->getEventDescription();
            $dateTime = $event->getDateTime();
            $partner = $event->getPartner();
            $sponsor = $event->getSponsor();
            $location = $event->getLocation();
            $price = $event->getEventPrice();
            
            $isInsertSuccessful = $preparedStatement->execute();
            
            if (!$isInsertSuccessful) {
                print("Am intampinat o eroare la adaugarea eventului={" . $preparedStatement->error . "}");
            } else {
                print("Am adaugat evenimentul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
        
        public function updateEvent(Event $event)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("UPDATE eveniment SET titlu = ?, descriere = ?, data_ora = ?,
                     locatie = ?, parteneri = ?, sponsori = ?, pret = ? WHERE id = ?");
            
            $preparedStatement->bind_param("ssssssii", $eventTitle,
                $eventDescription, $dateTime, $location,
                $partner, $sponsor, $eventPrice, $id);
            
            $eventTitle = $event->getEventTitle();
            $eventDescription = $event->getEventDescription();
            $dateTime = $event->getDateTime();
            $partner = $event->getPartner();
            $sponsor = $event->getSponsor();
            $location = $event->getLocation();
            $eventPrice = $event->getEventPrice();
            $id = $event->getEventId();
            
            $isInsertSuccessful = $preparedStatement->execute();
            
            if (!$isInsertSuccessful) {
                print("Am intampinat o eroare la editarea eventului={" . $preparedStatement->error . "}");
                return false;
            } else {
                print("Am editat evenimentul dorit!");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return true;
        }
        
        public function deleteEvent($id)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("DELETE from eveniment WHERE id = ?");
            
            $preparedStatement->bind_param("i", $id);
            $result = $preparedStatement->execute();
            
            $preparedStatement->close();
            $mysqlInstance->close();
            return $result;
        }
        
    }