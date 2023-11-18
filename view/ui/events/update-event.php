<?php
    session_start();
    include("../../../database/DatabaseConnection.php");
    include("../../../database/dao/EventDAO.php");
    include("../../../classes/models/Event.php");
    include("../../../validation/EventValidator.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    $dbConnection = new DatabaseConnection();
    $eventRepository = new EventDAO($dbConnection);
    $event = new Event();
    $eventValidator = new EventValidator();
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index-event.php");
            exit;
        }
        
        $id = $_GET["id"];
        $event = $eventRepository->getEventById($id);
        
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $event->setEventId($_POST["id"]);
        $event->setEventTitle($_POST["titlu"]);
        $event->setEventDescription($_POST["descriere"]);
        $event->setDateTime($_POST["data_ora"]);
        $event->setLocation($_POST["locatie"]);
        $event->setPartner($_POST["parteneri"]);
        $event->setSponsor($_POST["sponsori"]);
        
        $eventValidator::validateEvent($event);
        $success = $eventRepository->updateEvent($event);
        
        if ($success) {
            header("location: index-event.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/style-update.css">
    <title>Editeaza evenimente</title>
</head>
<body>
<div class="container my-5">
    <h2>Edit</h2>
    <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $event->getEventId(); ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Titlu</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="titlu" value="<?php echo $event->getEventTitle(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere"
                       value="<?php echo $event->getEventDescription(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Data_ora</label>
            <div class="col-sm-6">
                <input type="datetime-local" class="form-control" name="data_ora"
                       value="<?php echo $event->getDateTime(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Locatie</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="locatie" value="<?php echo $event->getLocation(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Parteneri</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="parteneri" value="<?php echo $event->getPartner(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Sponsori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="sponsori" value="<?php echo $event->getSponsor(); ?>">
            </div>
        </div>
        <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
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
