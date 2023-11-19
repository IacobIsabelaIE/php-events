<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/PartenerDB.php");
    include("../../../clase/entitati-db/Partener.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $conexiune = new ConexiuneDB();
        $partenerDB = new PartenerDB($conexiune);
        $result = $partenerDB->stergePartener($id);
        
        if (!$result) {
            echo "Am intampinat o problema la stergerea partenerului";
        } else {
            header("location: admin-partener.php");
            exit;
        }
    }

?>