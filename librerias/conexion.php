<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("z12itfj4c1vgopf8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","a475y0a742z9kxy5","qfq6hvbjqb8po5ki","ost4g6yz9kex2re7"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
