<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>
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
			<h2>Usuarios</h2>
		</div>
		<div class="col-2 text-center"><a href="../../index.php" class="extra regresar">Regresar</a></div>
		<div class="col-2 text-center"><a href="agregar.php" class="titulo agregar">Agregar Usuario</a></div>
	</div>
	<?php
		require("../../clases/usuario.class.php");
		$obj_usu=new usuario;

		$pun_usu=$obj_usu->listar();

		echo "
				</div>
				<div class='row titulo2'>
					<div class='col-md-1 col-xs-12 text-center'>
						Inst
					</div>
					<div class='col-md-1 col-xs-12 text-center'>
						ID
					</div>
					<div class='col-md-2 col-xs-12 text-center'>
						Nombre
					</div>
					<div class='col-md-2 col-xs-12 text-center'>
						Dirección
					</div>
					<div class='col-md-2 col-xs-12 text-center'>
						Correo
					</div>
					<div class='col-md-1 col-xs-12 text-center'>
						Telefono
					</div>
					<div class='col-md-2 col-xs-12 text-center'>
						Cuenta
					</div>
					<div class='col-md-1 col-xs-12 text-center'>
						Opciones
					</div>
				</div>
			 ";

		echo "<div class='row'>";
		while(($datos = $obj_usu->extraer_dato($pun_usu))>0)
		{
			echo "<div class='col-md-1 col-xs-12 text-center p-2 item'>";
			echo "<a class='extra' href='../banco/listar2.php?ide_ban=$datos[ide_ban]'>";
			echo $datos["cod_ban"];
			echo "</a>";
			echo "</div>";
			
			echo "<div class='col-md-1 col-xs-12 text-center p-2 item'>";
			echo $datos["ide_usu"];
			echo "</div>";

			echo "<div class='col-md-2 col-xs-12 text-center p-2 item'>";
			echo $datos["raz_usu"];
			echo "</div>";

			echo "<div class='col-md-2 col-xs-12 text-center p-2 item'>";
			echo $datos["dir_usu"];
			echo "</div>";

			echo "<div class='col-md-2 col-xs-12 text-center p-2 item'>";
			echo $datos["ema_usu"];
			echo "</div>";

			echo "<div class='col-md-1 col-xs-12 text-center p-2 item'>";
			echo $datos["tel_usu"];
			echo "</div>";

			echo "<div class='col-md-2 col-xs-12 text-center p-1 item'>";
			$obj_usu->cod_usu=$datos["cod_usu"];
			$pun_usu1=$obj_usu->listar_cuenta();
			while ($datos1=$obj_usu->extraer_dato($pun_usu1)) {
				echo $datos1["tip_cue"].": ";
				echo "<a href='../cuenta_banco/posicion.php?codigo=$datos1[ide_cue]&nombre=$datos[raz_usu]&cuenta=$datos1[tip_cue]&cod_cue=$datos1[cod_cue_ban]&banco=$datos[nom_ban]&ide_ban=$datos[ide_ban]' class='extra' style='color: #0093DD;'>";
				echo $datos1["cod_cue_ban"]."<br>";
				echo "</a>";
			}
			echo "</div>";

			echo "<div class='col-md-1 col-xs-12 text-center p-2 item'>
				<a href='editar.php?codigo=$datos[cod_usu]' class='extra' style='color: green'>E</a><br>
				<a href='../../controlador/usuario.php?cod_usu=$datos[cod_usu]&accion=borrar' class='extra' style='color: red'>X</a>
				</div>";
		}
		echo "</div>";
	?>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../../index.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>