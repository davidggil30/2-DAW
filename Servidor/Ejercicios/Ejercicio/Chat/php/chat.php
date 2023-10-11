<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ruta al archivo CSV de chat
$chatFile = fopen("../csv/comentarios.csv", "r+");

// Inicializar el archivo CSV si no existe
if (!file_exists("../csv/comentarios.csv")) {
    $header = ["Usuario", "Mensaje"];
    file_put_contents("../csv/comentarios.csv", implode(",", $header) . PHP_EOL);
}

// Procesar el envío de mensajes
if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = [$_SESSION['username'], $_POST['message']];
    
    // Agregar el nuevo mensaje al archivo CSV
    $csvData = implode(",", $message) . PHP_EOL;
    file_put_contents("../csv/comentarios.csv", $csvData, FILE_APPEND);
}

// Leer los mensajes del archivo CSV
$chatMessages = array_map('str_getcsv', file("../csv/comentarios.csv"));

?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>
    <h1>Bienvenido al chat, <?php echo $_SESSION['username']; ?></h1>
    <div style="border: 1px solid ; height: 300px; overflow: auto;">
        <?php
        // Mostrar los mensajes del chat
        foreach ($chatMessages as $message) {
            echo "<p>{$message[0]}: {$message[1]}</p>";
        }
        ?>
    </div>
    <form method="post" action="chat.php">
        <input type="text" name="message" placeholder="Escribe tu mensaje">
        <input type="submit" value="Enviar">
    </form>
    <br>
    <a href="login.php">Salir</a>
</body>
</html>
