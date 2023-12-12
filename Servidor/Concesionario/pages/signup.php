<?php
    require "../bbdd/config.php";
    require "../bbdd/methods.php";

    if(isset($_POST['username'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($username, $hashedPassword, 2);
        insertUser($database, $user);   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign up</h1>
    <form action="signup.php" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Registrarse">
    </form>
    <a href="./login.php">Iniciar sesión</a>
</body>
</html>