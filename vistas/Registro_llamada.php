<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$sql="SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona GROUP BY p.id_persona";
$result=mysqli_query($conexion,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Registrar llamadas</title> 
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
	<!--contenedor para el formulario-->
	<div class="container" style="background-color: #F8F8F8; border: solid #E7E7E7 1px;">
		<h2 align="center">Registro de llamadas</h2><!--Titulo antes del cuestionario-->
		<br>
		<!------------divisor--------->
		<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
		
		<form class="" method="POST" action="../php/registrollamada.php">
			<!-- contacto --->
			<div class="form-group col-md-3">
				<label class="control-label" for="sexo">Contacto</label>
				<div class="radio">
					<label for="sexo-0">
						<input type="radio" name="contacto" id="contacto" value="nuevo" checked="checked" onclick="ver(this)">
						Nuevo contacto
					</label>
					<label for="sexo-1">
						<input type="radio" name="contacto" id="contacto" value="existente" onclick="ver1(this)">
						Seleccionar contacto existente
					</label>
				</div>
			</div>
			<!---nombre del contacto (contacto nuevo)--->
			<div class="form-group col-md-9">
				<div class="oculto">
					<label class="control-label" onkeyup="this.value=NumText(this.value)" for="nombre">Nombre del contacto:</label>
					<input type="text" class="form-control" value="Contacto" name="nombre" class="nombre" id="nombre" required>
				</div>
			</div>
			<!---seleccionar contacto (contacto existente)--->
			<div class="form-group col-md-9">
				<div class="oculto1">
					<label class="control-label" for="contacto">Seleccionar Contacto:</label>
					<select id="buscador" name="buscador" class="form-control" >
						<option value="Selecciona uno">Seleciona uno</option>
						<?php
						
						while($ver=mysqli_fetch_row($result)):
							$datos =
								$ver[2] . "||" .//sexo?
								$ver[3];//edad?
							echo "<script type='text/javascript'>
									VariableJS =  $ver[2];
								</script>"; 
						?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]?></option>
					<?php endwhile; ?>
				</select>
			</div>
		</div>
		<!------------divisor--------->
		<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
		<!--------------edad-------->
		<div id="edd" class="form-group col-md-3">
			<label class="control-label" for="edad">Edad:</label>
			<input type="number" onkeyup="this.value=Numeros(this.value)" class="form-control" id="edad" placeholder="0" name="edad" required>
		</div>
		<!------------sexo----------->
		<div id="sex" class="form-group col-md-3">
			<label class="col-md-4 control-label" for="sexo">Sexo:</label>
			<select class="form-control" name="sexo" id="sexo" required="">
				<option value="0">Selecciona uno</option>
				<option value="Femenino">Femenino</option>
				<option value="Masculino">Masculino</option>
			</select>
		</div>
		<!------------telefono------------>
		<div class="form-group col-md-3">
			<label class="control-label" for="telefono">Teléfono:</label>
			<input type="tel" onkeyup="this.value=Numeros(this.value)" class="form-control" name="telefono" id="telefono" required>
		</div>
		<!------------correo-------------->
		<div class="form-group col-md-3">
			<label class="control-label" for="correo">Correo:</label>
			<input type="email" class="form-control" name="correo" id="correo" required>
		</div>
		<!------------divisor--------->
		<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
		<!-----fecha de llamada------>
		<div class="form-group col-md-3">
			<label class="control-label" for="fecha">Fecha de llamada:</label>
			<input type="date" class="form-control" id="fecha" name="fecha" required>
		</div>
		<!-------comentario--------->
		<div class="form-group col-md-9">
			<label class="control-label" for="comentario">Comentario:</label>
			<textarea id="comentarios" id="comentarios" name="comentarios" type="textarea" placeholder="" class="form-control" required=""></textarea>
		</div>
		<!------------divisor--------->
		<div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
		<!-- Button - guardar/cancelar -->
		<div class="container row">
			<div class="col-md-6 col-md-offset-6">
				<div align="right">
					<br>
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-default">Cancelar</button>            
				</div>
			</div>
		</div>
		<br>

	</form>
</div>
</body>
</html>	

<script type="text/javascript">
	$(document).ready(function(){
		$('#buscador').select2();
		$("div.oculto1").hide();	
	});
</script>
<script type="text/javascript">
	function ver(e) {
		$("#edd").show();
		$("#sex").show();
		$("div.oculto").show('slow');
		$("#buscador").val("Selecciona uno");
		$('#buscador').change();
		document.getElementById("edad").disabled = false;
		document.getElementById("sexo").disabled = false;
		$("div.oculto1").hide();
		
	}
	function ver1(e) {
		$("div.oculto1").show('slow');
		//$("input.nombre").val();
		document.getElementById("nombre").value = "contacto";
		$("input.nombre").val("contacto");
		document.getElementById("edad").value = 0;
		$("#sexo").val("0");
		$('#sexo').change();
		$("#edd").hide();
		$("#sex").hide();
		$("div.oculto").hide();
	}		
</script>