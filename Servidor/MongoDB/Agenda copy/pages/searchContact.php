<?php
require "../bbdd/config.php";
require "../bbdd/methods.php";
require "../php/contact.php";


$searchedContacts = [];
$error_message = "";

if (isset($_POST['searchType'])) {
    $searchType = $_POST['searchType'];
    $searchData = $_POST['searchData'];

    $searchedContacts = searchContact($database, $searchType, $searchData);

    $error_message = "Error en la búsqueda. Por favor, intenta nuevamente.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Contacto</title>
</head>

<body>

    <h1>Buscar Contacto</h1>

    <form method="post">
        <label for="searchType">Tipo de búsqueda:</label>
        <select name="searchType" id="searchType">
            <option value="name">Nombre</option>
            <option value="surname">Apellido</option>
            <option value="tel">Teléfono</option>
        </select>

        <label for="searchData">Datos de búsqueda:</label>
        <input type="text" name="searchData" id="searchData" required>

        <button type="submit">Buscar</button>
    </form>

    <?php
if (isset($searchedContacts) && !empty($searchedContacts)) {
    echo "<h2>Resultados de la Búsqueda</h2>";
    foreach ($searchedContacts as $contact) {
        echo $contact->name . ", " . $contact->surname . ", " . $contact->tel . "<br>";
    }

    // Agregar botón para extraer JSON
    /*echo '<form method="post" action="export_json.php">';
    echo '<input type="hidden" name="json_data" value="' . htmlspecialchars(json_encode($searchedContacts)) . '">';
    echo '<button type="submit">Exportar a JSON</button>';
    echo '</form>';*/
} elseif ($searchedContacts == null) {
    echo "<p>$error_message</p>";
}
?>
    <button><a href="../index.php">Ver listado</a></button>
</body>

</html>