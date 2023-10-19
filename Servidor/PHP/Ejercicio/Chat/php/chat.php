<?php
session_start();

$usuario = $_SESSION["username"];

// Verificar si el usuario no está autenticado
if (!isset($usuario)) {
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

$fecha_actual = date("h:i:s");
// Procesar el envío de mensajes
if (isset($_POST['message']) && !empty($_POST['message'])) {
    $message = [$usuario, $fecha_actual, $_POST['message']];
    if(stripos($_POST['message'], '<script>') !== false){
        header('Location: chat.php');
        exit;
    }
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
    <link rel="stylesheet" href="../style/chat.css">
</head>
<body>
    <h1>Bienvenido al chat, <?php echo $_SESSION['username']; ?></h1>
    <div class="container   ">
        <?php
        // Mostrar los mensajes del chat
        for ($i = 0; $i < count($chatMessages); $i++) {
            echo "<p>{$chatMessages[$i][0]}: {$chatMessages[$i][1]}: {$chatMessages[$i][2]}</p>";
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
