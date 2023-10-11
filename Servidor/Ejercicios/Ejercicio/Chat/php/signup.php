<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
</head>
<body>
    <form action="check.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" placeholder="Nombre">
        <label for="surname">Apellido</label>
        <input type="text" name="surname" id="surname" placeholder="Apellido">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required placeholder="Usuario">
        <label for="birthdate">Fecha de nacimiento</label>
        <input type="date" name="birthdate" id="birthdate">
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" placeholder="Mail">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass" required placeholder="Contraseña">
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>