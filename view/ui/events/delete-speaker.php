<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/SpeakerDB.php");
    include("../../../clase/entitati-db/Speaker.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $conexiune = new ConexiuneDB();
        $speakerDB = new SpeakerDB($conexiune);
        $result = $speakerDB->stergeSpeaker($id);
        
        if (!$result) {
            echo "Am intampinat o problema la stergerea speakerului";
        } else {
            header("location: admin-speaker.php");
            exit;
        }
    }

?>