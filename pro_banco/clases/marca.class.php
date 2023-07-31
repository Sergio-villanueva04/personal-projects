<?php
require "utilidad.class.php";

class marca extends utilidad{
	
	public $ide_mar;
	public $nom_mar;
	public $est_mar;

	public function agregar(){
		$this->sql="INSERT INTO marca(nom_mar, est_mar) VALUES ('$this->nom_mar', '$this->est_mar')";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function editar(){
		$this->sql="UPDATE marca SET nom_mar='$this->nom_mar',est_mar='$this->est_mar' WHERE ide_mar=$this->ide_mar";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function listar(){
		$this->sql="SELECT * FROM marca WHERE est_mar='A'";

		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function list_pre(){
		$this->sql="SELECT pre.*, mar.ide_mar FROM presentacion pre INNER JOIN marca mar ON pre.ide_mar_pre=mar.ide_mar WHERE pre.est_pre='A' and mar.est_mar='A' and mar.ide_mar=$this->ide_mar GROUP BY pre.des_pre";
		
		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function buscar(){
		$this->sql="SELECT ide_mar, nom_mar, est_mar FROM marca WHERE ide_mar=$this->ide_mar";

		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function borrado_logico(){
		$this->sql="UPDATE marca SET est_mar='I' WHERE ide_mar=$this->ide_mar";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function borrar(){
		$this->sql="DELETE FROM marca WHERE ide_mar=$this->ide_mar";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}
}
?>