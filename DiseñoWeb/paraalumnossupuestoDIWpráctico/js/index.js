

var c = document.getElementById("canvas");
var ctx = c.getContext("2d");

// Dibuja circulo negro            
ctx.fillStyle = "black";  // Establece el color de relleno en rojo
ctx.beginPath();  // Inicia el camino
ctx.arc(150, 150, 90, Math.PI, 0);  // Dibuja el círculo
ctx.fill();  // Rellena el círculo
            
ctx.fillStyle = "black";  // Establece el color de relleno en rojo
ctx.beginPath();  // Inicia el camino
ctx.arc(150, 150, 90, 3*Math.PI/2, Math.PI/2);  // Dibuja el círculo
ctx.fill();  // Rellena el círculo
          
ctx.fillStyle = "black";  // Establece el color de relleno en rojo
ctx.beginPath();  // Inicia el camino
ctx.arc(150, 150, 50, 0, 2*Math.PI);  // Dibuja el círculo
ctx.fill();  // Rellena el círculo

// Dibuja circulo naranja           
ctx.fillStyle = "orange";  // Establece el color de relleno en rojo
ctx.beginPath();  // Inicia el camino
ctx.arc(150, 150, 20, 0, 2*Math.PI);  // Dibuja el círculo
ctx.fill();  // Rellena el círculo