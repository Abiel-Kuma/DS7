<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio10.2</title>
</head>
<body>
    <h1>Encuesta. resultado de la votacion</h1>

    <?php
        require_once("class/votos.php");

        $obj_votos = new Votos();
        $result_votos = $obj_votos->listar_votos();

        foreach($result_votos as $result_votos){
            $voto1 = $result_votos["voto1"];
            $voto2 = $result_votos["voto2"];
        }
        $totalVotos = $voto1 + $voto2;

        print ("<TABLE>\n");

        print ("<TR>\n");
        print ("<TH>Respuesta</TH>\n");
        print ("<TH>Votos</TH>\n");
        print ("<TH>Porcentaje</TH>\n");
        print ("<TH>Representacion grafica</TH>\n");
        print ("</TR>\n");

        $porcentaje = round(($voto1/$totalVotos)*100,2);
        print ("<TR>\n");
        print ("<TD CLASS='izquierda'>Si</TD>\n");
        print ("<TD CLASS='derecha'>$voto1</TD>\n");
        print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH'" . $porcentaje * 4 . "'></TD>\n");
        print ("</TR>\n");

        $porcentaje = round(($voto2/$totalVotos)*100,2);
        print ("<TR>\n");
        print ("<TD CLASS='izquierda'>No</TD>\n");
        print ("<TD CLASS='derecha'>$voto2</TD>\n");
        print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH'" . $porcentaje * 4 . "'></TD>\n");
        print ("</TR>\n");

        print ("</TABLE>\n");
        print ("<p>Numero total de votos emitidos: $totaVotos </p>\n");
        print ("<p><A href='Lab101.php'>Pagina de votacion</A>  </p>\n");
    ?>
</body>
</html>