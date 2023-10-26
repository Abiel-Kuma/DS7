<?php
 require_once('config.php');
 
 class modeloCedemcialesBD{
  protected $_db;
 
  public function __construct(){
    $this -> _db = new mysqli(db_HOST, db_USER, db_PASS, db_NAME);
    if($this -> _db->connect_errno){
      echo "Fallo al conectar a la base de datos: (" . $this -> _db->connect_errno . ") " . $this -> _db->connect_error;
      return;
    }
  }
 }

?>