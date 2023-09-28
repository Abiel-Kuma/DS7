<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $maxFileSize = 1024 * 1024;
    if ($_FILES['nombre_archivo_cliente']['size'] > $maxFileSize) {
        echo "El archivo es demasiado grande. El límite máximo es 1MB. Por favor, suba un archivo más pequeño.";
    } else {
        
        $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
        $tempExtension = pathinfo($_FILES['nombre_archivo_cliente']['name'], PATHINFO_EXTENSION);
        if (in_array(strtolower($tempExtension), $allowedExtensions)) {
            $nombreDirectorio = "archivos/";
            $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
            $nombreCompleto = $nombreDirectorio . $nombrearchivo;

            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                echo "Archivo repetido, se cambió el nombre a $nombrearchivo <br><br>";
            }

            move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);
            echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio<br>";
        } else {
            echo "El archivo subido no es una imagen válida. Por favor, suba un archivo en formato jpg, jpeg, gif o png.";
        }
    }
} else {
    echo "No se ha podido subir el archivo <br>";
}
?>
