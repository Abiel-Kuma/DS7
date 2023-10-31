<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarea</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Editar Tarea</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["tarea_id"])) {
        // Obtener el ID de la tarea a editar
        $tarea_id = $_GET["tarea_id"];

        include 'conexion.php';
        
        // Consulta para obtener los detalles de la tarea seleccionada
        $consulta = "SELECT ID, Titulo, Descripcion, Estado, Fecha FROM task WHERE ID = ?";
        $stmt = $conexion->prepare($consulta);
        if ($stmt) {
            $stmt->bind_param("i", $tarea_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 1) {
                $fila = $result->fetch_assoc();
    ?>
    <form action="actualizar_tarea.php" method="post">
        <input type="hidden" name="tarea_id" value="<?php echo $fila['ID']; ?>">
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $fila['Titulo']; ?>" required>
        <br><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $fila['Descripcion']; ?></textarea>
        <br><br>
        
        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="pendiente" <?php echo ($fila['Estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
            <option value="en_progreso" <?php echo ($fila['Estado'] == 'en_progreso') ? 'selected' : ''; ?>>En Progreso</option>
            <option value="completado" <?php echo ($fila['Estado'] == 'completado') ? 'selected' : ''; ?>>Completado</option>
        </select>
        <br><br>
        
        <label for "fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $fila['Fecha']; ?>" required>
        <br><br>

        <input type="submit" value="Actualizar">
    </form>
    <?php
            } else {
                echo "La tarea no existe.";
                
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta.";
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo "Solicitud no válida.";
    }
    ?>
</body>
</html>
