<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Marcas</title>
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
		<div class="col-4 text-center p-2">
			<h2>Tipo de Unidad de Residuo Ordinario No Valorizable</h2>
		</div>
		<div class="col-2 text-center">
			<a class="extra regresar" href="../../index.php">Regresar</a>
		</div>
		<div class="col-2 text-center">
			<a href="agregar.php" class="titulo agregar">Agregar</a>
		</div>
	</div>
	<div class="row titulo2">
		<div class="col-md-5 col-xs-12 text-center">Categoria</div>
		<div class="col-md-3 col-xs-12 text-center">Tipos</div>
		<div class="col-md-2 col-xs-12 text-center">Acción</div>
		<div class="col-md-2 col-xs-12 text-center">Acción de Categoria</div>
	</div>
	<div class="row">
		<?php
		require "../../clases/marca.class.php";
		$obj_mar=new marca;

		$pun_mar=$obj_mar->listar();

		while (($datos=$obj_mar->extraer_dato($pun_mar))>0) {
			echo "<div class='col-md-5 text-center p-2 item'>";
			echo $datos["nom_mar"];
			echo "</div>";

			echo "<div class='col-md-3 text-center p-2 item'>";
			$obj_mar->ide_mar=$datos["ide_mar"];
			$pun_mar1=$obj_mar->list_pre();
			while (($datos1=$obj_mar->extraer_dato($pun_mar1))>0) {
				echo $datos1["des_pre"]."<br>";
			}
			echo "</div>";

			echo "<div class='col-md-2 text-center p-2 item'>";
			echo "<a href='../presentacion/agregar.php?ide_mar=$datos[ide_mar]' class='extra'>+</a><br>";
			echo "<a href='../presentacion/seleccion.php?ide_mar=$datos[ide_mar]&accion=editar' style='color: green' class='extra'>E</a><br>";
			echo "<a href='../presentacion/seleccion.php?ide_mar=$datos[ide_mar]&accion=borrar' style='color: red' class='extra'>X</a>";
			echo "</div>";

			echo "<div class='col-md-1 text-center p-2 item'>";
			echo "<a href='editar.php?ide_mar=$datos[ide_mar]' class='extra' style='color: green'>E</a>";
			echo "</div>";

			echo "<div class='col-md-1 text-center p-2 item'>";
			echo "<a href='../../controlador/marca.php?ide_mar=$datos[ide_mar]&accion=borrar' class='extra' style='color: red'>X</a>";
			echo "</div>";
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