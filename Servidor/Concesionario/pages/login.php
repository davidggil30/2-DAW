<?php
    require "../bbdd/config.php";

    session_start();
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userCollection = $database->usuarios;
        $user = $userCollection->findOne(["username" => $username]);
    
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["username"] = $_POST["username"];
            header("Location: ../index.php"); 
            exit();
        } else {
            echo "Invalid username or password.";
        }
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
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>