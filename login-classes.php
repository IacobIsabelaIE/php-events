<?php
    
    class Login extends Dbh {
        protected function getUser($nutilizator, $email, $passwd) {
            $stmt = $this->connect()->prepare('SELECT password_hash from administrator where nume_utilizator = ? AND e_mail = ? ;');
            
            if(!$stmt->execute(array($nutilizator, $email))){
                $stmt = null;
                header("location: Pagina.php?error=stmtfailed");
                exit();
            }
            
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: index.php?error=usernotfound");
                exit();
            }
            
            $passwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPasswd  = password_verify($passwd, $passwdHashed[0]["password_hash"]);
            
            if($checkPasswd == false){
                $stmt = null;
                header("location: index.php?error=wrongpassword");
                exit();
            }
            
            elseif($checkPasswd == true){
                $stmt = $this->connect()->prepare('SELECT * FROM administrator where nume_utilizator = ? OR e_mail = ? AND password_hash = ?;' );
                
                if(!$stmt->execute(array($nutilizator, $email, $passwd))){
                    $stmt = null;
                    header("location: index.php?error=stmtfailed");
                    exit();
                }
                
                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: index.php?error=usernotfound");
                    exit();
                }
                
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION["userid"] = $user[0]["id"];
                $_SESSION["nutilizator"] = $user[0]["nume_utilizator"];
                
                $stmt = null;
                
                
            }
            $stmt = null;
        }
        
        
    }