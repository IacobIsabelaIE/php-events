<?php
    
    if(isset($_POST["submit"])) {
        
        //aici luam data de la utilizator
        $nutilizator = $_POST["nutilizator"];
        $nume = $_POST["nume"];
        $prenume = $_POST["prenume"];
        $email = $_POST["email"];
        $passwd = $_POST["passwd"];
        
        
        //instantiem clasa din fisierul edit-db-signup-controller-classes.php ->SignupContr
        include "./database/DatabaseConnection.php";
        include "db-signup-classes.php";
        include "edit-db-signup-controller-classes.php";
        
        $signup = new SignupContr($nutilizator, $nume, $prenume, $email, $passwd);
        
        $signup->signupUser();
        header("location: index-event.php?error=none");
        
        
    }
