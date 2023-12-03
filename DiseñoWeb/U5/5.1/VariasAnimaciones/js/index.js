// index.js

$(document).ready(function() {
    // Ver
    $("#ver").click(function() {
        $("p").show("slow");
    });

    // Ocultar
    $("#ocultar").click(function() {
        $("p").hide("slow");
    });

    // Ver al 100%
    $("#ver100").click(function() {
        $("p").fadeIn("slow", 1);
    });

    // Transparente al 50%
    $("#transparente50").click(function() {
        $("p").fadeTo("slow", 0.5);
    });

    // Ocultar o ver
    $("#ocultarVer").click(function() {
        $("p").toggle("slow");
    });

    // Animar título
    $("#animarTitulo").click(function() {
        $("h2").animate({
            fontSize: "20px",
            borderWidth: "4px"
        }, "slow");
    });
});
