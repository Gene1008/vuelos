<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]++;
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['carrito'][$id] = 1;
        header('Location: index.php');
        exit;
    }
}