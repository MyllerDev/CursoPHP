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

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3>Formulario</h3>
    <form action="operadoresNumericios.php" method="post">
        <input type="text" name="numero1" placeholder="Ingrese un numero">
        <input type="text" name="numero2" placeholder="Ingrese un numero">
        <input type="submit" value="Enviar">
    </form>

</body>
</html>