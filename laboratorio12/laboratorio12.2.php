<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 12</title>
</head>
<body>
    <h1>manejo de sesiones</h1>
    <h2>Paso2: se accede a la variable almacenada y se destruye</h2>
    <?php
    
        if(isset($_SESSION['var'])){
            $var = $_SESSION['var'];
            print("<p>Valor de la variable session: $var</p>\n");
            unset($_SESSION['var']);
            print("<a href='laboratorio12.3.php'>Paso 3</a>");
        }
        else{
            print("Session no iniciada, ir al <a href='laboratorio12.1.php'>Paso 1</a>");
        }
    ?>
    
</body>
</html>