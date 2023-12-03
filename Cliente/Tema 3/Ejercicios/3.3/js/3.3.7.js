// 7.- Mejorar el ejercicio del redondeo con X decimales (apuntes) de forma que siempre aparezcan ceros, 
        //aunque no tenga cifra decimal:

        // Por ejemplo, para 3 decimales	128.25  128.250		128   128.000
document.getElementById("ejercicio7").addEventListener("click", function () {
    var num = parseFloat(prompt("Introduce un número:"));
            var numDec = parseInt(prompt("Introduce la cantidad de decimales:"));

            if (!isNaN(num) && !isNaN(numDec)) {
                var result = num.toFixed(numDec);
                document.write(`El número redondeado con ${numDec} decimales es: ${result}`);
            } else {
                document.write("Número no válidos");
            }
})