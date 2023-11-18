<?php
    session_start();
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/AdministratorDAO.php");
    include("../../../classes/models/Administrator.php");
    include("../../../validation/AdministratorValidator.php");
    
    $dbConnection = new DatabaseConnection();
    $administratorDAO = new AdministratorDAO($dbConnection);
    $admin = new Administrator();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin->setUserName($_POST["nutilizator"]);
        $admin->setFirstName($_POST["nume"]);
        $admin->setLastName($_POST["prenume"]);
        $admin->setEmail($_POST["email"]);
        $admin->setPassword($_POST["passwd"]);
        AdministratorValidator::validateAdministrator($admin, $administratorDAO);
        $administratorDAO->addAdministrator($admin);
    }
?>

<html>
<head>
    <title>Title</title>
</head>
<body>
<form method="post" class="form_class">
    <div>
        <h1>Inregistreaza-te</h1>
        <div class="login_div">
            <input type="text" name="nutilizator" placeholder="Nume utilizator">
        </div>
        <div class="login_div">
            <input type="text" name="nume" placeholder="Nume">
        </div>
        <div class="login_div">
            <input type="text" name="prenume" placeholder="Prenume">
        </div>
        <div class="login_div">
            <input type="email" name="email" placeholder="E-mail">
        </div>
        <div class="login_div">
            <input type="password" name="passwd" placeholder="Parola">
        </div>
    </div>
    <div>
        <button type="submit" name="submit" class="button_login">Inregistreaza-te ca administrator</button>
    </div>
    <div class="login_div">
        <a href="login.php"> Ai deja un cont? Click aici pentru a te loga!</a>
    </div>
</form>
</body>
</html>




