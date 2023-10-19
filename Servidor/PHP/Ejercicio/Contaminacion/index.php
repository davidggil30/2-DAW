<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <?php
        $magnitudes = [
            1 => "Dióxido de Azufre",
            6 => "Monóxido de Nitrógeno",
            7 => "Monóxido de Nitrógeno",
            8 => "Dióxido de Nitrógeno",
            9 => "Partículas < 2.5 µm",
            10 => "Partículas < 10 µm",
            12 => "Óxidos de Nitrógeno",
            14 => "Ozono",
            20 => "Tolueno",
            30 => "Benceno",
            35 => "Etilbenceno",
            37 => "Metaxileno",
            38 => "Paraxileno",
            39 => "Ortoxileno",
            42 => "Hidrocarburos totales (hexano)",
            43 => "Metano",
            44 => "Hidrocarburos no metánicos (hexano)",
        ];
        $defaultEstaciones = "ESTACIONES";

        $estaciones = [
            4 => "Pza. de España",
            8 => "Escuelas Aguirre",
            11 => "Av. Ramón y Cajal",
            16 => "Arturo Soria",
            17 => "Villaverde Alto",
            18 => "C/ Farolillo",
            24 => "Casa de Campo",
            27 => "Barajas",
            36 => "Estación NaN",
            38 => "Estación NaN",
            39 => "Estación NaN",
            40 => "Estación NaN",
            47 => "Mendez Alvaro",
            48 => "Pº Castellana",
            49 => "Retiro",
            50 => "Plaza Castilla",
            54 => "Ensanche Vallecas",
            55 => "Urb Embajada (Barajas)",
            56 => "Plaza Elíptica",
            57 => "Sanchinarro",
            58 => "El Pardo",
            59 => "Juan Carlos I",
            60 => "Tres Olivos",
        ];

        $defaultMagnitud = "MAGNITUD";

        $archivo = fopen("horario.csv", "a");
        if (($fp = fopen("horario.csv", "r")) != FALSE) {
            while (($data = fgetcsv($fp, 1000, ";")) != FALSE) {
                echo "<tr>";
                echo "<td>" . ($estaciones[$data[2]] ?? $defaultEstaciones) . "</td>";
                echo "<td>" . ($magnitudes[$data[3]] ?? $defaultMagnitud) . "</td>";
                for ($i = 8; $i < count($data); $i += 2) {
                    echo "<td>{$data[$i]}</td>";
                }
                echo "</tr>";
            }
            fclose($fp);
        }
        ?>
    </table>
</body>

</html>