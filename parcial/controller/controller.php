<?php
session_start();

require_once('./model/usuario.php');


class Controller
{
    private $model;
    private $model2;
    private $resp;

    public function __CONSTRUCT()
    {
        $this->model = new Usuario();
        $this->model2 = new Usuario();
    }

    public function index()
    {
        require("php/login.php");
    }

    public function register()
    {
        require("php/register.php");
    }

    public function homeIngresar()
    {

        $listaUsuario = new Usuario();
        $listaUsuario = $this->model2->ObtenerTodosLosUsuarios();

        require("php/home.php");
    }

    public function guardar()
    {
        $usuario = new Usuario();
    
        $usuario->nombre = $_REQUEST['nombre'];
        $usuario->apellido = $_REQUEST['apellido'];
        $usuario->username = $_REQUEST['username'];
        $usuario->email = $_REQUEST['correo'];
    
        $password = $_POST['passwd'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $usuario->passwd = $hashedPassword;
        $usuario->role_id = 2;  
    
        $this->resp = $this->model->Registrar($usuario);
    
        if ($this->resp === "registro_exitoso") {
            // Redirigir al usuario a la página de login si el registro fue exitoso
            header('Location: /../php/login.php');
        } else {
            // Redirigir al usuario a otra página en caso de error, si es necesario
            header('Location: ?op=crear&msg=' . $this->resp);
        }
    }

    public function ingresar()
    {
        $ingresarUsuario = new Usuario();

        $ingresarUsuario->email = $_REQUEST['correo'];
        $ingresarUsuario->passwd = $_REQUEST['passwd'];

        // Obtén la contraseña almacenada desde la base de datos
        $storedPassword = $this->model->ObtenerContraseña($ingresarUsuario->email);

        if ($storedPassword && password_verify($ingresarUsuario->passwd, $storedPassword)) {
            // La contraseña es válida
            $resultado = $this->model->Consultar($ingresarUsuario);

            $_SESSION["acceso"] = true;
            $_SESSION["id"] = $resultado->id;
            $_SESSION["user"] = $resultado->nombre . " " . $resultado->apellido;
            header('Location: ?op=permitido');
        } else {
            header('Location: ?op=login&msg=Su contraseña o usuario está incorrecto');
        }
    }
}
