<?php
$config = parse_ini_file("../cfg.ini", true);
$servername = $config['database']['servername'];
$username = $config['database']['username'];
$password = $config['database']['password'];
$dbname = $config['database']['dbname'];

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    $sql = "CREATE DATABASE IF NOT EXISTS Tienda";
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $conn->exec("USE Tienda");
    $sql = "CREATE TABLE IF NOT EXISTS producto (
    img_ruta VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    precio INT(6) NOT NULL
    )";

    $conn->exec($sql);
    echo "Table 'Producto' created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $conn->exec("USE Tienda");

    // Crear la tabla 'administrador' si no existe
    $sql = "CREATE TABLE IF NOT EXISTS administrador (
        usr VARCHAR(255) NOT NULL,
        pwd VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);
    echo "Table 'Administrador' created successfully<br>";

    // Verificar si el usuario 'David' ya existe
    $usernameAdmin = "David";
    $sqlCheckAdmin = "SELECT COUNT(*) FROM administrador WHERE usr = :usr";
    $stmtCheckAdmin = $conn->prepare($sqlCheckAdmin);
    $stmtCheckAdmin->bindParam(':usr', $usernameAdmin);
    $stmtCheckAdmin->execute();
    $adminExists = $stmtCheckAdmin->fetchColumn();

    if (!$adminExists) {
        // Insertar un nuevo usuario administrador si no existe
        $passwordAdmin = "1234";
        $hashedPasswordAdmin = password_hash($passwordAdmin, PASSWORD_DEFAULT);

        $sqlInsertAdmin = "INSERT INTO administrador (usr, pwd) VALUES (:usr, :pwd)";
        $stmt = $conn->prepare($sqlInsertAdmin);
        $stmt->bindParam(':usr', $usernameAdmin);
        $stmt->bindParam(':pwd', $hashedPasswordAdmin);
        $stmt->execute();

        echo "Admin user 'David' created successfully";
    } else {
        echo "Admin user 'David' already exists";
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

