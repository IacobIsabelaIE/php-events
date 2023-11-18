<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/EvenimentDB.php");
    include("../../../clase/entitati-db/Eveniment.php");
    
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
            $conexiuneDB = new ConexiuneDB();
            $evenimentDB = new EvenimentDB($conexiuneDB);
            $events = $evenimentDB->cautaToateEvenimentele();
            
            foreach ($events as $event) {
                $eventId = $event->getEventId();
                $titlu = $event->getTitluEveniment();
                $descriere = $event->getDescriereEveniment();
                $dataOra = $event->getDataEveniment();
                $locatie = $event->getLocatie();
                $partener = $event->getPartener();
                $sponsor = $event->getSponsor();
                $pretBilet = $event->getPretEveniment();
                echo "
                    <tr>
                      <td>$eventId</td>
                      <td>$titlu</td>
                      <td>$descriere</td>
                      <td>$dataOra</td>
                      <td>$locatie</td>
                      <td>$partener</td>
                      <td>$sponsor</td>
                      <td>$pretBilet</td>
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