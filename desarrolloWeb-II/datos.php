

<?PHP 
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$suma = $_GET["num1"] + $_GET["num2"];
$divi = $_GET["num1"] / $_GET["num2"];
$multi = $_GET["num1"] * $_GET["num2"];
$radicado = $_GET['num1'] ** 0.5;
echo "La suma es: ".$suma."<br>";
echo "La division es: ".$divi."<br>";
echo "La multiplicacion es: ".$multi."<br>";
echo "La raiz cuadrada de num1 es: ".$radicado."<br>";

//calculamos que numero es el mas alto utilizando condiciones

if ($num1 === $num2) {
    echo "los numeros son iguales";
} else {
    if ($num1 > $num2) {
        echo "El numero mayor es: ".$num1;
    } else {
        echo "El numero mayor es: ".$num2;
    }
} 
?>
