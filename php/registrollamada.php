<?php 
require_once "conexion.php";
$conexion = conexion();
$id_persona = $_POST['buscador'];
$nombre =$_POST['nombre'];
$sexo =$_POST['sexo'];
$edad =$_POST['edad'];
$fecha=$_POST['fecha'];
$telefono =$_POST['telefono'];
$correo =$_POST['correo'];
$comentario=$_POST['comentarios'];

//insertar persona
if ($id_persona == "Selecciona uno") {
	//hacer el query para la consulta
	$sql = "INSERT INTO persona (nombre, edad, sexo) VALUES ('$nombre','$edad','$sexo')";
	$result=mysqli_query($conexion, $sql);
	//dertimar si se realizo la consulta con exito, de llo contrario mandar mensaje de error
	if ($result) {
		//sacar el valor maximom
		$max = "SELECT MAX(id_persona) AS id FROM persona";
		$r=mysqli_query($conexion, $max);
		while ($idpers = mysqli_fetch_row($r)) {
			$idpersona = ($idpers[0]);
		}
		//insertar el registro con el id maximo 
		$sql = "INSERT INTO llamada(fecha, telefono, correo, comentario, id_persona) VALUES ('$fecha','$telefono','$correo','$comentario','$idpersona')";
		$res=mysqli_query($conexion, $sql);
		//si tiene un resultado se llama la vista y se manda mensaje de contacto guardado,
		//de lo contrario se manda mensaje de error
		if ($res) {
			require_once("../vistas/llamada.php");
			echo "<script type='text/javascript'>
				$(document).ready(function(){
					alertify.success('Registro de llamada guardada con exito');
				});
			</script>";
			return;
		}
	}else{
		require_once("../vistas/Registro_llamada.php");
		echo "<script type='text/javascript'>
				$(document).ready(function(){
					alertify.error('Error con el servidor');
				});
			</script>";
		return;
	}
}elseif ($nombre == "contacto") {
	$sql = "INSERT INTO llamada(fecha, telefono, correo, comentario, id_persona) VALUES ('$fecha','$telefono','$correo','$comentario','$id_persona')";
	$res=mysqli_query($conexion, $sql);
	if ($res){
		clearstatcache();
		require_once("../vistas/llamada.php");
		echo "<script type='text/javascript'>
				$(document).ready(function(){
					alertify.success('Registro de llamada guardada con exito');
				});
			</script>";
		return;
	}else{
		clearstatcache();
		require_once("../vistas/Registro_llamada.php");
		echo "<script type='text/javascript'>
				$(document).ready(function(){
					alertify.error('Error con el servidor');
				});
			</script>";
		return;
	}
}

	//$sql = "INSERT INTO llamada (id_contacto, fecha, comentario) VALUES ('$id_contacto','$fecha','$comentario')";
	//$result=mysqli_query($conexion, $sql);
	//if ($result) {
		//require_once("../librerias/reportellamadas.php");
	//}else{
		//echo "hubo un error en la base de datos";
	//}
?>	