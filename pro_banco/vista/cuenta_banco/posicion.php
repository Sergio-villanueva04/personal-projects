<?php
require '../../clases/cuenta_banco.class.php';

$obj_cue=new cuenta_banco;

$obj_cue->ide_cue=$_GET['codigo'];
$obj_cue->ide_ban=$_GET['ide_ban'];

$nombre=$_GET["nombre"];
$cuenta=$_GET["cuenta"];
$codigo=$_GET["cod_cue"];

$pun_cue=$obj_cue->buscar();

$datos=$obj_cue->extraer_dato($pun_cue);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Datos de Cuenta</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilo/main-estilo.css">
</head>
<body>
	<div class="row">
		<div class="col-4 text-center">
			<a href="../usuario/listar.php" style="color: forestgreen">Regresar</a>
		</div>
		<div class="col-4 text-center">
			<h2>Posicion Consolidada: </h2>
		</div>
		<div class="col-4">
			<h2 style="display: inline-block; float: right;">EcoFinance</h2>
			<a href="../../index.php" style="float: right;">
				<img src="../../imagen/IMG-20230124-WA0000.jpg" title="¡Enseñando Finanzas con Gusto!" class="logo">
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">
			<label for="sal_cue">Institución:</label><br>
			<p><?php echo $_GET["banco"];?></p>
			<label for="sal_cue">Nombre:</label><br>
			<p><?php echo $_GET["nombre"];?></p><br>

			<label for="sal_cue">Cuenta:</label><br>
			<p><?php echo $_GET["cuenta"];?></p>
			<label for="sal_cue">Codigo de Cuenta:</label><br>
			<p><?php echo $_GET["cod_cue"];?></p>
		</div>
	</div>
	<div class="row" style="margin-left: 10px; margin-right: 10px;">
		<div class="col-2 text-center" style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>Fecha:</div>
		<div class="col-1 text-center" style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>Tipo:</div>
		<div class="col-3 text-center" style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>Descripción:</div>
		<div class="col-2 text-center" style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>Debe:</div>
		<div class="col-2 text-center" style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>Haber:</div>
		<div class="col-2" style='border-left: 2px solid #92CD59; border-right: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>Saldo Total:</div>
	</div>
	<div class="row" style="margin-left: 10px; margin-right: 10px;">
		<?php
		$pun_cue1=$obj_cue->listar_tran();
		$saldo_total=0;;
		while (($datos1=$obj_cue->extraer_dato($pun_cue1))>0) {
			echo "<div class='col-2 text-center' style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
			echo $datos1["fec_tran"];
			echo "</div>";

			echo "<div class='col-1 text-center' style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
			echo $datos1["tip_tran"];
			echo "</div>";

			if ($datos1["tip_tran"]=="deposito") {
				echo "<div class='col-3 text-center' style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
				echo $datos1["obj_tran"];
				echo "</div>";
			}
			if ($datos1["tip_tran"]=="retiro") {
				echo "<div class='col-3 text-center' style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
				echo $datos1["des_tran"];
				echo "</div>";
			}

			echo "<div class='col-2 text-center' style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
			echo $datos1["val_dep_tran"];
			$saldo_total=$saldo_total+$datos1["val_dep_tran"];
			echo "</div>";

			echo "<div class='col-2 text-center' style='border-left: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
			echo $datos1["val_ret_tran"];
			$saldo_total=$saldo_total-$datos1["val_ret_tran"];
			echo "</div>";

			echo "<div class='col-2 text-center' style='border-left: 2px solid #92CD59; border-right: 2px solid #92CD59; border-bottom: 2px solid #92CD59;'>";
			echo $saldo_total;
			echo "</div>";
		}
		?>
	</div>
	<div class="row" style="margin-right: 10px;">
		<div class="col-3"></div>
		<div class="col-3"></div>
		<div class="col-3"></div>
		<div class="col-1"></div>
		<div class="col-2 text-center">
			<label for="sal_cue">Saldo Disponible en EcoPo1nts:</label><br>
			<p><?php echo $datos['sal_cue'];?></p><br>
		</div>
	</div>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">
			<?php
			$pun_cue2=$obj_cue->listar_objeto();
			$pun_cue3;
			while (($datos2=$obj_cue->extraer_dato($pun_cue2))>0){
				$obj_cue->objeto=$datos2["nom_mar"]." ".$datos2["des_pre"];
				$pun_cue3=$obj_cue->con_numero();
				$datos3=$obj_cue->extraer_dato($pun_cue3);
				if ($datos3["numero"]>0) {
					echo $obj_cue->objeto.": ".$datos3["numero"]."<br>";
				}
			}
			?>
		</div>
		<div class="col-4"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-12 text-center">
			<div>
				<a href="../../index.php" style="color: forestgreen">Regresar</a>
			</div>
		</div>
	</div>
</body>
</html>