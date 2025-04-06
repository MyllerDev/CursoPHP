<?php
session_start();   // Inicia la sesión
session_destroy(); // Destruye la sesión actual
$_SESSION = []; // Limpia las variables de sesión como usuario y password
echo "<script>window.location = 'index.php'</script>"; // Redirige al formulario de inicio de sesión
die(); // Finaliza el script, le dice al servidor que no ejecute más código
?>