<?php
$ide_tip_cue=$_GET['codigo'];

require_once '../../clases/tipo_cuenta.class.php';

$obj_tipo_cue=new tipo_cuenta;
$obj_tipo_cue->ide_tip_cue=$_GET["codigo"];

$pun_tipo_cue=$obj_tipo_cue->buscar();
$datos=$obj_tipo_cue->extraer_dato($pun_tipo_cue);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Tipo de Cuenta</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/editar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row">
		<form action="../../controlador/tipo_cuenta.php" method="POST" class="text-center">
			<h2 class="titulo">Datos del Tipo de Cuenta:</h2>
			<div>
				<label for="tip_cue">Descripcion del Tipo de Cuenta: </label><br>
				<?php
				echo "<input type='text' class='input-fill' id='tip_cue' name='tip_cue' maxlength='15' value='";
				echo $datos["tip_cue"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="tip_cue">Codigo del Tipo de Cuenta: </label><br>
				<?php
				echo "<input type='text' class='input-fill' id='cod_tip_cue' name='cod_tip_cue' maxlength='4' value='";
				echo $datos["cod_tip_cue"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="est_tip_cue">Estado del Tipo de Cuenta: </label><br>
				<?php
				if ($datos["est_tip_cue"]=='A') {
					echo "<select class='select' name='est_tip_cue' id='est_tip_cue' required>";
						echo "<option value=''>Seleccione...</option>";
						echo "<option value='A' selected>Activo</option>";
						echo "<option value='I'>Inactivo</option>";
					echo "</select>";
				}else{
					echo "<select class='select' name='est_tip_cue' id='est_tip_cue' required>";
						echo "<option value=''>Seleccione...</option>";
						echo "<option value='A'>Activo</option>";
						echo "<option value='I' selected>Inactivo</option>";
					echo "</select>";
				}
				?>
			</div>
			<br>
			<div>
				<input type="submit" class="input-boton" value="Actualizar">
				<input type="hidden" name="ide_tip_cue" id="ide_tip_cue" value="<?php echo $datos['ide_tip_cue']; ?>">
				<input type="hidden" name="accion" id="accion" value="editar">
			</div>
		</form>
		<div class="col-12 text-center">
			<a href="listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>