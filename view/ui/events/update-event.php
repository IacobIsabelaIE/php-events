<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/EvenimentDB.php");
    include("../../../clase/entitati-db/Eveniment.php");
    include("../../../validation/ValidatorEvenimente.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    $conexiuneDB = new ConexiuneDB();
    $eventDB = new EvenimentDB($conexiuneDB);
    $event = new Eveniment();
    $eventValidator = new ValidatorEvenimente();
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index-event.php");
            exit;
        }
        
        $id = $_GET["id"];
        $event = $eventDB->cautaEvenimentDupaId($id);
        
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $event->setEventId($_POST["id"]);
        $event->setTitluEveniment($_POST["titlu"]);
        $event->setDescriereEveniment($_POST["descriere"]);
        $event->setDataEveniment($_POST["data_ora"]);
        $event->setLocatie($_POST["locatie"]);
        $event->setPartener($_POST["parteneri"]);
        $event->setSponsor($_POST["sponsori"]);
        $event->setPretEveniment($_POST["pret"]);
        
        $eventValidator::valideazaEveniment($event);
        $success = $eventDB->updateEveniment($event);
        
        if ($success) {
            header("location: index-event.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/style.css">
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
                <input type="text" class="form-control" name="titlu" value="<?php echo $event->getTitluEveniment(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere"
                       value="<?php echo $event->getDescriereEveniment(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Data_ora</label>
            <div class="col-sm-6">
                <input type="datetime-local" class="form-control" name="data_ora"
                       value="<?php echo $event->getDataEveniment(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Locatie</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="locatie" value="<?php echo $event->getLocatie(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Parteneri</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="parteneri" value="<?php echo $event->getPartener(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Sponsori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="sponsori" value="<?php echo $event->getSponsor(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Pret bilet eveniment</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="pret" value="<?php echo $event->getPretEveniment(); ?>">
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
                <a class="btn btn-primary" href="index-event.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
