<?php
    
    class AdministratorDAO
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(DatabaseConnection $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function addAdministrator(Administrator $administrator) {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO administrator(nume_utilizator, nume,
                          prenume, e_mail, password_hash) VALUES(?,?,?,?,?);");
            
            $userName = $administrator->getUserName();
            $firstName = $administrator->getFirstName();
            $lastName = $administrator->getLastName();
            $email = $administrator->getEmail();
            $password = password_hash($administrator->getPassword(), PASSWORD_BCRYPT);
            
            $preparedStatement->bind_param("sssss", $userName, $firstName, $lastName, $email, $password);
            
            $isInsertSuccessful = $preparedStatement->execute();
            
            if (!$isInsertSuccessful) {
                print("Am intampinat o eroare la adaugarea administratorului={" . $preparedStatement->error . "}");
            } else {
                print("Am adaugat administratorul");
            }
            
            $preparedStatement->close();
            $mysqlInstance->close();
        }
        
    }