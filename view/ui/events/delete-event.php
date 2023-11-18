<?php
    session_start();
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/EventDAO.php");
    include("../../../classes/models/Event.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $dbConnection = new DatabaseConnection();
        $eventDAO = new EventDAO($dbConnection);
        $result = $eventDAO->deleteEvent($id);
        
        if (!$result) {
            echo "Am intampinat o problema la stergerea evenimentului";
        } else {
            header("location: index-event.php");
            exit;
        }
    }

?>