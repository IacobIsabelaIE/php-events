<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/PartenerDB.php");
    include("../../../clase/entitati-db/Partener.php");
    
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
    <h2>Parteneri </h2>
    <a class="btn btn-primary" href="create-partener.php" role="button">Noi parteneri</a>
    <a class="btn btn-primary" href="index-event.php" role="button">Back</a>
    
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Descriere</th>
            <th>Activitate</th>
            <th>Cauza</th>
            <th>Detalii</th>
        
        
        </tr>
        </thead>
        <tbody>
        <?php
            $conexiuneDB = new ConexiuneDB();
            $partenerDB = new partenerDB($conexiuneDB);
            $parteneri= $partenerDB->cautaTotiPartenerii();
            
            foreach ($parteneri as $partener) {
                $id = $partener->getPartenerId();
                $partenerNume = $partener->getNumePartener();
                $partenerDescriere = $partener->getDescrierePartener();
                $partenerActivitate = $partener->getActivitatePartener();
                $partenerCauza = $partener->getCauzaPartener();
                
                echo "
                    <tr>
                      <td>$id</td>
                      <td>$partenerNume</td>
                      <td>$partenerDescriere</td>
                      <td>$partenerActivitate</td>
                      <td>$partenerCauza</td>

                      
                        <td>
                           <a class='btn btn-primary btn-sm' href='update-partener.php?id=$id'>Edit</a>
                           <a class='btn btn-primary btn-sm' href='delete-partener.php?id=$id'>Delete</a>
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