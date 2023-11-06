<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Eliminar Cookies</h1>
    <?php
    
        if(isset($_COOKIE["user"])){
            setcookie("user","",time()+60*5);
            echo"<h3>La cookie 'user' ha sido eliminada satifactoriamente</h3><br/>";
        }
        else{
            echo"<h3>La cookie 'user' ha sido eliminada satifactoriamente</h3><br/>";
        }
        if(isset($_COOKIE["contador"])){
            setcookie("contador","",time()+60*5);
            echo"<h3>La cookie 'contador' ha sido eliminada satifactoriamente</h3><br/>";
        }
        else{
            echo"<h3>La cookie 'contador' ha sido eliminada satifactoriamente</h3><br/>";
        }
    
    ?>
    <a href="laboratorio13.1.php">Volver al contador de visitas</a>&nbsp;
    <a href="laboratorio13.2.php">Volver  al saldo a usuario</a>
</body>
</html>