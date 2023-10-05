<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombre = $_GET["nombre"];
        $edad = $_GET["edad"];
        echo "Hola $nombre, tienes $edad años";
    ?>
</body>
</html>