<?php
function insertProduct($conn, $ruta, $name, $price)
{
    try {
        $sql = "INSERT INTO producto (img_ruta, nombre, precio) VALUES ('$ruta', '$name', '$price')";
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo "Error al insertar el registro: " . $e->getMessage();
    }
}

function selectProduct($conn, $name)
{
    $products = listTable($conn, "producto");
    if ($products) {
        $result = array();
        foreach ($products as $product) {
            if (strtolower($name)  == strtolower($product['nombre'])) {
                $result[] = $product['nombre'];
            }
        }
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    } else {
        return null;
    }
}
