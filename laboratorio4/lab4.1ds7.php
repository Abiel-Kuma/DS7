<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.1</title>
    
</head>
<body>
    <h1>Indicador de Ventas</h1>
    <form method="POST">
        <label for="ventas">Porcentaje de Ventas:</label>
        <input type="text" name="ventas" id="ventas">
        <input type="submit" value="Calcular">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $ventas = floatval($_POST["ventas"]);

        // % x img
        if ($ventas > 80) {
            $imagen = "verde.PNG";
            $mensaje = "Las ventas superan el 80%";
        } elseif ($ventas >= 50 && $ventas <= 79) {
            $imagen = "amarillo.PNG";
            $mensaje = "Las ventas están entre 50% y 79%";
        } else {
            $imagen = "rojo.PNG";
            $mensaje = "Las ventas están por debajo del 50%";
        }

        //imprimir imagenes/texto
        echo "<img src='imagenes/$imagen' alt='Indicador de Ventas'><br>";
        echo "<p>$mensaje</p>";
    }
    ?>

</body>
</html>
