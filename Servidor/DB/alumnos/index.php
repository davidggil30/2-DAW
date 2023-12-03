<?php
require './config.php';
require './methods.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta alumno</title>
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
    <h3>INSERTA UN NUEVO ALUMNO</h3>
    <form action="indexInsert.php" method="POST">
        <label for="firstname">Nombre: </label>
        <input type="text" name="firstname" id="firstname" placeholder="nombre" required>
        <label for="lastname">Apellido</label>
        <input type="text" name="lastname" id="lastname" placeholder="apellido" required>
        <input type="submit" value="Enviar">
    </form>
    <button><a href="./indexSearch.php">Buscar</a></button>
    <button><a href="./indexList.php">Ver lista</a></button>
    <div id="snackbar"><i><b>Usuario registrado correctamente</b></i></div>

    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>

    <?php
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        insertAlumn($conn, $firstname, $lastname);
        echo "<script type='text/javascript'>";
        echo "myFunction()";
        echo "</script>";
    }
    ?>
    </script>
</body>

</html>