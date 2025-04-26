<?php
include "conexion.php";
global $con;

$id = $_POST['id'];
$des = $_POST['des'];
$cant = $_POST['cant'];
$vru = $_POST['vru'];

if (evalId($id)) {
    echo "<script>alert('El ID ya existe');</script>";
    echo "<script>window.location='formulario.html';</script>";
    exit;
}
else
{
$sql = "INSERT INTO articulos (id, des, cant, vr_u) VALUES ($id, '$des', $cant, $vru)";
$res = $con->query($sql);

if ($res) {
    echo "<script>alert('Registro guardado');</script>";
} else {
    echo "<script>alert('Error al guardar el registro');</script>";
}
}
echo "<script>window.location='formulario.html';</script>";


function evalId($id){
    include "conexion.php";
    $sql = "SELECT id FROM articulos WHERE id = $id";
    $res = $con->query($sql);
    return ($res->num_rows > 0);
}

$con->close();
?>