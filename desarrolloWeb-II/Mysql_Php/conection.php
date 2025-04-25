
<?php

use Symfony\Component\Dotenv\Dotenv;
require_once 'vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load('.env');

$host = $_ENV['host']; // esto es localhost
$user = $_ENV['user']; // esto es root
$pass = $_ENV['pass']; // contraseña
$db = $_ENV['db']; // nombre de la base de dato

$con=new mysqli($host, $user, $pass, $db);
if ($con)
    echo "Conexión exitosa a la base de datos";
else 
    die("Error de conexión: " . mysqli_connect_error());

?>