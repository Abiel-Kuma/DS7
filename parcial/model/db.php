<?php
//require_once '../config/config.php';

class Db
{
    public static function StartUp()
    {   
        $host = 'localhost';
        $usuario = 'root';
        $contrasena = '';
        $base_datos = 'checklist_app';
        $puerto = 3308;

        $conexion = new mysqli($host, $usuario, $contrasena, $base_datos, $puerto);

        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }
        
        return $conexion; // Devuelve la instancia de la conexión
    }
}

?>