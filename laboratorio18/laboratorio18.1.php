<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form method="post" action="laboratorio18.2.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$"><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required pattern="^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$"><br>

        <label for="repetir_contrasena">Repetir Contraseña:</label>
        <input type="password" name="repetir_contrasena" required><br>

        <label for="ip">IP actual del equipo:</label>
        <input type="text" name="ip" required pattern="^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" + "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$"><br>

        <input type="submit" name="registrar" value="Registrar Usuario">
    </form>
</body>
</html>
