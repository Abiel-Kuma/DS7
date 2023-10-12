<?php

class FactorialCalculatorModel {
    private $numero;
    private $factorial;

    public function __construct() {
        $this->numero = 0;
        $this->factorial = 1;
    }

    public function setNumero($numero) {
        $this->numero = intval($numero);
    }

    public function calcularFactorial() {
        if ($this->numero < 0) {
            return "El número debe ser positivo.";
        }

        for ($i = 2; $i <= $this->numero; $i++) {
            $this->factorial *= $i;
        }

        return "El factorial de $this->numero es $this->factorial.";
    }
}

class FactorialCalculatorView {
    public function mostrarFormulario() {
        echo '<h1>Calculadora de Factorial</h1>';
        echo '<form method="POST">';
        echo '<label for="numero">Ingrese un número:</label>';
        echo '<input type="text" name="numero" id="numero" required>';
        echo '<input type="submit" value="Calcular Factorial">';
        echo '</form>';
    }

    public function mostrarResultado($resultado) {
        echo '<h1>Resultado del Factorial</h1>';
        echo "<p>$resultado</p>";
        echo '<p><a href="lab82.php">Volver al formulario</a></p>';
    }
}

class FactorialCalculatorController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function procesar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->setNumero($_POST["numero"]);
            $resultado = $this->model->calcularFactorial();
            $this->view->mostrarResultado($resultado);
        } else {
            $this->view->mostrarFormulario();
        }
    }
}

$model = new FactorialCalculatorModel();
$view = new FactorialCalculatorView();
$controller = new FactorialCalculatorController($model, $view);

$controller->procesar();

?>
