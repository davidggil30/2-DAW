document.getElementById("ejercicio5").addEventListener("click", function () {
    var count = 1;
        var num = parseInt(prompt("Introduce un número: " + "(LLevas " + count + " intentos)"));
        var menor = num;
        var mayor = num;
        var media = 0;
        var suma = num;
        while (num != 0) {
            num = parseInt(prompt("Introduce un número: " + "(LLevas " + count + " intentos)"));
            if(num == 0){
                break;
            }
            if (num < menor) {
                menor = num;
            }
            if (num > mayor) {
                mayor = num;
            }

            suma += num;
            count += 1;
            media = suma / count;
        }

        alert("Menor: " + menor + ", " +
            "Mayor: " + mayor + ", " +
            "Suma: " + suma + ", " +
            "Media: " + media);
})