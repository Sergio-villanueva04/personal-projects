<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar Usuario</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<form action="../../controlador/usuario.php" method="POST">
			<h2 class="titulo">Datos del Usuario:</h2>
			<div>
				<label for="ide_ban_usu">Institución: </label><br>
				<select class="select" name="ide_ban_usu" id="ide_ban_usu" required>
					<option value="">Seleccione...</option>
					<?php
					require '../../clases/usuario.class.php';

					$obj_usu=new usuario;

					$pun_usu=$obj_usu->list_banco();

					while (($datos1=$obj_usu->extraer_dato($pun_usu))>0) {
						echo "<option value='";
						echo $datos1["ide_ban"];
						echo "'>";
						echo $datos1["nom_ban"];
						echo "</option>";
					}
					?>
				</select>
			</div>
			<br>
			<div>
				<label for="ide_usu">Identificaci&oacute;n (N° cedula o rif): </label><br>
				<input class="input-fill" type="text" name="ide_usu" id="ide_usu" maxlength="12" pattern="[VvEePp0-9]+" title="Inserte la inicial del tipo de documento seguido del número del mismo. Ejemplo: V1234567" required>
			</div>
			<br>
			<div>
				<label for="raz_usu">Nombre y Apellido del usuario: </label><br>
				<input class="input-fill" type="text" name="raz_usu" id="raz_usu" maxlength="35" pattern="[A-Za-záéíóúÑñ ]+" title="Solo se admiten letras." required>
			</div>
			<br>
			<div>
				<label for="dir_usu">Dirección del Usuario: </label><br>
				<input class="input-fill" type="text" name="dir_usu" id="dir_usu" maxlength="40" title="Por favor ingrese su direccion actual." required>
			</div>
			<br>
			<div>
				<label for="ema_usu">Correo del Usuario: </label><br>
				<input class="input-fill" type="text" name="ema_usu" id="ema_usu" maxlength="25" title="Por favor ingrese una direccion de correo valida." required>
			</div>
			<br>
			<div>
				<label for="tel_usu">Numero de telefono del usuario: </label><br>
				<input class="input-fill" type="text" name="tel_usu" id="tel_usu" maxlength="12" pattern="[0-9]+" title="Solo Números." required>
			</div>
			<br>
			<div>
				<label for="est_usu">Estado del Usuario: </label><br>
				<select class="select" name="est_usu" id="est_usu">
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