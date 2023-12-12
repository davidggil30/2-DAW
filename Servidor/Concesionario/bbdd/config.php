<?php
require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . "/../php/user.php";

$config = parse_ini_file('config.ini', true);
$namedb = $config["namedb"];
$linked = $config["link"];

$client = new MongoDB\Client($linked);
$database = $client->$namedb;

$username = "admin";
$password = "admin";
$rol = "admin";

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


if (!$database->usuarios->findOne(['rol' => $rol])) {
    $database->usuarios->insertOne([
        'username' => $username,
        'password' => $hashedPassword,
        'rol' => $rol
    ]);
    // echo "Usuario insertado correctamente.";
} else {
    // echo "Ya existe un usuario con el rol $rol.";
}
