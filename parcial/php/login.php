<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="./css/login.css">


</head>

<body>
    <div class="container-all">
        <div class="ctn-form">
            <h1 class="title">Inicio de sesion</h1>
            <form name="formulario" method="POST" action="">
                <label for="">Email</label>
                <input type="email" name="Correo" placeholder="Correo" autocomplete="username" required>
                <label for="">Contraseña</label>
                <input type="password" name="passwd" placeholder="Contraseña" required>
                <input type="submit" name="" id="" value="Iniciar Sesión">
            </form>
            <span class="text-footer">¿No te has registrado?
                <a href="?op=crear">Registrate</a></span>
        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-descripcion">Sea Bienvenido</h1>
            <p class="text-descripçion">Este es un pequeño sitio web realizado por los estudiantes Luigi Yau y Claudio
                Wilkey.
                Sientase libre de explorar. </p>
        </div>
    </div>

    <footer>
        <h2>&copy; 2023, Luigi Yau 8-977-714, Claudio Wilkey 8-991-627, 1LS132</h2>
    </footer>

</body>

</html>