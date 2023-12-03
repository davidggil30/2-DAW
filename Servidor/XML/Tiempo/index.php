<!DOCTYPE html>
<html>

<head>
    <title>Pronóstico del Tiempo</title>
    <style>
        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            margin: 20px;
        }

        select {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #0074D9;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Pronóstico del Tiempo (AEMET)</h1>
    <form method="post" action="">
        <label for="municipio">Selecciona un municipio:</label>
        <select name="municipio" id="municipio">
            <option value="28079">Madrid</option>
            <option value="08019">Barcelona</option>
            <option value="46250">Valencia</option>
        </select>
        <input type="submit" value="VER">
    </form>
 
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el municipio seleccionado
        $municipio = $_POST["municipio"];
        $url = "https://www.aemet.es/xml/municipios/localidad_$municipio.xml";

        // Realizar la solicitud y procesar los datos XML
        $xml = simplexml_load_file($url);
        $forecastData = $xml->prediccion->dia;

        if ($forecastData) {
            echo '<table>';
            echo '<tr><th>Día</th><th>Temperatura Mínima (°C)</th><th>Temperatura Máxima (°C)</th></tr>';
            foreach ($forecastData as $day) {
                $date = $day['fecha']; // Acceder al atributo fecha
                $minTemp = $day->temperatura->minima;
                $maxTemp = $day->temperatura->maxima;
                echo "<tr><td>$date</td><td>$minTemp</td><td>$maxTemp</td></tr>";
            }
            echo '</table>';
        } else {
            echo '<p>No se pudo obtener el pronóstico del tiempo.</p>';
        }
    }
    ?>
</body>

</html>