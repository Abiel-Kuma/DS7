<html>
<head>

<title>laboratorio 2.5</title>

</head>

<body>

<?php

$figuras = array ('cuadrado', 'triángulo', 'circulo');
$figuras[1] = 'rectángulo':

mostrar_figuras ($figuras, "asignacion de rectangulo");

array push ($figuras, 'pentagono');
mostrar_figuras ($figuras, "adicion de pentagono al final");

array unshift ($figuras ,'hexagono');
mostrar_figuras ($figuras, "adicion de hexagono al inicio");

array_pop ($figuras) ;
mostrar_figuras ($figuras, "eliminacion del ultimo");

array_shift ($figuras);
mostrar_figuras ($figuras, "eliminacion del primero");

function mostrar figuras (sfiguras, $mensaje) {
echo "<br>Arreglo despues de $mensaje <br>";
foreach( $figuras as $figura) {

echo "$figura <br>";

}

}

?> </body>
</html>

