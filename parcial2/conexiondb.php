<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_datos = 'labsdb';
$puerto = 3308;

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Función para obtener la conexión
function obtenerConexion() {
    global $conexion;
    return $conexion;
}
?>
