<?php
    session_start();
    include("../../../database/ConexiuneDB.php");
    include("../../../database/acces-db/SpeakerDB.php");
    include("../../../clase/entitati-db/Speaker.php");
    include("../../../validation/ValidatorSpeaker.php");
    
    if (!isset($_SESSION["nutilizator"]) && !isset($_SESSION["id"])) {
        header('Location: http://localhost/php-events/view/ui/authentication/login.php');
    }
    
    $conexiuneDB = new ConexiuneDB();
    $speakerDB = new SpeakerDB($conexiuneDB);
    $speaker = new Speaker();
    $speakerValidator = new ValidatorSpeaker();
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index-event.php");
            exit;
        }
        
        $id = $_GET["id"];
        $speaker = $speakerDB->cautaSpeakerDupaId($id);
        
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $speaker->setSpeakerId($_POST["id"]);
        $speaker->setNumeSpeaker($_POST["nume"]);
        $speaker->setDescriereSpeaker($_POST["descriere"]);
        $speaker->setOcupatieSpeaker($_POST["ocupatie"]);
        $speaker->setSubiectAbordatSpeaker($_POST["subiectAbordat"]);
        
        
        $speakerValidator::valideazaSpeaker($speaker);
        $success = $speakerDB->updateSpeaker($speaker);
        
        if ($success) {
            header("location: admin-speaker.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Editeaza speakeri</title>
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
        <input type="hidden" name="id" value="<?php echo $speaker->getSpeakerId(); ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nume</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nume" value="<?php echo $speaker->getNumeSpeaker(); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere"
                       value="<?php echo $speaker->getDescriereSpeaker(); ?>">
            </div>
        </div>
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Ocupatie</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="ocupatie"
                       value="<?php echo $speaker->getOcupatieSpeaker(); ?>">
            </div>
        </div>
        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Subiect Abordat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="subiectAbordat"
                       value="<?php echo $speaker->getSubiectAbordatSpeaker(); ?>">
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
                <a class="btn btn-primary" href="admin-speaker.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
