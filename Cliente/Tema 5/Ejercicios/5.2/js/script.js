function checkCredential() {
        let name = document.getElementById("name");
        let age = document.getElementById("age");
        let tel = document.getElementById("tel");
        let email = document.getElementById("email");
        let error = "";

        var numSpaces = 0;
        for (var i = 0; i < name.value.length; i += 1) {
            if (name.value[i] == " ") {
                numSpaces += 1;
            }
        }
    
        if (name.value.length < 10) {
            error += "\t - El nombre tiene menos de 10 caracteres\n";
            name.value = null;
        }
        if (numSpaces < 2) {
            error += "\t - El nombre tiene menos de 2 espacios\n";
            name.value = null;
        }
    
        if (parseInt(age.value) < 16 || parseInt(age.value) > 65) {
            error += "\t - Introduce una edad entre 16 y 65\n";
            age.value = "\0";
        }
    
        if (tel.value[0] != "9") {
            error += "\t - El teléfono debe empezar por 9\n";
            tel.value = null;
        }
        if (tel.value.length !== 9) {
            error += "\t - La longitud del teléfono debe tener 9 caracteres\n";
            tel.value = null;
        }
    

        var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        if( !(validEmail.test(email.value)) ){
            error += "\t - Email no válido\n";
            email.value = null;
        }
        
        if(!error){
            error += "Los datos son correctos";
            alert(error);
            return true;
        } else{ 
            alert(error);
            return false;    
        }
        
}
