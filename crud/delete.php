<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "phpproject";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM eveniment WHERE id=$id";
    $connection->query($sql);
}

header("location: index.php");
exit;
?>