<?php
require_once('conexion_bd.php');
$conn = conectar();
$sql = 'delete from vuelo where id_vuelo = ' . $_GET['id'];
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if($result){
    header('location: mantenimiento_vuelos.php');
}
else{
    echo "Error al eliminar el vuelo";
}