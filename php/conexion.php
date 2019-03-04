<?php 
function conexion(){
	$servidor="z12itfj4c1vgopf8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	$usuario="a475y0a742z9kxy5";
	$password="qfq6hvbjqb8po5ki";
	$bd="ost4g6yz9kex2re7";
	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
	return $conexion;
} ?>
