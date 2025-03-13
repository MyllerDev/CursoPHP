<?php
//  Hacer un script en php que tome una variable cuya asignación es un número entero y determinar si termina en 4 o no.

if ($_GET) {
    $dato = $_GET["dato"];
    if ($dato == 4) {
        echo "El Numero digitado es 4";
    }else
    echo "El Número es diferente a 4";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Ejercicios 01 - Práctica</h3>
    <p> Hacer un script en php que tome una variable cuya asignación es un número entero y determinar si termina en 4 o no.</p>

    <form action="01.php" method="get">
        <input type="number" name="dato" min="1" max="9" placeholder="Digite un número">
        <input type="submit" value="Validar">
    </form>

</body>

</html>