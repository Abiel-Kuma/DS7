<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.3</title>
</head>
<body>
<?php
// Crear un arreglo unidimensional de 20 elementos
$arreglo = array();

// Llenar el arreglo con valores diferentes
for ($i = 1; $i <= 20; $i++) {
    // Generar un valor único para cada elemento (en este caso, simplemente el doble de $i)
    $valor = $i * 2;
    $arreglo[] = $valor;
}

// Encontrar el elemento mayor y su posición
$elementoMayor = max($arreglo);
$posicionElementoMayor = array_search($elementoMayor, $arreglo);

// Mostrar el resultado
echo "El elemento mayor es $elementoMayor y se encuentra en la posición $posicionElementoMayor del arreglo.";
?>

</body>
</html>