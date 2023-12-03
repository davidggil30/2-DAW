function ProductoAlimenticio(codigo, nombre, precio) {
    this.codigo = codigo;
    this.nombre = nombre;
    this.precio = precio;
}

ProductoAlimenticio.prototype.imprimeDatos = function() {
    document.write("Código: " + this.codigo + "<br>");
    document.write("Nombre: " + this.nombre + "<br>");
    document.write("Precio: $" + this.precio.toFixed(2) + "<br>");
};

var producto1 = new ProductoAlimenticio("001", "Manzanas", 2.99);
var producto2 = new ProductoAlimenticio("002", "Plátanos", 1.49);

document.getElementById("ejercicio7").addEventListener("click", function () {
    document.write("Datos del producto 1: <br>");
    producto1.imprimeDatos();
  
    document.write("\nDatos del producto 2: <br>");
    producto2.imprimeDatos();
});
