<?php
// Parámetros definidos directamente en el código
$nombreCookie = "miCookie";
$valorOriginal = "valor123";
$duracionSegundos = 3600; // 1 hora

// Usar directamente el valor original (sin md5)
$valorFinal = $valorOriginal;

// Crear la cookie
setcookie($nombreCookie, $valorFinal, time() + $duracionSegundos);

// Mostrar el resultado
echo "Cookie '" . $nombreCookie . "' ha sido creada con el valor: " . $valorFinal . "<br>";

// Verificar si la cookie ya está presente (requiere recargar la página después de la creación)
if (isset($_COOKIE[$nombreCookie])) {
    echo "Cookie '" . $nombreCookie . "' está posicionada.<br>";
    echo "Valor almacenado: " . $_COOKIE[$nombreCookie];
} else {
    echo "Cookie aún no posicionada. Recarga la página para verificar.";
}
?>
