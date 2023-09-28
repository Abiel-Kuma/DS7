<?php
final class ClaseBase {
    public function test() {
        echo "ClaseBase::test() llamada\n";
    }

    // Aquí da igual si se declara el método como
    // final o no
    final public function moreTesting() {
        echo "ClaseBase::moreTesting() llamada\n";
    }
}

class ClaseHijo extends ClaseBase {
}

/*
la salida muestra que los métodos de ClaseBase se llaman en una instancia de esa clase,
y la marcación de final en el método moreTesting no impide que se llame desde la instancia de ClaseBase.
*/
?>