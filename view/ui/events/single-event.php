<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/EvenimentDB.php");
    include("../../../clase/entitati-db/Eveniment.php");
    include("../../../validation/ValidatorEvenimente.php");
    
    $conexiuneDB = new ConexiuneDB();
    $eventDB = new EvenimentDB($conexiuneDB);
    $event = new Eveniment();
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index-event.php");
            exit;
        }
        
        $id = $_GET["id"];
        $event = $eventDB->cautaEvenimentDupaId($id);
    }
    
    ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/single-event.css">

    <title>Event Details</title>
    
</head>

<body>

<nav class = "navbar">

    <a href="#" class="toggle-button">
        <span class="bars"></span>
        <span class="bars"></span>
        <span class="bars"></span>
    </a>
    <div class ="navbar-links">
        <ul>
            <li><a class="list-item" href="single-event.php">Home</a></li>
            <li><a class="list-item" href="agenda.php">Agenda</a></li>
            <li><a class="list-item" href="speakers.php">Speakeri</a></li>
            <li><a class="list-item" href="sponsors-parteneri.php">Sponsori si Parteneri</a></li>
            <li><a class="list-item" href="contact.php">Contact </a></li>
            <li><a class="list-item" href="cumpara-bilet">Cumpara bilet </a></li>


        </ul>
    </div>
</nav>

<div class="container">
    <h1>Event Details</h1>

    <div class="event-details">
        <div>Titlu eveniment:  <?php echo $event->getTitluEveniment(); ?> </div>
        <div>Descriere eveniment:  <?php echo $event->getDescriereEveniment(); ?> </div>
        <div>Data si ora eveniment: <?php echo $event->getDataEveniment(); ?> </div>
        <div>Locatie: <?php echo $event->getLocatie(); ?> </div>
        <div>Parteneri: <?php echo $event->getPartener(); ?> </div>
        <div>Sponsori: <?php echo $event->getSpeaker(); ?> </div>
        <div>Speaker:  <?php echo $event->getSpeaker(); ?> </div>
        <div>Pret: <?php echo $event->getPretEveniment(); ?> </div>
    </div>

    <table>
        <tr>
            <td>
                <a class='btn btn-primary btn-sm' href='buy-ticket.php?id=<?php echo $event->getEventId()?>'>Cumpara bilet</a>
            </td>

        </tr>
    </table>
</div>


</body>


<body>
















