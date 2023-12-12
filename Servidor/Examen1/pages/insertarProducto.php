<?php
    require '../db/config.php';
    require '../db/methods.php';

    session_start();

    $usuario = $_SESSION["username"];
    // Verificar si el usuario no está autenticado
    if (!isset($usuario)) {
        header("Location: ./login.php");
    exit;
}

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
    <form action="./insertarProducto.php" method="POST">
        <label for="ruta">Ruta</label>
        <input type="text" name="ruta" id="ruta" required>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <input type="submit" value="Añadir">
    </form>
    <button><a href="./verProducto.php">Ver productos</a></button>

    <a href="./exportarProducto.php">Exportar a JSON</a>

    <?php
        if(isset($_POST["ruta"]) && isset($_POST["nombre"]) && isset($_POST["precio"])){
            $ruta = $_POST['ruta'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            insertProduct($conn, $ruta, $nombre, $precio);
        }


    ?>
</body>
</html>