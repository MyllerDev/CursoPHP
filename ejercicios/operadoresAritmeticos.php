<?php

$numero1 = $_POST['numero1'];
$numero2 = $_POST['numero2'];

$suma = $numero1 + $numero2;
$resta = $numero1 - $numero2;
$multiplicacion = $numero1 * $numero2;
$division = $numero1 / $numero2;

echo "La suma de los números es: $suma <br>";
echo "La resta de los números es: $resta <br>";
echo "La multiplicación de los números es: $multiplicacion <br>";
echo "La división de los números es: $division <br>";

?>