<?php
session_start();

if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

    $salt = substr($usuario, 0, 2);
    $clave_crypt = crypt($clave, $salt);

    require_once("class/usuarios.php");
    $obj_usuarios = new usuarios();
    $usuario_validado = $obj_usuarios->validar_usuario($usuario, $clave_crypt);

    // Verificar si $usuario_validado es un array y si tiene elementos
    if (is_array($usuario_validado) && count($usuario_validado) > 0) {
        $nfilas = $usuario_validado[0]['COUNT(*)']; // Suponiendo que COUNT(*) sea el nombre de la columna
    } else {
        $nfilas = 0;
    }

    if ($nfilas > 0) {
        $usuario_validado = $usuario;
        $_SESSION['usuario_valido'] = $usuario_validado;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        if(isset($_SESSION["usuario_valido"]))
        {    
    ?>
    <h1>GESTION DE NOTICIAS</h1>
    <?php
        }
        // intento fallido
        else if (isset($usuario)){
            print("<br><br>\n");
            print("<p ALIGN='CENTER'>Acceso no Autorizado</p>\n");
            print("<p ALIGN='CENTER'>[<a href='laboratorio14.1.php'>Conectar</a>]</p>\n");
        }
        // session no inciada
        else{
            print("<br><br>\n");
            print("<p class='parradocentrado'>Esta Zona tiene el acceso restringido<br>"."Para entrar debe identificarse</p>");
            print("<form action='laboratorio14.1.php'>\n");

            print("<p><label class='etiqueta-entrada'>Usuario</label></p>\n");

            print("<input type='text' name='usuario' size='15'></p>\n");
            print("<p><label class='etiqueta-entrada'>Contraseña</label></p>\n");
            print("<input type='password' name='clave' size='15'></p>\n");
            print("<input type='submit' value='entrar'></p>\n");
            print("</form>\n");
            print("<p class='parrafocentrado'>NOTA: si no dispone de la identificacion o tiene problemas"."para entrar <br> pongase en contacto con el"."<a href='MAILTO:webmaster@localhost'>Administrador</a>del sitio</p>");

            print("");
        }
    ?>
</body>
</html>