<?php 
require '../librerias/conexion.php';
	//realizar la consulta y guardarla
$max= "SELECT MAX(id_llamada) AS id FROM llamada";
$r=$mysqli->query($max);
while ($ver1 = $r->fetch_assoc()) {
	$vr = ($ver1['id']);
}
	//consulta el los datos del ultimo registro insertado en llamadas
$query = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona AND c.id_llamada = '$vr'";
$resultado = $mysqli->query($query);
	//se recorre la consulta para obtener el id de la persona dentro de la llmada
while ($row = $resultado->fetch_assoc()) {
	$idper = $row['id_persona'];
}
	//se hace la consulta para saber si es el primer registro y o ya es un contacto con mas registros
$con = "SELECT * FROM llamada WHERE id_persona = '$idper'";
$res = $mysqli->query($con);
	//se cuanta cuantas filas se tiene
$row_cnt = $res->num_rows;
	//si es mayor que 1 se manda a la etiqueta el valor de solo lectura para descativar la edicion
	//si no se deja activada para la edicion
if ($row_cnt>1) {
	$etiqueta = "readonly";
}else{
	$etiqueta = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Detalle del registro</title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">

	<link rel="shortcut icon" type="image/x-icon" href="../media/logo.png">

	<script src="../librerias/jquery-3.3.1.min.js"></script>
	<script src="../librerias/bootstrap/js/bootstrap.js"></script>
	<script src="../librerias/alertifyjs/alertify.js"></script>
	<script src="../librerias/select2/js/select2.js"></script>
</head>
<body>
	<!--barra de navegacion-->
	<div class="bs-example">
		<nav class="navbar navbar-default">
			<!-- vista en dispositivos mobiles (sandwich)-->
			<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">
					<img src="../media/logo.png" alt="icon" style="width: 170px; margin-left:50px;">
				</a> 
			</div>
			<!-- enlaces para la navegacion responsiva  -->
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav" style="padding-top:6px;">
					<li><a href="../index.php">INICIO</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="padding-top:6px;">
					<li><a href="../includes/logout.php">SALIR</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="container" style="background-color: #F8F8F8; border: solid #E7E7E7 1px;">
		<h1 align="center">Resultado del registro de llamada</h1>

		<br></br>
		<br>
		<!------------divisor--------->
		<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>				
		<form action="../php/actualizar.php" method="POST" >
			<?php
			$query = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona AND c.id_llamada = '$vr'";
			$resultado = $mysqli->query($query);
			while($row = $resultado->fetch_assoc())
			{
				?>
				<input type="hidden" name="idpersona" id="idpersona" value="<?php echo $row['id_persona']?>">
				<input type="hidden" name="idllamada" id="idllamada" value="<?php echo $row['id_llamada']?>">
				<input type="hidden" name="filas" id="filas" value="<?php echo $row_cnt ?>">
				<!--Nombre-->
				<div class="form-group col-md-4">
					<label class="control-label" for="nombre">Nombre:</label>
					<input id="nombre" name="nombre" onkeyup="this.value=NumText(this.value)" type="text" placeholder="" class="form-control" value="<?php echo $row['nombre'] ?>" <?php echo "$etiqueta" ?> required="">
				</div>

				<!--Edad -->
				<div class="form-group col-md-2">
					<label class=" control-label" for="edad">Edad:</label>
					<input id="edad" name="edad" onkeyup="this.value=Numeros(this.value)" type="text"  class="form-control" value="<?php echo $row['edad'] ?>" <?php echo "$etiqueta" ?> required/>
				</div>

				
				<!--Sexo -->
				<div class="form-group col-md-3">
					<label class=" control-label" for="sexo">Sexo:</label>
					<input id="sexo" name="sexo"  class="form-control" <?php echo "$etiqueta" ?> value="<?php echo $row['sexo'] ?>" require>
				</div>

				<!--Telefono-->
				<div class="form-group col-md-2">
					<label class=" control-label" for="telefono">Teléfono:</label>  
					<input id="telefono" name="telefono" onkeyup="this.value=Numeros(this.value)" type="tel" pattern="[0-9]{10}" placeholder="" class="form-control" value="<?php echo $row['telefono'] ?>"  required/>
				</div>

				<!------------divisor--------->
				<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>

				<!--Email-->
				<div class="form-group col-md-4">
					<label class=" control-label" for="email">E-Mail:</label>  
					<input id="correo" name="correo" type="email" placeholder=""  class="form-control" value="<?php echo $row['correo'] ?>"  required>
				</div>
				

				<!--Estudios -->
				<div class="form-group col-md-3">
					<label class=" control-label" for="fecha">Fecha de llamada:</label>
					<input id="fecha" name="fecha" class="form-control" type="date" value="<?php echo $row['fecha'] ?>">		
				</div>

				<!--Tipo de persona-->
				<div class="form-group col-md-5">
					<label class=" control-label" for="comentario">Comentario:</label>
					<textarea id="comentario" name="comentario" type="textarea" class="form-control" ><?php echo $row['comentario'] ?></textarea>
				</div>
				<?php 
			}
			?>	
			
			<!------------divisor--------->
			<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
			
			<div class="container row">
				<div class="col-md-6 col-md-offset-6">
					<div align="right">
						<!-- Button - guardar/cancelar -->
						<button type="submit" id="guardar" name="guardar" class="btn btn-info">Guardar cambios</button> 
						<button type="button" id="guardar" onclick="reporteabrir();" name="guardar" class="btn btn-primary">Generar Reporte</button>
						<button type="button" onclick="regllamabrir();" style="width: 145px;" name="guardar" class="btn btn-warning">Atrás</button>
					</div>
				</div>
			</div>
		</form>
		<br>
	</div>
</body>
</html>
<script>
	function reporteabrir(){
		window.open('../librerias/reportellamadas.php');
	}
	function regllamabrir(){
		location.href = '../vistas/Registro_llamada.php';
	}
</script>