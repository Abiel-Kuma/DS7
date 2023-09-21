<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $N = $_POST["valor"];
    
    /* 
    Genere una matriz de tipo cruz chica en una tabla. la celda del centro 
    (y su fila previa y posterior, columna previa y posterior)
    contendra valores aleatorios (entre 1 y 100) y los demas con 0. la matriz debe ser N por N debe ser impar
    */

        

    function generarMatrizCruz($N) {
        

        // 000000...
        $matriz = array_fill(0, $N, array_fill(0, $N, 0));

        // centro
        $centro = $N / 2;
        $matriz[$centro][$centro] = rand(1, 100);

        //centro arriba
        $centro = $N / 2;
        $matriz[$centro - 1][$centro] = rand(1, 100);

        //centro abajo
        $centro = $N / 2;
        $matriz[$centro + 1][$centro] = rand(1, 100);

        //centro izquierda
        $centro = $N / 2;
        $matriz[$centro][$centro -1] = rand(1, 100);

        //centro derecha
        $centro = $N / 2;
        $matriz[$centro][$centro +1] = rand(1, 100);
        

        return $matriz;
    }


    $matrizCruz = generarMatrizCruz($N);

    if ($N % 2 == 0) {
        echo "<Br>";
        echo "N no debe ser par";
    }
    else {
        echo "Matriz <br>";
    foreach ($matrizCruz as $fila) {
        foreach ($fila as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
    }

    }
    // Mostrar la matriz
    
    // Mostrar valores de la suma
    $suma = array_sum(array_map('array_sum', $matrizCruz));
    echo "La suma de los valores es: $suma";

}
?>