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
    <h2>Editar Hoteles</h2>
    <?php
        require_once('conexion_bd.php');
        $conn = conectar();
        $id_hotel = $_GET['id'];
        $consulta = "SELECT * FROM hotel WHERE id_hotel = $id_hotel";
        $result = mysqli_query($conn, $consulta);
        $row = mysqli_fetch_array($result);
        echo $row["nombre"];
        $id_hotel = $row["id_hotel"];
        $hotel = $row["nombre"];
        $ubicacion = $row["ubicacion"];
        $habitaciones_disponibles = $row["habitaciones_disponibles"];
        $tarifa_noche = $row["tarifa_noche"];
    ?>
    <div class="formStyle " >
        <form id="filterForm"  method="post" action="">
            <input name="id_hotel" type="hidden" value="$id_hotel">
            <input name="hotel" type="text" placeholder="Nombre Hotel" value="<?php echo $hotel ?>">
            <input name="ubicacion" type="text" placeholder="Ubicacion" value="<?php echo $ubicacion ?>">
            <input name="habitaciones_disponibles" type="text" placeholder="Habitaciones disponibles" value="<?php echo $habitaciones_disponibles ?>">
            <input name="tarifa_noche" type="number" placeholder="Tarifa por noche" value="<?php echo $tarifa_noche ?>">
            <input type="submit" value="Guardar">
        </form>
    </div>
    <div>

    </div>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hotel = $_POST['hotel'];
            $ubicacion = $_POST['ubicacion'];
            $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
            $tarifa_noche = $_POST['tarifa_noche'];
            $sql = " UPDATE hotel SET nombre='$hotel', ubicacion='$ubicacion', habitaciones_disponibles='$habitaciones_disponibles', tarifa_noche='$tarifa_noche' WHERE id_hotel = $id_hotel";
            if (mysqli_query($conn, $sql)) {
                echo "Datos actualizados correctamente";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

            header('location: mantenimiento.php');
          }


     ?>
  </body>
</html>
