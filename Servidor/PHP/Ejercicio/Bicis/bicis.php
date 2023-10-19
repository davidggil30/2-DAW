<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:first-child{
            background-color: orange;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <table>
        <?php
        $archivo = fopen("AccidentesBiciletas_2023.csv", "a");
        if (($fp = fopen("AccidentesBicicletas_2023.csv", "r")) != FALSE) {
            while (($data = fgetcsv($fp, 1000, ";")) != FALSE) {
                echo "<tr>";
            echo "<td>{$data[1]}</td>"; // Muestra la columna 1
            echo "<td>{$data[7]}</td>"; // Muestra la columna 7
            echo "<td>{$data[9]}</td>"; // Muestra la columna 9
            echo "</tr>";
            }
            fclose($fp);
        }
        ?>
    </table>
</body>

</html>
