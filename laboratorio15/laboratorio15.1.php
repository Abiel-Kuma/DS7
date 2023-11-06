<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de JQUERY</title>
    <link type="text/css" rel="stylesheet" href="jquery.dataTables.min.css">
    <link type="text/javascript" languaje="javascript" src="librerias/jquery-3.1.1.js">
    <link type="text/javascript" languaje="javascript" src="librerias/jquery.dataTables.min.js">
</head>
<body>
<h1>consultar noticias</h1>
<form NAME= "formFiltro" METHOD= "POST" ACTION= "laboratorio15.1.php">
<BR/>
filtrar por <SELECT NAME= "campos">
    <OPTION VALUE= "titulo">titulo
    <OPTION VALUE= "texto">texto
    <OPTION VALUE= "categoria">categoria
</SELECT>
con el valor
<input type= "text" name= "valor">
<input name="consultarFiltro" value= "filtrar datos" type= "submit">
<input name="consultarTodos" value="ver todos" type="submit">
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#grid').DataTable({
            "lengthMenu":[5,10,20,50],
            "order":[[0,"asc"]],
            "language":{
                "lengthMenu":"Mostrar _MENU_ registros por pagina",
                "zeroRecords":"No existen resultados en su busqueda",
                "info":"",
                "infoEmpty":"",
                "InfoFiltered":"",
                "search":"",
                "paginate":{
                    "first":"primero",
                    "last":"ultimo",
                    "next":"siguiente",
                    "previus":"anterior"
                },
            }
        });
        $(".").css("font-family","arial").css("font-size","12px");
    })
</script>
<?php
    require_once "Class/noticias.php";
    $obj_noticia = new noticia();
    $noticias = $obj_noticia->consultarNoticias();

    if (array_key_exists('consultarTodos', $_POST)) {
        $noticias_new = $obj_noticia->consultarNoticias();
    }

    if (array_key_exists('consultarFiltro', $_POST)) {
        $noticias = $obj_noticia->consultar_noticia_filtro($_REQUEST['campos'], $_REQUEST['valor']);
    }

    if ($noticias === null) {
        $nfilas = 0;
    } else {
        $nfilas = count($noticias);
    }

    if ($nfilas > 0) {
        // Display the table with results
    } else {
        print("<p>No hay noticias disponibles</p>");
    }


    if ($nfilas > 0){
        print ("<TABLE id='grid' class='display' cellspacing='0'>\n");
        print ("<THEAD>\n");
        print ("<TBODY>\n");
        print ("<TR>\n");
        
        for ($i=0; $i<$nfilas;$i++){
            print ("</TBODY>\n");
            print ("</THEAD>\n");
        }
    print ("</TABLE>\n");

}else{
    print ("<p>No hay noticias disponibles</p>");
}

?>

</body>
</html>