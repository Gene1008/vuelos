<?php
session_start();
if (isset($_GET['id'])) {
    $paqueteid = $_GET['id'];
    if (isset($_SESSION['carrito'][$paqueteid]) && $_SESSION['carrito'][$paqueteid] > 1) {
        $_SESSION['carrito'][$paqueteid]--;
    } else {
    unset($_SESSION['carrito'][$paqueteid]);
    }
}
header('Location: carrito.php');