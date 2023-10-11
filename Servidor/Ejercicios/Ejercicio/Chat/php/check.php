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
if (isset($_POST["birthdate"])) {
    $birthdate = $_POST["birthdate"];
}
if (isset($_POST["mail"])) {
    $mail = $_POST["mail"];
}
if (isset($_POST["pass"])) {
    $spass = $_POST["pass"];
}
if (isset($_POST["luser"])) {
    $luser = $_POST["luser"];
}
if (isset($_POST["lpass"])) {
    $lpass = $_POST["lpass"];
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
        echo "<p>Este nombre de usuario ya existe</p>";
    } else {
        // Registrar el nuevo usuario
        $file = fopen("../csv/usuario.csv", "a") or die("Error");
        fwrite($file, "$sname,$surname,$username,$birthdate,$mail,$spass\n");
        fclose($file);
        header('Location: ./chat.php');
    }
} elseif (isset($luser) && isset($lpass)) {
    $file = fopen("../csv/usuario.csv", "r") or die("Error");
    if (filesize("../csv/usuario.csv") == 0) {
        echo "<p>No hay ningún usuario registrado todavía</p>";
    } else {
        $userFound = false;

        while ($linea = fgets($file)) {
            $data = explode(",", $linea);
            $usernameFromFile = $data[2];
            $passwordFromFile = $data[5];
            if ($usernameFromFile == $luser && $passwordFromFile == $lpass) {
                $userFound = true;
                break;
            }
        }
        fclose($file);

        if ($userFound) {
            header('Location: chat.php');
        } else {
            echo "<p>Usuario o contraseña incorrectos</p>";
        }
    }
} else {
    echo "<p>Debe proporcionar un nombre de usuario y una contraseña</p>";
}
?>
