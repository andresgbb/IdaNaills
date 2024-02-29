function deshabilitarFinDeSemana(input) {
    var date = new Date(input.value);

    // Obtener la fecha actual
    var currentDate = new Date();

    // Restablecer la hora de currentDate a las 00:00:00 para que solo compare las fechas
    currentDate.setHours(0, 0, 0, 0);

    // Verificar si la fecha seleccionada es anterior al día actual
    if (date < currentDate) {
        // Establecer el valor del campo en vacío
        input.value = '';
        alert('No puedes seleccionar una fecha anterior al día de hoy.');
    } else if (date.getDay() === 0 || date.getDay() === 6) {
        // Si el día seleccionado es sábado o domingo, establecer el valor del campo en vacío
        input.value = '';
        alert('Solo se pueden reservar de lunes a viernes.');
    }
}

// Obtener el campo de fecha
var fechaInput = document.getElementById('fecha_reserva');

// Adjuntar un evento onchange para llamar a la función de deshabilitarFinDeSemana
fechaInput.addEventListener('change', function() {
    deshabilitarFinDeSemana(this);
});



