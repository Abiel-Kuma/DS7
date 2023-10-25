<?php
require_once('modelo.php');

class noticia extends modeloCredencialesBD{
    protected $titulo;
    protected $texto;
    protected $imagen;
    protected $categoria;
    protected $fecha;

    public function __construct(){
        parent::__construct();
    }

    public function consultarNoticias(){
        $instruccion = "CALL sp_consultar_noticias()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }
        else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }

    }

    public function consultar_noticia_filtro($campo, $valor){
        $instruccion = "CALL sp_consultar_noticia_filtro('$campo', '$valor')";
        
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            return $resultado;
            $resultado->close();
            $this->_db->close();
            
        }
    }
}
?>