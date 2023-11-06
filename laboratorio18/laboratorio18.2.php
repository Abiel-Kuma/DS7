<?php
function verificar_email($email)
{
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        return true;
    }
    return false;
}

function verificar_password_strength($password)
{
    if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)) {
        return true;
    }
    return false;
}

function verificar_ip($ip)
{
    return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" .
        "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $repetir_contrasena = $_POST["repetir_contrasena"];
    $ip = $_POST["ip"];

    $errores = array();

    if (empty($nombre) || empty($apellido) || empty($email) || empty($contrasena) || empty($repetir_contrasena) || empty($ip)) {
        $errores[] = "Todos los campos son requeridos.";
    }

    if (!verificar_email($email)) {
        $errores[] = "El email no es válido.";
    }

    if ($contrasena !== $repetir_contrasena) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    if (!verificar_password_strength($contrasena)) {
        $errores[] = "La contraseña no es segura.";
    }

    if (!verificar_ip($ip)) {
        $errores[] = "La dirección IP no es válida.";
    }

    if (empty($errores)) {
        echo "Usuario registrado exitosamente.";
    } else {
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
}
?>
