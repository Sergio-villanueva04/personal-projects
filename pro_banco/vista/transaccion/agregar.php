<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Transacción</title>
	<link rel="icon" type="image" href="../../imagen/IMG-20221216-WA0000.jpg">
	<link rel="stylesheet" href="../../estilo/agregar.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="box text-center">
		<form action="../../controlador/transaccion.php" method="POST">
			<div>
				<input type="hidden" id="accion" name="accion" value="<?php echo $tip_tran=$_GET['accion']; ?>">
				<input type="hidden" id="tip_tran" name="tip_tran" value="<?php echo $tip_tran=$_GET['accion']; ?>">
			</div>
			<?php
			if ($tip_tran=="deposito") {
				echo "<h2 class='titulo'>Detalles del Deposito: </h2>";
			}
			if ($tip_tran=="retiro") {
				echo "<h2 class='titulo'>Detalles del Retiro: </h2>";
			}
			?>
			<div>
				<label for="ide_cue_tran">Cuenta: </label>
				<br>
				<select name='ide_cue_tran' id='ide_cue_tran' class="select" onchange="codigo(this);" required>
					<option value="">Seleccione...</option>
					<?php
					require '../../clases/transaccion.class.php';
	
						$obj_tran=new transaccion;
	
						if ($tip_tran=="deposito") {
							$pun_tran=$obj_tran->list_cuenta_deposito();
							while (($datos=$obj_tran->extraer_dato($pun_tran))>0) {
								echo "<option value='";
								echo $datos["ide_cue"];
								echo "' label='";
								echo "Nombre: ".$datos["raz_usu"]." N°: ".$datos["cod_cue_ban"];
								echo "'>";
								echo $datos["ide_ban_usu"];
								echo "</option>";
							}
						}
	
						if ($tip_tran=="retiro") {
							$obj_tran->val_min_tran=$_GET["val_min_tran"];
							$pun_tran=$obj_tran->list_cuenta_retiro();
							while (($datos=$obj_tran->extraer_dato($pun_tran))>0) {
								echo "<option value='";
								echo $datos["ide_cue"];
								echo "'>";
								echo "Nombre: ".$datos["raz_usu"]." N°: ".$datos["cod_cue_ban"];
								echo "</option>";
							}
						}
					?>
				</select>
				<?php
				if ($tip_tran=="retiro") {
					echo "<input type='hidden' id='val_min_tran' name='val_min_tran' value='";
					echo $valor_minimo=$_GET["val_min_tran"];
					echo "'>";
				}
				?>
				<script type="text/javascript">
					function codigo(sel){
						var ban=sel.options[sel.selectedIndex].text;

						var ide=document.getElementById('ide_ban_inv');
						ide.value=ban;
					}
				</script>
				<input type="hidden" id="ide_ban_inv" name="ide_ban_inv" value="">
			</div>
			<br>
			<div>
					<?php
					if ($tip_tran=="deposito") {
						echo "<label for='obj_tran'>Tipo de Residuo Plastico a Depositar:</label><br>";
						echo "<select name='obj_tran' class='select' id='obj_tran' onchange='desc(this);'>
								<option value=''>Seleccione...</option>";
						$pun_tran1=$obj_tran->listar_objeto();
						while(($datos1=$obj_tran->extraer_dato($pun_tran1))>0){
							echo "<option value='";
							echo $datos1["nom_mar"]." ".$datos1["des_pre"];
							echo "'>";
							echo $datos1["nom_mar"]." ".$datos1["des_pre"];
							echo "</option>";
						}
						echo "</select>";
					}
					?>
					<input type="hidden" id="des_inv" name="des_inv" value="">
					<script type="text/javascript">
						function desc(sel){
						var desc=sel.options[sel.selectedIndex].text;

						var ide=document.getElementById('des_inv');
						ide.value=desc;
					}
					</script>
			</div>
			<?php
			if ($tip_tran=="deposito") {
			echo "<br>";
			}
			?>
			<div>
				<label for="des_tran">Descripción: </label>
				<br>
				<input type="text" id="des_tran" class="input-fill" name="des_tran" maxlength="35" required>
			</div>
			<br>
			<div>
				<label for="val_tran">Valor de la Transacción: </label>
				<br>
				<input type="number" class="input-fill" step="0.01" min="0" id="val_tran" name="val_tran" onchange="valor(this);" required>
				<input type="hidden" id="val_inv" name="val_inv" value="">
				<script type="text/javascript">
						function valor(sel){
						var val=document.getElementById('val_tran').value;

						var ide=document.getElementById('val_inv');
						ide.value=val;
					}
					</script>
			</div>
			<br>
			<div>
				<input type="submit" class="input-boton" value="Siguiente">
			</div>
		</form>
	</div>
	<div class="row text-center">
		<div class="col-12 text-center">
			<a href="../../index.php" class="extra">Regresar</a>
		</div>
	</div>
</body>
</html>