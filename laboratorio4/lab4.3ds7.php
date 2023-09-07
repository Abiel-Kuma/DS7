<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.3</title>
</head>
<body>
<?php
// Crear un arreglo
$arreglo = array();

// Llenar el arreglo
for ($i = 1; $i <= 20; $i++) {

    $valor = $i * 2;
    $arreglo[] = $valor;
}

$elementoMayor = max($arreglo);
$posicionElementoMayor = array_search($elementoMayor, $arreglo);

echo "El elemento mayor es $elementoMayor y se encuentra en la posición $posicionElementoMayor del arreglo.";
?>

</body>
</html>