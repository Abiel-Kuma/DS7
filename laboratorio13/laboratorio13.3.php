<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Recuperar el valor de una cookie</h1>
    <?php
        if($_COOKIE['user']){
            echo("<h2>Bienvenido</h2>".$_COOKIE["user"]."!<h2></h2>");
        }
        else{
            echo("<h2>Bienvenido invitado!!!</h2><br>");
        }
    ?>
    <a href="laboratorio13.1.php">...Regresar</a>&nbsp;
    <a href="laboratorio13.4.php">Continuar...</a>
</body>
</html>