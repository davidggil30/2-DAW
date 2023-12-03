// 2.- Vamos a realizar una práctica con ventanas del tipo prompt y alert que nos va a servir para un tema actual, 
// que es el cálculo del valor del pago del préstamo de una hipoteca que supuestamente nos ha concedido un banco.
document.getElementById("ejercicio2").addEventListener("click", function () {
    var numeroAnyos, prestamo, interesAnual, pagoMensual, interes;
    numeroAnyos = parseInt(prompt("Introduce el numero de años del prestamo"));
    interesAnual = parseInt(prompt("Introduce el interes anual"));
    interes = interesAnual / 1200;
    prestamo = parseFloat(prompt("Introduce el valor del prestamo"));
    pagoMensual = (prestamo * interes) / (1 - Math.pow((1 + interes), -(numeroAnyos * 12)));
    document.write("El pago mensual que debes efectuar es de : " + pagoMensual);
})