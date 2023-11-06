<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["eliminar"]) && isset($_POST["tarea_id"])) {
    include 'conexion.php';

    // Obtener el ID de la tarea a eliminar
    $tarea_id = $_POST["tarea_id"];

    // Consulta SQL para eliminar la tarea
    $consulta = "DELETE FROM task WHERE ID = ?";

    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $tarea_id); // "i" indica un entero (ID)

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Tarea eliminada con éxito.";
        echo "<script>window.location = 'index.php';</script>"; // Redireccionar a index.php
    } else {
        echo "Error al eliminar la tarea: " . $stmt->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "Solicitud no válida.";
}
?>
