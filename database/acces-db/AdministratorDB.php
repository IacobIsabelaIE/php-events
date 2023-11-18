<?php
    
    class AdministratorDB
    {
        
        private $dbConnection;
        
        /**
         * @param $dbConnection
         */
        public function __construct(ConexiuneDB $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }
        
        public function verificaAdministratorExistent(Administrator $administrator): bool
        {
            // ne concetam la baza de date
            $mysqlInstance = $this->dbConnection->connect();
            
            // pregatim integorarea sub forma unui prepared statement, unde ? sunt placeholdere pentru variabile
            // in loc sa concatenam variabilele din formular, folosim ? impotriva injectiilor SQL
            $preparedStatement = $mysqlInstance->prepare('SELECT nume_utilizator FROM administrator WHERE nume_utilizator = ? OR e_mail = ?');
            $userName = $administrator->getNumeUtilizator(); // din obiect luam nume utilziator
            $email = $administrator->getEmail(); // din obiect luam email
            
            // legam parametri la placeholderele ( ? ) de mai sus, in ordinea in care sunt scrise: ss inseamna ca cele doua ? Sunt strings
            $preparedStatement->bind_param("ss", $userName, $email);
            $preparedStatement->execute(); //aici se executa query ul
            
            // ne returneaza result-ul query-ului sau false daca nu avem nimic
            $queryResult = $preparedStatement->get_result();
            
            // apelam functia fetch_assoc() care ne returneaza un array asociativ
            // intr-un array asoactiv cheile nu sunt indecsi (0,1,...) ci sunt string-uri, sub forma coloanelor din db
            $fetchedResult = $queryResult->fetch_assoc();
            
            // facem close la prepared statements si la conexiunea de db
            $preparedStatement->close();
            $mysqlInstance->close();
            
            if ($fetchedResult) {
                return true;
            }
            return false;
        }
        
        public function adaugaAdministrator(Administrator $administrator)
        {
            $mysqlInstance = $this->dbConnection->connect();
            $preparedStatement = $mysqlInstance->prepare("INSERT INTO administrator(nume_utilizator, nume,
                          prenume, e_mail, password_hash) VALUES(?,?,?,?,?);");
            
            $numeUtilizator = $administrator->getNumeUtilizator();
            $nume = $administrator->getNume();
            $prenume = $administrator->getPrenume();
            $email = $administrator->getEmail();
            $password = password_hash($administrator->getPassword(), PASSWORD_BCRYPT);
            
            $preparedStatement->bind_param("sssss", $numeUtilizator, $nume, $prenume, $email, $password);
            
            $succesInserare = $preparedStatement->execute();
            
            if (!$succesInserare) {
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
            
            
            $parolaCorecta = password_verify($password, $fetchedResult["password_hash"]);
            
            // parola gresita
            if (!$parolaCorecta) {
                print("Parola introdusa este gresita");
                return false;
            }
            
            // setam utilizatorul
            $_SESSION["nutilizator"] = $fetchedResult["nume_utilizator"];
            $_SESSION["id"] = $fetchedResult["id"];
            return true;
        }
        
    }