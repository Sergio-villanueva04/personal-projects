<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar Presentación de Marca</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<form action="../../controlador/presentacion.php" method="POST">
			<h2 class="titulo">Datos de la Presentación</h2>
			<div>
				<label for="ide_mar_pre">Marca: </label>
				<br>
				<span id="ide_mar_pre">
					<?php
					require '../../clases/marca.class.php';
					$obj_mar=new marca;
					$obj_mar->ide_mar=$_GET["ide_mar"];
					$pun_mar=$obj_mar->buscar();
					$datos=$obj_mar->extraer_dato($pun_mar);
					echo $datos["nom_mar"];
					?>
				</span>
				<input type="hidden" id="ide_mar_pre" name="ide_mar_pre" value="<?php echo $datos["ide_mar"] ?>">
			</div>
			<br>
			<div>
				<label for="des_pre">Descripción: </label>
				<br>
				<input type="text" name="des_pre" id="des_pre" maxlength="30" class="input-fill">
			</div>
			<br>
			<div>
				<label for="est_pre">Estado: </label>
				<br>
				<select name="est_pre" id="est_pre" required class="select">
					<option value="">Seleccione...</option>
					<option value="A">Activo</option>
					<option value="I">Inactivo</option>
				</select>
			</div>
			<br>
			<div>
				<input type="hidden" id="accion" name="accion" value="agregar">
				<input type="submit" value="Agregar" class="input-boton">
			</div>
		</form>
	</div>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../marca/listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>