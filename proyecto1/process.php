<?php
require_once('modelo.php');

// Crear una instancia de modeloCredencialesBD
$modelo = new modeloCredencialesBD();

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];
    $edited = isset($_POST['edited']) ? 1 : 0;
    $responsible = $_POST['responsible'];
    $task_type = $_POST['task_type'];

    $sql = "INSERT INTO tasks (title, description, state, fecha_compromiso, editado, responsable, tipo_tarea) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $modelo->_db->prepare($sql); // Utilizar $modelo->_db
    $stmt->bind_param("ssssiss", $title, $description, $status, $due_date, $edited, $responsible, $task_type);

    if ($stmt->execute()) {
        // Tarea agregada exitosamente
        echo "Tarea agregada exitosamente.";
    } else {
        // Error al agregar la tarea
        echo "Error al agregar la tarea: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar la conexión a la base de datos
$modelo->_db->close();
?>
