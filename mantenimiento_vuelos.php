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
    <h2 style="margin-left: 10%;" >Vuelos</h2>
    <div class="formStyle " >
        <form id="filterForm"  method="post" action="">
            <input name="origen" type="text" placeholder="Origen">
            <input name="destino" type="text" placeholder="Destino">
            <input name="fecha" type="date" placeholder="Fecha">
            <input name="plazas_disponibles" type="number" placeholder="Plazas disponibles">
            <input name="precio" type="number" placeholder="Precio">
            <input type="submit" value="Agregar">
        </form>
    </div>

    <div>
        <table>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Plazas disponibles</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php
                require_once('conexion_bd.php');
                $conn = conectar();
                $sql = "SELECT * FROM vuelo";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["origen"] . "</td><td>" . $row["destino"] . "</td><td>" . $row["fecha"] . "</td><td>" . $row["plazas_disponibles"] . "</td><td>".  $row["precio"] . "</td> <td><a href='editar_vuelo.php?id=". $row["id_vuelo"] ."'>Editar</a></td><td><a href='eliminar_vuelo.php?id=". $row["id_vuelo"] ."'>Eliminar</a></tr>";
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

        $origen = "";
        $destino = "";
        $fecha = "";
        $plazas_disponibles = "";
        $precio = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $fecha = $_POST['fecha'];
            $plazas_disponibles = $_POST['plazas_disponibles'];
            $precio = $_POST['precio'];
            $sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES ('$origen', '$destino', '$fecha', '$plazas_disponibles', '$precio')";
            if (mysqli_query($conn, $sql)) {
                echo "Datos ingresados correctamente";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

            header('location: mantenimiento_vuelos.php');
          }

    ?>
    