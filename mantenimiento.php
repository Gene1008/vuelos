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
    <h2 style="margin-left: 10%;" >Hoteles</h2>
    <div class="formStyle " >
        <form id="filterForm"  method="post" action="">
            <input name="nombre_hotel" type="text" placeholder="Nombre Hotel">
            <input name="ubicacion" type="text" placeholder="Ubicacion">
            <input name="habitaciones_disponibles" type="text" placeholder="Habitaciones disponibles">
            <input name="tarifa_noche" type="number" placeholder="Tarifa por noche">
            <input type="submit" value="Agregar">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th>Nombre Hotel</th>
                <th>Ubicacion</th>
                <th>Habitaciones Disponibles</th>
                <th>Tarifa por Noche</th>
                <th>Acciones</th>
            </tr>
            <?php
                require_once('conexion_bd.php');
                $conn = conectar();
                $sql = "SELECT * FROM hotel";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["ubicacion"] . "</td><td>" . $row["habitaciones_disponibles"] . "</td><td>" . $row["tarifa_noche"] . "</td> <td><a href='eliminar_hotel.php?id=". $row["id_hotel"] ."'>Eliminar</a> - <a ><a href='editar_hotel.php?id=". $row["id_hotel"] ."'>Editar</td></tr>";
                    }
                }
                else {
                    echo "0 results";
                }
                mysqli_close($conn);
            ?>
        </table>
    </div>
    <?php
        require_once('conexion_bd.php');
        $conn = conectar();

        $hotel = "";
        $ubicacion = "";
        $habitaciones_disponibles = "";
        $tarifa_noche = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hotel = $_POST['nombre_hotel'];
            $ubicacion = $_POST['ubicacion'];
            $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
            $tarifa_noche = $_POST['tarifa_noche'];
            $sql = "INSERT INTO hotel (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES ('$hotel', '$ubicacion', '$habitaciones_disponibles', '$tarifa_noche')";
            if (mysqli_query($conn, $sql)) {
                echo "Datos ingresados correctamente";
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
