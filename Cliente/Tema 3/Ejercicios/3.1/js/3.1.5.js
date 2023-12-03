document.getElementById("ejercicio5").addEventListener("click", function () {
    // 5. Crear una página que muestre información sobre una cadena de texto que se le pide al usuario. A partir de la cadena que se le pide, 
            // la función determina si esa cadena está formada sólo por mayúsculas, sólo por minúsculas o por una mezcla de ambas.
            document.write("<br>")
            var text = prompt("Introduce una cadena de texto: ");
            var numLower = 0;
            var numUpper = 0;
            var index = 0;
            while(text[index]){
                if(text[index] >= 'A' && text[index] <= 'Z'){
                    numUpper += 1;
                }
                if(text[index] >= 'a' && text[index] <= 'z'){
                    numLower += 1;
                }
                index += 1;
            }
                    
            if(numLower == 0){
                alert(text + " tiene solo mayúsculas con " + numUpper + " mayúsculas");
            }else if(numUpper == 0){
                alert(text + " tiene solo minúsculas con " + numLower + " minúsculas");
            } else{
                alert(text + "Es una mezcla de mayúsculas y minúsculas con " + numLower + " minúsculas y "+ numUpper + " mayúsculas");
            }
});