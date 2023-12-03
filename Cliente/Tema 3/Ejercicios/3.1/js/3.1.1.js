// 1. Cree una página web con un script que calcule los milisegundos que han pasado 
    // cdesde las 00:00 del 1 de enero del 2000 hasta la fecha actual
    document.getElementById("ejercicio1").addEventListener("click", function () {
        var date = new Date();
        var initDate = new Date(200,1,1);
        alert("Fecha actual: " + date);
        alert("Fecha inicial: " + initDate);
        alert("Cantidad de milisegundos desde el 01/01/2000: " + (date-initDate));
    });