<?php
$cod_usu=$_GET['codigo'];

require '../../clases/usuario.class.php';

$obj_usu=new usuario;
$obj_usu->cod_usu=$_GET["codigo"];

$pun_usu=$obj_usu->buscar();
$datos=$obj_usu->extraer_dato($pun_usu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Usuario</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/editar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="row text-center">
		<h2 class="titulo">Datos del Usuario:</h2>
		<form action="../../controlador/usuario.php" method="POST" class="text-center">
			<div>
				<label for="ide_ban_usu">Institución:</label><br>
				<select name="ide_ban_usu" id="ide_ban_usu">
					<?php
					$pun_usu1=$obj_usu->list_banco();
					while (($datos1=$obj_usu->extraer_dato($pun_usu1))>0){
						echo "<option value='";
						echo $datos1["ide_ban"];
						echo "'";
						if ($datos["ide_ban_usu"]==$datos1["ide_ban"]){
							echo " selected";
						}
						echo ">";
						echo $datos1["nom_ban"];
						echo "</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<label for="ide_usu">Identificacion:</label><br>
				<?php
				echo "<input type='text' class='input-fill' id='ide_usu' name='ide_usu' maxlength='12' pattern='[VvEePp0-9]+' value='";
				echo $datos["ide_usu"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="raz_usu">Nombre:</label><br>
				<?php
				echo "<input type='text' class='input-fill' id='raz_usu' name='raz_usu' maxlength='35' pattern='[A-Za-záéíóúÑñ ]+' value='";
				echo $datos["raz_usu"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="dir_usu">Dirección: </label><br>
				<?php
				echo "<input type='text' class='input-fill' id='dir_usu' name='dir_usu' maxlength='40' value='";
				echo $datos["dir_usu"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="ema_usu">Correo:</label><br>
				<?php
				echo "<input type='text' class='input-fill' id='ema_usu' name='ema_usu' maxlength='25' value='";
				echo $datos["ema_usu"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="tel_usu">Telefono:</label><br>
				<?php
				echo "<input type='text' class='input-fill' id='tel_usu' name='tel_usu' maxlength='12' pattern='[0-9]+' value='";
				echo $datos["tel_usu"];
				echo "' required>";
				?>
			</div>
			<br>
			<div>
				<label for="est_usu">Estado del Usuario:</label><br>
				<?php
					if($datos["est_usu"]=="A")
					{
						echo "<select class='select' name='est_usu' id='est_usu' class='form-control casilla'  required>
							<option value=''>Seleccione...</option>
							<option value='A' selected>Activo</option>
							<option value='I'>Inactivo</option>
							</select>";
					}

					if($datos["est_usu"]=="I")
					{
						echo "<select class='select' name='est_usu' id='est_usu' class='form-control casilla'  required>
							<option value=''>Seleccione...</option>
							<option value='A'>Activo</option>
							<option value='I' selected>Inactivo</option>
							</select>";
					}
				?>
			</div>
			<br>
			<div>
				<input class="input-boton" type="submit" value="Actualizar">
				<input type="hidden" name="cod_usu" id="cod_usu" value="<?php echo $datos["cod_usu"]; ?>">
				<input type="hidden" name="accion" id="accion" value="editar">
			</div>
		</form>
		<div class="col-12 text-center">
			<a href="listar.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>