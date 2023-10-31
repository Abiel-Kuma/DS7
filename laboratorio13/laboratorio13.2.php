<?php
    if(array_key_exists('enviar',$_POST)){
        $expire=time()+60*5;
        setcookie("user",$_REQUEST['visitante'],$expire);
        header('Refresh:0');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <br>
    <a href="laboratorio13.3.php">Continuar...</a>
</body>
</html>