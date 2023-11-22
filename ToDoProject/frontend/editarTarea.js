document.addEventListener('DOMContentLoaded', function () {
    const actualizarBtn = document.getElementById('actualizarBtn');
    const cancelarBtn = document.getElementById('cancelarBtn');
    const editarForm = document.getElementById('editarForm');

    // Obtener el ID de la tarea de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const tareaId = urlParams.get('tarea_id');

    // Obtener la tarea actual para llenar el formulario
    fetch(`http://localhost/DS7/ToDoProject/backend/api.php?tarea_id=${tareaId}`)
        .then(response => response.json())
        .then(fillForm)
        .catch(error => console.error(error));

        function fillForm(response) {
            console.log(response); // Agrega esta línea
            if (response.success && response.data && response.data.length > 0) {
                const tarea = response.data[0]; // Accede al primer elemento del array
                document.getElementById('titulo').value = tarea.Titulo;
                document.getElementById('descripcion').value = tarea.Descripcion;
                document.getElementById('estado').value = tarea.Estado;
        
                // Verificar si la propiedad 'Fecha' existe antes de asignar el valor al campo date
                if (tarea.Fecha) {
                    document.getElementById('fecha').value = tarea.Fecha;
                } else {
                    console.warn('La tarea no tiene una propiedad "Fecha".');
                }
            } else {
                console.error('No se pudo obtener la tarea para editar:', response);
            }
        }
        
        

    // Agregar manejadores de eventos para actualizar y cancelar
    actualizarBtn.addEventListener('click', function () {
        // Obtener los valores del formulario
        const titulo = document.getElementById('titulo').value;
        const descripcion = document.getElementById('descripcion').value;
        const estado = document.getElementById('estado').value;
        const fecha = document.getElementById('fecha').value;
    
        // Construir el objeto de datos a enviar al servidor
        const datos = {
            tarea_id: tareaId,
            titulo: titulo,
            descripcion: descripcion,
            estado: estado,
            fecha: fecha
        };
    
        // Enviar la solicitud de actualización al servidor
        fetch('http://localhost/DS7/ToDoProject/backend/api.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(datos),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Redirigir a la página principal después de actualizar
                window.location.href = 'index.html';
            })
            .catch(error => console.error(error));
    });

    cancelarBtn.addEventListener('click', function () {
        // Redirige a la página principal sin hacer ninguna actualización
        window.location.href = 'index.html';
    });
});
