<?php
session_start();
if (empty($_SESSION['carrito'])) {
    echo "El carrito esta vacio";
} else {
    foreach ($_SESSION['carrito'] as $paqueteid=>$cantidad) {
        echo "Producto ID: " . $paqueteid . "<br>" . "Cantidad: " . $cantidad . "<a href='eliminar_paquete.php?id=" . $paqueteid . "'>Eliminar</a><br>";
    }
}