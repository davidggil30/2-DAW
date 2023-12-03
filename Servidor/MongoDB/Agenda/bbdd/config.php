<?php
    require_once __DIR__ .'/../vendor/autoload.php';
     
    $config = parse_ini_file('config.ini', true);
    $namedb = $config["namedb"];
    $ip = $config["ip"];
    $port = $config["port"];

    $client = new MongoDB\Client("mongodb://$ip:$port");
    $database = $client->$namedb;
?>