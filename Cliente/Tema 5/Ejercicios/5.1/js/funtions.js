var miv;
function AbrirVentana() {
    miv = window.open("catalogo.html","v2","top=150,left=400,width=200");
}
function Calcula() {
    var lacant = document.getElementById("cant").value;
    var eliva = lacant * 0.21;
    document.getElementById("iva").value = eliva;
    var eltotal = parseInt(lacant) + eliva;
    document.getElementById("total").value = eltotal;
    var elradio = document.getElementsByName("tpago");
    for (let i = 0; i < elradio.length; i++) {
        if (elradio[i].checked == true) { //Se verifica que el radio buton esta pulsado
            eltotal = eltotal + parseFloat(elradio[i].value);
        }
    }
    document.getElementById("total").value = eltotal;
}
function Cerrar() {
    var Suma = 0;
    var el_form = document.getElementById('prods');
    for (let i = 0; i < el_form.elements.length; i++) {
        if (el_form.elements[i].type=='checkbox' && el_form.elements[i].checked == true) {
            Suma = Suma + parseInt(el_form.elements[i].value);
        }
        window.opener.document.getElementById('cant').value = Suma;
        window.opener.Calcul();
        window.close();
    }
}