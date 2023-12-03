document.getElementById("ejercicio3").addEventListener("click", function () {
    var meses = new Array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

        for(var i = 0; i < meses.length; i += 1){
            document.write(meses[i]);
            if(i < meses.length - 1){
                document.write(" - ");
            }
        }

        function Mes(nombre, num){
            this.nombre = nombre;
            this.num = num;
        }

        function imprimeDatos(meses){
            for(var i = 0; i < array.length; i += 1){
                document.write(meses[i].nombre + " - " + meses[i].num + "<br>");
            }
        }

        var meses_instancia = new Array(3);
        meses_instancia[0] = new Mes("Enero");
        meses_instancia[1] = new Mes("Febrero");
        meses_instancia[2] = new Mes("Marzo");
})