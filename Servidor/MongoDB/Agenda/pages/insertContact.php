<?php
    require "../bbdd/config.php";
    require "../bbdd/methods.php";
    require "../php/contact.php";

    if(isset($_POST['name'])){
        $contact = new Contact($_POST['name'], $_POST['surname'], $_POST['tel']);
        insertContact($database, $contact);   
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/insertContact.css">
    <title>Insertar Contacto</title>
</head>

<body>
    <h2>INSERTAR CONTACTO</h2>
    <form action="insertContact.php" method="POST">
        <div>
            <div>
                <label for="name">Nombre:</label>
                <label for="surname">Apellido:</label>
                <label for="tel">Teléfono</label>
            </div>
            <div>
                <input type="text" name="name" id="name" required>
                <input type="text" name="surname" id="surname" required>
                <input type="tel" name="tel" id="tel" required>
            </div>
        </div>
        <input type="submit" value="Añadir">
    </form>
    <button><a href="../index.php">Ver listado completo</a></button>
</body>

</html>