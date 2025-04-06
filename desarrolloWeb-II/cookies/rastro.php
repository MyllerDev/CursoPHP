<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar si los datos necesarios están presentes
    if (isset($_POST['nom'], $_POST['valor'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $val = md5(htmlspecialchars($_POST['valor'])); // Encriptar el valor con md5
        $tiempo = isset($_POST['tiempo']) && is_numeric($_POST['tiempo']) ? (int)$_POST['tiempo'] : 3600; // Tiempo por defecto: 1 hora

        // Crear la cookie
        setcookie($nom, $val, time() + $tiempo);

        // Informar al usuario que la cookie se ha creado
        echo "Cookie: '" . $nom . "' ha sido creada con un valor encriptado. Recargue la página para verificar si está posicionada.<br>";
    } else {
        echo "Por favor, complete todos los campos correctamente.<br>";
    }
}

// Validar si la cookie ya está posicionada
if (isset($_GET['check']) && isset($_COOKIE[$_GET['check']])) {
    $nom = htmlspecialchars($_GET['check']);
    echo "Cookie: '" . $nom . "' está registrada!<br>";
    echo "Su valor encriptado es: " . $_COOKIE[$nom];
} elseif (isset($_GET['check'])) {
    $nom = htmlspecialchars($_GET['check']);
    echo "Cookie: '" . $nom . "' no está posicionada!<br>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cookies</title>
</head>
<body>
    <form method="POST" action="">
        <label for="nom">Nombre de la cookie:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="valor">Valor de la cookie:</label><br>
        <input type="text" id="valor" name="valor" required><br><br>

        <label for="tiempo">Duración (en segundos, opcional):</label><br>
        <input type="number" id="tiempo" name="tiempo" placeholder="3600 (por defecto)"><br><br>

        <button type="submit">Crear Cookie</button>
    </form>

    <br>
    <form method="GET" action="">
        <label for="check">Verificar cookie:</label><br>
        <input type="text" id="check" name="check" required><br><br>

        <button type="submit">Verificar Cookie</button>
    </form>
</body>
</html>