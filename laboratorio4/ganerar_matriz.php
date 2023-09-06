<?php
// Obtener el valor de N del formulario
$n = $_POST['n'];

// Verificar si N es un número par
if ($n % 2 != 0) {
    die("N debe ser un número par.");
}

// Inicializar una matriz identidad de tamaño NxN
$matriz = array();
for ($i = 0; $i < $n; $i++) {
    $fila = array();
    for ($j = 0; $j < $n; $j++) {
        if ($i == $j) {
            $fila[] = 1; // Elemento de la diagonal principal
        } else {
            $fila[] = 0; // Otros elementos
        }
    }
    $matriz[] = $fila;
}

// Mostrar la matriz identidad en formato HTML
echo "<h2>Matriz Identidad de Orden $n:</h2>";
echo "<table border='1'>";
foreach ($matriz as $fila) {
    echo "<tr>";
    foreach ($fila as $elemento) {
        echo "<td>$elemento</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
