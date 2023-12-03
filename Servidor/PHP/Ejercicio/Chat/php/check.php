<?php

session_start();
if (isset($_POST["name"])) {
    $sname = $_POST["name"];
}
if (isset($_POST["surname"])) {
    $surname = $_POST["surname"];
}
if (isset($_POST["username"])) {
    $username = $_POST["username"];
}
if (isset($_POST["mail"])) {
    $mail = $_POST["mail"];
}
if (isset($_POST["password"])) {
    $spass = $_POST["password"];
}
if (isset($_POST["user"])) {
    $luser = $_POST["user"];
}
if (isset($_POST["pass"])) {
    $lpass = $_POST["pass"];
}

if($_SESSION['username'] = ''){
    header('Location: ./login.php');
}

if (isset($sname)) {
    $file = fopen("../csv/usuario.csv", "r") or die("Error");

    // Verificar si el usuario ya existe
    $userExists = false;
    while ($linea = fgets($file)) {
        $user = explode(",", $linea);
        if ($user[2] == $username) {
            $userExists = true;
            break;
        }
    }
    fclose($file);

    if ($userExists) {
        $_SESSION['ErrorSession']="Este usuario ya existe";
        header('Location: signup.php');
    } else {
        // Registrar el nuevo usuario
        $file = fopen("../csv/usuario.csv", "a") or die("Error");
        fwrite($file, "$sname,$surname,$username,$birthdate,$mail,$spass\n");
        session_start();
        $_SESSION["username"] = $Susername;
        header('Location: ./chat.php');
    }
} elseif (isset($luser) && isset($lpass)) {
    $file = fopen("../csv/usuario.csv", "r") or die("Error");
    if (filesize("../csv/usuario.csv") == 0) {
        $_SESSION['ErrorLogin']="No hay ningún usuario registrado todavía";
            header('Location: signup.php');
    } else {
        $userFound = false;

        while ($linea = fgets($file)) {
            $data = explode(",", $linea);
            $usernameFromFile = $data[2];
            $passwordFromFile = $data[5];
            if ($usernameFromFile == $luser && $passwordFromFile == $lpass) {
                $userFound = true;
                session_start();
                $_SESSION["username"] = $luser;
                header("Location: ./chat.php");
                break;
            }
        }
        fclose($file);

        if ($userFound) {
            header('Location: ./chat.php');
        } else {
            $_SESSION['ErrorLogin']="Usuario o contraseña incorrectos";
            header('Location: login.php');
        }
    }
} else {
    echo "<p>Debe proporcionar un nombre de usuario y una contraseña</p>";
}
?>
