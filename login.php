<?php
    
    if(isset($_POST["submit"])) {
        
        //aici luam data de la utilizator
        $nutilizator = $_POST["login_name"];
        $email = $_POST["login_email"];
        $passwd = $_POST["login_passwd"];
        
        
        //instantiem clasa din fisierul edit-db-signup-controller-classes.php ->SignupContr
        include "DatabaseConnection.php";
        include "login-classes.php";
        include "login-controller-classes.php";
        
        $login = new LoginContr($nutilizator,$email, $passwd);
        
        $login->loginUser();
        header("location: crud/index-event.php?error=none");
        
        
    }
