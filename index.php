<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script type="module" src="./main.js">
      window.onload = function() {
        verificarDisponibilidad()
      }
    </script>
    <link rel="icon" type="image/x-icon" href="./javascript.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Agencia de Viajes</title>
  </head>
  <body>
    <h1 id="title">Agencia de viajes</h1>
    <button id="carrito" onclick="window.location.href='carrito.php';">Ir al carrito</button>
    <button id="carrito" onclick="window.location.href='mantenimiento.php';">Mantenimiento Hoteles</button>
    <button id="carrito" onclick="window.location.href='mantenimiento_vuelos.php';">Mantenimiento Vuelos</button>
    <div class="formStyle " >
    <form id="filterForm"   method="post" action="">
      <div class="contentform">
      <div id="filtroViaje" class="flotante">
        <select>
          <option value="ida">Ida</option>
          <option value="idayvuelta">Ida y Vuelta</option>
        </select>
      </div>
      <div id="estadia" class="flotante">
        <select>
          <option value="vuelo">Vuelo</option>
          <option value="VueloyHotel">Vuelo + Hotel</option>
        </select>
      </div>
      <div id="originInput" class="flotante">
        <input type="text"  list="opciones" placeholder="Origen">
      </div>
      <div  class="flotante">
        <input name="destinationInput" type="text"  list="opciones" placeholder="Destino">
        <datalist id="opciones">
          <option value="Chile">Chile</option>
          <option value="Argentina">Argentina</option>
          <option value="Perú">Perú</option>
          <option value="Colombia">Colombia</option>
        </datalist>
      </div>
      <div  class="flotante">
          <input type="text"  placeholder="Fecha de ida" id="fechaIda">
      </div>
      <div  class="flotante">
          <input type="text" id="dateInput"  placeholder="Fecha de vuelta" id="fechaVuelta">
          <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
          flatpickr("#fechaIda");
          flatpickr("#fechaVuelta");
        </script>
      </div>
      <div id="pasajeros" class="flotante">
        <label for="pasajeros">Pasajeros:</label>
        <select >
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div>
      <button clas="boton" type="submit">Buscar</button>
      </div>
    </form>
    
  </div>
    <div id="results">
    </div><br>
    <div id="paquetes">
        <?php
          include 'paquetes.php';
          $resultados = FiltroViaje::buscarViajes($viajes, $destino);
        ?>
    </div>
  </body>
</html>