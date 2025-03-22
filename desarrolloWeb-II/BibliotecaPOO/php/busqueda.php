<?php
// Archivo de configuración
require_once 'config.php';

// Función para obtener los libros desde el archivo plano
function obtenerLibros() {
    $libros = [];
    $archivo = '../txt/libro.txt'; // Asegúrate de que la ruta sea correcta

    if (file_exists($archivo)) {
        // Intentamos leer el archivo
        $contenido = file_get_contents($archivo);

        // Verificamos que el contenido se haya leído correctamente
        if ($contenido === false) {
            echo "Error al leer el archivo.";
            return [];
        }

        // Dividir el contenido por bloques de libro
        $librosArray = explode("-------------------------\n", $contenido);

        // Verificar si realmente hemos obtenido datos
        if (empty($librosArray)) {
            echo "No se han encontrado libros en el archivo.";
            return [];
        }

        // Iteramos a través de los bloques y los parseamos
        foreach ($librosArray as $libroStr) {
            if (trim($libroStr) != "") {
                $libroData = [];
                $lines = explode("\n", $libroStr);

                foreach ($lines as $line) {
                    if (trim($line) != "") {
                        // Dividir la línea en clave y valor
                        list($key, $value) = explode(": ", $line);
                        if (isset($key) && isset($value)) {
                            $libroData[$key] = trim($value); // Asegurarse de limpiar espacios
                        }
                    }
                }

                if (!empty($libroData)) {
                    $libros[] = $libroData;
                }
            }
        }
    } else {
        echo "El archivo no existe.";
        return [];
    }

    return $libros;
}

// Procesar la búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $criterio = $_GET['criterio_busqueda'];
    $valor = $_GET['valor_busqueda'];

    // Obtener los libros almacenados en el archivo
    $libros = obtenerLibros();
    $resultados = [];

    // Filtrar libros según el criterio de búsqueda
    foreach ($libros as $libro) {
        // Verificar si el campo especificado existe y contiene el valor buscado (sin distinción de mayúsculas/minúsculas)
        if (isset($libro[$criterio]) && strpos(strtolower($libro[$criterio]), strtolower($valor)) !== false) {
            $resultados[] = $libro;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/busqueda.css">
    <title>Búsqueda de Libros</title>
</head>
<body>
    <header>
        <h1>Búsqueda de Libros</h1>
    </header>

    <form method="get" action="">
        <label for="criterio_busqueda">Criterio de Búsqueda:</label>
        <select id="criterio_busqueda" name="criterio_busqueda" required>
            <option value="ID">ID</option>
            <option value="Título">Título</option>
            <option value="Autor">Autor</option>
            <option value="Materia">Materia</option>
        </select>
        <label for="valor_busqueda">Valor de Búsqueda:</label>
        <input type="text" id="valor_busqueda" name="valor_busqueda" required>
        <input type="submit" value="Buscar">
    </form>

    <?php
    // Mostrar los resultados
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (count($resultados) > 0) {
            echo "<h2>Resultados de la búsqueda:</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>Materia</th></tr>";
            foreach ($resultados as $libro) {
                echo "<tr>";
                echo "<td>" . $libro['ID'] . "</td>";
                echo "<td>" . $libro['Título'] . "</td>";
                echo "<td>" . $libro['Autor'] . "</td>";
                echo "<td>" . $libro['Materia'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron resultados para su búsqueda.</p>";
        }
    }
    ?>
</body>
</html>