<?php
if (array_key_exists('enviar', $_POST)) {
    include('class_lib.php');
    $diam = $_POST['diam'];
    $altu = $_POST['altu'];
    $cil = new Cilindro($diam, $altu);
    $volumen = $cil->calc_volumen();
    $area = $cil->calc_area();
    echo "<br/> El volumen del cilindro es de " . $volumen . " metros cúbicos";
    echo "<br/> El área del cilindro es de " . $area . " metros cuadrados";
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Laboratorio 7.7</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="formularioDatos" method="post" action="lab77.php">
            <p>CÁLCULO DE VOLUMEN y ÁREA DE UN CILINDRO</p>
            <br/>Introduzca el diámetro en metros: <input type="text" name="diam" value=""><br/> <br/>
            Introduzca la altura en metros: <input type="text" name="altu" value=""><br/> <br/>
            <input value="Calcular" name="enviar" type="submit" />
        </form>
    </body>
    </html>
    <?php
}
?>
