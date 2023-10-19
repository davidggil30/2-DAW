<?php
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $tel = $_POST["tel"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ad99e0;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: grey;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
        </tr>
        <?php
        $archivo = fopen("agenda.csv", "a");
        fputcsv($archivo, array($name, $surname, $tel));
        if (($fp = fopen("agenda.csv", "r")) != FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) != FALSE) {
                echo "<tr>";
                echo "<td>{$data[0]}</td>";
                echo "<td>{$data[1]}</td>";
                echo "<td>{$data[2]}</td>";
                echo "</tr>";
            }
            fclose($fp);
            }
        ?>
    </table>
</body>
</html>
