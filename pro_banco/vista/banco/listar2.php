<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Posicion consolidada</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilo/listas.css">
</head>
<body class="back">
	<?php
	require("../../clases/banco.class.php");

	$obj_ban=new banco;

	$obj_ban->ide_ban=$_GET["ide_ban"];

	$ide_ban=$_GET["ide_ban"];

	$pun_ban1=$obj_ban->buscar();

	$datos1=$obj_ban->extraer_dato($pun_ban1);
	?>
	<div class="row titulo">
		<div class="col-4" style="float: left;">
			<a href="../../index.php">
				<img src="../../imagen/IMG-20230124-WA0000.jpg" title="¡Enseñando Finanzas con Gusto!" class="logo">
			</a>
			<h2 style="display: inline-block;">EcoFinance</h2>
		</div>
		<div class="col-4 text-center p-2">
			<h2 class="titulo"><?php echo $datos1["nom_ban"]; ?></h2>
		</div>
		<div class="col-2 text-center">
			<a class="extra regresar" href="../../index.php">Regresar</a>
		</div>
		<div class="col-2"></div>
	</div>
	<div class="row titulo2">
		<div class="col-md-4 col-xs-12 text-center">Nombre</div>
		<div class="col-md-3 col-xs-12 text-center">Tipo de Cuenta</div>
		<div class="col-md-4 col-xs-12 text-center">Codigo de Cuenta</div>
		<div class="col-md-1 col-xs-12 text-center">Opciones</div>
	</div>

	<div class="row">
		<?php
		$pun_ban=$obj_ban->listar_cuenta();

		while (($datos=$obj_ban->extraer_dato($pun_ban))>0) {
			echo "<div class='col-md-4 col-xs-12 text-center p-1 item'>";
			echo $datos["raz_usu"];
			echo "</div>";

			echo "<div class='col-md-3 col-xs-12 text-center p-1 item'>";
			echo $datos["tip_cue"];
			echo "</div>";

			echo "<div class='col-md-4 col-xs-12 text-center p-1 item'>";
			echo "<a href='../cuenta_banco/posicion.php?codigo=$datos[ide_cue]&nombre=$datos[raz_usu]&cuenta=$datos[tip_cue]&cod_cue=$datos[cod_cue_ban]&banco=$datos[nom_ban]&ide_ban=$datos[ide_ban]' class='extra' style='color: #0093DD;'>";
			echo $datos["cod_cue_ban"];
			echo "</a>";
			echo "</div>";

			echo "<div class='col-md-1 col-xs-12 text-center p-1 item'>
				<a href='editar.php?codigo=$datos[ide_cue]' class='extra' style='color: green'>E</a><br>
				<a href='../../controlador/cuenta_banco.php?ide_cue=$datos[ide_cue]&accion=borrar' class='extra' style='color: red'>X</a>
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