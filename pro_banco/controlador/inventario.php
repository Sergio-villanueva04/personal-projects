<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
	require '../clases/inventario.class.php';

	$obj_inv=new inventario;

	$accion=$_REQUEST["accion"];
	switch ($accion) {
		case 'retirar':
			$obj_inv->num_ret=$_POST["num_ret"];
			$obj_inv->des_inv=$_POST["des_inv"];
			$obj_inv->ide_ban_inv=$_POST["ide_ban"];
			$ide_ban=$_POST["ide_ban"];
			$nom_ban=$_POST["nom_ban"];
			$retirado=$obj_inv->retirar_obj();
			if ($retirado==true) {
				echo "<div>
					<p>¡Operacion Completada!</p><br>
					<p>¿Desea Realizar Otro retiro?</p><br>
					<a href='../vista/inventario/listar2.php?nom_ban=$nom_ban&ide_ban=$ide_ban'>Si</a><br>
					<a href='../vista/inventario/listar.php'>No</a>
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