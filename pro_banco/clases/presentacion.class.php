<?php
require "utilidad.class.php";

class presentacion extends utilidad{
	
	public $ide_pre;
	public $ide_mar_pre;
	public $des_pre;
	public $est_pre;

	public function agregar(){
		$this->sql="INSERT INTO presentacion(ide_mar_pre, des_pre, est_pre) VALUES ($this->ide_mar_pre, '$this->des_pre', '$this->est_pre')";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function editar(){
		$this->sql="UPDATE presentacion SET des_pre='$this->des_pre' WHERE ide_pre=$this->ide_pre";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function listar(){
		$this->sql="SELECT pre.* FROM presentacion pre WHERE pre.est_pre='A'";

		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function listar2(){
		$this->sql="SELECT pre.* FROM presentacion pre WHERE pre.est_pre='A' and pre.ide_mar_pre=$this->ide_mar_pre GROUP BY pre.des_pre";

		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function buscar(){
		$this->sql="SELECT pre.* FROM presentacion pre WHERE pre.est_pre='A' and pre.ide_pre=$this->ide_pre";

		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function list_marca(){
		$this->sql="SELECT mar.* FROM marca mar WHERE mar.est_mar='A'";

		$resultado = $this->ejecutar();
        return $resultado;
	}

	public function borrado_logico(){
		$this->sql="UPDATE presentacion SET est_pre='I' WHERE ide_pre=$this->ide_pre";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function borrar(){
		$this->sql="DELETE FROM presentacion WHERE ide_pre=$this->ide_pre";

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