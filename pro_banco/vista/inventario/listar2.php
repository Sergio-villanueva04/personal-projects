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
	<?php
	require '../../clases/inventario.class.php';

	$obj_inv = new inventario;

	$obj_inv->ide_ban_inv=$_GET["ide_ban"];
	?>
	<div class="row titulo">
		<div class="col-4 text-center"><a href="listar.php" class="extra regresar">Regresar</a></div>
		<div class="col-4 text-center p-2">
			<h2><?php echo $_GET["nom_ban"]; ?></h2>
		</div>
		<div class="col-4"></div>
	</div>
	<form action="../../controlador/inventario.php" method="POST">
		<input type="hidden" id="ide_ban" name="ide_ban" value="<?php echo $_GET["ide_ban"]; ?>">
		<input type="hidden" id="nom_ban" name="nom_ban" value="<?php echo $_GET["nom_ban"]; ?>">
		<div class="row">		
			<?php
			$pun_inv=$obj_inv->listar_by_inst();
			echo "<div class='col-12 text-center'>";
				echo "<select name='ide_inv' id='ide_inv' onchange='des(this);' required>";
					echo "<option value=''>Seleccione...</option>";
					while (($datos=$obj_inv->extraer_dato($pun_inv))>0) {
						echo "<option value='";
						echo $datos["ide_inv"];
						echo "'>";
						echo $datos["des_inv"];
						echo "</option>";
					}
				echo "</select>";
				echo "<script type='text/javascript'>
						function des(sel){
							var des=sel.options[sel.selectedIndex].text;

							var ide=document.getElementById('des_inv');
							ide.value=des;
						}
					</script>";
			echo "</div><br>";
			?>
			<div class="col-12 text-center">
				<br>
				<input type="number" min="0" id="num_ret" name="num_ret" required><br>
				<input type="hidden" id="des_inv" name="des_inv" value="">
				<input type="hidden" id="accion" name="accion" value="retirar">
				<input type="submit" value="Retirar">
			</div>
		</div>
	</form>
</body>
</html>