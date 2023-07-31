<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
	require '../clases/transaccion.class.php';

	$obj_tran=new transaccion;

	$accion=$_REQUEST["accion"];
	switch ($accion) {
		case 'deposito':
			$obj_tran->ide_cue_tran=$_POST["ide_cue_tran"];
			$obj_tran->des_tran=$_POST["des_tran"];
			$obj_tran->tip_tran=$_POST["tip_tran"];
			$obj_tran->obj_tran=$_POST["obj_tran"];
			$obj_tran->val_tran=$_POST["val_tran"];
			$obj_tran->des_inv=$_POST["des_inv"];
			$obj_tran->ide_ban_inv=$_POST["ide_ban_inv"];
			$obj_tran->val_inv=$_POST["val_inv"];
			$agrega2=$obj_tran->agregar_inventario();
			if ($agrega2==true) {
				$agregado=$obj_tran->agregar_deposito();
				if ($agregado==true) {
					$resultado=$obj_tran->sumar_saldo();
				}
			}
			if($resultado==true){
				echo "<div>
					<p>¡Operacion Completada!</p><br>
					<p>¿Desea Registrar Otro Deposito?</p><br>
					<a href='../vista/transaccion/agregar.php?accion=deposito'>Si</a><br>
					<a href='../index.php'>No</a>
			    </div>";
			}
			break;

		case 'retiro':
			$obj_tran->ide_cue_tran=$_POST["ide_cue_tran"];
			$obj_tran->des_tran=$_POST["des_tran"];
			$obj_tran->tip_tran=$_POST["tip_tran"];
			$obj_tran->val_tran=$_POST["val_tran"];
			$obj_tran->val_min_tran=$_POST["val_min_tran"];
			$agregado=$obj_tran->agregar_retiro();
			if ($agregado==true) {
				$resultado=$obj_tran->restar_saldo();
			}
			if($resultado==true){
				echo "<div>
					<p>¡Operacion Completada!</p><br>
					<p>¿Desea Registrar Otro retiro?</p><br>
					<a href='../vista/transaccion/agregar.php?accion=retiro&val_min_tran=$obj_tran->val_min_tran'>Si</a><br>
					<a href='../index.php'>No</a>
			    </div>";
			}
			break;
		
		default:
			echo "<div><p>Something Went Wrong ¯\_(ツ)_/¯</p></div><br>";
			echo "<div><a href='../index.php'>Regresar</a></div>";
			break;
	}
	?>
</body>
</html>