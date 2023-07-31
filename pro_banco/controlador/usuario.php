<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje</title>
</head>
<body>
	<?php
		require("../clases/usuario.class.php");

		$obj_usu=new usuario;

		$accion=$_REQUEST["accion"];
		switch ($accion){
			case 'agregar':
				$obj_usu->ide_ban_usu=$_POST["ide_ban_usu"]; // El input en el atributo name se llama ide_usu
				$obj_usu->ide_usu=$_POST["ide_usu"]; // El input en el atributo name se llama ide_usu
				$obj_usu->raz_usu=$_POST["raz_usu"]; // El input en el atributo name se llama raz_usu
				$obj_usu->dir_usu=$_POST["dir_usu"]; // El input en el atributo name se llama dir_usu
				$obj_usu->ema_usu=$_POST["ema_usu"]; // El input en el atributo name se llama ema_usu
				$obj_usu->tel_usu=$_POST["tel_usu"]; // El input en el atributo name se llama tel_usu
				$obj_usu->est_usu=$_POST["est_usu"]; // El input en el atributo name se llama est_usu
				$resultado=$obj_usu->agregar();
				if($resultado==true){
					$fila=$obj_usu->buscar2();
					echo "<div>
							<p>¡Operacion Completada!</p><br>
							<a href='../vista/cuenta_banco/agregar.php?cod_usu=$fila[cod_usu]'>Crear Cuenta</a>
						 </div>";
				}else{
					echo "<div>
							<p>¡Algo Salio Mal!</p><br>
							<a href='../vista/usuario/listar.php'>Volver.</a>
						</div>";
				}
				break;

			case 'editar':
				$obj_usu->cod_usu=$_POST['cod_usu'];
				$obj_usu->ide_usu=$_POST["ide_ban_usu"]; // El input en el atributo name se llama ide_usu
				$obj_usu->ide_usu=$_POST["ide_usu"]; // El input en el atributo name se llama ide_usu
				$obj_usu->raz_usu=$_POST["raz_usu"]; // El input en el atributo name se llama raz_usu
				$obj_usu->dir_usu=$_POST["dir_usu"];
				$obj_usu->ema_usu=$_POST["ema_usu"]; // El input en el atributo name se llama ema_usu
				$obj_usu->tel_usu=$_POST["tel_usu"]; // El input en el atributo name se llama tel_usu
				$obj_usu->est_usu=$_POST["est_usu"]; // El input en el atributo name se llama est_usu
				$resultado=$obj_usu->editar();
				if($resultado==true){
					echo "<div>
							<p>¡Operacion Completada!</p><br>
							<a href='../vista/usuario/listar.php'>Volver.</a>
						 </div>";
				}else{
					echo "<div>
							<p>¡Algo Salio Mal!</p><br>
							<a href='../vista/usuario/listar.php'>Volver.</a>
						</div>";
				}
				break;

			case 'borrar':
				$obj_usu->cod_usu=$_GET['cod_usu'];
				$resultado=$obj_usu->borrado_logico();
				if($resultado==true){
					echo "<div>
							<p>¡Operacion Completada!</p><br>
							<a href='../vista/usuario/listar.php'>Volver.</a>
						 </div>";
				}else{
					echo "<div>
							<p>¡Algo Salio Mal!</p><br>
							<a href='../vista/usuario/listar.php'>Volver.</a>
						</div>";
				}
				break;

			default:
				echo "<div><p>Something Went Wrong ¯\_(ツ)_/¯</p></div>";
				echo "<a href='../vista/usuario/listar.php'>Volver.</a>";
				break;
		}		
	?>
</body>
</html>