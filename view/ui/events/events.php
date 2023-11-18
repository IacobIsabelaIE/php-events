<?php
    session_start();
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/EventDAO.php");
    include("../../../classes/models/Event.php");
    
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
            <th>Pret</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $dbConnection = new DatabaseConnection();
            $eventRepository = new EventDAO($dbConnection);
            $events = $eventRepository->getAllEvents();
            
            foreach ($events as $event) {
                $eventId = $event->getEventId();
                $eventTitle = $event->getEventTitle();
                $eventDescription = $event->getEventDescription();
                $eventDateTime = $event->getDateTime();
                $eventLocation = $event->getLocation();
                $eventPartner = $event->getPartner();
                $eventSponsor = $event->getSponsor();
                $eventPrice = $event->getEventPrice();
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
                           <a class='btn btn-primary btn-sm' href='buy-ticket.php?id=$eventId'>Cumpara bilet</a>
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