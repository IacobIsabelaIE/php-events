<?php
    
    session_start();
    if (isset($_SESSION["nutilizator"]) && isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/events/events.php');
    }
    
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/AdministratorDAO.php");
    include("../../../classes/models/Administrator.php");
    
    $dbConnection = new DatabaseConnection();
    $administratorDAO = new AdministratorDAO($dbConnection);
    $admin = new Administrator();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $admin->setEmail($_POST["email"]);
        $admin->setPassword($_POST["password"]);
        $loginSuccessful = $administratorDAO->loginAdministrator($admin);
    }
?>
<html>
<head>

    <title>TEST</title>
    <!--    <link rel="stylesheet" href="css/login.css">-->

</head>

<body>
<form method="post" class="form_class">

    <div>
        <h1>LOGIN</h1>
        

        <div class="login_div">
            <input type="email" name="email" placeholder="E-mail" class="input">

        </div>

        <div class="login_div">
            <input type="password" name="password" placeholder="Parola" class="input">

        </div>

        <button type="submit" name="submit" class="button_login">LOGIN</button>

        <div class="login_div">
            <a href="index.php"> Create an account</a> <br>

        </div>
    </div>

</form>
</body>
</html>




