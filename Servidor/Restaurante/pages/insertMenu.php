<?php
    require "../bbdd/config.php";
    require "../bbdd/methods.php";
    require "../php/menu.php";

    if(isset($_POST['name'])){
        $name = $_POST["name"];
        $first = $_POST["first"];
        $dessert = $_POST["dessert"];
        $menu = new Menu($name, $first, $dessert);
        insertMenu($database, $menu);   
    }

    if (isset($_POST['export'])) {
        $allmenus = getAllMenu($database);
        exportToCSV($allmenus);
    }

    function exportToCSV($menus) {
        $filename = 'menus.csv';
        $handle = fopen($filename, 'w');
    
        fputcsv($handle, array('Nombre', 'Primer Plato', 'Postre'));
    
        foreach ($menus as $menu) {
            fputcsv($handle, array($menu->name, $menu->first, $menu->dessert));
        }
    
        fclose($handle);
    
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filename);
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Nuevo menú</h1>
    <form action="insertMenu.php" method="POST">
        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name">
        <label for="first">Primer plato: </label>
        <input type="text" name="first" id="first">
        <label for="dessert">Postre: </label>
        <input type="text" name="dessert" id="Dessert">
        <input type="submit" value="Añadir">
    </form>
    <form action="insertMenu.php" method="POST">
        <input type="hidden" name="export" value="1">
        <input type="submit" value="Exportar a CSV">
    </form>
</body>
</html>