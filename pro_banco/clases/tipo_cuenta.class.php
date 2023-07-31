<?php
require("utilidad.class.php");

/**
 * 
 */
class tipo_cuenta extends utilidad
{
	
	public $ide_tip_cue;
	public $tip_cue;
	public $cod_tip_cue;
	public $est_tip_cue;

	public function agregar()
	{
		$this->sql="INSERT INTO tipo_cuenta(tip_cue, cod_tip_cue, est_tip_cue) VALUES ('$this->tip_cue', '$this->cod_tip_cue','$this->est_tip_cue')";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function editar(){
		$this->sql="UPDATE tipo_cuenta SET tip_cue='$this->tip_cue', cod_tip_cue='$this->cod_tip_cue', est_tip_cue='$this->est_tip_cue' WHERE ide_tip_cue='$this->ide_tip_cue'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function listar(){
		$this->sql="select * from tipo_cuenta where est_tip_cue='A'";

		$resultado=$this->ejecutar();

		return $resultado;
	}

	public function borrar(){
		$this->sql="DELETE FROM tipo_cuenta WHERE ide_tip_cue='$this->ide_tip_cue'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function borrado_logico(){
		$this->sql="UPDATE tipo_cuenta SET est_tip_cue='I' WHERE ide_tip_cue='$this->ide_tip_cue'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function buscar(){
		$this->sql="SELECT * FROM tipo_cuenta WHERE ide_tip_cue='$this->ide_tip_cue' and est_tip_cue='A'";

		$resultado=$this->ejecutar();

		return $resultado;
	}
}
?>