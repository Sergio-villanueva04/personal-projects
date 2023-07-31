<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
	require("../clases/banco.class.php");

	$obj_ban=new banco;

	$accion=$_REQUEST["accion"];
	switch ($accion){
		case 'agregar':
			$obj_ban->nom_ban=$_POST["nom_ban"];
			$obj_ban->cod_ban=$_POST["cod_ban"];
			$obj_ban->est_ban=$_POST["est_ban"];
			$resultado=$obj_ban->agregar();
			break;

		case 'editar':
				$obj_ban->ide_ban=$_POST["ide_ban"];
				$obj_ban->nom_ban=$_POST["nom_ban"];
				$obj_ban->cod_ban=$_POST["cod_ban"];
				$obj_ban->est_ban=$_POST["est_ban"];
				$resultado=$obj_ban->editar();
			break;

		case 'borrar':
			$obj_ban->ide_ban=$_GET['ide_ban'];
			$resultado=$obj_ban->borrado_logico();
			break;
		
		default:
			echo "<div><p>Something Went Wrong ¯\_(ツ)_/¯</p></div>";
			echo "<a href='../vista/banco/listar.php' style='color: green'>Volver.</a>";
			break;
	}

	if($resultado==true){
			echo "<div>
					<p>¡Operacion Completada!</p><br>
					<a href='../vista/banco/listar.php' style='color: green'>Volver.</a>
				  </div>";
		}else{
			echo "<div>
					<p>¡Algo Salio Mal!</p><br>
					<a href='../vista/banco/listar.php' style='color: green'>Volver.</a>
				  </div>";
		}
	?>
</body>
</html>