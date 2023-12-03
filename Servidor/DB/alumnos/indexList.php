<?php
require './config.php';
require './methods.php';

// Función para conectarnos con la BBDD usando PDO
function conectar()
{
    $host = "localhost";
    $dbname = "alumnos";
    $username = "root";
    $password = "";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        die("Error en la conexión a la BBDD: " . $e->getMessage());
    }
}

// Nos conectamos a SQL con PDO
$c = conectar();

// Exportar a CSV
if (isset($_POST["exportarCSV"])) {
    try {
        // Creamos la consulta que va a compartir la visualización en PHP y en CSV
        $consulta = $c->query("SELECT * FROM alumno");

        if (!$consulta) {
            die("Error en la consulta: " . $c->errorInfo());
        }

        if ($consulta->rowCount() > 0) {
            // El nombre del fichero
            $ficheroExcel = "alumnos.csv";

            // Abre o crea el archivo en modo de escritura
            $archivoExportado = fopen($ficheroExcel, "w");

            // BOM (Byte Order Mark) para garantizar la compatibilidad con Excel
            fwrite($archivoExportado, "\xEF\xBB\xBF");

            // Recorremos la consulta SQL y lo escribimos en el archivo
            while ($alumno = $consulta->fetch(PDO::FETCH_ASSOC)) {
                // Usamos fputcsv para manejar automáticamente el formato CSV y evitar problemas con caracteres especiales
                fputcsv($archivoExportado, array($alumno['id'], $alumno['firstname'], $alumno['lastname']), ';');
            }

            // Cierra el archivo exportado
            fclose($archivoExportado);

            echo "Datos exportados correctamente. Puedes <a href='$ficheroExcel' download>descargarlos aquí</a>.";
        } else {
            echo "No hay datos a exportar";
        }
    } catch (PDOException $e) {
        echo "Error en la operación de exportación: " . $e->getMessage();
    }
}

// Importar desde CSV
if (isset($_POST["importarCSV"])) {
    try {
        // Nombre del archivo CSV
        $archivoCSV = "./alumnos.csv";

        // Abre el archivo CSV
        $csvFile = fopen($archivoCSV, "r");

        while($linea = fgets($csvFile)){
            $id = explode(";", $linea)[0];
            $firstname = explode(";", $linea)[1];
            $lastname = str_replace("\n", "", explode(";", $linea)[2]);
            insertAlumn($conn, $firstname, $lastname);
        }
        // Cierra el archivo CSV y el statement
        fclose($csvFile);

        echo "Datos importados correctamente desde '$archivoCSV'.";
    } catch (PDOException $e) {
        echo "Error en la operación de importación: " . $e->getMessage();
    }
}

// Obtener datos para la tabla de alumnos
$alumnos = listTable($conn, "alumno");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista alumnos</title>
</head>

<body>
    <h1>Tabla de Alumnos</h1>
    <!-- Botón para exportar a CSV -->
    <form method="post">
        <button type="submit" id="export_data" name="exportarCSV" class="btn btn-info">Exportar a Excel (CSV)</button>
    </form>

    <!-- Botón para importar desde CSV -->
    <form method="post">
        <button type="submit" id="import_data" name="importarCSV" class="btn btn-info">Importar desde Excel (CSV)</button>
    </form>

    <!-- Mostrar la tabla de alumnos -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <?php
        // Mostrar datos en la tabla
        if (isset($alumnos)) {
            foreach ($alumnos as $alumno) {
                echo "<tr>";
                echo "<td>" . $alumno['id'] . "</td>";
                echo "<td>" . $alumno['firstname'] . "</td>";
                echo "<td>" . $alumno['lastname'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No se han encontrado resultados.";
        }
        ?>
    </table>
</body>

</html>