<?php
    if(isset($_COOKIE['contador'])){
        setcookie('contador',$_COOKIE['contador']+1,time()+365*24*60*60);
        $mensaje = 'Gracias por visitarnos. Numeros de visitas:'.$_COOKIE['contador'];
    }
    else{
        setcookie('contador',1,time()+365*24*60*60);
        $mensaje = 'bienvenido a nuestro sitio web';
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
    <h1>Contador de visitas con cookies</h1>
    <h3>
    <?php
    echo $mensaje;
    ?>
    </h3>
</body>
</html>