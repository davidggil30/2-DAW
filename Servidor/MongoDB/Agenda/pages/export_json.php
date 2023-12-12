<?php
if (isset($_POST['json_data'])) {
    $json_data = json_decode($_POST['json_data']);
    
    // Puedes hacer lo que desees con el $json_data aquí, como guardarlo en un archivo o imprimirlo
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="search_results.json"');
    echo json_encode($json_data, JSON_PRETTY_PRINT);
    exit();
}
?>