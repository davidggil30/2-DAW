document.getElementById("ejercicio1").addEventListener("click", function () {
    function convertToDecimal() {
        var inputValue = prompt("Introduce un número: ");
        var decimalValue;
        if (inputValue.startsWith("0x")) {
            // Convertir valor hexadecimal a decimal
            decimalValue = parseInt(inputValue, 16);
        } else {
            // Convertir valor octal a decimal
            decimalValue = parseInt(inputValue, 8);
        }
        alert("El equivalente en base decimal es: " + decimalValue);
    }
    convertToDecimal();
});
