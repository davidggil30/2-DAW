<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <form action="./index.php" method="POST">
        <select name="clothes" id="clothes">
            <option value="elegir">Elegir</option>
            <option value="camiseta">Camisetas</option>
            <option value="pantalon">Pantalones</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST["clothes"])) {
        $cookie_name = "Like";
        $cookie_value = $_POST["clothes"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    } elseif (isset($_COOKIE["Like"])) {
        $cookie_value = $_COOKIE["Like"];
    }

    if (isset($cookie_value) || isset($_POST["clothes"])) {
        echo "<table border='1'>";
        echo "<tr><th>Tipo</th><th>Talla</th><th>Color</th></tr>";
    
        if (($fp = fopen("./csv/ropa.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
                $tipo = $data[0];
                $talla = $data[1];
                $color = $data[2];
                
                if ((isset($cookie_value) && $tipo == $cookie_value) || (isset($_POST["clothes"]) && $tipo == $_POST["clothes"])) {
                    echo "<tr><td>$tipo</td><td>$talla</td><td>$color</td></tr>";
                }
            }
            fclose($fp); // Cerrar el archivo después de usarlo.
        }
    
        echo "</table>";
    }
    /*while($line = fgets($fp)){
$tipo = explode(",", $line)[0];
$talla = explode(",", $line)[1];
$color = explode(",", $line)[2];
}*/
    ?>




</body>

</html>