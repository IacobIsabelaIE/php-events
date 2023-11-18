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
        
        public function doesAdministratorExist(Administrator $administrator): bool
        {
            
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare('SELECT nume_utilizator FROM administrator WHERE nume_utilizator = ? OR e_mail = ?');
            $userName = $administrator->getUserName();
            $email = $administrator->getEmail();
            
            $preparedStatement->bind_param("ss", $userName, $email);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            
            $preparedStatement->close();
            $mysqlInstance->close();
            
            if ($fetchedResult) {
                return true;
            }
            return false;
        }
        
        public function addAdministrator(Administrator $administrator)
        {
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
    
        public function loginAdministrator(Administrator $administrator): bool
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare('SELECT id, nume_utilizator, password_hash FROM administrator WHERE e_mail = ?');
            $email = $administrator->getEmail();
            $password = $administrator->getPassword();
            
            $preparedStatement->bind_param("s", $email);
            $preparedStatement->execute();
            $queryResult = $preparedStatement->get_result();
            $fetchedResult = $queryResult->fetch_assoc();
            
            $preparedStatement->close();
            $mysqlInstance->close();
            
            // nu avem user-ul cu acel e-mail in baza de date
            if (!$fetchedResult) {
                print("Utilizatorul nu exista");
                return false;
            }
            
            $isPasswordCorrect = password_verify($password, $fetchedResult["password_hash"]);
            
            // parola gresita
            if (!$isPasswordCorrect) {
                print("Parola introdusa este gresita");
                return false;
            }
            
            // setam utilizatorul
            $_SESSION["nutilizator"] = $fetchedResult["nume_utilizator"];
            $_SESSION["id"] = $fetchedResult["id"];
            return true;
        }
        
        public function logoutAdministrator() {
            unset($_SESSION["nutilizator"]);
            unset($_SESSION["id"]);
            session_destroy();
        }
        
    }