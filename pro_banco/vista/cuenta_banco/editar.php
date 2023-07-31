<?php
require_once '../../clases/cuenta_banco.class.php';

$obj_cue=new cuenta_banco;
$obj_cue->ide_cue=$_GET["codigo"];
$pun_cue=$obj_cue->buscar2();
$datos=$obj_cue->extraer_dato($pun_cue);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Cuenta</title>
	<link rel="stylesheet" href="../../estilo/editar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row text-center">
		<form action="../../controlador/cuenta_banco.php" method="POST">
			<h2 class="titulo">Datos de la Cuenta:</h2>
			<div>
				<input type="hidden" name="ide_cue" id="ide_cue" value="
				<?php echo $datos['ide_cue'] ?>
				">
				<input type="hidden" name="ide_usu" id="ide_usu" value="
				<?php echo $datos['ide_usu'] ?>
				">
				<label for="tip_cue_ban">Tipo de Cuenta:</label><br>
				<select class="select" name="tip_cue_ban" id="tip_cue_ban">
					<?php
					$pun_cue1=$obj_cue->list_tipo_cuenta();
					while (($datos1=$obj_cue->extraer_dato($pun_cue1))>0){
						echo "<option value='";
						echo $datos1["ide_tip_cue"];
						echo "'";
						if ($datos["tip_cue_ban"]==$datos1["ide_tip_cue"]){
							echo " selected";
						}
						echo ">";
						echo $datos1["tip_cue"];
						echo "</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<label for="cod_cue_ban">Codigo de Cuenta: </label><br>
				<input class="input-fill" type="text" value='<?php
				echo $datos["cod_cue_ban"];?>' id="cod_cue_ban" name="cod_cue_ban" maxlength="13" required>
			</div>
			<br>
			<div>
				<label for="est_cue">Estado de la Cuenta: </label><br>
				<select class="select" name="est_cue" id="est_cue" required>
					<option value=''>Seleccione...</option>
					<?php
					if ($datos["est_cue"]=="A"){
						echo "<option value='A' selected>";
						echo "Activo";
						echo "</option>";

						echo "<option value='I'>";
						echo "Inactivo";
						echo "</option>";
					}
					if ($datos["est_cue"]=="I"){
						echo "<option value='A'>";
						echo "Activo";
						echo "</option>";

						echo "<option value='I' selected>";
						echo "Inactivo";
						echo "</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<input type="hidden" name="accion" id="accion" value="editar">
				<input type="submit" class="input-boton" value="Actualizar">
			</div>
		</form>
		<div class="col-12 text-center">
			<a href="listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>