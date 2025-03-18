<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Estudiantes</title>
    <link rel="stylesheet" href="styles.css"> 
</head>

<body>

    <div class="container">
        <form action="" method="post">
            <h2>Encuesta</h2>
            <fieldset>
                <legend>Cantidad de Encuestados</legend>
                <input type="number" name="cant" min="1" placeholder="Digite el número de estudiantes" required>
                <br>
                <input type="submit" name="generar" value="Generar Encuesta">
            </fieldset>
        </form>

        <?php
        if (isset($_POST['generar'])) {
            $cant = $_POST['cant'];
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='cant' value='$cant'>"; // Guardar cantidad

            for ($i = 0; $i < $cant; $i++) {
                echo "
                <fieldset>
                    <legend>Estudiante N° " . ($i + 1) . "</legend>
                    <input type='number' name='ide[]' min='1' placeholder='Identificación' required><br>
                    <input type='text' name='nombre[]' placeholder='Nombre' required><br>

                    <label>Sexo:</label>
                    <input type='radio' name='sexo[$i]' value='M' required> M
                    <input type='radio' name='sexo[$i]' value='F' required> F <br>

                    <label>Fecha de Nacimiento:</label>
                    <input type='date' name='fechaNacimiento[]' required><br>
                </fieldset>";
            }

            echo "<input type='submit' name='guardar' value='Guardar Datos' class='btn'>";
            echo "</form>";
        }

        if (isset($_POST['guardar'])) {
            $cant = $_POST['cant'];
            $ide = $_POST['ide'];
            $nombre = $_POST['nombre'];
            $sexo = $_POST['sexo'] ?? []; // Si no se selecciona, evita errores
            $fechaNace = $_POST['fechaNacimiento'];

            echo "<h2>Datos Ingresados:</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Sexo</th><th>Fecha de Nacimiento</th></tr>";

            for ($i = 0; $i < $cant; $i++) {
                // Se usa ternario para evitar errores si no existe la clave en el array
                $sexoValor = isset($sexo[$i]) ? $sexo[$i] : 'No especificado';

                echo "<tr>
                        <td>{$ide[$i]}</td>
                        <td>{$nombre[$i]}</td>
                        <td>{$sexoValor}</td>
                        <td>{$fechaNace[$i]}</td>
                      </tr>";
            }

            echo "</table>";
        }
        ?>
    </div>

</body>

</html>
