<?php
require "../bbdd/config.php";
require "../bbdd/methods.php";
require "../php/contact.php";

$searchedContacts = [];
$error_message = "";
$lastSearchType = "";
$lastSearchData = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['searchType']) && isset($_POST['searchData'])) {
        $searchType = $_POST['searchType'];
        $searchData = $_POST['searchData'];

        // Perform the search
        $searchedContacts = searchContact($database, $searchType, $searchData);

        // Set the searched data in a cookie
        setcookie('lastSearchType', $searchType, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('lastSearchData', $searchData, time() + (86400 * 30), "/");

        // Set variables for displaying the last search on refresh
        $lastSearchType = $searchType;
        $lastSearchData = $searchData;

        // Display error message if the search fails
        if (empty($searchedContacts)) {
            $error_message = "Error en la búsqueda. Por favor, intenta nuevamente.";
        }
    }
} else {
    // Check if last search cookies exist
    if (isset($_COOKIE['lastSearchType']) && isset($_COOKIE['lastSearchData'])) {
        $lastSearchType = $_COOKIE['lastSearchType'];
        $lastSearchData = $_COOKIE['lastSearchData'];

        // Perform the search using the last search data
        $searchedContacts = searchContact($database, $lastSearchType, $lastSearchData);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/searchContact.css">
    <title>Buscar Contacto</title>
</head>

<body>

    <h1>Buscar Contacto</h1>

    <form method="post">
        <label for="searchType">Tipo de búsqueda:</label>
        <select name="searchType" id="searchType">
            <option value="name" <?php if ($lastSearchType == 'name') echo 'selected'; ?>>Nombre</option>
            <option value="surname" <?php if ($lastSearchType == 'surname') echo 'selected'; ?>>Apellido</option>
            <option value="tel" <?php if ($lastSearchType == 'tel') echo 'selected'; ?>>Teléfono</option>
        </select>

        <label for="searchData">Datos de búsqueda:</label>
        <input type="text" name="searchData" id="searchData" value="<?php echo $lastSearchData; ?>" required>

        <button type="submit">Buscar</button>
    </form>

    <?php
    if (!empty($searchedContacts)) {
        echo "<h2>Resultados de la Búsqueda</h2>";
        foreach ($searchedContacts as $contact) {
            echo $contact->name . ", " . $contact->surname . ", " . $contact->tel . "<br>";
        }
    } elseif ($searchedContacts == null) {
        echo "<p>$error_message</p>";
    }
    ?>

    <button><a href="../index.php">Ver listado</a></button>
</body>

</html>
