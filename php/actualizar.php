<?php 
//llamar la conexion a la base de datos
require_once "conexion.php";
$conexion = conexion();
//llamar los campos que se enviaron por post desde el modal de contactos
$idllamada = $_POST['idllamada'];
$idpersona = $_POST['idpersona'];
$filas = $_POST['filas'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$fecha = $_POST['fecha'];
$comentario = $_POST['comentario'];

if ($filas > 1) {
	$llamad = "UPDATE llamada SET fecha = '$fecha', telefono = '$telefono', correo = '$correo', comentario = '$comentario', id_persona = '$idpersona' WHERE id_llamada = '$idllamada'";
	$lla = mysqli_query($conexion, $llamad);
}else{
	$per = "UPDATE persona SET nombre = '$nombre', edad = '$edad', sexo = '$sexo' WHERE id_persona = '$idpersona'";

	$p = mysqli_query($conexion, $per);
		//se realiza la consulta para actualizar a llamada
	$llamad = "UPDATE llamada SET fecha = '$fecha', telefono = '$telefono', correo = '$correo', comentario = '$comentario', id_persona = '$idpersona' WHERE id_llamada = '$idllamada'";
	$lla = mysqli_query($conexion, $llamad);

}
	//se determina si se inserto persona, si no se manda mensaje de que no se inserto 
if ($lla) {
	clearstatcache();
	require_once "../vistas/Contactos.php";
	echo "<script type='text/javascript'>";
	echo "$(document).ready(function(){";
	echo "alertify.success('se ha modificado el contacto');";
	echo "});";
	echo "</script>";
}else{
	clearstatcache();
	echo "<script type='text/javascript'>";
	echo "$(document).ready(function(){";
	echo "alertify.warning('hubo un error al actualizar los datos');";
	echo "});";
	echo "</script>";
}

?>