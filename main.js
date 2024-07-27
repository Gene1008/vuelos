// class vuelos {
//     constructor(destino, fechavuelo) {
//         this.destino = destino;
//         this.fechavuelo = fechavuelo;
//     }
// }

// let lista = [
//   new vuelos("chile", "2025-12-10"),
//   new vuelos("argentina", "2025-12-10"),
//   new vuelos("peru", "2025-12-10"),
//   new vuelos("colombia", "2025-12-10"),
// ]

// function filtrarVuelos(destino, fecha) {
//   return lista.filter(vuelo => vuelo.destino.includes(destino.toLowerCase().trim()) && vuelo.fechavuelo === fecha);
// }

// function actualizarUI(vuelosFiltrados) {
//   const resultsDiv = document.getElementById("results");
//   resultsDiv.innerHTML = "";
//   vuelosFiltrados.forEach(vuelo => {
//     const div = document.createElement("div");
//     div.textContent = `Destino: ${vuelo.destino}, Fecha: ${vuelo.fechavuelo}`;
//     resultsDiv.appendChild(div);
// });
// }

// document.getElementById("filterForm").addEventListener("submit", function(event) {
//   event.preventDefault();
//   const destino = document.getElementById("destinationInput").value;
//   const fecha = document.getElementById("dateInput").value;
//   const vuelosFiltrados = filtrarVuelos(destino, fecha);
//   console.log(vuelosFiltrados);
//   actualizarUI(vuelosFiltrados);
// })
 
// class PaqueteTuristico {
//   constructor(destino, fechavuelo, precio, duracion) {
//     this.destino = destino;
//     this.fechavuelo = fechavuelo;
//     this.precio = precio;
//     this.duracion = duracion;
//   }
//   descripcion() {
//     return `Paquetes:  Destino: ${this.destino}, Fecha: ${this.fechavuelo}, Precio: ${this.precio}, Duración: ${this.duracion}`;
//   }
// };

// let paquetes = [
//   new PaqueteTuristico("chile", "2025-12-10", 1000, "5 días"),
//   new PaqueteTuristico("chile", "2025-12-10", 2000, "10 días"),
//   new PaqueteTuristico("argentina", "2025-12-10", 2000, "7 días"),
//   new PaqueteTuristico("argentina", "2025-12-10", 4000, "14 días"),
//   new PaqueteTuristico("peru", "2025-12-10", 1500, "6 días"),
//   new PaqueteTuristico("peru", "2025-12-10", 3000, "12 días"),
//   new PaqueteTuristico("colombia", "2025-12-10", 1800, "5 días"),
//   new PaqueteTuristico("colombia", "2025-12-10", 2500, "10 días"),
// ];

// function filtrarPaquetes(destino, fecha) {
//   return paquetes.filter(paquete => paquete.destino.toLowerCase().includes(destino.toLowerCase().trim()) && paquete.fechavuelo === fecha);
// }

// function actualizarUI2(paquetesFiltrados) {
//   const resultsDiv = document.getElementById("paquetes");
//   resultsDiv.innerHTML = "";
//   paquetesFiltrados.forEach(paquete => {
//     const div = document.createElement("div");
//     div.textContent = paquete.descripcion();
//     resultsDiv.appendChild(div);
//   });
// }

// document.getElementById("filterForm").addEventListener("submit", function(event) {
//   event.preventDefault();
//   const destino = document.getElementById("destinationInput").value;
//   const fecha = document.getElementById("dateInput").value;
//   const paquetesFiltrados = filtrarPaquetes(destino, fecha);
//   actualizarUI2(paquetesFiltrados);
// })

function mostrarNotificacion(mensaje) {
  const notificacion = document.createElement("div");
  notificacion.textContent = mensaje;
  notificacion.style.position = "fixed";
  notificacion.style.bottom = "20px";
  notificacion.style.right = "20px";
  notificacion.style.backgroundColor = "lightblue";
  notificacion.style.color = "black";
  notificacion.style.padding = "10px";
  notificacion.style.borderRadius = "5px";
  notificacion.style.boxShadow = "0 0 5px rgba(0,0,0,0.3)";
  notificacion.style.zIndex = "1000";

  document.body.appendChild(notificacion);

  setTimeout(() => {
    document.body.removeChild(notificacion);
  }, 5000);
}

function verificarDisponibilidad() {
  const eventos = [
    "¡Oferta especial en paquetes a Chile!",
    "Últimos lugares disponibles para Argentina",
    "Nueva disponibilidad para tours en Perú"
  ];
  const mensaje = eventos[Math.floor(Math.random() * eventos.length)];
  mostrarNotificacion(mensaje);
}
setInterval(verificarDisponibilidad, 5000);