<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<div class="row">
			<form action="agregar.php" method="GET">
				<h2>Saldo Minimo Necesario para Retirar: </h2>
				<input type="number" min="0" step="0.01" id="val_min_tran" name="val_min_tran" required>
				<input type="hidden" id="accion" name="accion" value="<?php echo $accion=$_GET["accion"]; ?>">
				<input type="submit" value="Siguiente">
			</form>
		</div>
	</div>
	<br>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../../index.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>