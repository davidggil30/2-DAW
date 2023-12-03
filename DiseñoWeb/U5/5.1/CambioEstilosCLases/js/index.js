$(document).ready(function() {
    $(".claseb").click(function() {
        $(".clasea").addClass("clasea");
    });

    $("#quitarClase").click(function() {
        $(".clasea").removeClass("clasea");
    });
});
