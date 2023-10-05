<?php
    $pais = $_GET["pais"];
    $paises = [
        1 => "españa.png", 
        2 => "francia+.png", 
        3 => "italia.png",
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src=<?php
        echo $paises[$pais];
    ?> alt="pais">
    
</body>
</html>