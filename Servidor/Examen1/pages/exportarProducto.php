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

    // Obtener datos de productos desde la base de datos
    $productos = getAllProducts($conn); // Reemplaza con la función correcta

    // Convertir a JSON
    $productos_json = json_encode($productos, JSON_PRETTY_PRINT);

    // Descargar como archivo JSON
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="productos.json"');
    echo $productos_json;
    exit;
?>
