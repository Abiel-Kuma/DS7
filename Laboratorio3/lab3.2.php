<?php
$precio1 = $_POST['precio1'];
$precio2 = $_POST['precio2'];
$precio3 = $_POST['precio3'];
$media = ($precio1+$precio2+$precio3)/3;
echo "<br/> DATOS RECIBIDOS";
echo "<br/> Precio del producto establecido 1: ". $precio1. "dolares";
echo "<br/> Precio del producto establecido 2: ". $precio2. "dolares";
echo "<br/> Precio del producto establecido 3: ". $precio3. "dolares <br/>";
echo "<br/> El precio medio del producto es de ". $media. "dolares";
?>