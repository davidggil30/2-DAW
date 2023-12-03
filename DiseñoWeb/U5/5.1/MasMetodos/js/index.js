$(document).ready(function() {
    // Function to delete all items
    $("#deleteAll").click(function() {
        $("#list").empty();
    });

    // Function to recover the original list
    $("#recovery").click(function() {
        $("#list").html(`
            <li>Primer item</li>
            <li>Segundo item</li>
            <li>Tercer item</li>
            <li>Cuarto item</li>
        `);
    });

    // Function to add an item to the end of the list
    $("#addFinal").click(function() {
        $("#list").append("<li>Nuevo item al final</li>");
    });

    // Function to add an item to the beginning of the list
    $("#addFirst").click(function() {
        $("#list").prepend("<li>Nuevo item al principio</li>");
    });

    // Function to delete the last item
    $("#deleteLast").click(function() {
        $("#list li:last-child").remove();
    });

    // Function to delete the first item
    $("#deleteFirst").click(function() {
        $("#list li:first-child").remove();
    });

    // Function to decorate alternate colors
    $("#decore").click(function() {
        $("#list li:even").addClass("alternate-color");
    });
});