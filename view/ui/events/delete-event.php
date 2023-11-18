<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/EvenimentDB.php");
    include("../../../clase/entitati-db/Eveniment.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $conexiune = new ConexiuneDB();
        $evenimentDB = new EvenimentDB($conexiune);
        $result = $evenimentDB->stergeEveniment($id);
        
        if (!$result) {
            echo "Am intampinat o problema la stergerea evenimentului";
        } else {
            header("location: index-event.php");
            exit;
        }
    }

?>