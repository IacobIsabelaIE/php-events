<?php
    
    /***
     * Clasa responsabila cu conexiunea la baza de date
     * Toate campurile sunt constante
     */
    class ConexiuneDB
    {
        
        const DATABASE_HOST_NAME = "localhost";
        const DATABASE_USERNAME = "root";
        const DATABASE_PASSWORD = "";
        const DATABASE_NAME = "phpproject";
        
        public function connect()
        {
            $connection = new mysqli(self::DATABASE_HOST_NAME, self::DATABASE_USERNAME,
                self::DATABASE_PASSWORD, self::DATABASE_NAME);
            if ($connection->connect_errno) {
                die("Failed to connect to the database, cause={" . $connection->errno . "}");
            }
            return $connection;
        }
    }