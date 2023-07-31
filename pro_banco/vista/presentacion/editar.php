<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Tipo</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/editar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
	require '../../clases/presentacion.class.php';

	$obj_pre=new presentacion;

	$obj_pre->ide_pre=$_POST["ide_pre"];

	$pun_pre=$obj_pre->buscar();

	$datos=$obj_pre->extraer_dato($pun_pre);
	?>
	<div class="box text-center">
		<form action="../../controlador/presentacion.php" method="POST">
			<h2 class="titulo">Datos de la Tipo:</h2>
			<div>
				<label for="des_pre">Descripción: </label>
				<br>
				<input type="text" class="input-fill" name="des_pre" id="des_pre" maxlength="30" value="<?php echo $datos['des_pre']; ?>">
			</div>
			<br>
			<div>
				<input type="hidden" name="ide_pre" id="ide_pre" value="<?php echo $datos['ide_pre']; ?>">
				<input type="hidden" name="accion" id="accion" value="editar">
			    <input type="submit" class="input-boton" value="Actualizar">
			</div>
		</form>
	</div>
	<br>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../marca/listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>