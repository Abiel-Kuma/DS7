<?php

class IndicadorVentasModel {
    private $ventas;

    public function __construct() {
        $this->ventas = 0.0;
    }

    public function setVentas($ventas) {
        $this->ventas = floatval($ventas);
    }

    public function calcularIndicadorVentas() {
        if ($this->ventas > 80) {
            return ["imagen" => "verde.PNG", "mensaje" => "Las ventas superan el 80%"];
        } elseif ($this->ventas >= 50 && $this->ventas <= 79) {
            return ["imagen" => "amarillo.PNG", "mensaje" => "Las ventas están entre 50% y 79%"];
        } else {
            return ["imagen" => "rojo.PNG", "mensaje" => "Las ventas están por debajo del 50%"];
        }
    }
}

class IndicadorVentasView {
    public function mostrarFormulario() {
        echo '<h1>Indicador de Ventas</h1>';
        echo '<form method="POST">';
        echo '<label for="ventas">Porcentaje de Ventas:</label>';
        echo '<input type="text" name="ventas" id="ventas">';
        echo '<input type="submit" value="Calcular">';
        echo '</form>';
    }

    public function mostrarResultado($imagen, $mensaje) {
        echo "<img src='imagenes/$imagen' alt='Indicador de Ventas'><br>";
        echo "<p>$mensaje</p>";
    }
}

class IndicadorVentasController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function procesar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->setVentas($_POST["ventas"]);
            $resultado = $this->model->calcularIndicadorVentas();
            $this->view->mostrarResultado($resultado["imagen"], $resultado["mensaje"]);
        } else {
            $this->view->mostrarFormulario();
        }
    }
}

$model = new IndicadorVentasModel();
$view = new IndicadorVentasView();
$controller = new IndicadorVentasController($model, $view);

$controller->procesar();
?>



