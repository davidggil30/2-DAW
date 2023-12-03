<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $producto = $_GET["producto"];
        $url = "https://tienda.mercadona.es/search-results?query=".$producto;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $html = curl_exec($curl);
        curl_close($curl);

        $objeto_DOM = new DOMDocument();
        $objeto_DOM->loadHTML($html);
        var_dump($objeto_DOM);
    ?>
</body>
</html>