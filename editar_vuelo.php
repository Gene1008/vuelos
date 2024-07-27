<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" type="image/x-icon" href="./javascript.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Agencia de Viajes</title>
  </head>
  <body>
    <h1 id="title">Agencia de viajes</h1>
    <h2>Editar Vuelos</h2>
    <?php
        require_once('conexion_bd.php');
        $conn = conectar();
        $id_vuelo = $_GET['id'];
        $consulta = "SELECT * FROM vuelo WHERE id_vuelo = $id_vuelo";
        $result = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_array($result);
        echo $row["origen"];
        $id_vuelo = $row["id_vuelo"];
        $origen = $row["origen"];
        $destino = $row["destino"];
        $fecha = $row["fecha"];
        $plazas_disponibles = $row["plazas_disponibles"];
        $precio = $row["precio"];
    ?>
    <div class="formStyle " >
        <form id="filterForm"  method="post" action="">
            <input name="id_vuelo" type="hidden" value="$id_vuelo">
            <input name="origen" type="text" placeholder="Origen" value="<?php echo $origen ?>">
            <input name="destino" type="text" placeholder="destino" value="<?php echo $destino ?>">
            <input name="fecha" type="date" placeholder="fecha" value="<?php echo $fecha ?>">
            <input name="plazas_disponibles" type="number" placeholder="plazas_disponibles" value="<?php echo $plazas_disponibles ?>">
            <input name="precio" type="number" placeholder="precio" value="<?php echo $precio ?>">
            <input type="submit" value="Guardar">
        </form>
    </div>
    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $fecha = $_POST['fecha'];
            $plazas_disponibles = $_POST['plazas_disponibles'];
            $precio = $_POST['precio'];
            $sql = " UPDATE vuelo SET origen='$origen', destino='$destino', fecha='$fecha', plazas_disponibles='$plazas_disponibles', precio='$precio' WHERE id_vuelo = $id_vuelo";
            if (mysqli_query($conn, $sql)) {
                echo "Datos actualizados correctamente";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

            header('location: mantenimiento_vuelos.php');
          }


     ?>
  </body>
</html>