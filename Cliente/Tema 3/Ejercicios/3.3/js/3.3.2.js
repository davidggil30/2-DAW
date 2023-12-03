// Crear un código que cuente el nº de palabras que contiene una frase:
document.getElementById("ejercicio2").addEventListener("click", function () {
    var sentence = prompt("Introduce una frase: ");
            var words = sentence.split(" ");
            var numWord = words.length;
            document.write("La frase tiene " + numWord + " palabras.")
})