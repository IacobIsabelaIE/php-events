<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/SponsorDB.php");
    include("../../../clase/entitati-db/Sponsor.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $conexiune = new ConexiuneDB();
        $sponsorDB = new SponsorDB($conexiune);
        $result = $sponsorDB->stergeSponsor($id);
        
        if (!$result) {
            echo "Am intampinat o problema la stergerea sponsorului";
        } else {
            header("location: admin-sponsor.php");
            exit;
        }
    }

?>