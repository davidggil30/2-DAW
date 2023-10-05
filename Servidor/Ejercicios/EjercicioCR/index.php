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
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <?php
        $num1 = rand(0,10);
        $num2 = rand(0,10);
        $operacion = [
            1 => "+",
            2 => "-",
            3 => "*",
        ];
        $oprand = rand(1,count($operacion));
    ?>
    <form method= "POST" action="recogedatos.php">
        <input type="number" name="num1" id="num1" value = <?php echo $num1 ?> hidden>
        <input type="number" name="num2" id="num2" value = <?php echo $num2 ?> hidden>
        <input type="text" name = "operacion" id = "operacion" value = <?php echo $operacion[$oprand] ?> hidden>
        <?php echo "$num1 $operacion[$oprand] $num2"?>
        <input type="number" name="resultado" placeholder="resultado">
        
        <input type="submit">
    </form>
</body>
</html>