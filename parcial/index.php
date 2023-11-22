<?php
require_once 'model/db.php';
require("./controller/controller.php");

//Instancio el controlador
$controller = new Controller;
if (isset($_GET['op'])) {
    $opcion = $_GET['op'];

    if ($opcion == "crear") {
        $controller->register();
    } else if ($opcion == "registrar") {
        $controller->guardar();
    } elseif ($opcion == "acceder") {
        $controller->ingresar();
    } elseif ($opcion == "permitido") {
        $controller->homeIngresar();
    } else {
        $controller->Index();
    }
} else {
    $controller->Index();
}
