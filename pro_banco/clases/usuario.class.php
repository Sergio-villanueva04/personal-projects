<?php
require "utilidad.class.php";

class usuario extends utilidad{

	public $cod_usu;
    public $ide_ban_usu;
	public $ide_usu;
	public $raz_usu;
	public $dir_usu;
    public $ema_usu;
	public $tel_usu;
	public $est_usu;

	public function agregar(){
		$this->sql="insert into usuario(ide_ban_usu, ide_usu, raz_usu, dir_usu, ema_usu, tel_usu, est_usu)
		values($this->ide_ban_usu,
               '$this->ide_usu',
			   '$this->raz_usu',
			   '$this->dir_usu',
               '$this->ema_usu',
			   '$this->tel_usu',
			   '$this->est_usu')";
		$this->ejecutar();
		$filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function editar(){
		$this->sql = "update usuario set ide_ban_usu=$this->ide_ban_usu, ide_usu='$this->ide_usu', raz_usu='$this->raz_usu', dir_usu='$this->dir_usu', ema_usu='$this->ema_usu', tel_usu='$this->tel_usu', est_usu='$this->est_usu' where cod_usu='$this->cod_usu'";

		$this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        $filas_afectadas=$this->filas_afectadas();

        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function listar()
    {
        $this->sql = "SELECT DISTINCT usu.*, ban.ide_ban, ban.cod_ban, ban.nom_ban FROM banco ban, usuario usu INNER JOIN cuenta_banco ON cuenta_banco.ide_usu=usu.cod_usu WHERE ban.ide_ban=usu.ide_ban_usu AND usu.est_usu='A' AND ban.est_ban='A'";

        ////echo "SQL de la Función Listar = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function list_banco(){
        $this->sql="select * from banco where est_ban='A'";

        $resultado=$this->ejecutar();
        return $resultado;
    }

    public function listar_cuenta(){
        $this->sql="SELECT tip.tip_cue, cue.cod_cue_ban, cue.ide_cue, cue.ide_usu, cue.tip_cue_ban FROM tipo_cuenta tip, cuenta_banco cue INNER JOIN usuario usu on cue.ide_usu=usu.cod_usu where cue.ide_usu=$this->cod_usu and tip.ide_tip_cue=cue.tip_cue_ban and cue.est_cue='A'";

        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function borrar()
    {
        $this->sql = "delete from usuario where cod_usu='$this->cod_usu'";

        //echo "SQL de la Función Borrar = " . $this->sql;
        $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        $filas_afectadas=$this->filas_afectadas();
        if($filas_afectadas>0){
            return true;
        }else{
            return false;
        }
	}

	public function borrado_logico()
    {
        $this->sql = "update usuario set est_usu='I' where cod_usu='$this->cod_usu'";

        //echo "SQL de la Función Borrado Lógico = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function buscar()
    {
        $this->sql="select * from usuario where cod_usu = $this->cod_usu";
        $pun_usu=$this->ejecutar();
        return $pun_usu;
    }

    public function buscar2(){
        $this->sql="SELECT usu.cod_usu, usu.ide_ban_usu, usu.ide_usu, usu.raz_usu, usu.dir_usu, usu.ema_usu, usu.tel_usu FROM usuario usu WHERE usu.ide_usu='$this->ide_usu' and est_usu='A'";

        $resultado=$this->ejecutar();

        if (mysqli_num_rows($resultado)==1) {
            $fila=$this->extraer_dato($resultado);

            if ($fila["ide_usu"]==$this->ide_usu) {
                return $fila;
            }
        }
    }
}