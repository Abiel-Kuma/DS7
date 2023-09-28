<?php
class MiClase {
    const constante = 'valor constante';

    function mostrarConstante() {
        echo self::constante . "\n";
    }
}

include("class_lib.php");

echo MiClase::constante . "<br>";

$clase = new MiClase();
$clase->mostrarConstante();
?>
