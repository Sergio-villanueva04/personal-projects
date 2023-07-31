<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
	require "../clases/marca.class.php";

	$obj_mar=new marca;

	$accion=$_REQUEST["accion"];
	switch ($accion) {
		case 'agregar':
			$obj_mar->nom_mar=$_POST["nom_mar"];
			$obj_mar->est_mar=$_POST["est_mar"];
			$resultado=$obj_mar->agregar();
			break;

		case 'editar':
			$obj_mar->ide_mar=$_POST["ide_mar"];
			$obj_mar->nom_mar=$_POST["nom_mar"];
			$obj_mar->est_mar=$_POST["est_mar"];
			$resultado=$obj_mar->editar();
			break;

		case 'borrar':
			$obj_mar->ide_mar=$_GET["ide_mar"];
			$resultado=$obj_mar->borrado_logico();
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