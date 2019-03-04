<?php 
	//se inicia secion pra las variables de sesion
	session_start();
	//se require el archivo de sesion se guarda en una variable
	require_once "../php/conexion.php";
	$conexion=conexion();
 ?>
<div class="row">
	<div class="table-responsive">
		<table class="table table-hover table-condensed table-bordered">
			<br>
			<br>
			<br>
			<?php
				if (isset($_SESSION['consulta'])) {
					if ($_SESSION['consulta'] > 0) {
						$idp=$_SESSION['consulta'];
						$sql = "SELECT p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto AND p.id_persona = '$idp' ORDER BY p.id_persona DESC";
					}else{
						$sql = "SELECT p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto ORDER BY p.id_persona DESC";
					}
				}else{
					$sql = "SELECT p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto ORDER BY p.id_persona DESC";
				}
				//se hace una consulta para traer los las personas que estan como contactos
				//$sql = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona";
				$resultado = mysqli_query($conexion, $sql);
				//si la consulta tiene mas de una fila se pinta la tabla, sino se pinta el mensaje de que no se encontraron registros
				if ($resultado->num_rows > 0) {
					?>
			<tr class="active" style="font-weight: bold;">
				<td>Nombre</td>
				<td>Edad</td>
				<td>Sexo</td>
				<td>Telefono</td>
				<td>Correo</td>
				<td>Reporte</td>
				<td>Eliminar</td>
				
			</tr>
					<?php 
				}else{
					//se pinta el mensaje de que no se tiene registros
					echo "<h1 align='center'>No se encontraron registros</h1><br>";
					echo "<div align='center'><img style='' class='img-responsive' src='../media/sin_registro.jpg'></div>";
					return;
				}
			 ?>
			  
			
			<?php
			
				// se recorre todos los datos para pintarlos en la tabla
				while ($ver = mysqli_fetch_row($resultado)) {
					//variable para pintar los campos del modal de editar que se pintan desde un javascript
					$datos = $ver[0];
						
						
			 ?>
			<tr>
				<!--se pinta los datos en las celda-->
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				
				<td>
					<form action="../librerias/reporteencuestap.php" method="POST">
						<input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $ver[32];?>">
						<button type="submit" class="btn btn-primary glyphicon glyphicon glyphicon-save" >
						</button>
					</form>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntar('<?php echo $ver[0] ?>')"></button>
				</td>
				
			</tr>
			<?php 
				}
			 ?>
		</table>
	</div>
</div>