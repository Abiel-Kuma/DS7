<!DOCTYPE html>
<html>
<head>
    <title>ToDo Project</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>ToDo Project</h1>
    <form action="addTask.php" method="post" class="formTask" >
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <br><br>
        
        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="pendiente">Pendiente</option>
            <option value="en_progreso">En Progreso</option>
            <option value="completado">Completado</option>
        </select>
        <br><br>
        
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
        <br><br>

        <input type="submit" value="Guardar">
    </form>

    <h2>Tareas</h2>
    <ul>
        <?php
        // Datos de conexión a la base de datos
        include 'conexion.php';
        
        // Consulta para obtener las tareas
        $consulta = "SELECT ID, Titulo, Descripcion, Estado, Fecha FROM task";
        $result = $conexion->query($consulta);
        
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                echo "<div class='tarea'>";
                echo "<li>";
                echo "<h3>" . $fila["Titulo"] . "</h3>";
                echo "<p class='descripcion'>" . $fila["Descripcion"] . "</p>";
                echo "<strong>Estado:</strong> " . $fila["Estado"] . "<br>";
                echo "<strong>Fecha:</strong> " . $fila["Fecha"] . "<br>";
                
                
                // Agregar botón para eliminar la tarea
                echo "<form action='eliminar_tarea.php' method='post' class='formBtn'>";
                echo "<input type='hidden' name='tarea_id' value='" . $fila["ID"] . "'>";
                echo "<input type='submit' name='eliminar' value='Eliminar'>";
                echo "</form>";
                
                // Agregar botón para actualizar la tarea
                echo "<form action='editar_tarea.php' method='get' class='formBtn'>";
                echo "<input type='hidden' name='tarea_id' value='" . $fila["ID"] . "'>";
                echo "<input type='submit' name='actualizar' value='Actualizar'>";
                echo "</form>";
                echo "</div>";
                echo "</li>";
            }
        } else {
            echo "No hay tareas.";
        }
        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </ul>
</body>
</html>
