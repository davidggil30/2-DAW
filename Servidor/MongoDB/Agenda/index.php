<?php
    require "./bbdd/config.php";
    require "./bbdd/methods.php";
    require "./php/contact.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda MongoDB</title>
</head>
<body>
    <?php
        $contacts = getAllContacts($database);
        foreach ($contacts as $contact) {
            echo $contact->name . ", " . $contact->surname . ", " . $contact->tel . "<br>";
        }
    ?>
    <button><a href="./pages/insertContact.php">Insertar contacto</a></button>
    <button><a href="./pages/searchContact.php">Buscar contacto</a></button>
</body>
</html>