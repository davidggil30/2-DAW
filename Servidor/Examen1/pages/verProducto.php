<?php
require '../db/config.php';
require '../db/methods.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
</head>

<body>
    <form action="./verProducto.php" method="POST">
        <select name="producto" id="producto">
            <?php
            // Realizar una consulta para obtener los nombres de los productos
            $sql = "SELECT nombre FROM producto";
            $result = $conn->query($sql);

            // Verificar si la consulta fue exitosa
            if ($result) {
                // Iterar sobre los resultados y crear opciones para el formulario
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $productName = $row['nombre'];
                    echo "<option value='$productName'>$productName</option>";
                }
            } else {
                echo "Error al obtener los productos.";
            }
            ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <button><a href="./login.php">Login como administrador</a></button>
    <button><a href="./insertarProducto.php">Insertar nuevo producto</a></button>

    <?php
    if (isset($_POST["producto"])) {
        $cookie_name = "Like";
        $cookie_value = $_POST["producto"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    } elseif (isset($_COOKIE["Like"])) {
        $cookie_value = $_COOKIE["Like"];
    }

    if (isset($cookie_value) || isset($_POST["producto"])) {
        // Realizar consulta para obtener detalles del producto
        $sql = "SELECT img_ruta, nombre, precio FROM producto WHERE nombre = :producto";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':producto', $cookie_value);
        $stmt->execute();

        // Mostrar detalles en una tabla
        echo "<table border='1'>";
        echo "<tr><th>Imagen</th><th>Nombre</th><th>Precio</th></tr>";

        // Obtener los resultados de la consulta
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $imgRuta = $row['img_ruta'];
            $nombre = $row['nombre'];
            $precio = $row['precio'];

            // Mostrar los detalles en una fila de la tabla
            echo "<tr>";
            echo "<td><img src='$imgRuta' alt='$nombre' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>$nombre</td>";
            echo "<td>$precio</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>


</body>

</html>