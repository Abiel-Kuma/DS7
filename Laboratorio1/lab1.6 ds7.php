<html>
<head>
<title>laboratorio 1.6</title>
</head>
<body>
<?php
define ( 'TAM', 4);
function potencia ($vl, $v2)
{
$rdo= pow($vl, $v2);
return $rdo;
}

echo "<table border=1>";
for ($nl=1; $n1<=TAM; $nl++)
{
echo "<tr>";
for ($n2=1; $n2<=TAM; $n2++)
echo "<td>"; .potencia($n1,$n2). "</td>";
echo "</tr>";
}
echo "</table>";
?>

</body>
</html>
