document.getElementById("ejercicio6").addEventListener("click", function () {
    var priceCity = {
        "Alcorcon": 10,
        "Leganés": 12,
        "Pinto": 8,
        "Fuenlabrada": 11,
        "Getafe": 10,
        "Parla": 15,
        "Móstoles": 7,
    }

    var city = prompt("Introduce una ciudad: ");
    var package = parseInt(prompt("Introduce el número de bultos :"));
    var price = 0;
    if (priceCity[city]){
        price = (priceCity[city] * package) + (priceCity[city] * package)*0.21;
        document.write("Ciudad: " + city + "<br>" +
            "Bultos: " + package + "<br>" +
            "Precio por paquete: " + priceCity[city] +  "<br>" +
            "Precio total con IVA: " + price);
    } else {
        pricePack = 20;
        price = (pricePack * package) + (pricePack * package)*0.21;
        document.write("Ciudad: " + city + "<br>" +
            "Bultos: " + package + "<br>" +
            "Precio por paquete: " + pricePack +  "<br>" +
            "Precio total con IVA: " + price + "<br>" +
            "Esta ciudad está fuera de nuestro rango");
    }
})