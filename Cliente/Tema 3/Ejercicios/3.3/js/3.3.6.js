// Trim(Cadena)	
        // Que devuelva una cadena quitando  los posibles blancos por la izquierda y derecha que pudiese tener cadena original.
document.getElementById("ejercicio6").addEventListener("click", function () {
    var sentence = prompt("Introduce una cadena de texto:");
        function trim(sentence) {
            let i = 0;
            let j = cadena.length;

            // Eliminar espacios en blanco al principio
            while (sentence.charAt(inicio) === ' ' && i < j) {
                i++;
            }

            // Eliminar espacios en blanco al final
            while (sentence.charAt(fin - 1) === ' ' && j > i) {
                j--;
            }

            sentence = sentence.slice(i, j);
        }
        document.write("La cadena original quedaría: " + sentence);
})