<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/SponsorDB.php");
    include("../../../clase/entitati-db/Sponsor.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Home</title>
    <link rel="stylesheet" href="../../css/style.css">

</head>
<body>
<div class="container my-5">
    <h2>Sponsori </h2>
    <a class="btn btn-primary" href="create-sponsor.php" role="button">Noi sponsori</a>
    <a class="btn btn-primary" href="index-event.php" role="button">Back</a>

    <br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Descriere</th>
            <th>Detalii</th>


        </tr>
        </thead>
        <tbody>
        <?php
            $conexiuneDB = new ConexiuneDB();
            $sponsorDB = new SponsorDB($conexiuneDB);
            $sponsori= $sponsorDB->cautaTotiSponsorii();
            
            foreach ($sponsori as $sponsor) {
                $id = $sponsor->getSponsorId();
                $sponsorNume = $sponsor->getNumeSponsor();
                $sponsorDescriere = $sponsor->getDescriereSponsor();
                
                echo "
                    <tr>
                      <td>$id</td>
                      <td>$sponsorNume</td>
                      <td>$sponsorDescriere</td>
                      
                        <td>
                           <a class='btn btn-primary btn-sm' href='update-sponsor.php?id=$id'>Edit</a>
                           <a class='btn btn-primary btn-sm' href='delete-sponsor.php?id=$id'>Delete</a>
                        </td>
                    </tr>
                    ";
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>