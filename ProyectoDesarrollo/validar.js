function mostrarSeleccion() {
    let cursosSeleccionados = [];
    if (document.getElementById('Matutina').checked) {
        cursosSeleccionados.push('Matutina');
    }
    if (document.getElementById('Vespertina').checked) {
        cursosSeleccionados.push('Vespertina');
    }
    if (document.getElementById('Nocturna').checked) {
        cursosSeleccionados.push('Nocturna');
    }

    // Verificar si hay algún curso seleccionado
    if (cursosSeleccionados.length > 0) {
        Swal.fire({
            title: 'Cursos seleccionados',
            text: 'Has seleccionado: ' + cursosSeleccionados.join(', '),
            icon: 'success'
        });
    } else {
        Swal.fire({
            title: 'No has seleccionado ningún curso',
            text: 'Por favor selecciona al menos un curso.',
            icon: 'warning'
        });
    }
}