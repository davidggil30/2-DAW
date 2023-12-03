// Tabla ASCII
document.getElementById("ejercicio8").addEventListener("click", function () {
    var array = new Array(256);
        for(i = 0; i < array.length; i+=1){
            array[i] = String.fromCharCode(i);
        }
        document.write("<table>");
        for(i = 0; i < array.length; i+=1){
            if(i % 16 == 0){
                document.write("<tr>");
            }
            document.write("<td style='border: solid 1px black '>" + array[i] + "</td>");
            if((i+1) % 16 == 0){
                document.write("</tr>");
            }
        }
        document.write("</table>");
})