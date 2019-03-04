<?php
	//se inicia secion pra las variables de sesion
session_start();
	//se require el archivo de sesion se guarda en una variable
require_once "../php/conexion.php";
$conexion=conexion();
unset($_SESSION['consulta']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Contactos</title>

	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="shortcut icon" type="image/x-icon" href="../media/logo.png">
	<script src="../librerias/jquery-3.3.1.min.js"></script>
	<script src="../librerias/bootstrap/js/bootstrap.js"></script>
	<script src="../js/funciones.js"></script>
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
				<a href="../index.php" class="navbar-brand">
					<img src="../media/logo.png" alt="icon" style="width:110px; margin-left:10px; margin-top:5px;">
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
	<br>
	<h1 align="center">Lista de contactos</h1>
	
	<div class="container">
		<div id="buscador"></div>
		<div id="tabla"></div>
	</div>
	<!-- Modal para la edicion de datos-->
	<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Editar datos</h4>
				</div>
				<form action="../php/actualizar.php" method="POST">
					<div class="modal-body">
						<input type="hidden" name="idllamada" id="idllamada" class="form-control input-sm">
						<input type="hidden" name="idpersona" id="idpersona" class="form-control input-sm">

						<input type="hidden" name="filas" id="filas" value="0" class="form-control input-sm">


						<label for="">Nombre</label>
						<input type="text" onkeyup="this.value=NumText(this.value)" name="nombre" readonly="" id="nombre" class="form-control input-sm">

						<label for="">edad</label>
						<input type="text" name="edad" onkeyup="this.value=Numeros(this.value)" readonly="" id="edad" class="form-control input-sm">

						<label for="">Sexo</label>
						<input type="text" name="sexo"  readonly="" id="sexo" class="form-control input-sm">

						<label for="">Teléfono</label>
						<input type="text" name="telefono" onkeyup="this.value=Numeros(this.value)" id="telefono" class="form-control input-sm">

						<label for="">Correo</label>
						<input type="email" name="correo"  id="correo" class="form-control input-sm">

						<label for="">Comentario</label>
						<input type="text" name="comentario" id="comentario" onkeyup="this.value=NumText(this.value)" class="form-control input-sm">

						<label for="">Fecha</label>
						<input type="date" name="fecha" id="fecha" class="form-control input-sm">

					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-warning" id="actualizadatos">Guardar cambios</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</body>
</html>
<!--script para cargar la tabla-->
<script type="text/javascript">
	//se carga la vista de la tabla al momento que se carga la pagina
	$(document).ready(function(){
		//se carga la tabla en el div con el id tabla
		$('#tabla').load('../componentes/tablacontacto.php');
		$('#buscador').load('../componentes/buscadorcontacto.php');
	});
</script>


