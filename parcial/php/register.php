<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="container-all">
        <div class="ctn-form">
            <h1 class="title">Regístrate</h1>
            <form name="formulario" method="POST" action="./controller/controller.php">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="Nombre" placeholder="Nombre" required>
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="Apellido" placeholder="Apellido" required>
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="Username" placeholder="Nombre de usuario" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="Correo" placeholder="Correo" required>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="passwd" placeholder="Contraseña" required>
                <label for="repassword">Confirmar Contraseña</label>
                <input type="password" id="repassword" name="confirm_passwd" placeholder="Confirmar contraseña">
                
                <input type="submit" value="Registrar">
            </form>
            <span class="text-footer">¿Ya eres Usuario?
                <a href="?op=login">Inicia Sesión</a></span>
        </div>
        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-descripcion">Sea Bienvenido</h1>
            <p class="text-descripcion">Regístrate en el sitio web, proporciona tu Nombre, Apellido, Correo electrónico
                y una Contraseña</p>
        </div>
    </div>
    <footer>
        <h2>&copy; 2023, Luigi Yau 8-977-714, Claudio Wilkey 8-991-627, 1LS132</h2>
    </footer>
</body>
</html>
