function CheckForm() {
    // Validar el correo electrónico
    var email = document.getElementById('email').value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingrese una dirección de correo electrónico válida.');
        return false;
    }

    // Validar la fecha de nacimiento
    var day = parseInt(document.getElementById('day').value, 10);
    var month = parseInt(document.getElementById('month').value, 10);
    var year = parseInt(document.getElementById('year').value, 10);

    // Verificar si la fecha de nacimiento es válida
    if (isNaN(day) || isNaN(month) || isNaN(year) || !isValidDate(day, month, year)) {
        alert('Por favor, ingrese una fecha de nacimiento válida.');
        return false;
    }

    // Validar el número de amigos (debe ser un número entero)
    var friends = document.getElementById('friends').value;
    var friendsRegex = /^\d+$/;
    if (!friendsRegex.test(friends)) {
        alert('Por favor, ingrese un número válido para el número de amigos.');
        return false;
    }

    // Confirmar el envío del formulario
    var confirmationMessage = 'Confirmación de Envío:\n\n';
    confirmationMessage += 'Correo Electrónico: ' + email + '\n';
    confirmationMessage += 'Fecha de Nacimiento: ' + day + '/' + month + '/' + year + '\n';
    confirmationMessage += 'Número de Amigos: ' + friends + '\n';

    if (confirm(confirmationMessage)) {
        // Aquí puedes agregar código adicional si es necesario antes de enviar el formulario
        return true;
    } else {
        return false;
    }
}

// Función auxiliar para verificar si una fecha es válida
function isValidDate(day, month, year) {
    var date = new Date(year, month - 1, day);
    return (
        date.getFullYear() === year &&
        date.getMonth() === month - 1 &&
        date.getDate() === day
    );
}