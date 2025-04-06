<?php
session_start(); // Inicia la sesión

// Verifica si la sesión ya está iniciada
if (isset($_SESSION['usuario'])) {
    echo "Bienvenido, " . htmlspecialchars($_SESSION['usuario']) . "!<br>";
    echo "<a href='logout.php'>Cerrar sesión</a>";
} else {
    // Verifica las credenciales enviadas desde el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['us'] ?? '';
        $password = $_POST['pass'] ?? '';

        // Credenciales de práctica
        if ($usuario === 'admin' && $password === 'admin') {
            $_SESSION['usuario'] = $usuario; // Guarda el usuario en la sesión
            header("Location: login.php"); // Redirige a la página de sesión
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.<br>";
            echo "<a href='index.php'>Volver al formulario de inicio de sesión</a>";
        }
    } else {
        // Si no hay sesión ni datos enviados, redirige al formulario de inicio de sesión
        header("Location: index.php");
        exit();
    }
}
?>