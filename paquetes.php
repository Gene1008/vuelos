<?php
class FiltroViaje
{
  public $id;
  public $nombreHotel;
  public $Ciudad;
  public $Pais;
  public $FechaViaje;
  public $DuracionViaje;
  public $valor;

  public function __construct($id, $nombreHotel, $Ciudad, $Pais, $FechaViaje, $DuracionViaje, $valor)
  {
    $this->id = $id;
    $this->nombreHotel = $nombreHotel;
    $this->Ciudad = $Ciudad;
    $this->Pais = $Pais;
    $this->FechaViaje = $FechaViaje;
    $this->DuracionViaje = $DuracionViaje;
    $this->valor = $valor;
  }
  public function mostrarInformacion()
  {
    return "<table class='table'><thead><tr><th> Hotel</th><th>Ciudad</th><th>País</th><th>Fecha de viaje</th><th>Duracion</th><th>Valor</th> <th></th></tr> <tbody><tr><td>" . $this->nombreHotel . "</td> <td>" . $this->Ciudad . "</td> <td>" . $this->Pais . "</td> <td>" . $this->FechaViaje . "</td> <td>" . $this->DuracionViaje . "</td> <td>" . $this->valor . "</td> <td><a href='agregar.php?id=" . $this->id . "'>Agregar al carrito</a></td></tr></tbody></table>";
  }

  public static function buscarViajes($viajes, $Pais)
  {
    $resultados = [];
    foreach ($viajes as $viaje) {
      if ($viaje->Pais == $Pais) {
        $resultados[] = $viaje;
      }
    }
    return $resultados;
  }
}

$viajes = [];
$viajes[] = new FiltroViaje(1, "Hotel Sol", "Santiago", "Chile", "2020-12-01", 5, 1000000);
$viajes[] = new FiltroViaje(2, "Hotel Luna", "Lima", "Perú", "2020-12-01", 5, 1500000);
$viajes[] = new FiltroViaje(3, "Hotel Mar", "Buenos Aires", "Argentina", "2020-12-01", 5, 2000000);
$viajes[] = new FiltroViaje(4, "Hotel Bogota", "Bogota", "Colombia", "2020-12-01", 5, 2500000);

$destino = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $destino = $_POST['destinationInput'];
}

$resultados = FiltroViaje::buscarViajes($viajes, $destino);
foreach ($resultados as $viaje) {
  echo $viaje->mostrarInformacion() . "<br>";
}
