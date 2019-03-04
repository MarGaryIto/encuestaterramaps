<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Bienvenido</title>
	
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="shortcut icon" type="image/x-icon" href="media/logo.png">

	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>

</head>
<body>
	<!--barra de navegacion-->
	<div class="bs-example">
		<nav class="navbar navbar-default">
			<!-- vista en dispositivos mobiles (sandwich)-->
			<div class="navbar-header">
				<a href="#" class="navbar-brand">
					<img src="media/logo.png" alt="icon" style="width: 170px; margin-left:50px;">
				</a>  
			</div>
		</nav>
	</div>

	<!--formulario para el logeo-->
	<div class="container">
		<div class="card card-container">
			<p align="center">
				<h4>
					<?php
				//se pinta un mensaje de que hay error en el logeo
					if(isset($errorLogin)){
						echo $errorLogin;
					}
					?>
				</h4>
			</p>
			<br>
			<img id="profile-img" class="profile-img-card" src="media/avatar.png" />
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" action="" method="POST">
				<span id="reauth-email" class="reauth-email"></span>
				<input type="text" id="usuario" name="username" class="form-control" placeholder="Usuario" required autofocus>
				<input type="password" id="pass" name="password" class="form-control" placeholder="Contraseña" required>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>
			</form><!-- /form -->
		</div><!-- /card-container -->
	</div><!-- /container -->

</body>
</html>