<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/EvenimentDB.php");
    include("../../../clase/entitati-db/Eveniment.php");
    include("../../../validation/ValidatorEvenimente.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    $conexiune = new ConexiuneDB();
    $evenimentDB = new EvenimentDB($conexiune);
    $event = new Eveniment();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $event->setTitluEveniment($_POST["titlu"]);
        $event->setDescriereEveniment($_POST["descriere"]);
        $event->setDataEveniment($_POST["data_ora"]);
        $event->setLocatie($_POST["locatie"]);
        $event->setPartener($_POST["parteneri"]);
        $event->setSponsor($_POST["sponsori"]);
        $event->setPretEveniment($_POST["pret"]);
        
        ValidatorEvenimente::valideazaEveniment($event);
        $evenimentDB->adaugaEveniment($event);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>My Shop</title>
    <link rel="stylesheet" href="../../css/style-update.css">

</head>
<body>
<div class="container my-5">
    <h2>Noi evenimente</h2>
    
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
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Titlu</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="titlu">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">data si ora</label>
            <div class="col-sm-6">
                <input type="datetime-local" class="form-control" name="data_ora">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Locatie</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="locatie">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Parteneri</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="parteneri">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Sponsori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="sponsori">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Pret</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="pret">
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