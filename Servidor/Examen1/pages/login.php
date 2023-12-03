<?php
require '../db/config.php';
require '../db/methods.php';

session_start();

if (isset($_POST['usr']) && isset($_POST['pwd'])) {
    $usr = $_POST['usr'];
    $pwd = $_POST['pwd'];

    function verifyCredentials($conn, $usr, $pwd)
    {
        try {
            $sql = "SELECT pwd FROM administrador WHERE usr = '$usr'";
            $stmt = $conn->query($sql);

            $hashedPwd = $stmt->fetchColumn();
            return password_verify($pwd, $hashedPwd);
        } catch (PDOException $e) {
            echo "Error al verificar credenciales: " . $e->getMessage();
            return false;
        }
    }

    // Verificar las credenciales
    if (verifyCredentials($conn, $usr, $pwd)) {
        header("Location: ./insertarProducto.php");
    } else {
        echo "<p style='color:red;'> Credenciales incorrectas.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>
    <h3>INICIO DE SESION COMO ADMIN</h3>
    <form action="login.php" method="POST">
        <label for="usr">Usuario: </label>
        <input type="text" name="usr" id="usr" placeholder="usuario" required>
        <label for="pwd">Contraseña</label>
        <input type="password" name="pwd" id="pwd" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>