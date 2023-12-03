<?php
function insertAlumn($conn, $usr, $pwd)
{
    try {
        $sql = "INSERT INTO usuario (usr, pwd) VALUES ('$usr', '$pwd')";
        $conn->exec($sql);
        // echo "New record created successfully";
    } catch (PDOException $e) {
        echo "Error al insertar el registro: " . $e->getMessage();
    }
}