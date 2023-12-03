<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 30%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            margin-left: 100px;
        }

        input[type="search"] {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin: 10px 0;
        }

        p {
            color: #777;
            font-size: 16px;
            text-align: center;
        }

        img {
            max-width: 50%;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <form action="./peticionCarrefour.php" method="POST">
        <label for="query">Introduce tu búsqueda</label>
        <input type="search" name="query" id="query">
        <input type="submit" value="Buscar">
    </form>
    <?php
    if (isset($_POST["query"])) {
        $query = $_POST["query"];
        $url = "https://www.carrefour.es/search-api/query/v1/search?query=" . $query . "&scope=mobile&lang=es&session=544f9d86-37ef-46e0-878c-511f7ffa84bd&rows=24&start=0&origin=linked&f.op=OR";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $json = curl_exec($curl);
        if ($json === false) {
            echo "Error en la solicitud cURL: " . curl_error($curl);
        } else {
            curl_close($curl);
            $objeto_json = json_decode($json);
            echo '<div class="container">';
            for ($i = 0; $i < count($objeto_json->content->docs); ++$i) {
                echo '<div class="product">';
                echo '<h2>' . $objeto_json->content->docs[$i]->display_name . '</h2>';
                echo '<p>' . $objeto_json->content->docs[$i]->active_price . '</p>';
                echo '<img src= "' . $objeto_json->content->docs[$i]->image_path . '" alt="Imagen">';
                echo '</div>';
            }
            echo '</div>';
        }
    }
    ?>
</body>

</html>