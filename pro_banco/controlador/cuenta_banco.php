<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
	require("../clases/cuenta_banco.class.php");

	$obj_cue=new cuenta_banco;

	$accion=$_REQUEST["accion"];
	switch ($accion) {
		case 'agregar':
			$obj_cue->ide_usu=$_POST["ide_usu"];
			$obj_cue->tip_cue_ban=$_POST["tip_cue_ban"];
			$obj_cue->cod_cue_ban=$_POST["cod_cue_ban"];
			$obj_cue->sal_cue=0;
			$obj_cue->est_cue=$_POST["est_cue"];
			$resultado=$obj_cue->agregar();
			break;

		case 'editar':
			$obj_cue->ide_cue=$_POST["ide_cue"];
			$obj_cue->ide_usu=$_POST["ide_usu"];
			$obj_cue->tip_cue_ban=$_POST["tip_cue_ban"];
			$obj_cue->cod_cue_ban=$_POST["cod_cue_ban"];
			$obj_cue->est_cue=$_POST["est_cue"];
			$resultado=$obj_cue->editar();
			break;
		
		case 'borrar':
			$obj_cue->ide_cue=$_GET["ide_cue"];
			$resultado=$obj_cue->borrado_logico();
			break;

		default:
			echo "<div><p>Something Went Wrong ¯\_(ツ)_/¯</p></div><br>";
			echo "<div><a href='../vista/cuenta_banco/listar.php'>Regresar</a></div>";
			break;
	}

	if($resultado==true){
		echo "<div>
				<p>¡Operacion Completada!</p><br>
				<a href='../vista/cuenta_banco/listar.php'>Volver.</a>
			  </div>";
	}else{
		echo "<div>
				<p>¡Algo Salio Mal!</p><br>
				<a href='../vista/cuenta_banco/listar.php'>Volver.</a>
			  </div>";
		}
	?>
</body>
</html>