<?php
require("utilidad.class.php");

/**
 * 
 */
class banco extends utilidad{

	public $ide_ban;
	public $nom_ban;
	public $cod_ban;
	public $est_ban;

	 public function agregar(){
		$this->sql="INSERT INTO banco(nom_ban, cod_ban, est_ban) VALUES ('$this->nom_ban', $this->cod_ban, '$this->est_ban')";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function editar(){
		$this->sql="UPDATE banco SET nom_ban='$this->nom_ban', cod_ban=$this->cod_ban, est_ban='$this->est_ban' WHERE ide_ban='$this->ide_ban'";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function borrar(){
		$this->sql="DELETE FROM banco WHERE ide_ban='$this->ide_ban'";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function borrado_logico(){
		$this->sql="UPDATE banco SET est_ban='I' WHERE ide_ban='$this->ide_ban'";

		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function listar(){
		$this->sql="SELECT DISTINCT ban.ide_ban, ban.nom_ban, ban.cod_ban, ban.est_ban FROM banco ban WHERE ban.est_ban='A'";

		$resultado = $this->ejecutar();
		return $resultado;
	}

	public function buscar(){
		$this->sql="SELECT * FROM banco WHERE ide_ban='$this->ide_ban'";

		$pun_ban=$this->ejecutar();
        return $pun_ban;
	}

	public function listar_cuenta(){
		$this->sql="SELECT DISTINCT cue.ide_cue, ban.ide_ban, ban.nom_ban, cue.ide_usu, usu.cod_usu, usu.raz_usu, cue.tip_cue_ban, tipo.ide_tip_cue, tipo.tip_cue, cue.cod_cue_ban, cue.sal_cue, cue.est_cue from banco ban, usuario usu, tipo_cuenta tipo, cuenta_banco cue where cue.est_cue='A' and cue.ide_usu=usu.cod_usu and cue.tip_cue_ban=tipo.ide_tip_cue and usu.est_usu='A' and ban.ide_ban=usu.ide_ban_usu and ban.ide_ban=$this->ide_ban ORDER BY usu.cod_usu";

		$resultado=$this->ejecutar();
		return $resultado;
	}
}
?>