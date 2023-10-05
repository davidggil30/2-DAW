<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form method="POST" action="recogedatos.php">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="matricula">Matricula: </label>
        <input type="text" name="matricula" id="matricula">
        <br>
        <label for="telefono">Telefono: </label>
        <input type="tel" name="telefono" id="telefono">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="marca">Marca </label>
        <select name="marca" id="marca">
            <?php
                if (($fp = fopen("marcas.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
                        echo "<option value=" . $data[0].' -> '.$data[0] . "</option>";
                    }
                    fclose($fp);
                    }
                ?>
        </select>
        <br>
        <label><input type="radio" name="info" id="info" value="Si">Si usa seguro</label>
        <br>
        <label><input type="radio" name="info" id = "info" value="No">No usa seguro</label>
        <br>
        <label>Hora de llamada</label>
        <label><input type="checkbox" name="llamada1" value="Mañana ">Mañana</label>   
        <label><input type="checkbox" name="llamada2" value="Tarde ">Tarde</label>   
        <label><input type="checkbox" name="llamada3" value="Noche ">Noche</label>   
        <input type="submit">
    </form>
</body>
</html>