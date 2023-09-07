<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generar matriz</title>
</head>
<body>
    <h1>Generar Matriz</h1>
<?php
$n = $_POST['n'];

$matriz = array();
for ($i = 0; $i < $n; $i++) {
    $fila = array();
    for ($j = 0; $j < $n; $j++) {
        if ($i == $j) {
            $fila[] = 1;
        } else {
            $fila[] = 0; 
        }
    }
    $matriz[] = $fila;
}

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

</body>
</html>