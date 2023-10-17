<?php
    session_start();
    if(isset($_SESSION['ErrorLogin'])){
        $error = $_SESSION['ErrorLogin'];
        unset($_SESSION['ErrorLogin']);
    } else {
        $error = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    <div class="container">
    <?php
        if($error != ''){
            echo "<p class='error'>$error</p>";
        }
    ?>
    <form action="check.php" method="POST">
        <label for="luser">Usuario</label>
        <input type="text" name="user" id="user" required placeholder="Usuario">
        <label for="lpass">Contraseña</label>
        <input type="password" name="pass" id="pass" required placeholder="Contraseña">
        <input type="submit" value="Login">
    </form>
    </div>
    
</body>
</html>