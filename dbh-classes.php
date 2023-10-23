<?php
    
    class Dbh {
        protected function connect() {
            $username = "root";
            $password = "";
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=phpproject', $username, $password);
                return $dbh;
            } catch (PDOException $e) {
                print "Error: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }