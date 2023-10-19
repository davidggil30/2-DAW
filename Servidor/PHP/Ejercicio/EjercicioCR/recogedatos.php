<?php
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $resultado = $_POST["resultado"];
    $operacion = $_POST["operacion"];
    $boolCheck = true;
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
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            color: #007BFF;
        }

        p {
            font-size: 18px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
<form action="index.php" method="post">
    <?php
        switch ($operacion) {
            case '+':
                if ($resultado != ($num1 + $num2)) {
                    $boolCheck = false;
                }
                break;
            case '-':
                if ($resultado != ($num1 - $num2)) {
                    $boolCheck = false;
                }
                break;
            case '*':
                if ($resultado != ($num1 * $num2)) {
                    $boolCheck = false;
                }
                break;
            default:
                break;
        }
        if($boolCheck){
            echo "Correcto";
            echo '<input type="submit" value="Volver">';
        }
        else{
            echo '<button onclick="history.go(-1)">Volver</button>';
            echo "Incorrecto";
        }
    ?>
    </form>
</body>
</html>