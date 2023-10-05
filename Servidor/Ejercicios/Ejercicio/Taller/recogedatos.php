<?php
    $nombre = $_POST["nombre"];
    $matricula = $_POST["matricula"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $marca = $_POST["marca"];
    $info = $_POST["info"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 400px;
            width: 100%;
        }

        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        td:first-child {
            font-weight: bold;
            width: 40%;
        }

        td:nth-child(2) {
            width: 60%;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>Nombre</td>
            <td><?php echo $nombre?></td>
        </tr>
        <tr>
            <td>Matricula</td>
            <td><?php echo $matricula?></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><?php echo $telefono?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email?></td>
        </tr>
        <tr>
            <td>Marca</td>
            <td><?php echo $marca?></td>
        </tr>
        <tr>
            <td>Seguro</td>
            <td><?php echo $info == "si" ? "Si" : "No"; ?></td>
        </tr>
        <tr>
            <td>Horario</td>
            <td><?php
                for($i = 1; $i < 4; $i +=1){
                    if(isset($_POST["llamada$i"])){
                        echo $_POST["llamada$i"];
                    }
                }  
            ?></td>
        </tr>
    </table>
</body>
</html>