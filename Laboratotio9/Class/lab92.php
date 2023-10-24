<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laboratorio9.2</title>
</head>
<body>
<h1>consultar noticias</h1>
<form NAME= "formFiltro" METHOD= "POST" ACTION= "lab92.php">
<BR/>
filtrar por <SELECT NAME= "campos">
    <OPTION VALUE= "titulo">titulo
    <OPTION VALUE= "texto">texto
    <OPTION VALUE= "categoria">categoria
</SELECT>
con el valor
<input type= "text" name= "valor">
<input name="consultarFiltro" value= "filtrar datos" type= "submit">
<input name= "consultarTodo" value= "ver todos" type= "submit">
</form>

<?php
    require_once "class/noticia.php";
    $obj_noticia = new noticia();
    $noticias = $obj_noticia -> consultar_noticias();
    if (array_key_exists('consultarTodos',$_POST)){
        $obj_noticia - new noticia();
        $noticias_new = $obj_noticia -> consultar_noticias();        
    }

    if (array_key_exists('consultarFiltro',$_POST)){
        $obj_noticia - new noticia();
        $noticias = $obj_noticia -> consultar_noticias($_REQUEST['campos'],$_REQUEST['valor']);
    }


    $nfilas = count($noticias);

    if ($nfilas > 0){
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<TH>Titulo</TH>\n");
        print ("<TH>Texto</TH>\n");
        print ("<TH>Categoria</TH>\n");
        print ("<TH>Fecha</TH>\n");
        print ("<TH>Imagen</TH>\n");
        print ("</TR>\n");
        
        foreach ($noticias as $resultado){
            
        print ("<TR>\n");
        print ("<TD>" . $resultado['titulo'] . "</TD>\n");
        print ("<TD>" . $resultado['texto'] . "</TD>\n");
        print ("<TD>" . $resultado['categoria'] . "</TD>\n");
        print ("<TD>" . date("j/n/y", strtotime($resultado['fecha'])) . "</TD>\n");

        if($resultado ['imagen'] != ""){
            print ("<TD><A Target='_blank' HREF='img/".$resultado ['imagen']. "'><IMG BORDER='0' SRC= 'img/iconotexto.gif></A></TD>\n'");
        } else{
            print ("<TD>&nbsp;</TD>\n");
        }
        print ("</TR>\n");

    }
    print ("</TABLE>\n");

}else{
    print ("<p>No hay noticias disponibles</p>");
}

?>

</body>
</html>