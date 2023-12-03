<!DOCTYPE html>
<html>
<head>
    <title>PAGINA 1</title>
</head>

<body>

    <?php
    $url = "https://dog.ceo/api/breeds/image/random"; 
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    curl_close($curl);

    $objeto_json = json_decode($json);

    $img=$objeto_json->message;
    ?>
    <img src="<?php echo $img;?>" alt="">
</body>

</html>