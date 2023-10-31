<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desconectar</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        if(isset($_SESSION["usuario_valido"]))
        { 
            session_destroy();
            print("<br><p ALING='CENTER'>Conecxion finalizada</p>");
            print("<p ALING='CENTER'>[<a href='laboratorio14.1.php'>Conectar</a>]</p>");
        }   
    ?>
</body>
</html>