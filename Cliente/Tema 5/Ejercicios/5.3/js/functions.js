function enviar() {
    let numDni = document.getElementById("dni");
    let letterDni = document.getElementById("letra");
    let name = document.getElementById("nom");
    let surname = document.getElementById("ape");
    let email = document.getElementById("email");
    let errores = document.getElementById("errores");
    let error = "";

    var lettersDni = [
        'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 
        'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L','C', 'K', 'E'
    ];

    var module = numDni.value % lettersDni.length;
    letterDni.value = lettersDni[module];

    if (name.value == "") {
        error += "\t - El campo 'Nombre' no puede estar vacío\n";
    }
    if (surname.value == "") {
        error += "\t - El campo 'Apellido' no puede estar vacío\n";
    }

    var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    if (!(validEmail.test(email.value))) {
        error += "\t - Email no válido\n";
        email.value = null;
    }

    alert(error);
    errores.innerHTML = error;
    errores.style.border = "solid 1px red";

    

    
}

function validaCalles() {
    let street = document.getElementById("calle");
    let pob = document.getElementById("poblacion");

    if (street.value && pob.value != "") {
        document.getElementById("provincia").disabled = false;
    }
}

function validarFichero() {
    let archive = document.getElementById("archivo");
    if (archive.value) {
        document.getElementById("comprimido").disabled = false;
        document.getElementById("encriptado").disabled = false;
        document.getElementById("texto").disabled = false;
        document.getElementById("texto").required = true;
    }
}