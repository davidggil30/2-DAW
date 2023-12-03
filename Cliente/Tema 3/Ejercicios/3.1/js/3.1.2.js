document.getElementById("ejercicio2").addEventListener("click", function () {
    // 2. Cree una página web que solicite una cadena de texto al usuario y devuelva la longitud de dicha cadena.
    var text = prompt("Introduce un texto: ");
    var size = text.length;
    alert("La cadena tiene " + size + " de longitud");
});