<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("i943okdfa47xqzpy.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","q923e2k5av0o6g3e","dw6rzwed0y0sbv32","nob4xoafqpyvdedq"); 
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
