<?php 
//realizar la conexion
require_once "../php/conexion.php";
//guardar la conexion
$conexion=conexion();
//extraer la variable traida por post
$id = $_POST['id'];
//guardar la consulta y ejecutandola
$n = "SELECT * FROM llamada WHERE id_llamada ='$id'";
$nu = mysqli_query($conexion,$n);
//recorrer el arreglo para guardar el id de la persona de la llamada que se va a eliminar
while ( $row = mysqli_fetch_row($nu)) {
	$idper = $row[5];
}
//se hace la consulta para traer todos los registros que tengan el mismo id de persona
$per = "SELECT * FROM llamada WHERE id_persona ='$idper'";
$res = mysqli_query($conexion,$per);
//se cuanta cuantas filas tiene el arreglo
$row_cnt = $res->num_rows;
//se determina si solo se tiene una fila se elimina el llamada con toda la informacion de persona
//si las filas son mayores que 1 solo se elimina el registro de la llamada
if ($row_cnt > 1) {
	$eliminarllam = "DELETE FROM llamada WHERE id_llamada ='$id'";
	echo $resul = mysqli_query($conexion,$eliminarllam);
}elseif ($row_cnt <= 1) {
	$elimntodo = "DELETE persona, llamada FROM persona INNER JOIN llamada ON llamada.id_persona = persona.id_persona WHERE llamada.id_llamada = '$id'";
	echo $resul = mysqli_query($conexion,$elimntodo);
}
?>