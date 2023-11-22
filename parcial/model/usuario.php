<?php
require_once ('db.php');

class Usuario
{
	private $pdo;
	private $msg;

	public $id;
	public $nombre;
	public $apellido;
	public $username;
	public $email;
	public $passwd;
	public $role_id;


	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Db::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Registrar(usuario $data)
	{
		try {
			$sql = "INSERT INTO usuario (nombre,apellido,username,email,passwd,role_id) 
		        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->nombre,
						$data->apellido,
						$data->username,
						$data->email,
						$data->passwd,
						$data->role_id
					)
				);
			echo "Registro exitoso.<br>";
			$this->msg = "Su registro se ha guardado exitosamente!&t=text-success";
		} catch (Exception $e) {
			if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
				echo "Error: El correo electrónico ya está registrado en el sistema.<br>";
				$this->msg = "Correo electrónico ya está registrado en el sistema&t=text-danger";
			} else {
				echo "Error al guardar los datos: " . $e->getMessage() . "<br>";
				$this->msg = "Error al guardar los datos&t=text-danger";
			}
		}
		return $this->msg;
	}

	public function ObtenerContraseña($email)
	{
		try {
			$stm = $this->pdo->prepare("SELECT passwd FROM usuario WHERE email = ?");
			$stm->execute(array($email));
			$result = $stm->fetch(PDO::FETCH_ASSOC);
			return $result['passwd'];
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	//AGREGADO
	public function Consultar(usuario $data)
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE email = ? AND passwd=?");
			$stm->execute(array($data->email, $data->passwd));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM usuario WHERE id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerTodosLosUsuarios()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM usuario");

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
