<?php
    require_once __DIR__ .'/../vendor/autoload.php';
     
    $config = parse_ini_file('config.ini', true);
    $namedb = $config["namedb"];
    $link = $config["link"];

    $client = new MongoDB\Client($link);
    $database = $client->$namedb;
?>