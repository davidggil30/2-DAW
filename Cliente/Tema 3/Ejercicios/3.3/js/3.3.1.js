document.getElementById("ejercicio1").addEventListener("click", function () {
    var letrasDNI = {
        0: 'T', 1: 'R', 2: 'W', 3: 'A', 4: 'G',
        5: 'M', 6: 'Y', 7: 'F', 8: 'P', 9: 'D',
        10: 'X', 11: 'B', 12: 'N', 13: 'J',
        14: 'Z', 15: 'S', 16: 'Q', 17: 'V',
        18: 'H', 19: 'L', 20: 'C', 21: 'K', 22: 'E'
    };

    var nums = prompt("Introduce los números de tu DNI: ");
    var resto = nums % 23;

    if (letrasDNI.hasOwnProperty(resto)) {
        var letra = letrasDNI[resto];
        document.write('Tu DNI es ' + nums + letra);
    } else {
        document.write('El número DNI introducido no es válido');
    }
})
