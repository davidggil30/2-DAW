<?php
function insertAlumn($conn, $firstname, $lastname)
{
    try {
        $sql = "INSERT INTO alumno (firstname, lastname) VALUES (:firstname, :lastname)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->execute();
        // echo "New record created successfully";
    } catch (PDOException $e) {
        // echo "Error al insertar el registro: " . $e->getMessage();
    }
}

function insertAlumnId($conn, $id, $firstname, $lastname)
{
    try {
        $sql = "INSERT INTO alumno (id, firstname, lastname) VALUES (:id, :firstname, :lastname)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->execute();
        // echo "New record created successfully";
    } catch (PDOException $e) {
        // echo "Error al insertar el registro: " . $e->getMessage();
    }
}

function listTable($conn, $table)
{
    try {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);
        return $result;
    } catch (PDOException $e) {
        echo "Error al listar la tabla: " . $e->getMessage();
        return false;
    }
}


function selectAlumn($conn, $firstName)
{
    $students = listTable($conn, "alumno");
    if ($students) {
        $result = array();
        foreach ($students as $student) {
            if (strtolower($firstName)  == strtolower($student['firstname'])) {
                $result[] = $student['firstname'] . " " . $student['lastname'];
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
?>
