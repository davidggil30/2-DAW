<?php
    require "../bbdd/config.php";
    require "../bbdd/methods.php";
    require "../php/user.php";

    
    if(isset($_POST['usernameDel'])){
        $usernameToDelete = $_POST['usernameDel'];
        deletePersonal($database, $usernameToDelete, 2);
    }

    if(isset($_POST['username'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($username, $hashedPassword, 2);
        insertPersonal($database, $user);   
    }

    $personalUsers = getUsersByRole($database, 'personal');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h2>Personal</h2>
    <?php
    foreach ($personalUsers as $user) {
        echo "<ul>";
        echo "<li>" . $user->username . "<br>" . "</li>";
        echo "</ul>";
    }
    ?>

    <h1>Sign up</h1>
    <form action="jugarConPersonal.php" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Registrarse">
    </form>
    <h1>Eliminar personal</h1>
    <form action="jugarConPersonal.php" method="POST">
        <label for="usernameDel">Username: </label>
        <input type="text" name="usernameDel" id="personalDel">
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>