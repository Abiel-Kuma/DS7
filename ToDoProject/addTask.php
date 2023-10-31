<?php
include 'conexion.php';

// Obtener los valores del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];
$fecha = $_POST['fecha'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO task (Titulo, Descripcion, Estado, Fecha) VALUES (?, ?, ?, ?)";

// Preparar una sentencia SQL
if ($stmt = $conexion->prepare($sql)) {
    // Vincular los parámetros
    $stmt->bind_param("ssss", $titulo, $descripcion, $estado, $fecha);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Los datos se han guardado con éxito
        echo "Los datos se han guardado con éxito.";
        echo "<script>window.location = 'index.php';</script>"; // Redireccionar a index.php
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>