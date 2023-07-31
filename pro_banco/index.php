<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenido</title>
	<link rel="icon" type="image" href="imagen/IMG-20230124-WA0000.jpg">
	<link rel="stylesheet" href="estilo/main-estilo.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="back">
	<header>
		<div style="float: left;">
			<a href="index.php">
				<img src="imagen/IMG-20230124-WA0000.jpg" alt="" title="¡Enseñando Finanzas con Gusto!" class="logo">
			</a>
		</div>
		<div style="float: left;">
			<h2>EcoFinance</h2>
		</div>
		<div>
			<nav style="float: right;">
				<ol>
					<li style="float: right;">
						<a href="vista/movimiento/menu.php">
							<strong>Movimientos</strong>
						</a>
					</li>
					<li style="float: right;">
						<a href="vista/inventario/listar.php" title="Lista de Productos Dentro del Inventario">
							<strong>Bóveda</strong>
						</a>
					</li>
					<li style="float: right;">
						<a href="vista/marca/listar.php" title="Lista de Productos Dentro del Inventario">
							<strong>Residuos Plásticos</strong>
						</a>
					</li>
					<li style="float: right;">
						<a href="vista/cuenta_banco/listar.php" title="Lista de Cuentas">
							<strong>Cuentas</strong>
						</a>
					</li>
					<li style="float: right;">
						<a href="vista/tipo_cuenta/listar.php" title="Lista de Cuentas">
							<strong>Tipos de Cuentas</strong>
						</a>
					</li>
					<li style="float: right;">
						<a href="vista/banco/listar.php" title="Lista de Instituciones">
							<strong>Agencias</strong>
						</a>
					</li>
					<li style="float: right;"><a href="vista/usuario/listar.php" title="Lista de Usuarios">
							<strong>Usuarios</strong>
						</a>
					</li>
				</ol>
			</nav>
		</div>
	</header><br>

	<div class="ban1">
		<img class="banner" src="imagen/imagen_pantalla_ppal.jpg">
	</div>

	<div class="cuerpo">
		<div class="box1 text-center">
			<a href="vista/transaccion/agregar.php?accion=deposito" class="extra depo-reti">Depositar</a>
		</div>
		<div class="box2 text-center">
			<a href="vista/transaccion/minimo.php?accion=retiro" class="extra depo-reti">Retirar</a>
		</div>
		<br>
	</div>
</body>
</html>