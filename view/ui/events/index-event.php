<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/EvenimentDB.php");
    include("../../../clase/entitati-db/Eveniment.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home</title>
    <link rel="stylesheet" href="../../css/style-index.css">

</head>
<body>
<div class="container my-5">
    <h2>Evenimente disponibile</h2>
    <a class="btn btn-primary" href="create-event.php" role="button">Noi evenimente</a>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titlu</th>
            <th>Descriere</th>
            <th>Data si ora</th>
            <th>Locatie</th>
            <th>Parteneri</th>
            <th>Sponsori</th>
            <th>Pret bilet</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $conexiuneDB = new ConexiuneDB();
            $eventDB = new EvenimentDB($conexiuneDB);
            $events = $eventDB->cautaToateEvenimentele();
            
            foreach ($events as $event) {
                $eventId = $event->getEventId();
                $eventTitle = $event->getTitluEveniment();
                $eventDescription = $event->getDescriereEveniment();
                $eventDateTime = $event->getDataEveniment();
                $eventLocation = $event->getLocatie();
                $eventPartner = $event->getPartener();
                $eventSponsor = $event->getSponsor();
                $eventPrice = $event->getPretEveniment();
                echo "
                    <tr>
                      <td>$eventId</td>
                      <td>$eventTitle</td>
                      <td>$eventDescription</td>
                      <td>$eventDateTime</td>
                      <td>$eventLocation</td>
                      <td>$eventPartner</td>
                      <td>$eventSponsor</td>
                      <td>$eventPrice</td>
                        <td>
                           <a class='btn btn-primary btn-sm' href='update-event.php?id=$eventId'>Edit</a>
                           <a class='btn btn-danger btn-sm' href='delete-event.php?id=$eventId'>Delete</a>
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