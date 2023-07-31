<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
	require '../clases/presentacion.class.php';

	$obj_pre=new presentacion;

	$accion=$_REQUEST["accion"];

	switch ($accion) {
		case 'agregar':
			$obj_pre->ide_mar_pre=$_POST["ide_mar_pre"];
			$obj_pre->des_pre=$_POST["des_pre"];
			$obj_pre->est_pre=$_POST["est_pre"];
			$resultado=$obj_pre->agregar();
			break;

		case 'editar':
			$obj_pre->ide_pre=$_POST["ide_pre"];
			$obj_pre->des_pre=$_POST["des_pre"];
			$resultado=$obj_pre->editar();
			break;

		case 'borrar':
			$obj_pre->ide_pre=$_POST["ide_pre"];
			$resultado=$obj_pre->borrado_logico();
			break;
		
		default:
			echo "<div><p>Something Went Wrong ¯\_(ツ)_/¯</p></div>";
			echo "<a href='../vista/marca/listar.php'>Volver.</a>";
			break;
	}

	if($resultado==true){
		echo "<div>
				<p>¡Operacion Completada!</p><br>
				<a href='../vista/marca/listar.php'>Volver.</a>
			</div>";
	}else{
		echo "<div>
				<p>¡Algo Salio Mal!</p><br>
				<a href='../vista/marca/listar.php'>Volver.</a>
			</div>";
	}
	?>
</body>
</html>