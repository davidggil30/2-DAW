// 3.- Ejercicio. Juego  piensa un nº entre 1 y 1000:
// Cuando se muestren las respuestas del ordenador debe aparecer uno de estos  4 mensajes:
// “Has acertado el número en X intentos”.
// “Has perdido. Llevas 10 intentos”.
// “El número es menor de N. Llevas X intentos”.
// “El número es mayor de N.  Llevas X intentos.
document.getElementById("ejercicio3").addEventListener("click", function () {
    document.write("<br>")
    var numRand = random(1, 1000);
    alert(numRand);
    var num = 0;
    var tries = 1;
    while (num != numRand) {
        num = prompt("Introduce un número entre 1 y 1000");
        if (numRand > num) {
            alert("El número random es mayor");
            tries += 1;
            if (tries == 10) {
                alert("Has perdido, 10 intentos")
            }
        } else if (numRand < num) {
            alert("El número random es menor");
            tries += 1;
            if (tries == 10) {
                alert("Has perdido, 10 intentos")
            }
        } else {
            alert("Has acertado el número en " + tries + " intentos.");
            document.write("Has acertado el número " + numRand + " en " + tries + " intentos.");
        }
    }

    function random(min, max) {
        return Math.floor((Math.random() * (max - min + 1)) + min);
    }
})