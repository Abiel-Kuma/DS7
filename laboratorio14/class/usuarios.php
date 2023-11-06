<?php

require_once('db_models.php');

class usuarios extends modelsCredentials{
    public function __construct()
    {
        parent::__construct();
    }
    public function validar_usuario($usr, $pwd){
        $instruccion = "CALL sp_validar_usuario('" . $usr . "', '" . $pwd . "')";
        $consulta = $this->_db->query($instruccion);
        if ($consulta) {
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();  
            $this->_db->close(); 
            return $resultado;
        } else {
            return false;
        }
    }
}
?>
