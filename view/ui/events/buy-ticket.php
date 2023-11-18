<?php
    session_start();
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/EventDAO.php");
    include("../../../database/dao/TicketDAO.php");
    include("../../../classes/models/Event.php");
    include("../../../classes/models/Ticket.php");
    
    $dbConnection = new DatabaseConnection();
    $eventDAO = new EventDAO($dbConnection);
    $ticketDao = new TicketDAO($dbConnection);
    $event = new Event();
    $ticket = new Ticket();
    
        if (!isset($_GET["id"])) {
            header("location: events.php");
            exit;
        }
        
        $id = $_GET["id"];
        $event = $eventDAO->getEventById($id);
        
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $eventId = $_GET["id"];
        
        $ticket->setEventId($eventId);
        $ticket->setEmail($_POST["email"]);
        $ticket->setFirstName($_POST["nume"]);
        $ticket->setLastName($_POST["prenume"]);
        $ticket->setEventDate($event->getDateTime());
        $ticket->setTicketPrice($event->getEventPrice());
        
        $ticketDao->buyTicket($ticket);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/style-update.css">
    <title>Cumpara bilet</title>
</head>
<body>
<div class="container my-5">
    <h2>Cumpara ticket pentru evenimentul <?php echo $event->getEventTitle(); ?></h2>
    <form method="post">
        <input type="hidden" name="eventId" value="<?php echo $event->getEventId(); ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nume</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nume">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Prenume</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="prenume">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="col-sm-6">
            <label class="col-sm-3 col-form-label">TOTAL DE PLATA: <?php echo $event->getEventPrice()?> LEI</label>
        </div>
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="index-event.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
