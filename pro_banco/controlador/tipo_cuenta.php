<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
	require("../clases/tipo_cuenta.class.php");

	$obj_tipo_cue=new tipo_cuenta;

	$accion=$_REQUEST["accion"];
	switch ($accion) {
		case 'agregar':
			$obj_tipo_cue->tip_cue=$_POST["tip_cue"];
			$obj_tipo_cue->cod_tip_cue=$_POST["cod_tip_cue"];
			$obj_tipo_cue->est_tip_cue=$_POST["est_tip_cue"];
			$resultado=$obj_tipo_cue->agregar();
			break;

		case 'editar':
			$obj_tipo_cue->ide_tip_cue=$_POST["ide_tip_cue"];
			$obj_tipo_cue->tip_cue=$_POST["tip_cue"];
			$obj_tipo_cue->cod_tip_cue=$_POST["cod_tip_cue"];
			$obj_tipo_cue->est_tip_cue=$_POST["est_tip_cue"];
			$resultado=$obj_tipo_cue->editar();
			break;

		case 'borrar':
			$obj_tipo_cue->ide_tip_cue=$_GET["ide_tip_cue"];
			$resultado=$obj_tipo_cue->borrado_logico();
			break;
		
		default:
			echo "<div><p>Something Went Wrong ¯\_(ツ)_/¯</p></div>";
			echo "<a href='../vista/tipo_cuenta/listar.php'>Volver.</a>";
			break;
	}

	if($resultado==true){
			echo "<div>
					<p>¡Operacion Completada!</p><br>
					<a href='../vista/tipo_cuenta/listar.php'>Volver.</a>
				  </div>";
		}else{
			echo "<div>
					<p>¡Algo Salio Mal!</p><br>
					<a href='../vista/tipo_cuenta/listar.php'>Volver.</a>
				  </div>";
		}
	?>
</body>
</html>