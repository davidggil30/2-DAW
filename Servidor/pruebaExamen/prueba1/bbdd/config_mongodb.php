<?php
    require_once __DIR__ .'/../vendor/autoload.php';
     
    $config = parse_ini_file('config.ini', true);
    $namedb = $config['mongodb']["namedb"];
    $linked = $config['mongodb']["link"];

    $client = new MongoDB\Client($linked);
    $database = $client->$namedb;
?>