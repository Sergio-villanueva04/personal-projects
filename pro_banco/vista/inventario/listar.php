<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventario</title>
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
		<div class="col-4 text-center">
			<h2>Bóveda por Agencia</h2>
		</div>
		<div class="col-2 text-center">
			<a class="extra regresar" href="../../index.php">Regresar</a>
		</div>
		<div class="col-2"></div>
	</div>
	<div class="row titulo2">
		<div class="col-md-3 text-center">Agencia</div>
		<div class="col-md-3 text-center">Items</div>
		<div class="col-md-3 text-center">Total</div>
		<div class="col-md-3 text-center">Retirar de Bóveda</div>
	</div>
	<div class="row">
		<?php
		require '../../clases/inventario.class.php';

		$obj_inv = new inventario;

		$pun_inv=$obj_inv->listar_inst();

		while (($datos=$obj_inv->extraer_dato($pun_inv))>0){
			echo "<div class='col-md-3 text-center p-2 item'>";
			echo "<a class='extra' href='../banco/listar2.php?ide_ban=$datos[ide_ban]'>";
			echo $datos["nom_ban"];
			echo "</a>";
			echo "</div>";

			echo "<div class='col-md-3 text-center p-2 item'>";
			$obj_inv->ide_ban_inv=$datos["ide_ban"];
			$pun_inv1=$obj_inv->listar_obj();
			$pun_inv2;
			while (($datos1=$obj_inv->extraer_dato($pun_inv1))>0) {
				$obj_inv->objeto=$datos1["nom_mar"]." ".$datos1["des_pre"];
				$pun_inv2=$obj_inv->con_numero();
				$datos2=$obj_inv->extraer_dato($pun_inv2);
				if ($datos2["numero"]>0) {
					echo $obj_inv->objeto.": ".$datos2["numero"]."<br>";
				}
			}
			echo "</div>";

			echo "<div class='col-md-3 text-center p-2 item'>";
			$pun_inv3=$obj_inv->total_institucion();
			$datos3=$obj_inv->extraer_dato($pun_inv3);
			echo $datos3["total"];
			echo "</div>";

			echo "<div class='col-md-3 text-center p-2 item'>";
			echo "<a class='extra' href='listar2.php?ide_ban=$datos[ide_ban]&nom_ban=$datos[nom_ban]'>Retirar Items</a>";
			echo "</div>";
		}
		?>
	</div>
	<div class="row" style="border-top: solid 3px #92CD59;">
		<div class="col-3 text-center" style="padding-top: 20px;">Total en Bóveda:</div>
		<div class="col-3 text-center" style="padding-top: 20px;">
			<?php
			$pun_inv4=$obj_inv->listar_obj();
			$pun_inv5;
			while (($datos4=$obj_inv->extraer_dato($pun_inv4))>0) {
				$obj_inv->objeto=$datos4["nom_mar"]." ".$datos4["des_pre"];
				$pun_inv5=$obj_inv->con_numero_total();
				$datos5=$obj_inv->extraer_dato($pun_inv5);
				if ($datos5["numero"]>0) {
					echo $obj_inv->objeto.": ".$datos5["numero"]."<br>";
				}
			}
			?>
		</div>
		<div class="col-3"></div>
		<div class="col-3"></div>
	</div>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../../index.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>