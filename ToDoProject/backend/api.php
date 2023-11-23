<?php
include 'conexion.php';

$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'GET') {
    // Consultar tareas y devolver JSON
    $consulta = "SELECT ID, Titulo, Descripcion, Estado, Fecha FROM task";
    $result = $conexion->query($consulta);

    $tareas = [];

    if ($result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $tareas[] = $fila;
        }
    }

    $response = [
        'success' => true,
        'data' => $tareas
    ];
}
elseif ($metodo === 'POST') {
    // Agregar nueva tarea
    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $fecha = $_POST['fecha'] ?? '';

    if (empty($titulo) || empty($descripcion) || empty($estado) || empty($fecha)) {
        $response = [
            'success' => false,
            'message' => 'Todos los campos son obligatorios.'
        ];
    } else {
        $sql = "INSERT INTO task (Titulo, Descripcion, Estado, Fecha) VALUES (?, ?, ?, ?)";

        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssss", $titulo, $descripcion, $estado, $fecha);

            if ($stmt->execute()) {
                $response = [
                    'success' => true,
                    'message' => 'Los datos se han guardado con éxito.'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error al guardar los datos: ' . $stmt->error
                ];
            }

            $stmt->close();
        } else {
            $response = [
                'success' => false,
                'message' => 'Error en la preparación de la consulta: ' . $conexion->error
            ];
        }
    }
}
elseif ($metodo === 'DELETE') {
    // Eliminar tarea
    $tarea_id = $_GET['tarea_id'] ?? '';

    if (!empty($tarea_id)) {
        $consulta = "DELETE FROM task WHERE ID = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("i", $tarea_id);

        if ($stmt->execute()) {
            $response = [
                'success' => true,
                'message' => 'Tarea eliminada con éxito.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al eliminar la tarea: ' . $stmt->error
            ];
        }

        $stmt->close();
    } else {
        $response = [
            'success' => false,
            'message' => 'ID de tarea no proporcionado.'
        ];
    }
}
elseif ($metodo === 'PUT') {
    // Actualizar tarea
    $put_vars = json_decode(file_get_contents("php://input"), true);

    $tarea_id = $put_vars['tarea_id'] ?? '';
    $titulo = $put_vars['titulo'] ?? '';
    $descripcion = $put_vars['descripcion'] ?? '';
    $estado = $put_vars['estado'] ?? '';
    $fecha = $put_vars['fecha'] ?? '';

    if (!empty($tarea_id) && !empty($titulo) && !empty($descripcion) && !empty($estado) && !empty($fecha)) {
        $consulta = "UPDATE task SET Titulo = ?, Descripcion = ?, Estado = ?, Fecha = ? WHERE ID = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("sssss", $titulo, $descripcion, $estado, $fecha, $tarea_id);

        if ($stmt->execute()) {
            $response = [
                'success' => true,
                'message' => 'Tarea actualizada con éxito.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al actualizar la tarea: ' . $stmt->error
            ];
        }

        $stmt->close();
    } else {
        $response = [
            'success' => false,
            'message' => 'Datos insuficientes para actualizar la tarea.'
        ];
    }
}
else {
    $response = [
        'success' => false,
        'message' => 'Método no permitido.'
    ];
}

$conexion->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
