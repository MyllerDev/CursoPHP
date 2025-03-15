<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    
    <form action="encuesta.php" method="post">
        <h2>Encuesta</h2>
        <fieldset style="text-align: center; width: 50%;">
            <legend >Cantidad de Encuestado</legend>

            <input type="number" name="cant" min="1" placeholder="Digite el numero de estudiantes"><br>
            <input type="submit" name="Enviar">
        </fieldset>
    </form>

</body>

</html>

<?php

if ($_POST) {
    $cant = $_POST['cant'];

    for ($i = 1; $i <= $cant; $i++) {
        echo "
        <form action = 'encuesta.php' method = 'post'>
        <form action='encuesta.php' method='post'>

        <fieldset style='text-align: center; width: 50%;'>
            <legend >Estudiante N° .$i</legend>

    <input type='number' name='ide' min='1' placeholder='identificacion'>
    <input type='text' name='nombre'  placeholder='Digite su nombre'>
    <input type='radio' name='sexo' value='M'>M
    <input type='radio' name='sexo' value='F'>F
    <input type='date' name='fechaNacimiento'  placeholder='fecha Nacimiento'>
    </fieldset>
    </form>
    </form>";
    
    }

    echo "<input type = 'Submit' name = 'Enviar'>";
    
    /*
    $ide = $_POST['ide'];
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $fechaNace = $_POST['fechaNacimiento'];
    
    for($j = 1; $j < $cant; $j++){
        echo $nombre[$i];
    }*/
}


?>