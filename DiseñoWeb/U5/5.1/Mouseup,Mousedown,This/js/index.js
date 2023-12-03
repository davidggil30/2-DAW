$(document).ready(function() {
    $("#hundirraton").mousedown(function() {
        $(this).css({
            "background-color": "blue",
            "color": "white"
        });
    });
    $("#levantarraton").mouseup(function() {
        $(this).css({
            "background-color": "green",
            "color": "white"
        });
    });
});
