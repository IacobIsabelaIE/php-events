<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/SponsorDB.php");
    include("../../../clase/entitati-db/Sponsor.php");
    include("../../../validation/ValidatorSponsor.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    $conexiune = new ConexiuneDB();
    $sponsorDB = new SponsorDB($conexiune);
    $sponsor = new Sponsor();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $sponsor->setNumeSponsor($_POST["nume"]);
        $sponsor->setDescriereSponsor($_POST["descriere"]);
   
        
        ValidatorSponsor::valideazaSponsor($sponsor);
        $sponsorDB->adaugaSponsor($sponsor);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>adauga sponsori</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="container my-5">
    <h2>Noi sponsori</h2>
    
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
            <label class="col-sm-3 col-form-label">Nume</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nume">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere">
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
                <a class="btn btn-primary" href="admin-sponsor.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>