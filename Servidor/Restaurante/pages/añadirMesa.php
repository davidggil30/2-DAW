<?php
    require "../bbdd/config.php";
    require "../bbdd/methods.php";
    require "../php/mesa.php";

    $menus = getAllMenu($database);

    if(isset($_POST['id'])){
        $id = $_POST["id"];
        $menu = $_POST["menu"];
        $mesa = new Mesa($id, $menu);
        insertMesa($database, $mesa);   
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
    <form action="añadirMesa.php" method="POST">
        <label for="id">Id: </label>
        <input type="text" name="id" id="id">
        <select name="menu" id="menu">
            <?php
            foreach ($menus as $menu) {
                echo "<option value='$menu->name'>$menu->name</option>";
            }
            ?>
        </select>
        <input type="submit" value="Añadir">
    </form>
</body>
</html>