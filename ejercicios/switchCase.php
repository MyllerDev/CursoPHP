<?php
if($_POST){
    $boton = $_POST['boton'];
    switch($boton){
        case 1:
            echo "Precionó el botón 1";
            break;
        case 2:
            echo "Precionó el botón 2";
            break;
        case 3:
            echo "Precionó el botón 3";
            break;
        default:
            echo "No se ha precionado ningún botón";
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
    <h3>Elija un botón</h3>
    <form action="switchCase.php" method="post">
        <input type="submit" value="1" name="boton">
        <input type="submit" value="2" name="boton">
        <input type="submit" value="3" name="boton"> 
    </form>
    
</body>
</html>