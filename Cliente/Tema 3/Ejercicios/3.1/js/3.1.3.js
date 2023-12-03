document.getElementById("ejercicio3").addEventListener("click", function () {
    // 3. Cree un script que recoja el valor de la anchura y la altura total de la pantalla del usuario y calcule su diagonal.
    var width = parseInt(screen.width);
    var height = parseInt(screen.height);
    var diagonal = Math.sqrt(Math.pow(width, 2) + Math.pow(height, 2));
    alert("La diagonal mide " + diagonal);
});