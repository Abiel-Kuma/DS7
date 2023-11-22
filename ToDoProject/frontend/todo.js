document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const agregarBtn = document.getElementById('agregarBtn');

    // Consulta de todas las tareas (GET)
    fetch('http://localhost/DS7/ToDoProject/backend/api.php')
        .then(response => response.json())
        .then(mostrarTareas)
        .catch(error => console.error(error));

    // Función para mostrar las tareas en el frontend
    function mostrarTareas(response) {
        const taskList = document.getElementById('taskList');
        taskList.innerHTML = '';

        if (response.success && Array.isArray(response.data)) {
            response.data.forEach(tarea => {
                const tareaElement = document.createElement('div');
                tareaElement.innerHTML = `
                    <p><strong>${tarea.Titulo}</strong></p>
                    <p>${tarea.Descripcion}</p>
                    <p>Estado: ${tarea.Estado}</p>
                    <p>Fecha: ${tarea.Fecha}</p>
                    <button class="eliminarBtn" data-id="${tarea.ID}">Eliminar</button>
                    <button class="editarBtn" data-id="${tarea.ID}">Editar</button>
                    <hr>
                `;
                taskList.appendChild(tareaElement);
            });

            // Asignar manejadores de eventos para eliminar y editar
            document.querySelectorAll('.eliminarBtn').forEach(btn => {
                btn.addEventListener('click', () => eliminarTarea(btn.dataset.id));
            });

            document.querySelectorAll('.editarBtn').forEach(btn => {
                btn.addEventListener('click', () => editarTarea(btn.dataset.id));
            });
        } else {
            console.error('La respuesta de la API no tiene la estructura esperada:', response);
        }
    }

    // Función para agregar nueva tarea (POST)
    function agregarTarea() {
        const titulo = document.getElementById('titulo').value;
        const descripcion = document.getElementById('descripcion').value;
        const estado = document.getElementById('estado').value;
        const fecha = document.getElementById('fecha').value;

        fetch('http://localhost/DS7/ToDoProject/backend/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `titulo=${titulo}&descripcion=${descripcion}&estado=${estado}&fecha=${fecha}`,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Actualizar la lista de tareas después de agregar una nueva
                fetch('http://localhost/DS7/ToDoProject/backend/api.php')
                    .then(response => response.json())
                    .then(mostrarTareas)
                    .catch(error => console.error(error));
            })
            .catch(error => console.error(error));
    }

    // Función para eliminar tarea (DELETE)
    function eliminarTarea(tareaId) {
        fetch(`http://localhost/DS7/ToDoProject/backend/api.php?tarea_id=${tareaId}`, {
            method: 'DELETE',
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Actualizar la lista de tareas después de eliminar una tarea
                fetch('http://localhost/DS7/ToDoProject/backend/api.php')
                    .then(response => response.json())
                    .then(mostrarTareas)
                    .catch(error => console.error(error));
            })
            .catch(error => console.error(error));
    }

    // Función para editar tarea (PUT o POST)
    function editarTarea(tareaId) {
        const titulo = prompt('Nuevo título:');
        const descripcion = prompt('Nueva descripción:');
        const estado = prompt('Nuevo estado:');
        const fecha = prompt('Nueva fecha:');

        fetch('http://localhost/DS7/ToDoProject/backend/api.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `tarea_id=${tareaId}&titulo=${titulo}&descripcion=${descripcion}&estado=${estado}&fecha=${fecha}`,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Actualizar la lista de tareas después de editar una tarea
                fetch('http://localhost/DS7/ToDoProject/backend/api.php')
                    .then(response => response.json())
                    .then(mostrarTareas)
                    .catch(error => console.error(error));
            })
            .catch(error => console.error(error));
    }

    // Asignar manejador de evento para agregar tarea
    agregarBtn.addEventListener('click', agregarTarea);
});
