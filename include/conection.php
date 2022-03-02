<?php
class Conexion {
    private $cn=null;
    public function getConexion(){
    try{
        $cadena='mysql:host=localhost;dbname=entregable';
		    $this->cn = new PDO($cadena,'root','');
        $this->cn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
        return $this->cn;
    } catch(PDOException $ex){
            echo 'Error en la conexion - '.$ex->getMessage();
    }
    }    
}
