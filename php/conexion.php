<?php 
function conexion(){
	$servidor="i943okdfa47xqzpy.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	$usuario="q923e2k5av0o6g3e";
	$password="dw6rzwed0y0sbv32";
	$bd="nob4xoafqpyvdedq";
	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
	return $conexion;
} ?>
