<?php
    $nombre = $_GET["nombre"];
    $edad = $_GET["edad"];
    $sexo = $_GET["sexo"];
    $color = $_GET["color"];
    $info = $_GET["info"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color{
            width: 20px;
            height: 20px;
            background: <?php echo $color = $_GET["color"];?>
        }
    </style>
</head>
<body>
    <?php
        echo "Te llamas $nombre, tienes $edad años. Tu sexo es $sexo y tu color favorito es <div class='color'></div>";
        echo $info == "si" ? "Deseas recibir información" : "No desea recibir información";
    ?>
</body>
</html>