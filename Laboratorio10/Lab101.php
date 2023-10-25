<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio 10.1</title>
</head>
<body>
<?php

require_once("class/votos.php");
if(array_key_exists("enviar",$_POST))
{
    print("<H1>Encuesta. Voto registrado</H1>\n");
    $obj_votos=new votos();
    $result_votos = $obj_votos->listar_voto();

    foreach($result_votos as $result_votos){
        $votos1 = $result_votos["votos1"];
        $votos2 = $result_votos["votos2"];
    }
    
    $votos1 = $_REQUEST['voto'];
    if ($votos == "si"){
     $votos1++;
    } else if($votos == "no"){
     $votos2++;
    }

    $obj_votos = new votos();
    $result = $obj_votos->actualizar_voto($votos1,$votos2);

    if($result){
        print("<p>Su voto a sido registrado exitosamente</p>\n");
        print("<A HREF='lab101.php'>ver resultados</A>\n");

    }
    else{
        print("<A HREF='lab101.php'>Error al actualizar su voto</A>\n");
        
    }

} else{
?>
<H1>Encuesta</H1>
<p>¿cree du. que el precio de la vivienda seguira subiendo al ritmo actual?</p>

    <form action="lab101.php" method="post">
        <input type="radio" name="voto" value="si" CHECKED>Si<BR>
        <input type="radio" name="voto" value="no">No<BR><BR>
        <input type="submit" name="enviar" value="votar">
    </form>

    <A HREF="lab101.php">ver resultados</A>
<?php
}
?>
</body>
</html>