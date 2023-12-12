<?php

require "./bbdd/config_mysql.php";
require "./bbdd/config_mongodb.php";
require "./bbdd/methods.php";

function insertProduct($conn, $ruta, $name, $price)
{
    try {
        $sql = "INSERT INTO producto (img_ruta, nombre, precio) VALUES ('$ruta', '$name', '$price')";
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo "Error al insertar el registro: " . $e->getMessage();
    }
}


// Configuración MySQL
function exportarMySQLAJSON($archivo){
    $configMySQL = parse_ini_file('config.ini', true)['mysql'];

    try {
        // Conexión a MySQL
        $connMySQL = new PDO("mysql:host={$configMySQL['servername']};dbname={$configMySQL['dbname']}", $configMySQL['username'], $configMySQL['password']);
        $connMySQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Obtener datos de MySQL
        $sqlUsuarios = "SELECT * FROM administrador";
        $resultUsuarios = $connMySQL->query($sqlUsuarios);
        $administrador = $resultUsuarios->fetchAll(PDO::FETCH_ASSOC);
    
        $sqlProductos = "SELECT * FROM producto";
        $resultProductos = $connMySQL->query($sqlProductos);
        $productos = $resultProductos->fetchAll(PDO::FETCH_ASSOC);
    
        // Cerrar la conexión a MySQL
        $connMySQL = null;
    
        // Crear un array que contenga ambos conjuntos de datos
        $datos = [
            'administrador' => $administrador,
            'producto' => $productos,
        ];
    
        // Convertir el array a formato JSON
        $jsonData = json_encode($datos, JSON_PRETTY_PRINT);
    
        // Guardar el JSON en un archivo
        file_put_contents('datos_mysql.json', $jsonData);
    
        echo "Datos exportados a datos_mysql.json";
    } catch (PDOException $e) {
        echo "Error de conexión a MySQL: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error al exportar datos a JSON: " . $e->getMessage();
    }
}

?>