<?php
require_once('conexion_bd.php');
$conn = conectar();
$sql = 'delete from hotel where id_hotel = ' . $_GET['id'];
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if($result){
    header('location: mantenimiento.php');
}
else{
    echo "Error al eliminar el hotel";
}