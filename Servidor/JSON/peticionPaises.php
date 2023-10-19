<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Países</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 20px;
        }

        .country-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            box-shadow: 2px 2px 5px #ccc;
            display: inline-block;
            width: 300px;
        }

        h2 {
            color: #333;
        }

        .capital {
            color: #555;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            display: block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    $url = "https://restcountries.com/v3.1/all";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    curl_close($curl);

    $objeto_json = json_decode($json);
    for ($i = 0; $i < count($objeto_json); ++$i) {
        echo '<div class="country-card">';
        echo '<h2>' . $objeto_json[$i]->name->common . '</h2>';
        if (isset($objeto_json[$i]->capital[0])) {
            echo '<div class="capital">' . $objeto_json[$i]->capital[0] . '</div>';
        } else {
            echo '<div class="capital">No capital</div>';
        }
        $urlMap = $objeto_json[$i]->maps->googleMaps;
        echo "<a href='$urlMap'>Ver en Google Maps</a>";
        echo '</div>';
    }
    ?>
</body>
</html>
 