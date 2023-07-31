<?php
require 'utilidad.class.php';

/**
 * 
 */
class cuenta_banco extends utilidad
{
	
	public $ide_cue;
	public $ide_usu;
	public $ide_ban;
	public $tip_cue_ban;
	public $cod_cue_ban;
	public $sal_cue;
	public $est_cue;
	public $objeto;

	public function agregar(){
		$this->sql="INSERT INTO cuenta_banco(ide_usu, tip_cue_ban, cod_cue_ban, sal_cue, est_cue)
		VALUES ('$this->ide_usu',
		'$this->tip_cue_ban',
		'$this->cod_cue_ban',
		'$this->sal_cue',
		'$this->est_cue')";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function editar(){

		$this->sql="UPDATE cuenta_banco cue SET cue.ide_usu=$this->ide_usu, cue.tip_cue_ban=$this->tip_cue_ban, cue.cod_cue_ban='$this->cod_cue_ban', cue.est_cue='$this->est_cue' WHERE cue.ide_cue=$this->ide_cue";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		$this->sql="SELECT DISTINCT cue.ide_cue, ban.ide_ban, ban.nom_ban, cue.ide_usu, usu.cod_usu, usu.raz_usu, cue.tip_cue_ban, tipo.ide_tip_cue, tipo.tip_cue, cue.cod_cue_ban, cue.sal_cue, cue.est_cue from banco ban, usuario usu, tipo_cuenta tipo, cuenta_banco cue where cue.est_cue='A' and cue.ide_usu=usu.cod_usu and cue.tip_cue_ban=tipo.ide_tip_cue and usu.est_usu='A' and ban.ide_ban=usu.ide_ban_usu ORDER BY usu.cod_usu";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function list_banco(){
		$this->sql="select * from banco where est_ban='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function list_usuario(){
		$this->sql="select * from usuario where est_usu='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function list_tipo_cuenta(){
		$this->sql="select * from tipo_cuenta where est_tip_cue='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function buscar_usuario(){
		$this->sql="SELECT usu.cod_usu, usu.raz_usu, usu.ide_usu FROM usuario usu WHERE usu.cod_usu='$this->ide_usu'";

		$pun_cue=$this->ejecutar();
        return $pun_cue;
	}

	public function buscar(){
		$this->sql="SELECT DISTINCT cue.*, usu.raz_usu, ban.nom_ban FROM banco ban, cuenta_banco cue INNER JOIN usuario usu ON cue.ide_usu=usu.cod_usu WHERE ban.est_ban='A' AND cue.est_cue='A' AND usu.est_usu='A' AND cue.ide_cue=$this->ide_cue AND usu.ide_ban_usu=ban.ide_ban AND usu.ide_ban_usu=$this->ide_ban";

		$pun_cue=$this->ejecutar();
        return $pun_cue;
	}

	public function buscar2(){
		$this->sql="SELECT DISTINCT cue.*, usu.raz_usu, ban.nom_ban FROM banco ban, cuenta_banco cue INNER JOIN usuario usu ON cue.ide_usu=usu.cod_usu WHERE ban.est_ban='A' AND cue.est_cue='A' AND usu.est_usu='A' AND cue.ide_cue=$this->ide_cue AND usu.ide_ban_usu=ban.ide_ban";

		$pun_cue=$this->ejecutar();
        return $pun_cue;
	}

	public function borrar(){
		$this->sql="DELETE FROM cuenta_banco WHERE ide_cue='$this->ide_cue'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function borrado_logico(){
		$this->sql="UPDATE cuenta_banco SET est_cue='I' WHERE ide_cue='$this->ide_cue'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function listar_tran(){
		$this->sql="SELECT tran.* FROM transaccion tran WHERE tran.ide_cue_tran=$this->ide_cue";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function listar_objeto(){
		$this->sql="SELECT pre.ide_pre, pre.ide_mar_pre, mar.nom_mar, pre.des_pre FROM presentacion pre INNER JOIN marca mar ON mar.ide_mar=pre.ide_mar_pre ORDER BY pre.ide_mar_pre, pre.des_pre";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function con_numero(){
		$this->sql="SELECT tran.*, count(tran.obj_tran) as numero FROM transaccion tran WHERE tran.ide_cue_tran=$this->ide_cue AND tran.obj_tran='$this->objeto'";

		$resultado=$this->ejecutar();
		return $resultado;
	}
}
?>