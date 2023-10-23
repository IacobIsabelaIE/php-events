<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home</title>
    <link rel="stylesheet" href="stylee.css">

</head>
<body>
    <div class="container my-5">
        <h2>Evenimente disponibile</h2>
        <a class="btn btn-primary" href="create.php" role="button">Noi evenimente</a>
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
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "phpproject";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM eveniment";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[titlu]</td>
                        <td>$row[descriere]</td>
                        <td>$row[data_ora]</td>
                        <td>$row[locatie]</td>
                        <td>$row[parteneri]</td>
                        <td>$row[sponsori]</td>
                        
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
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