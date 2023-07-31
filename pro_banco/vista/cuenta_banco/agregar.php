<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar Cuenta de Banco</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row text-center">
		<h2 class="titulo">Datos de la Cuenta:</h2>
		<form action="../../controlador/cuenta_banco.php" method="POST">
			<br>
			<div>
				<label for="ide_usu">Usuario: </label><br>
				<select class="select" name="ide_usu" id="ide_usu" required>
					<?php
					require '../../clases/cuenta_banco.class.php';

					$obj_cue1=new cuenta_banco;

					echo $_GET["cod_usu"];

					$obj_cue1->ide_usu=$_GET["cod_usu"];

					$pun_cue2=$obj_cue1->buscar_usuario();
					$datos=$obj_cue1->extraer_dato($pun_cue2);

					echo "<option label='";
					echo $datos["raz_usu"];
					echo "' value='";
					echo $datos["cod_usu"];
					echo "' selected>";
					echo $datos["ide_usu"];
					echo "</option>";

					?>
				</select>
			</div>
			<br>
			<div>
				<label for="tip_cue_ban">Tipo de Cuenta: </label><br>
				<select class="select" name="tip_cue_ban" id="tip_cue_ban" onchange="codigo(this);" required>
					<option value="">Seleccione...</option>
					<?php
					$obj_cue3=new cuenta_banco;

					$pun_cue3=$obj_cue3->list_tipo_cuenta();

					while (($datos3=$obj_cue3->extraer_dato($pun_cue3))>0) {
						echo "<option label='";
						echo $datos3["tip_cue"];
						echo "' ";
						echo "value='";
						echo $datos3["ide_tip_cue"];
						echo "'>";
						echo $datos3["cod_tip_cue"];
						echo "</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<input class="input-fill" type="hidden" id="cod_cue_ban" name="cod_cue_ban" min="0" maxlength="14">
				<script type="text/javascript">
					function codigo(sel){
						var cue=sel.options[sel.selectedIndex].text;

						var ide=document.getElementById('ide_usu');
						var ced=ide.options[ide.selectedIndex].text;

						var codigo=ced+cue;

						alert("Codigo de Cuenta: "+codigo);

						var input_cod=document.getElementById('cod_cue_ban');

						input_cod.setAttribute('value', codigo);
					}
				</script>
			</div>
			<div>
				<label for="est_cue">Estado de la Cuenta:</label><br>
				<select class="select" name="est_cue" id="est_cue" required>
					<option value="">Seleccione...</option>
					<option value="A">Activo</option>
					<option value="I">Inactivo</option>
				</select>
			</div>
			<br>
			<div>
				<input type="hidden" name="accion" id="accion" value="agregar">
				<input class="input-boton" type="submit" value="Agregar">				
			</div>
		</form>
	</div>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>