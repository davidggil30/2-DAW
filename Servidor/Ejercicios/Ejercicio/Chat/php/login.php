<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="check.php" method="POST">
        <label for="luser">Usuario</label>
        <input type="text" name="user" id="user" required placeholder="Usuario">
        <label for="lpass">Contraseña</label>
        <input type="password" name="pass" id="pass" required placeholder="Contraseña">
        <input type="submit" value="Login">
    </form>
</body>
</html>