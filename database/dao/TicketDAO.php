<?php
    
    class TicketDAO
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(DatabaseConnection $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function buyTicket(Ticket $ticket)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO bilete
            (id_eveniment, nume, prenume, email, data_achizitie, data_eveniment, pret) VALUES
            (?, ?, ?, ?, ?, ?, ?)");
            
            $preparedStatement->bind_param("isssssi", $eventId,
                $firstName, $lastName, $email,
                $acquisitionDate, $eventDate, $ticketPrice);
            
            $eventId = $ticket->getEventId();
            $firstName = $ticket->getFirstName();
            $lastName = $ticket->getLastName();
            $email = $ticket->getEmail();
            $acquisitionDate = date("Y-m-d H:i:s");
            $eventDate = $ticket->getEventDate();
            $ticketPrice = $ticket->getTicketPrice();
            
            $isInsertSuccessful = $preparedStatement->execute();
            
            if (!$isInsertSuccessful) {
                print("Am intampinat o eroare la adaugarea biletului={" . $preparedStatement->error . "}");
            } else {
                print("Am adaugat biletul pentru client");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
    }