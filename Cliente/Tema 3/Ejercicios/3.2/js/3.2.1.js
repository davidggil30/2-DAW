// 1. Realizar el ejercicio de la tabla de multiplicar de manera  que ahora se pida el número de la tabla a mostrar.
document.getElementById("ejercicio1").addEventListener("click", function () {
    var num = prompt("Introduce un número para mostar su tabla de multiplicar: ");
    var resultado = 0;
    for (var i = 0; i <= 10; i += 1) {
        resultado = num * i;
        document.write(num + " x " + i + " = " + resultado + "<br>");
    }
});