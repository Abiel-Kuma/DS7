<!DOCTYPE html>
<html>
<head>
    <title>Resultado del Factorial</title>
</head>
<body>
    <h1>Resultado del Factorial</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el número ingresado por el usuario
        $numero = intval($_POST["numero"]);

        // Validar que el número sea positivo
        if ($numero < 0) {
            echo "<p>El número debe ser positivo.</p>";
        } else {
            // Calcular el factorial del número
            $factorial = 1;
            for ($i = 2; $i <= $numero; $i++) {
                $factorial *= $i;
            }
            echo "<p>El factorial de $numero es $factorial.</p>";
        }
    }
    ?>
    <p><a href="lab4.2ds7.html">Volver al formulario</a></p>
</body>
</html>
