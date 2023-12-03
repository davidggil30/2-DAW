<?php
require './config.php';
require './methods.php';

// Iniciar la sesión
session_start();

// Verificar si las variables del formulario están definidas
if (isset($_POST['usrLog']) && isset($_POST['pwdLog'])) {
    $usr = $_POST['usrLog'];
    $pwd = $_POST['pwdLog'];

    // Función para verificar las credenciales
    function verifyCredentials($conn, $usr, $pwd)
    {
        try {
            $sql = "SELECT pwd FROM usuario WHERE usr = '$usr'";
            $stmt = $conn->query($sql);

            $hashedPwd = $stmt->fetchColumn();

            // Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
            return password_verify($pwd, $hashedPwd);
        } catch (PDOException $e) {
            // Manejar el error de la consulta (puedes personalizar según tus necesidades)
            echo "Error al verificar credenciales: " . $e->getMessage();
            return false;
        }
    }

    // Verificar las credenciales
    if (verifyCredentials($conn, $usr, $pwd)) {
        // Iniciar sesión con el nombre de usuario
        $_SESSION['username'] = $usr;

        echo "Inicio de sesión exitoso.";
        // Puedes redirigir al usuario a otra página después del inicio de sesión exitoso.
        header("Location: ./chat.php");
        exit(); // Importante salir después de la redirección
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
    <h3>INICIO DE SESION</h3>
    <!-- Formulario de inicio de sesión -->
    <form action="login.php" method="POST">
        <label for="usrLog">Usuario: </label>
        <input type="text" name="usrLog" id="usrLog" placeholder="usuario" required>
        <label for="pwdLog">Contraseña</label>
        <input type="password" name="pwdLog" id="pwdLog" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>