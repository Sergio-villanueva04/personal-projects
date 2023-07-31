<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Selección</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<?php
		$accion=$_GET["accion"];
		if ($accion=="editar") {
			echo "<form id='forma' action='editar.php' method='POST'>";
			echo "<input type='hidden' id='accion' name='accion' value='".$accion."'>";
		}

		if ($accion=="borrar") {
			echo "<form id='forma' action='../../controlador/presentacion.php' method='POST'>";
			echo "<input type='hidden' id='accion' name='accion' value='".$accion."'>";
		}
		?>
			<h2>Presentaciones disponibles: </h2>
			<div>
				<label for="">marca: </label>
				<span>
					<?php
					require '../../clases/marca.class.php';
					$obj_mar=new marca;

					$obj_mar->ide_mar=$_GET["ide_mar"];

					$pun_mar=$obj_mar->buscar();

					$datos=$obj_mar->extraer_dato($pun_mar);

					echo $datos["nom_mar"];
					?>
				</span>
			</div>
			<br>
			<div>
				<select name="ide_pre" id="ide_pre" class="select">
					<option value=''>Seleccione...</option>
					<?php
					$pun_mar=$obj_mar->list_pre();

					while (($datos=$obj_mar->extraer_dato($pun_mar))>0) {
						echo "<option value='";
						echo $datos["ide_pre"];
						echo "'>";
						echo $datos["des_pre"];
						echo "</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<input type="submit" value="Siguiente" class="input-boton">
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