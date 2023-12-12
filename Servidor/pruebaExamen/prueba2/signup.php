<?php
    require "./bbdd/config.php";
    require "./bbdd/methods.php";
    require "./php/user.php";

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        $user = new User($username, $pass_hash);
        insertUser($database, $user);   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Registrate aquí</h2>
    <form action="signup.php" method="POST">
        <div>
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="text" name="password" id="password" required>
            </div>
            <div>
            </div>
        </div>
        <input type="submit" value="Añadir">
    </form>
    <a href="./pages/login.php">Login</a>
</body>
</html>