<?php
    
    class BileteDB
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(ConexiuneDB $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function cumparaTicket(Bilet $ticket)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO bilete
            (id_eveniment, nume, prenume, email, data_achizitie, data_eveniment, pret) VALUES
            (?, ?, ?, ?, ?, ?, ?)");
            
            $preparedStatement->bind_param("isssssi", $eventId,
                $nume, $prenume, $email,
                $dataAchizitie, $dataEveniment, $pretTicket);
            
            $eventId = $ticket->getEventId();
            $nume = $ticket->getNume();
            $prenume = $ticket->getPrenume();
            $email = $ticket->getEmail();
            $dataAchizitie = date("Y-m-d H:i:s");
            $dataEveniment = $ticket->getDataEveniment();
            $pretTicket = $ticket->getPretBilet();
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
                print("Am intampinat o eroare la adaugarea biletului={" . $preparedStatement->error . "}");
            } else {
                print("Am adaugat biletul pentru client");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
    }