<?php 
//se inicia secion pra las variables de sesion
session_start();
//se require el archivo de sesion se guarda en una variable
require_once "../php/conexion.php";
$conexion=conexion();
?>
<div class="row">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<br><br><br>
			<?php
			if (isset($_SESSION['consulta'])) {
				if ($_SESSION['consulta'] > 0) {
					$idp=$_SESSION['consulta'];
					$sql = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona and c.id_persona = '$idp' ORDER BY c.id_llamada DESC";
				}else{
					$sql = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona ORDER BY c.id_llamada DESC";
				}
			}else{
				$sql = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona ORDER BY c.id_llamada DESC";
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
					<td>Comentario</td>
					<td>Fecha</td>
					<td>Editar</td>
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
				$datos =
						$ver[0] . "||" .//id_persona
						$ver[1] . "||" .//nombre
						$ver[2] . "||" .//edad
						$ver[3] . "||" .//sexo
						$ver[4] . "||" .//id_llamda
						$ver[5] . "||" .//fecha
						$ver[6] . "||" .//telefono
						$ver[7] . "||" .//correo
						$ver[8];		//Comentario
						?>
						<tr>
							<!--se pinta los datos en las celda-->
							<td><?php echo $ver[1] ?></td>
							<td><?php echo $ver[2] ?></td>
							<td><?php echo $ver[3] ?></td>
							<td><?php echo $ver[6] ?></td>
							<td><?php echo $ver[7] ?></td>
							<td><?php echo $ver[8] ?></td>
							<td><?php echo $ver[5] ?></td>
							<td>
								<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos; ?>');"></button>
							</td>
							<td>
								<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver[4] ?>')"></button>
							</td>
						</tr>
						<?php 
					}
					?>
		</table>
	</div>
</div>