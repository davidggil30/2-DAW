<?php
    echo "Probando mongoDB";
    require_once __DIR__ .'./vendor/autoload.php';
    $client = new MongoDB\Client('mongodb://localhost:27017');
    $collection = $client->local->amigo;
    $resultado = $collection->find();

    foreach($resultado as $res)
    {
        echo "Nombre: ".$res['nombre']."<br>";
    }

    // var_dump($collection);
?>