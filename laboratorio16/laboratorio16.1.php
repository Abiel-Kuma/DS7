<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Consulta de Servicio Web de Conversion de Temperatura</h1>
    <form action="laboratorio16.1.php" method="post" name="FormConv">
        <br/>
        Convertir desde 
        <Select name="temp">
            <option value="value">C a F</option>
            <option value="value">F a C</option>
        </Select>El valor
        <input type="number" name="valor" step="Any" required>
        <input type="submit" name="Convertir" value="Convertir">
    </form>

<?php

    $servicio="https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
    $parametros=array();
    if(array_key_exists('Convertir',$_POST)){
        $valor=$_POST['valor'];
        $temp=$_POST['temp'];

        if($temp=="CToF"){
            $parametros['Celcius']=$valor;
            $cliente = new SoapClient($servicio,$parametros);
            $resultObj = $cliente->CelsiusToFahrenheit($parametros);
            $resultado = $resultObj->CelsiusToFahrenheitResult;
        }   
        else{
            $parametros['Fahrenheit']=$valor;
            $cliente = new SoapClient($servicio,$parametros);
            $resultObj = $cliente->FahrenheitToCelsius($parametros);
            $resultado = $resultObj->FahrenheitToCelsiusResult;
        }
        print("<br>La temperatura $valor".substr($temp,0,1)."es igual a: $resultado".substr($temp,3,1));
    }
?>
</body>
</html>