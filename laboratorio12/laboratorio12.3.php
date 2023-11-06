<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab12.3</title>
</head>
<body>
    <?php
        if(isset($_SESSION['var'])){
            $var = $_SESSION['var'];
        }else{
            $var = "";
        }
        print("<p>Valor de la variable session: $var</p>\n");
        session_destroy();
    ?>
    <a href="laboratorio12.1.php">Volver al paso 1</a>
</body>
</html>