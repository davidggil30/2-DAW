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

function getAllProducts($conn) {
    try {
        $sql = "SELECT * FROM producto"; // Ajusta el nombre de la tabla según tu esquema
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener productos: " . $e->getMessage();
        return array(); // Retorna un array vacío en caso de error
    }
}

