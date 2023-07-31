<?php
require "../../clases/marca.class.php";

$obj_mar=new marca;
$obj_mar->ide_mar=$_GET["ide_mar"];

$pun_mar=$obj_mar->buscar();
$datos=$obj_mar->extraer_dato($pun_mar);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Marca</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/editar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row text-center">
		<h2 class="titulo">Datos de la Marca</h2>
		<form action="../../controlador/marca.php" method="POST">
			<div>
				<label for="nom_mar">Nombre de la Marca: </label>
				<br>
				<?php
				echo "<input type='text' class='input-fill' id='nom_mar' name='nom_mar' maxlength='20' value='";
				echo $datos["nom_mar"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="est_mar">Estado de la Marca: </label>
				<br>
				<?php
				if ($datos["est_mar"]=="A") {
					echo "<select class='select' name='est_mar' id='est_mar' class='form-control casilla' required>
							<option value=''>Seleccione...</option>
							<option value='A' selected>Activo</option>
							<option value='I'>Inactivo</option>
							</select>";
				}

				if ($datos["est_mar"]=="I") {
					echo "<select class='select' name='est_mar' id='est_mar' class='form-control casilla' required>
							<option value=''>Seleccione...</option>
							<option value='A'>Activo</option>
							<option value='I' selected>Inactivo</option>
							</select>";
				}
				?>
			</div>
			<br>
			<div>
				<input type="hidden" name="ide_mar" id="ide_mar" value="<?php echo $datos["ide_mar"]; ?>">
				<input type="hidden" id="accion" name="accion" value="editar">
				<input class="input-boton" type="submit" value="Actualizar">
			</div>
		</form>
		<div class="col-12 text-center">
			<a href="listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>