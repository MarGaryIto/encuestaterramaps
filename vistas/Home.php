<?php 
	//se asigna a una variable de sesion el valir del id del aplicador
$_SESSION['id']=$user->getID();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="shortcut icon" type="image/x-icon" href="media/logo.png">

	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<style>
	.contenedorimg{
		position: relative;
		display: inline-block;
		text-align: center;
		border-radius: 10px;
		background-color: #000;
		margin: 10px;
	}
	.centrado{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	.superior{
		position: absolute;
		top: 80%;
		right: 2%;
		transform: translate(0%, 0%);
		text-align: right;
	}
	.imagen:hover {
		filter: blur(5px);
		transition:all .2s ease-in-out;

	}
	.imagen{
		filter: opacity(0.7); 
		width: 100%;
		border-radius: 10px;
		transition:all .2s ease-in-out;
		background-color: #ec731e;
	}
	.centrado h1{
		color: white;
		text-shadow: 1px 1px 1px #aaa;
	}
	.superior p {
		color: white;
		text-shadow: 1px 1px 1px #aaa;
		font-size: small;
	}
</style>
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
					<img src="media/logo.png" alt="icon" style="width: 170px; margin-left:50px;">
				</a>

			</div>
			<!-- enlaces para la navegacion responsiva  -->
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right" style="padding-top:6px;">
					<li><a href="includes/logout.php">SALIR</a></li>
				</ul>
			</div>
		</nav>
	</div>
	
	<!--tarjetas del menu-->
	<div class="container">
		<!--botones-->
		<div class="container show-top-margin separate-rows tall-rows">
			<div class="row show-grid">
				<!--nueva encuesta-->
				<div class="col-md-4">
					<a href="vistas/Encuesta.php"><!--enlace-->
						<div class="contenedorimg">
							<img src="media/nueva_encuesta.jpg" class="imagen" /><!--imagen-->
							<div class="centrado"><h1>Nueva encuesta</h1></div><!--titulo-->
							<div class="superior"><p>Realizar una nueva encuesta.</p></div><!--descripc-->
						</div>
					</a>
				</div>
				<!--Registro de llamadas-->
				<div class="col-md-4">
					<a href="vistas/Registro_llamada.php">
						<div class="contenedorimg">
							<img src="media/registro_de_llamadas.jpg" class="imagen" />
							<div class="centrado"><h1>Registro de llamadas</h1></div>
							<div class="superior"><p>Registrar llamadas realizadas por los posibles clientes.</p></div>
						</div>
					</a>
				</div>
				<!---Reporte de llamadas-->
				<div class="col-md-4">
					<a href="vistas/Reporte_llamada.php">
						<div class="contenedorimg">
							<img src="media/registro_de_llamadas.jpg" class="imagen" />
							<div class="centrado"><h1>Reporte de llamadas</h1></div>
							<div class="superior"><p>Dar seguimiento a llamadas realizadas.</p></div>
						</div>
					</a>
				</div>
				<!--reporte de encuestas-->
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<a href="vistas/Reporte_encuesta.php">
						<div class="contenedorimg">
							<img src="media/nuevo_reporte.jpg" class="imagen" />
							<div class="centrado"><h1>Reporte de encuesta</h1></div>
							<div class="superior"><p>Generar un reporte personalizado.</p></div>
						</div>
					</a>
				</div>
				
				<!--contactos-->
				<div class="col-md-4">
					<a href="vistas/Contactos.php">
						<div class="contenedorimg">
							<img src="media/datos_del_cliente.jpg" class="imagen" />
							<div class="centrado"><h1>Contactos</h1></div>
							<div class="superior"><p>Ver, actualizar y eliminar datos de clientes.</p></div>
						</div>
					</a>
				</div><!--contactos-->
				<div class="col-md-2"></div>
			</div><!--row show-grid-->
		</div><!--botones-->	
	</div><!--container-->
</body>
</html>