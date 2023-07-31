<?php
$ide_ban=$_GET['codigo'];

require_once '../../clases/banco.class.php';

$obj_ban=new banco;
$obj_ban->ide_ban=$_GET["codigo"];

$pun_ban=$obj_ban->buscar();
$datos=$obj_ban->extraer_dato($pun_ban);
//<input type="hidden" name="cod_ban1" id="cod_ban1" value="<?php echo $datos["cod_ban"];">
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Agencia</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/editar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row">
		<form action="../../controlador/banco.php" method="POST" class="text-center">
			<h2 class="titulo">Datos de la Agencia:</h2>
			<div>
				<input type="hidden" name="ide_ban" id="ide_ban" value="<?php echo $datos["ide_ban"]; ?>">
				<input type="hidden" name="accion" id="accion" value="editar">
			</div>
			<div>
				<label for="nom_ban">Nombre de la Agencia: </label><br>
				<?php
				echo "<input type='text' class='input-fill' id='nom_ban' name='nom_ban' maxlength='30' pattern='[A-Za-záéíóúÑñ ]+' value='";
				echo $datos["nom_ban"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="cod_ban">Codigo de la Agencia: </label><br>
				<?php
				echo "<input type='number' class='input-fill' id='cod_ban' name='cod_ban' maxlength='3' value='";
				echo $datos["cod_ban"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="est_ban">Estado del Agencia: </label><br>
				<input type="hidden" value="<?php echo $datos["est_ban"]; ?>">
				<select class="select" name="est_ban" id="est_ban">
					<?php
					if ($datos["est_ban"]=="A") {
						echo "<option value=''>Seleccione...</option>
							<option value='A' selected>Activo</option>
							<option value='I'>Inactivo</option>";
					}
					if ($datos["est_ban"]=="I") {
						echo "<option value=''>Seleccione...</option>
							<option value='A'>Activo</option>
							<option value='I' selected>Inactivo</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<input type="submit" class="input-boton" value="Actualizar">
			</div>
		</form>
		<div class="text-center">
			<a href="listar.php" style="color: green">Regresar</a>
		</div>
	</div>
</body>
</html>