<?php

if($_GET){
    $numeroA = $_GET['numeroA'];
    $numeroB = $_GET['numeroB'];

    if($numeroA > $numeroB){
        echo "El número A($numeroA) es mayor que el número B($numeroB)";
    }else if($numeroA < $numeroB){
        echo "El número B($numeroB) es mayor que el número A($numeroA)";
}else{
    echo "Los números son iguales";
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
    <h3>Formulario</h3>

    <form action="condicionalIf.php" method="get">
        <input type="number" name="numeroA" placeholder="Digite el número A" min="1" max="100" required><br>
        <input type="number" name="numeroB" placeholder="Digite el número B" min="1" max="100" required><br>
        <input type="submit" value="Enviar">
    </form>

    <style>
        input{
            width: 9rem;
            padding: 2px;
            margin: 5px;
        }
    </style>
    
</body>
</html>