<?php
$config = parse_ini_file("../cfg.ini", true);
$servername = $config['database']['servername'];
$username = $config['database']['username'];
$password = $config['database']['password'];
$dbname = $config['database']['dbname'];

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

try {
    $sql = "CREATE DATABASE IF NOT EXISTS Registro"; // Intenta crear la base de datos
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    // Selecciona la base de datos Alumnos
    $conn->exec("USE Registro");
  
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS usuario (
    usr VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL
    )";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table alumno created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
