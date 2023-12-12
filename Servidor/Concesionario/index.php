<?php
session_start();
require "./bbdd/config.php";
require "./bbdd/methods.php";
require "./php/car.php";

$user = $_SESSION["username"];
if (!isset($user)) {
    header("Location: ./pages/login.php");
    exit;
}

if (isset($_POST["brand"])) {
    $car = new Car($_POST['brand'], $_POST['license'], $_POST['cv'], $_POST['price']);
    insertCar($database, $car);
}

if (!isset($_COOKIE['cart'])) {
    $cart = [];
} else {
    $cart = json_decode($_COOKIE['cart'], true);
}

// Manejar la acción de añadir al carrito
$cars = getAllCars($database);
if (isset($_POST['addToCart'])) {
    $selectedCarBrand = $_POST['selectedCar'];
    $selectedCar = findCarByBrand($cars, $selectedCarBrand);

    if ($selectedCar) {
        // Añadir el coche al carrito
        $cart[] = ['brand' => $selectedCar->brand, 'price' => $selectedCar->price];
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/functions.js"></script>
</head>

<body>
    <div id="admin">
        <h1>Inserta un coche</h1>
        <form action="index.php" method="POST">
            <label for="brand">Brand: </label>
            <input type="text" name="brand" id="brand">
            <label for="license">License</label>
            <input type="text" name="license" id="license">
            <label for="cv">CV: </label>
            <input type="number" name="cv" id="cv">
            <label for="price">Price: </label>
            <input type="number" name="price" id="price">
            <input type="submit" value="Añadir">
        </form>
        <h1>Modifica un vehiculo</h1>
        <h1>Borra un vehiculo</h1>
        
    </div>

    <div id="client">
        <h1>Bienvenido al concesionario, <?php echo $user; ?></h1>
        <h1>Coches Disponibles</h1>
        <form action="index.php" method="POST">
            <label for="selectedCar">Selecciona un coche:</label>
            <select name="selectedCar" id="selectedCar">
                <?php
                $cars = getAllCars($database);
                foreach ($cars as $car) {
                    echo '<option value="' . $car->brand . '">' . $car->brand . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="showDetails" value="Mostrar detalles">
            
        </form>

        <?php
        if (isset($_POST['showDetails'])) {
            $selectedCarBrand = $_POST['selectedCar'];
            $selectedCar = findCarByBrand($cars, $selectedCarBrand);

            if ($selectedCar) {
                echo '<h2>Detalles del coche seleccionado:</h2>';
                echo '<p>Brand: ' . $selectedCar->brand . '</p>';
                echo '<p>License: ' . $selectedCar->license . '</p>';
                echo '<p>CV: ' . $selectedCar->cv . '</p>';
                echo '<p>Price: ' . $selectedCar->price . '</p>';

                echo '<form action="index.php" method="POST">';
                echo '<input type="hidden" name="selectedCar" value="' . $selectedCarBrand . '">';
                echo '<input type="submit" name="addToCart" value="Añadir al carrito">';
                echo '</form>';
            } else {
                echo '<p>No se encontraron detalles para el coche seleccionado.</p>';
            }
        }
        ?>
        <div>
        <h1>Carrito</h1>
        <?php
        // Mostrar los coches en el carrito
        foreach ($cart as $cartItem) {
            echo '<p>' . $cartItem['brand'] . ' - $' . $cartItem['price'] . '</p>';
        }
        ?>
        </div>

    </div>

</body>

</html>