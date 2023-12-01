<?php

include 'conexiondb.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = obtenerConexion();

    $stmt = $conn->prepare("SELECT * FROM parcial2");
    $stmt->execute();

    $result = $stmt->get_result();
    $values = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $conn->close();

    $response = json_encode($values);

    echo $response;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valorN = isset($_POST['valor']) ? (int)$_POST['valor'] : null;

    if (!is_numeric($valorN) || $valorN <= 0) {
        $response = array('error' => 'El valor ingresado no es válido.');
    } else {
        $sumatoria = 0;
        $factorial = 1;

        for ($i = 1; $i <= $valorN; $i++) {
        $factorial *= $i;
        $sumatoria += $i / $factorial;
}


        $conn = obtenerConexion();
        
        $stmt = $conn->prepare("INSERT INTO parcial2 (N, Factorial, Sumatoria) VALUES (?, ?, ?)");
        $stmt->bind_param("idd", $valorN, $factorial, $sumatoria);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        $results = array('sumatoria' => $sumatoria);

        $response = json_encode($results);
    }

    echo $response;
}
else {
    // Invalid request method
    $response = array('error' => 'Método de solicitud no válido.');
    echo json_encode($response);
}
?>
