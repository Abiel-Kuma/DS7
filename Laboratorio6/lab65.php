<?php
class ClaseBase {
    public function test() {
        echo "ClaseBase::test() llamada\n";
    }

    final public function masTests() {
        echo "ClaseBase::masTests() llamada\n";
    }
}

class ClaseHijo extends ClaseBase {
    public function masTests() {
        echo "ClaseHijo::masTests() llamada\n";
    }
}
//error de override
//la salida muestra que se llama al método masTests de la clase ClaseHijo y no al de la clase ClaseBase.
?>