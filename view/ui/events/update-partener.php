
<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/PartenerDB.php");
    include("../../../clase/entitati-db/Partener.php");
    include("../../../validation/ValidatorPartener.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    $conexiuneDB = new ConexiuneDB();
    $partenerDB = new PartenerDB($conexiuneDB);
    $partener = new Partener();
    $partenerValidator = new ValidatorPartener();
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index-event.php");
            exit;
        }
        
        $id = $_GET["id"];
        $partener = $partenerDB->cautaPartenerDupaId($id);
        
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $partener->setPartenerId($_POST["id"]);
        $partener->setNumePartener($_POST["nume"]);
        $partener->setDescrierePartener($_POST["descriere"]);
        $partener->setActivitatePartener($_POST["activitate"]);
        $partener->setCauzaPartener($_POST["cauza"]);
        
        
        
        $partenerValidator::valideazaPartener($partener);
        $success = $partenerDB->updatePartener($partener);
        
        if ($success) {
            header("location: admin-partener.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Editeaza parteneri</title>
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
        <input type="hidden" name="id" value="<?php echo $partener->getPartenerId(); ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nume</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nume" value="<?php echo $partener->getNumePartener(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere"
                       value="<?php echo $partener->getDescrierePartener(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Activitate</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="activitate"
                       value="<?php echo $partener->getActivitatePartener(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Cauza</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="cauza"
                       value="<?php echo $partener->getCauzaPartener(); ?>">
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
                <a class="btn btn-primary" href="admin-partener.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
