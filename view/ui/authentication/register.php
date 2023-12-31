<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/AdministratorDB.php");
    include("../../../clase/entitati-db/Administrator.php");
    include("../../../validation/ValidatorAdministrator.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/events/events.php');
    }
    
    $dbConnection = new ConexiuneDB();
    $administratorDAO = new AdministratorDB($dbConnection);
    $admin = new Administrator();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin->setNumeUtilizator($_POST["nutilizator"]);
        $admin->setNume($_POST["nume"]);
        $admin->setPrenume($_POST["prenume"]);
        $admin->setEmail($_POST["email"]);
        $admin->setPassword($_POST["passwd"]);
        ValidatorAdministrator::validateAdministrator($admin, $administratorDAO);
        $administratorDAO->adaugaAdministrator($admin);
    }
?>

<html>
<head>
    <title>Title</title>
</head>
<body>
<form method="post" class="form_class">
    <div>
        <h1>Inregistreaza un administrator</h1>
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
        <button type="submit" name="submit" class="button_login">Inregistreaza un nou administratorr</button>
    </div>
    <div class="login_div">
        <a href="login.php">Mergi spre logare</a>
    </div>
</form>
</body>
</html>




