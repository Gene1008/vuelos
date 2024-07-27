<?php
      $servername = "localhost";
      $database = "agencia";
      $username = "root";
      $password = "";

function conectar() {
  global $conn, $servername, $database, $username, $password;
  $conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
    die("Fallo de conexión: " . mysqli_connect_error());
  }

  return $conn;

}