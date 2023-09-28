<?php
include("class_lib.php");

$obj = new MyCloneable();
$obj->object1 = new SubObject();
$obj->object2 = new SubObject();
$obj2 = clone $obj;

echo "Original Object: ";
print_r($obj);
echo "<br>Cloned Object: ";
print_r($obj2);
?>
