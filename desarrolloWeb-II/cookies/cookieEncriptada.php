<?php
// Configura manualmente los datos de la cookie
$nombreCookie = "usuarioID";
$valorOriginal = "12345abc";  // Valor antes de encriptar
$duracion = 3600;             // Duración en segundos (1 hora)

// Encriptar el valor con md5
$valorEncriptado = md5($valorOriginal);

// Crear la cookie
setcookie($nombreCookie, $valorEncriptado, time() + $duracion);

// Mostrar mensajes en pantalla
echo "Cookie '$nombreCookie' ha sido creada con valor encriptado: $valorEncriptado<br>";

// Verificación tras recargar
if (isset($_COOKIE[$nombreCookie])) {
    echo "✅ Cookie '$nombreCookie' está activa.<br>";
    echo "Valor encriptado almacenado: " . $_COOKIE[$nombreCookie];
} else {
    echo "ℹ️ Cookie aún no posicionada. Recarga esta página para verificar.";
}
?>
