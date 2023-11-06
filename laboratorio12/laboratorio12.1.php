<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab12</title>
</head>
<body>
    <h1>Manejo de sessiones</h1>
    <h2>Paso 1: se crea la variable de session y se almacena</h2>

    <?php
        $var = "ejemplo de sesiones";
        $_SESSION['var']=$var;
        print("<p>Valor de la variable session: $var</p>\n");
    
    ?>
    <a href="laboratorio12.2.php">Paso 2</a>
</body>
</html>