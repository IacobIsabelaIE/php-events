<?php
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/EventDAO.php");
    include("../../../classes/models/Event.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $dbConnection = new DatabaseConnection();
        $eventRepository = new EventDAO($dbConnection);
        $result = $eventRepository->deleteEvent($id);
        
        if (!$result) {
            echo "Am intampinat o problema la stergerea evenimentului";
        } else {
            header("location: index-event.php");
            exit;
        }
    }

?>