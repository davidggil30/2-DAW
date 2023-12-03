// Comprobar que una cadena solo contiene cifras 0, 1, 3, 4, 5, 6, 7, 8, 9
document.getElementById("ejercicio3").addEventListener("click", function () {
    var sentence = prompt("Introduce una cadena: ");
            var containsOnlyNumbers = true;

            for (var i = 0; i < sentence.length; i += 1) {
                if (isNaN(sentence[i])) {
                    containsOnlyNumbers = false;
                    break;
                }
            }

            if (containsOnlyNumbers) {
                document.write("Tu frase está compuesta solo por cifras.");
            } else {
                document.write("Tu frase no está compuesta solo por cifras.");
            }
})