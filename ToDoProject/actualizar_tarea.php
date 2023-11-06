<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["tarea_id"])) {
    include 'conexion.php';
    
    // Obtener los datos del formulario
    $tarea_id = $_POST["tarea_id"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];
    $fecha = $_POST["fecha"];
    
    // Consulta SQL para actualizar la tarea
    $consulta = "UPDATE task SET Titulo = ?, Descripcion = ?, Estado = ?, Fecha = ? WHERE ID = ?";
    
    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("ssssi", $titulo, $descripcion, $estado, $fecha, $tarea_id); // "ssssi" indica los tipos de datos

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Tarea actualizada con éxito.";
        echo "<script>window.location = 'index.php';</script>"; // Redireccionar a index.php
    } else {
        echo "Error al actualizar la tarea: " . $stmt->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "Solicitud no válida.";
}
?>
