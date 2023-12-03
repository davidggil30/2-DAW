document.getElementById("ejercicio2").addEventListener("click", function () {
    var num1 = parseInt(prompt("Introduce el primer número"));
        var num2 = parseInt(prompt("Introduce el segundo número"));
        function suma(num1, num2){
            var suma = num1 + num2;
            alert(num1 + " + " + num2 + " = " + suma);
        }
        suma(num1, num2);
})