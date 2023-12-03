document.getElementById("ejercicio6").addEventListener("click", function () {
    // 6. Determinar en una página web si la cadena de texto que se le pide es un palíndromo, es decir, si se lee de la misma forma 
            // desde la izquierda y desde la derecha.
            document.write("<br>")
            var text = prompt("Introduce un texto para saber si es palíndromo: ").split(" ").join("").toLowerCase();
            var i = 0;
            var size = text.length - 1;
            var palindromo = true;
            while(text[i]){
                if(text[i] != text[size]){
                    palindromo = false;
                    berak;
                }
                size -= 1;
                i -= 1;
            }
            if(palindromo == true){
                alert("Es palindromo");
            } else{
                alert("No es palindromo");
            }
});