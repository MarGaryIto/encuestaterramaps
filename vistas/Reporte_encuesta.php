<?php

	session_start();
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
	<title>Reporte de encuestas</title>
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
	<h1 align="center">Reporte de encuestas</h1>
	<div class="container">
		<div id="buscador"></div>
		<div id="tabla"></div>
	</div>
</body>
</html>

<script type="text/javascript">
//se carga la vista de la tabla al momento que se carga la pagina
	$(document).ready(function(){
		//se carga la tabla en el div con el id tabla
		$('#tabla').load('../componentes/tablaencuesta.php');
		$('#buscador').load('../componentes/buscadorencuesta.php')
	});
</script>