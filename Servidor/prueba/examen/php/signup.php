<?php
// Incluir archivos de configuración y métodos
require './config.php';
require './methods.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta usuario</title>
    <!-- Estilos para la notificación -->
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #50c828;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <h3>REGISTRA UN USUARIO</h3>
    <!-- Formulario de registro de usuario -->
    <form action="signup.php" method="POST">
        <label for="usr">Usuario: </label>
        <input type="text" name="usr" id="usr" placeholder="usuario" required>
        <label for="pwd">Contraseña</label>
        <input type="password" name="pwd" id="pwd" required>
        <input type="submit" value="Enviar">
    </form>
    <!-- Div para mostrar notificación de registro exitoso o error -->
    <div id="snackbar"></div>

    <!-- Script JavaScript para mostrar la notificación -->
    <script type="text/javascript">
        function myFunction(message) {
            var x = document.getElementById("snackbar");
            x.textContent = message;
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>

    <?php
    // Verificar si se ha enviado el formulario
    if (isset($_POST["usr"])) {
        $usr = $_POST["usr"];
        $pwd = $_POST["pwd"];

        // Verificar si el usuario ya existe
        if (userExists($conn, $usr)) {
            echo "<script type='text/javascript'>";
            echo "myFunction('¡El usuario ya existe!')";
            echo "</script>";
        } else {
            // Insertar el usuario en la base de datos
            $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
            insertAlumn($conn, $usr, $pwd_hash);

            // Almacenar información en la sesión (por ejemplo, el nombre de usuario)
            $_SESSION['username'] = $usr;

            // Mostrar la notificación de registro exitoso
            echo "<script type='text/javascript'>";
            echo "myFunction('Usuario registrado correctamente')";
            header("Location: ./login.php ");
            echo "</script>";
        }
    }

    // Función para verificar si el usuario ya existe
    function userExists($conn, $usr)
    {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM usuario WHERE usr = ?");
        $stmt->execute([$usr]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    ?>
</body>