<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Ejercicio 03 - curso php</h2>

    <form action="03.php" method="post">
        
        <input type="number" name="cant" min="1" placeholder="Digite la cantidad de comprada">
        <input type="submit" name="Enviar">
    </form>

</body>

</html>



<?php
/*
Cree un script en php para una tienda de zapatos que tiene una promoción de descuento para vender al mayor, esta dependerá del número de zapatos que se compren. Si son más de diez, se les dará un 10% de descuento sobre el total de la compra; si el número de zapatos es mayor de veinte, pero menor de treinta, se le otorga un 20% de descuento; y si son más treinta zapatos se otorgará un 40% de descuento. El precio de cada zapato es de $80. (Para la cantidad de zapatos use una variable “$cant”)*/

if ($_POST) {

    $precioUnidad = 80;
    $cant = $_POST['cant'];
    $total = 0;
    

    if ($cant > 10) {
        $total = ($cant * $precioUnidad) - (($cant * $precioUnidad) * 0.1);
        echo 'Su total a pagar es : $' . $total;
    } else if ($cant > 20 && $cant < 30) {
        $total = ($cant * $precioUnidad) - (($cant * $precioUnidad) * 0.2);
        echo 'Su total a pagar es : $' . $total;
    } else if ($cant > 40) {
        $total = ($cant * $precioUnidad) - (($cant * $precioUnidad) * 0.4);
        echo 'Su total a pagar es : $' . $total;
    }
}

?>