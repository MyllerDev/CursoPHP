
<?php
$host = "localhost"; // Cambia esto si tu servidor no es localhost
$user = "root"; // Cambia esto si tu usuario no es root
$pass = ""; // Cambia esto si tu contraseña no es vacía
$db = "inventario"; // Cambia esto si tu base de datos no es prueba

$con=new mysqli($host, $user, $pass, $db);
if ($con)
    echo "Conexión exitosa a la base de datos";
else 
    die("Error de conexión: " . mysqli_connect_error());

?>