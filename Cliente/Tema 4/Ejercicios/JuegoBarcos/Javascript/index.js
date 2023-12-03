var cont = 0;
var tablero = [];
tablero[0] = [0, 0, 0, 0];
tablero[1] = [0, 0, 0, 0];
tablero[2] = [1, 1, 1, 1];
tablero[3] = [0, 0, 0, 0];

function jugar(x, y) {
    var aux = x + " " + y;

    if (cont == 0) {
        if (tablero[x][y] == 1) {
            document.getElementById(aux).style.backgroundColor = "red";
            alert("Tocado");
            cont++;
            if (cont == 4) {
                alert("Barco hundido");
                reiniciarJuego();
            }
        } else {
            document.getElementById(aux).style.backgroundColor = "blue";
            alert("Agua");
        }
    }
}

function reiniciarJuego() {
    cont = 0;
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            var aux = i + " " + j;
            document.getElementById(aux).style.backgroundColor = "";
        }
    }
}