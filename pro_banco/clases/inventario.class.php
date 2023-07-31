<?php
require 'utilidad.class.php';

class inventario extends utilidad
{
	
	public $ide_inv;
	public $des_inv;
	public $ide_ban_inv;
	public $ide_ban;
	public $val_inv;
	public $est_inv;
	public $objeto;
	public $num_ret;

	public function listar_inst()
	{
		$this->sql="SELECT ban.* FROM banco ban WHERE ban.est_ban='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function buscar_inst()
	{
		$this->sql="SELECT ban.* FROM banco ban WHERE ban.est_ban='A' and ban.ide_ban=$this->ide_ban";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function listar_obj(){
		$this->sql="SELECT pre.ide_pre, pre.ide_mar_pre, mar.nom_mar, pre.des_pre FROM presentacion pre INNER JOIN marca mar ON mar.ide_mar=pre.ide_mar_pre ORDER BY pre.ide_mar_pre, pre.des_pre";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function con_numero(){
		$this->sql="SELECT inv.*, count(inv.des_inv) as numero FROM inventario inv WHERE inv.ide_ban_inv=$this->ide_ban_inv AND inv.des_inv='$this->objeto' AND inv.est_inv='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function con_numero_total(){
		$this->sql="SELECT inv.*, count(inv.des_inv) as numero FROM inventario inv WHERE inv.des_inv='$this->objeto' AND inv.est_inv='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function total_institucion(){
		$this->sql="SELECT sum(inv.val_inv) as total FROM inventario inv WHERE inv.ide_ban_inv=$this->ide_ban_inv AND inv.est_inv='A'";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function listar_by_inst(){
		$this->sql="SELECT inv.* FROM inventario inv WHERE inv.est_inv='A' AND inv.ide_ban_inv=$this->ide_ban_inv";

		$resultado=$this->ejecutar();
		return $resultado;
	}

	public function retirar_obj(){
		$this->sql="UPDATE inventario inv SET inv.est_inv='R' WHERE inv.ide_ban_inv=$this->ide_ban_inv AND inv.des_inv='$this->des_inv' ORDER BY RAND() limit $this->num_ret";

		$this->ejecutar();

		$filas_afectadas=$this->filas_afectadas();
		if ($filas_afectadas>0) {
			return true;
		}else{
			return false;
		}
	}
}
?>