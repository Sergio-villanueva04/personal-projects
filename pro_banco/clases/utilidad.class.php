<?php
class utilidad
{
	
	public $sql;
	public $mysqli;
	private $servidor = "localhost";
	private $usuario = "root";
	private $clave = "";
	private $base_datos = "pro_banco";

	public function __construct(){
		$this->conectar();
	}

	public function conectar(){
		$this->mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base_datos);
	}

	public function ejecutar(){
		return $this->mysqli->query($this->sql);
	}

	public function extraer_dato($punt){//inicio de funcion
    	return $punt->fetch_assoc();
	}//fin de la funcion extraer dato

	public function filas_afectadas(){//funcion utilizada para revisar cuantas filas fueron afectadas
    	return $this->mysqli->affected_rows;
	}
}
?>
