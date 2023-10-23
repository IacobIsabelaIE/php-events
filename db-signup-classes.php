<?php
    
    class Signup extends Dbh {
        protected function setUser($nutilizator, $nume, $prenume, $email, $passwd) {
            $stmt = $this->connect()->prepare('INSERT INTO administrator(nume_utilizator, nume, prenume, e_mail, password_hash) VALUES(?,?,?,?,?);');
            $hashedPasswd = password_hash($passwd, PASSWORD_DEFAULT);
            if (!$stmt->execute(array($nutilizator, $nume, $prenume, $email, $hashedPasswd))) {
                $stmt = null;
                header("location: index.php?error=stmtfailed");
                exit();
            }
            $stmt = null;
        }
        
        protected function doesUserExist($nutilizator, $email) {
            $stmt = $this->connect()->prepare('SELECT nume_utilizator FROM administrator WHERE nume_utilizator = ? OR e_mail = ?');
            if (!$stmt->execute(array($nutilizator, $email))) {
                $stmt = null;
                header("location: index.php?error=stmtfailed");
                exit();
            }
            
            return !($stmt->rowCount() > 0);
        }
    }