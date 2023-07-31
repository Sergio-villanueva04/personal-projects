<?php
require 'utilidad.class.php';

class transaccion extends utilidad
{

	public $ide_tran;
	public $ide_cue_tran;
	public $des_tran;
	public $tip_tran;
	public $obj_tran;
	public $val_tran;
	public $saldo;
	public $val_min_tran;
	public $des_inv;
	public $ide_ban_inv;
	public $val_inv;
	public $est_inv='A';
	
	public function agregar_deposito(){
		$this->sql="INSERT INTO transaccion(ide_cue_tran, des_tran, tip_tran, obj_tran, val_dep_tran) VALUES ($this->ide_cue_tran, '$this->des_tran', '$this->tip_tran', '$this->obj_tran', $this->val_tran)";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function agregar_retiro(){
		$this->sql="INSERT INTO transaccion(ide_cue_tran, des_tran, tip_tran, val_ret_tran) VALUES ($this->ide_cue_tran, '$this->des_tran', '$this->tip_tran', $this->val_tran)";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function agregar_inventario(){
		$this->sql="INSERT INTO inventario(des_inv, ide_ban_inv, val_inv, est_inv) VALUES ('$this->des_inv', $this->ide_ban_inv, $this->val_inv, '$this->est_inv')";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function sumar_saldo(){
		$this->sql="SELECT cue.ide_cue, cue.sal_cue FROM cuenta_banco cue INNER JOIN transaccion tran ON cue.ide_cue=tran.ide_cue_tran WHERE cue.est_cue='A' and cue.ide_cue=$this->ide_cue_tran";

		$fila=$this->ejecutar();

		$dato=$this->extraer_dato($fila);

		$this->saldo=$dato["sal_cue"]+$this->val_tran;

		$this->sql="UPDATE cuenta_banco cue SET cue.sal_cue=$this->saldo WHERE cue.ide_cue=$this->ide_cue_tran AND cue.est_cue='A'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function restar_saldo(){
		$this->sql="SELECT cue.ide_cue, cue.sal_cue FROM cuenta_banco cue INNER JOIN transaccion tran ON cue.ide_cue=tran.ide_cue_tran WHERE cue.est_cue='A' and cue.ide_cue=$this->ide_cue_tran";

		$fila=$this->ejecutar();

		$dato=$this->extraer_dato($fila);

		$this->saldo=$dato["sal_cue"]-$this->val_tran;

		$this->sql="UPDATE cuenta_banco cue SET cue.sal_cue=$this->saldo WHERE cue.ide_cue=$this->ide_cue_tran AND cue.est_cue='A'";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		$this->sql="SELECT * FROM transaccion";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function listar_by_cuenta(){
		$this->sql="SELECT * FROM transaccion WHERE ide_cue_tran=$this->ide_cue_tran";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function list_cuenta_deposito(){
		$this->sql="SELECT cue.ide_cue, cue.ide_usu, usu.ide_ban_usu, usu.raz_usu, cue.tip_cue_ban, cue.cod_cue_ban FROM cuenta_banco cue INNER JOIN usuario usu ON cue.ide_usu=usu.cod_usu WHERE cue.est_cue='A' and usu.est_usu='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function list_cuenta_retiro(){
		$this->sql="SELECT cue.ide_cue, cue.ide_usu, usu.ide_ban_usu, usu.raz_usu, cue.tip_cue_ban, cue.cod_cue_ban FROM cuenta_banco cue INNER JOIN usuario usu ON cue.ide_usu=usu.cod_usu WHERE cue.sal_cue>=$this->val_min_tran and cue.est_cue='A'and usu.est_usu='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function listar_objeto(){
		$this->sql="SELECT pre.ide_pre, pre.ide_mar_pre, mar.nom_mar, pre.des_pre FROM presentacion pre INNER JOIN marca mar ON mar.ide_mar=pre.ide_mar_pre WHERE pre.est_pre='A' and mar.est_mar='A' ORDER BY pre.ide_mar_pre, pre.des_pre";

		$resultado=$this->ejecutar();
		return $resultado;
	}
}
?>