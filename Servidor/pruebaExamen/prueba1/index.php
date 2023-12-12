<?php
require "./bbdd/config_mysql.php";
require "./bbdd/config_mongodb.php";
require "./bbdd/methods.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar producto</title>
</head>
<body>
    <h2>Inserta un nuevo producto</h2>
    <form action="./index.php" method="POST">
        <label for="ruta">Ruta</label>
        <input type="text" name="ruta" id="ruta" required>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <input type="submit" value="Añadir">
    </form>
    <button><a href="./verProducto.php">Ver productos</a></button>

    <!-- Botón para exportar a JSON siempre visible -->
    <form action="" method="POST">
        <input type="submit" name="exportarJSON" value="Exportar a JSON">
    </form>

    <?php
    // Exportar a JSON si se hace clic en el botón
    if (isset($_POST['exportarJSON'])) {
        exportarMySQLAJSON('datos_mysql.json');
        echo '<p>Datos exportados a datos_mysql.json</p>';
    }

    // Lógica de inserción de producto
    if (isset($_POST["ruta"]) && isset($_POST["nombre"]) && isset($_POST["precio"])) {
        $ruta = $_POST['ruta'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        insertProduct($conn, $ruta, $nombre, $precio);
    }
    ?>
</body>
</html>
