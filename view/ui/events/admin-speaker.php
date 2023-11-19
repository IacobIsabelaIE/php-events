<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/SpeakerDB.php");
    include("../../../clase/entitati-db/Speaker.php");
    
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
    <h2>Speakeri </h2>
    <a class="btn btn-primary" href="create-speaker.php" role="button">Noi speakeri</a>
    <a class="btn btn-primary" href="index-event.php" role="button">Back</a>
    
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Descriere</th>
            <th>Ocupatie</th>
            <th>Subiect abordat</th>
            <th>Detalii</th>
        
        
        </tr>
        </thead>
        <tbody>
        <?php
            $conexiuneDB = new ConexiuneDB();
            $speakerDB = new speakerDB($conexiuneDB);
            $speakeri= $speakerDB->cautaTotiSpeakerii();
            
            foreach ($speakeri as $speaker) {
                $id = $speaker->getSpeakerId();
                $speakerNume = $speaker->getNumeSpeaker();
                $speakerDescriere = $speaker->getDescriereSpeaker();
                $ocupatieSpeaker = $speaker->getOcupatieSpeaker();
                $subiectAbordat = $speaker->getSubiectAbordatSpeaker();
                
                echo "
                    <tr>
                      <td>$id</td>
                      <td>$speakerNume</td>
                      <td>$speakerDescriere</td>
                      <td>$ocupatieSpeaker</td>
                      <td>$subiectAbordat</td>

                      
                        <td>
                           <a class='btn btn-primary btn-sm' href='update-speaker.php?id=$id'>Edit</a>
                           <a class='btn btn-primary btn-sm' href='delete-speaker.php?id=$id'>Delete</a>
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