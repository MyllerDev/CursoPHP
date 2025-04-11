<?php
$archivo = "usuarios.txt";

// Guardar los datos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);

    if (!empty($nombre) && !empty($correo)) {
        $linea = $nombre . "," . $correo . "\n";
        file_put_contents($archivo, $linea, FILE_APPEND);
    }
}

// Leer todos los usuarios
$usuarios = [];
if (file_exists($archivo)) {
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
    foreach ($lineas as $linea) {
        $datos = explode(",", $linea);
        if (count($datos) == 2) {
            $usuarios[] = [
                "nombre" => $datos[0],
                "correo" => $datos[1]
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h2>Agregar Usuario</h2>
    <form method="post" action="">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>
        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>
        <input type="submit" value="Guardar Usuario">
    </form>

    <h2>Usuarios Registrados</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario["nombre"]); ?></td>
                <td><?php echo htmlspecialchars($usuario["correo"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
