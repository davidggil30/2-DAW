<?php
$config = parse_ini_file("config.ini", true);
$servername = $config['mysql']['servername'];
$username = $config['mysql']['username'];
$password = $config['mysql']['password'];
$dbname = $config['mysql']['dbname'];

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  // echo "Connection failed: " . $e->getMessage();
}

try {
    $sql = "CREATE DATABASE IF NOT EXISTS shop"; // Intenta crear la base de datos
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Database created successfully<br>";
} catch (PDOException $e) {
    // echo $sql . "<br>" . $e->getMessage();
}

try {
    // Selecciona la base de datos Tienda
    $conn->exec("USE shop");
  
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS administrador (
        usr VARCHAR(255) NOT NULL,
        pwd VARCHAR(255) NOT NULL
    )";
  
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

        // echo "Admin user 'David' created successfully";
    } else {
        // echo "Admin user 'David' already exists";
    }

    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Table alumno created successfully";
} catch(PDOException $e) {
    //  echo $sql . "<br>" . $e->getMessage();
}

try {
    $conn->exec("USE shop");
    $sql = "CREATE TABLE IF NOT EXISTS producto (
    img_ruta VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    precio INT(6) NOT NULL
    )";

    $conn->exec($sql);
    // echo "Table 'Producto' created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
