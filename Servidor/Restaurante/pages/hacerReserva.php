<?php
    require "../bbdd/config.php";
    require "../bbdd/methods.php";
    require "../php/menu.php";
    require "../php/user.php";

    $personal = getUsersByRole($database, 2);

    if (isset($_POST["personal"])) {
        $selectedUsername = $_POST["personal"];
        foreach ($personal as $user) {
            if ($user->username === $selectedUsername) {
                $selectedUser = $user;
                break;
            }
        }
        if ($selectedUser && $selectedUser->available) {
            $selectedUser->available = false;
            updateAvailability($database, $selectedUser);
            
            echo "Reserva realizada para: " . $selectedUsername;
        } else {
            echo "Este miembro del personal no está disponible.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacer reserva</title>
</head>
<body>
    <h1>Haz tu reserva ahora!</h1>
    <form action="hacerReserva.php" method="POST">
        <label for="personal">Selecciona un miembro del personal:</label>
        <select name="personal" id="personal">
            <?php
                foreach ($personal as $user) {
                    echo "<option value='$user->username'>$user->username</option>";
                }
            ?>
        </select>
        <input type="submit" value="Hacer Reserva">
    </form>
    
</body>
</html>