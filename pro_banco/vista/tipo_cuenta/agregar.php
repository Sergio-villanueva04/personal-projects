<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar Tipo de Cuenta</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<h2 class="titulo">Datos del Tipo de Cuenta:</h2>
		<form action="../../controlador/tipo_cuenta.php" method="POST">
				<div>
					<label for="tip_cue">Descripción del tipo de Cuenta: </label><br>
					<input class="input-fill" type="text" name="tip_cue" id="tip_cue" maxlength="15" required>
				</div>
				<br>
				<div>
					<label for="tip_cue">Codigo del tipo de Cuenta: </label><br>
					<input class="input-fill" type="text" name="cod_tip_cue" id="cod_tip_cue" maxlength="4" required>
				</div>
				<br>
				<div>
					<label for="est_tip_cue">Estado del Tipo de Cuenta: </label><br>
					<select class="select" name="est_tip_cue" id="est_tip_cue" required>
						<option value="">Seleccione...</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
				<br>
				<div>
					<input class="input-boton" type="submit" value="Agregar">
					<input type="hidden" name="accion" id="accion" value="agregar">
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