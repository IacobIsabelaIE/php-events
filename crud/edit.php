<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "phpproject";
    
    $connection = new mysqli($servername, $username, $password, $database);
    
    $id = "";
    $titlu = "";
    $descriere = "";
    $locatie = "";
    $data_ora = "";
    $parteneri = "";
    $sponsori = "";
    
    $errorMessage = "";
    $successMessage = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index.php");
            exit;
        }
        
        $id = $_GET["id"];
        
        $sql = "SELECT * FROM eveniment WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        
        if (!$row) {
            header("location: index.php");
            exit;
        }
        
        $titlu = $row["titlu"];
        $descriere = $row["descriere"];
        $data_ora = $row["data_ora"];
        $locatie = $row["locatie"];
        $parteneri = $row["parteneri"];
        $sponsori = $row["sponsori"];
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $titlu = $_POST["titlu"];
        $descriere = $_POST["descriere"];
        $data_ora = $_POST["data_ora"];
        $locatie = $_POST["locatie"];
        $parteneri = $_POST["parteneri"];
        $sponsori = $_POST["sponsori"];
        
        if (empty($id) || empty($titlu) || empty($descriere) || empty($data_ora) || empty($locatie) || empty($parteneri) || empty($sponsori)) {
            $errorMessage = "All the fields are required";
        } else {
            $sql = "UPDATE eveniment SET titlu = '$titlu', descriere = '$descriere', data_ora = '$data_ora', locatie = '$locatie', parteneri = '$parteneri', sponsori = '$sponsori' WHERE id = $id";
            $result = $connection->query($sql);
            
            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
            } else {
                $successMessage = "Client updated correctly";
                header("location: index.php");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleEditandCreate.css">
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
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Titlu</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="titlu" value="<?php echo $titlu; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descriere" value="<?php echo $descriere; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Data_ora</label>
            <div class="col-sm-6">
                <input type="datetime-local" class="form-control" name="data_ora" value="<?php echo $data_ora; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Locatie</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="locatie" value="<?php echo $locatie; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Parteneri</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="parteneri" value="<?php echo $parteneri; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Sponsori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="sponsori" value="<?php echo $sponsori; ?>">
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
                <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
