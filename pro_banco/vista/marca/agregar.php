<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar Categoria</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<form action="../../controlador/marca.php" method="POST">
			<h2 class="titulo">Datos de la Categoria:</h2>
			<div>
				<label for="">Nombre: </label><br>
				<input name="nom_mar" id="nom_mar" type="text" class="input-fill" maxlength="20" required>
		    </div>
		    <br>
			<div>
				<label for="">Estado:</label><br>
				<select name="est_mar" id="est_mar" class="select" required>
					<option value="">Seleccione...</option>
					<option value="A">Activo</option>
					<option value="I">Inactivo</option>
				</select>
			</div>
			<br>
			<div>
				<input type="hidden" name="accion" id="accion" value="agregar">
				<input type="submit" class="input-boton" value="Agregar">
			</div>
			<br>
		</form>
	</div>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>