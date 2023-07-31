<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tipos de Cuenta</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/listas.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row titulo">
		<div class="col-4" style="float: left;">
			<a href="../../index.php">
				<img src="../../imagen/IMG-20230124-WA0000.jpg" title="¡Enseñando Finanzas con Gusto!" class="logo">
			</a>
			<h2 style="display: inline-block;">EcoFinance</h2>
		</div>
		<div class="col-4 text-center p-2 text-white">
			<h2 class="titulo">Tipos de Cuenta</h2>
		</div>
		<div class="col-2 text-center">
			<a class="extra regresar" href="../../index.php">Regresar</a>
		</div>
		<div class="col-2 text-center"><a href="agregar.php" class="titulo agregar">Agregar Tipo de Cuenta</a></div>
	</div>
	<div class="row titulo2">
		<div class="col-md-5 col-xs-12 text-center">Tipo de cuenta</div>
		<div class="col-md-5 col-xs-12 text-center">Codigo del Tipo de cuenta</div>
		<div class="col-md-1 col-xs-12 text-center">Editar</div>
		<div class="col-md-1 col-xs-12 text-center">Borrar</div>
	</div>
	<div class="row">
	<?php
	require("../../clases/tipo_cuenta.class.php");

	$obj_tipo_cue=new tipo_cuenta;

	$pun_tipo_cue=$obj_tipo_cue->listar();
	while (($datos=$obj_tipo_cue->extraer_dato($pun_tipo_cue))>0){
		echo "<div class='col-md-5 col-xs-12 text-center p-1 item'>";
		echo $datos["tip_cue"];
		echo "</div>";

		echo "<div class='col-md-5 col-xs-12 text-center p-1 item'>";
		echo $datos["cod_tip_cue"];
		echo "</div>";

		echo "<div class='col-md-1 col-xs-12 text-center p-1 item'>
			<a href='editar.php?codigo=$datos[ide_tip_cue]' class='extra' style='color: forestgreen'>editar</a>
			</div>

			<div class='col-md-1 col-xs-12 text-center p-1 item'>
			<a href='../../controlador/tipo_cuenta.php?ide_tip_cue=$datos[ide_tip_cue]&accion=borrar' class='extra' style='color: red'>borrar</a>
			</div>";
	}
	?>
	</div>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../../index.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>