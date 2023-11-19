
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
                echo '<div class="message-container error-message">Am întâmpinat o eroare la cumpararea biletului: ' . $preparedStatement->error . '</div>';
            } else {
                echo '<div class="message-container success-message">Am adăugat biletul dorit!</div>';
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
    }
    ?>
</html>
