<?php
require_once('modelo.php');

class noticia extends modeloCedencialesBD{
    protected $titulo;
    protected $texto;
    protected $imagen;
    protected $categoria;
    protected $fecha;

    public function __construct(){
        parent::__construct();
    }

    public function consultarNoticias() {
        $instruccion = "CALL sp_consultar_noticias()";
        $consulta = $this->_db->query($instruccion);
        
        if (!$consulta) {
            echo "Fallo al consultar las noticias";
            return null; // You can return null to indicate the failure.
        }
    
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
        $this->_db->close();
    
        return $resultado;
    }    

    public function consultar_noticia_filtro($campo, $valor) {
        $instruccion = "CALL sp_consultar_noticia_filtro('$campo', '$valor')";
        $consulta = $this->_db->query($instruccion);
    
        if (!$consulta) {
            echo "Fallo al consultar las noticias";
            return null;
        }
    
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
        $this->_db->close();
    
        if ($resultado === null) {
            return array(); // Return an empty array to prevent the count() error.
        }
    
        return $resultado;
    }
    
}
?>