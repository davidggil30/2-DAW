document.addEventListener("DOMContentLoaded", function () {
    var userRole = "<?php echo $userRole; ?>";

    // Muestra el div correspondiente al rol del usuario
    if (userRole === "admin") {
        document.getElementById("admin").style.display = "block";
        document.getElementById("client").style.display = "none";
    } else if (userRole === "client") {
        document.getElementById("client").style.display = "block";
        document.getElementById("admin").style.display = "none";

    } else {
        console.error("Rol de usuario no reconocido:", userRole);
    }
})