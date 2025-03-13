<?php
// Desarrolle un script en php que verifique entre las tres variables con números enteros cual es el mayor.

if ($_POST) {

    $datouno = $_POST['datouno'];
    $datodos = $_POST['datodos'];
    $datotres = $_POST['datotres'];

    // Verificar si los tres números son iguales
    if ($datouno == $datodos && $datouno == $datotres) {
        echo 'Todos los números son iguales';
    }
    // Verificar si hay dos números iguales
    elseif ($datouno == $datodos || $datouno == $datotres || $datodos == $datotres) {
        echo 'Hay dos números iguales';
    }
    // Verificar cuál es el mayor
    elseif ($datodos > $datouno && $datodos > $datotres) {
        echo 'El número mayor es ' . $datodos;
    } elseif ($datotres > $datodos && $datotres > $datouno) {
        echo 'El número mayor es ' . $datotres;
    } else {
        echo 'El número mayor es ' . $datouno;
    }
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
    <h3>Ejercicios 02 - Práctica</h3>
    <p> Desarrolle un script en php que verifique entre las tres variables con números enteros cual es el mayor.</p>

    <form action="02.php" method="post">
        <input type="number" name="datouno" placeholder="Digite un número" required>
        <input type="number" name="datodos" placeholder="Digite un número" required>
        <input type="number" name="datotres" placeholder="Digite un número" required>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>