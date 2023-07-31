<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de instituciones</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/listas.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body class="back">
	<div class="row titulo">
		<div class="col-4" style="float: left;">
			<a href="../../index.php">
				<img src="../../imagen/IMG-20230124-WA0000.jpg" title="¡Enseñando Finanzas con Gusto!" class="logo">
			</a>
			<h2 style="display: inline-block;">EcoFinance</h2>
		</div>
		<div class="col-4 text-center p-2">
			<h2 class="titulo">Agencias</h2>
		</div>
		<div class="col-2 text-center">
			<a class="extra regresar" href="../../index.php">Regresar</a>
		</div>
		<div class="col-2 text-center"><a href="agregar.php" class="titulo agregar">Agregar Agencia</a></div>
	</div>
	<div class="row titulo2">
		<div class="col-md-5 col-xs-12 text-center">Nombre de la Agencia</div>
		<div class="col-md-5 col-xs-12 text-center">Codigo de la Agencia</div>
		<div class="col-md-1 col-xs-12 text-center">Editar</div>
		<div class="col-md-1 col-xs-12 text-center">Borrar</div>
	</div>
	<div class="row">
		<?php
		require("../../clases/banco.class.php");

		$obj_ban=new banco;

		$pun_ban=$obj_ban->listar();

		while (($datos=$obj_ban->extraer_dato($pun_ban))>0){
			echo "<div class='col-md-5 col-xs-12 text-center item'>";
			echo "<a class='extra' href='listar2.php?ide_ban=$datos[ide_ban]'>";
			echo $datos["nom_ban"];
			echo "</a>";
			echo "</div>";

			echo "<div class='col-md-5 col-xs-12 text-center item'>";
			echo $datos["cod_ban"];
			echo "</div>";

			echo "<div class='col-md-1 col-xs-12 text-center item'>
				<a href='editar.php?codigo=$datos[ide_ban]' class='extra' style='color: green'>editar</a>
				</div>

				<div class='col-md-1 col-xs-12 text-center item'>
				<a href='../../controlador/banco.php?ide_ban=$datos[ide_ban]&accion=borrar' class='extra' style='color: red'>borrar</a>
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