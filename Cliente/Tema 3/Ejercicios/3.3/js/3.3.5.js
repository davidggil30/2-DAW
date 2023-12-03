// Crear las funciones típicas de cualquier lenguaje:

            // Right(“cadena”, total)		Extrae caracteres por la derecha.
            // Left(“cadena”, total)		Extrae caracteres por la izquierda.
            // Mid(“cadena”,inicio, total) 	Extrae un nº de  caracteres desde una posición dada.

        // Estas funciones deben devolver un string con la subcadena obtenida.
document.getElementById("ejercicio5").addEventListener("click", function () {
    var sentence = prompt("Introduce una cadena: ");
        var exR = parseInt(prompt("¿Cuántos caracteres quieres quitar por la derecha?"));
        var exL = parseInt(prompt("¿Cuántos caracteres quieres quitar por la izquierda?"));
        var exPos = parseInt(prompt("¿Cuántos caracteres quieres quitar?"));
        var pos = parseInt(prompt("¿Desde que posición?"));

        function Rigth(sentence, exR){
            sentence = sentence.slice(-exR);
            document.write(sentence);
        }
        Rigth(sentence,exR);
        function Left(sentence, exL){
            sentence = sentence.slice(0, exL);
            document.write(sentence);
        }
        Left(sentence,exL);
        function Mid(sentence, exPos, pos){
            
        }
})