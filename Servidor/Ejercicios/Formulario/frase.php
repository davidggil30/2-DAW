<?php
    $numero = $_GET["number"];
    $color = $_GET["color"];
    $p = [
        1 => "Hola",
        2 => "Que tal",
        3 => "Me llamo David",
        4 => "Adios",
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    echo "<style>
            body{
                background-color: $color;
            }
    </style>"
    ?>
</head>

<body>
    <?php 
        echo $p[$numero];
    ?>
</body>
</html>