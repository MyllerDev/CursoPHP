<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center">Encuesta</h2>
            <form action="" method="post" class="mb-4">
                <fieldset>
                    <legend>Cantidad de Encuestados</legend>
                    <div class="mb-3">
                        <input type="number" name="cant" class="form-control" min="1" placeholder="Digite el número de estudiantes" required>
                    </div>
                    <button type="submit" name="generar" class="btn btn-primary">Generar Encuesta</button>
                </fieldset>
            </form>

            <?php
            if (isset($_POST['generar'])) {
                $cant = $_POST['cant'];
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='cant' value='$cant'>";

                for ($i = 0; $i < $cant; $i++) {
                    echo "
                    <fieldset class='mb-3 p-3 border rounded'>
                        <legend>Estudiante N° " . ($i + 1) . "</legend>
                        <div class='mb-2'>
                            <input type='number' name='ide[]' class='form-control' min='1' placeholder='Identificación' required>
                        </div>
                        <div class='mb-2'>
                            <input type='text' name='nombre[]' class='form-control' placeholder='Nombre' required>
                        </div>
                        <label>Sexo:</label>
                        <div class='mb-2'>
                            <input type='radio' name='sexo[$i]' value='M' required> M
                            <input type='radio' name='sexo[$i]' value='F' required> F
                        </div>
                        <div class='mb-2'>
                            <label>Fecha de Nacimiento:</label>
                            <input type='date' name='fechaNacimiento[]' class='form-control' required>
                        </div>
                    </fieldset>";
                }

                echo "<button type='submit' name='guardar' class='btn btn-success'>Guardar Datos</button>";
                echo "</form>";
            }

            if (isset($_POST['guardar'])) {
                $cant = $_POST['cant'];
                $ide = $_POST['ide'];
                $nombre = $_POST['nombre'];
                $sexo = $_POST['sexo'] ?? [];
                $fechaNace = $_POST['fechaNacimiento'];

                echo "<h2 class='text-center mt-4'>Datos Ingresados</h2>";
                echo "<div class='table-responsive'><table class='table table-bordered table-striped'>";
                echo "<thead class='table-dark'><tr><th>ID</th><th>Nombre</th><th>Sexo</th><th>Fecha de Nacimiento</th></tr></thead><tbody>";

                for ($i = 0; $i < $cant; $i++) {
                    $sexoValor = isset($sexo[$i]) ? $sexo[$i] : 'No especificado';
                    echo "<tr>
                            <td>{$ide[$i]}</td>
                            <td>{$nombre[$i]}</td>
                            <td>{$sexoValor}</td>
                            <td>{$fechaNace[$i]}</td>
                          </tr>";
                }

                echo "</tbody></table></div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
