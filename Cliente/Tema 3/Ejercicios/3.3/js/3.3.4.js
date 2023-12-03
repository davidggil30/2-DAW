// Comprobar que una cadena solo contiene letras y/o espacios en blanco.
document.getElementById("ejercicio4").addEventListener("click", function () {
    var sentence = prompt("Introduce una cadena: ");
            var containsOnlyLetters = false;

            for (var i = 0; i < sentence.length; i += 1) {
                if (!isNaN(sentence[i]) && sentence[i] != " ") {
                    containsOnlyLetters = true;
                    break;
                }
            }

            if (containsOnlyLetters) {
                document.write("Tu frase no está compuesta solo por letras.");
            } else {
                document.write("Tu frase está compuesta solo por letras.");
            }
})