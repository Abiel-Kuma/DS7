<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.5</title>
</head>
<body>
<?php
// Crear un arreglo para almacenar números pares
$arregloPares = array();

// Contador para llevar el control de la cantidad de números pares ingresados
$cantidadPares = 0;

// Utilizar un bucle para llenar el arreglo con números pares
while ($cantidadPares < 20) {
    // Solicitar al usuario ingresar un número
    $numero = readline("Ingrese un número par: ");

    // Validar si el número es par
    if ($numero % 2 == 0) {
        // Agregar el número par al arreglo
        $arregloPares[] = $numero;
        $cantidadPares++;
    } else {
        // Si el número es impar, solicitar al usuario ingresar un valor correcto
        echo "El número ingresado es impar. Por favor, ingrese un número par.\n";
    }
}

// Mostrar el arreglo de números pares
echo "Arreglo de números pares:\n";
print_r($arregloPares);
?>

</body>
</html>