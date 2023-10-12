<?php
class MatrizIdentidad
{
    private $n;
    private $matriz;

    public function __construct($n)
    {
        $this->n = $n;
        $this->generarMatriz();
    }

    private function generarMatriz()
    {
        $this->matriz = array();
        for ($i = 0; $i < $this->n; $i++) {
            $fila = array();
            for ($j = 0; $j < $this->n; $j++) {
                if ($i == $j) {
                    $fila[] = 1;
                } else {
                    $fila[] = 0;
                }
            }
            $this->matriz[] = $fila;
        }
    }

    public function mostrarMatriz()
    {
        echo "<h2>Matriz Identidad de Orden $this->n:</h2>";
        echo "<table border='1'>";
        foreach ($this->matriz as $fila) {
            echo "<tr>";
            foreach ($fila as $elemento) {
                echo "<td>$elemento</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 8.3</title>
</head>
<body>
    <h1>Generador de Matriz Identidad</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="n">Ingrese el valor de N (número par): </label>
        <input type="number" name="n" required>
        <button type="submit">Generar Matriz</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST['n'];
        $matrizObj = new MatrizIdentidad($n);
        $matrizObj->mostrarMatriz();
    }
    ?>

</body>
</html>
