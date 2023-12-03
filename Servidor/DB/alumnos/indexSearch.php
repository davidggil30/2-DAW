<?php
require './config.php';
require './methods.php';

$msg = null;

if (isset($_POST["searchName"])) {
    $firstname = $_POST["searchName"];
    $msg = selectAlumn($conn, $firstname);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar alumno</title>
</head>
<body>
<h3>BUSCA UN ALUMNO</h3>
    <form action="indexSearch.php" method="POST">
        <label for="searchName">Nombre</label>
        <input type="search" name="searchName" id="searchName" placeholder="nombre">
        <input type="submit" value="Buscar">
    </form>
    <p>
        <?php 
        if (isset($msg)) {
            if ($msg !== null) {
                echo "<ul>";
                foreach ($msg as $alumno) {
                    echo "<li>" . $alumno . "</li>";
                }
                echo "</ul>";
            } else {
                echo "No se han encontrado resultados";
            }
        }
        ?>
    </p>
</body>
</html>
