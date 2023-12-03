<?php
    session_start();
    if(isset($_SESSION["usr"])){
        $usuario = $_SESSION["usr"];
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
    <h1>Bienvenido al chat, <?php echo $_SESSION['username']; ?></h1>
</body>
</html>