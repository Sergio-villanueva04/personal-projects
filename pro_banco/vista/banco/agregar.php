<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar institución</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<h2 class="titulo">Datos de la institución:</h2>
		<form action="../../controlador/banco.php" method="POST" class="">
			<div>
				<label for="nom_ban">Nombre de la institución: </label><br>
				<input class="input-fill" type="text" name="nom_ban" id="nom_ban" maxlength="30" pattern="[A-Za-záéíóúÑñ ]+" title="Solo se admiten letras." required>
			</div>
			<br>
			<div>
				<label for="cod_ban">Codigo de la institución: </label><br>
				<input class="input-fill" type="number" min="0" name="cod_ban" id="cod_ban" maxlength="3" required>
			</div>
			<br>
			<div>
				<label for="est_ban">Estado de la institución: </label><br>
				<select class="select" name="est_ban" id="est_ban" required>
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