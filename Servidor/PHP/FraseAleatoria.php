<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $p = [
            1 => "Hola",
            2 => "Que tal",
            3 => "Me llamo David",
            4 => "Adios",
        ];
        $random = rand(1,4);
        echo $p[$random];
    ?>
    
</body>
</html>