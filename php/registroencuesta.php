<?php 
require_once "conexion.php";
$conexion = conexion();
	//campos para tabla persona
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
	//campos para tabla contacto
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$estudios = $_POST['estudios'];
$tipopersona = $_POST['tipopersona'];
$altashcp = $_POST['alta'];
$obligafiscales = $_POST['obligaciones'];
$factura = $_POST['facturas'];
$idaplicador = $_POST['idaplicador'];
	//campos para direccion
$estados = $_POST['estados'];
$municipio = $_POST['municipio'];
	//campos para lider
$nomlider = $_POST['nomlider'];
$experiencia = $_POST['experiencia'];
	//campos para presupuesto
$empleados = $_POST['empleados'];
$foda = $_POST['foda'];
$utilidad = $_POST['utilidad'];
$valor = $_POST['valor'];
$monto = $_POST['monto'];
	//campos para proyecto
$descripcion = $_POST['descripcion'];
$proyectopara = $_POST['proyecto'];
$clase = $_POST['claseproyecto'];
	//campos para empresa
$razonsocial = $_POST['razonsocial'];
$giro = $_POST['giro'];
$sector = $_POST['sector'];
$estratificacion = $_POST['estratificacion'];
$numempleados = $_POST['numempleados'];

//INSERTAR LOS DATOS EN PERSONA
$sql = "INSERT INTO persona (nombre, edad, sexo) VALUES ('$nombre','$edad','$sexo')";
$result=mysqli_query($conexion, $sql);

//EXTRAER EL ULTIMO ID DE LA TABLA persona
$maxpersona = "SELECT MAX(id_persona) AS id FROM persona";
$idper=mysqli_query($conexion, $maxpersona);
while ($idpers = mysqli_fetch_row($idper)) {
	$idpersona = ($idpers[0]);
}

//INSERTAR LOS DATOS EN LA TABLA informacion
$cont = "INSERT INTO informacion (id_persona, telefono, correo, tipo_persona, alta_shcp, observasiones_fiscales, factura, id_aplicador, estudios) VALUES ('$idpersona', '$telefono', '$email', '$tipopersona', '$altashcp', '$obligafiscales', '$factura', '$idaplicador', '$estudios')";
$conta = mysqli_query($conexion, $cont);

//EXTRAER EL ULTIMO ID DE LA TABLA informacion
$maxcontacto = "SELECT MAX(id_informacion) AS id FROM informacion";
$idcon = mysqli_query($conexion, $maxcontacto);
while ($idcont = mysqli_fetch_row($idcon)) {
	$idcontacto = ($idcont[0]);
}

//INSERTAR LOS DATOS EN LA TABLA direccion
$dir = "INSERT INTO direccion (estado, municipio) VALUES ('$estados', '$municipio')";
$dire = mysqli_query($conexion, $dir);

 	//EXTRAER EL ULTIMO ID DE LA TABLA direccion
$maxdireccion = "SELECT MAX(id_direccion) AS id FROM direccion";
$iddirec = mysqli_query($conexion, $maxdireccion);
while ($idireccion = mysqli_fetch_row($iddirec)) {
	$iddireccion = ($idireccion[0]);
}


	//INSERTAR LOS DATOS EN LA TABLA lider
$l = "INSERT INTO lider(experiencia, nombrelider) VALUES ('$experiencia', '$nomlider')";
$lid = mysqli_query($conexion, $l);

 	//EXTRAER EL ULTIMO ID DE LA TABLA lider
$maxlider = "SELECT MAX(id_lider) AS id FROM lider";
$idli = mysqli_query($conexion, $maxlider);
while ($idlid = mysqli_fetch_row($idli)) {
	$idlider = ($idlid[0]);
}



	//INSERTAR LOS DATOS EN LA TABLA presupuesto
$l = "INSERT INTO presupuesto(foda, empleados, utilidad, valor, monto) VALUES ('$foda', '$empleados', '$utilidad', '$valor', '$monto')";
$lid = mysqli_query($conexion, $l);

 	//EXTRAER EL ULTIMO ID DE LA TABLA presupuesto
$maxpresupuesto = "SELECT MAX(id_presupuesto) AS id FROM presupuesto";
$idpresu = mysqli_query($conexion, $maxpresupuesto);
while ($idpresupu = mysqli_fetch_row($idpresu)) {
	$idpresupuesto = ($idpresupu[0]);
}



	//INSERTAR LOS DATOS EN LA TABLA proyecto
$p = "INSERT INTO proyecto(descripcion, id_lider, id_presupuesto, proyectopara, claseproyecto) VALUES ('$descripcion', '$idlider', '$idpresupuesto', '$proyectopara', '$clase')";
$pro = mysqli_query($conexion, $p);

 	//EXTRAER EL ULTIMO ID DE LA TABLA proyecto
$maxproyecto = "SELECT MAX(id_proyecto) AS id FROM proyecto";
$idpro = mysqli_query($conexion, $maxproyecto);
while ($idproye = mysqli_fetch_row($idpro)) {
	$idproyecto = ($idproye[0]);
}


	//INSERTAR LOS DATOS EN LA TABLA empresa
$e = "INSERT INTO empresa(id_proyecto, razon_social, giro, sector, estratificacion, empleados, id_direccion, id_informacion) VALUES ('$idproyecto', '$razonsocial', '$giro', '$sector', '$estratificacion', '$numempleados', '$iddireccion', '$idcontacto')";
$em = mysqli_query($conexion, $e);
if ($em) {
	clearstatcache();
	require_once("../vistas/encuestaguardad.php");
	echo "<link rel='stylesheet' type='text/css' href='../librerias/bootstrap/css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='../librerias/alertifyjs/css/alertify.css'>
	<link rel='stylesheet' type='text/css' href='../librerias/alertifyjs/css/themes/default.css'>
	<script src='../librerias/jquery-3.3.1.min.js'></script>
	<script src='../librerias/bootstrap/js/bootstrap.js'></script>
	<script src='../librerias/alertifyjs/alertify.js'></script>";
	echo "<script type='text/javascript'>";
	echo "$(document).ready(function(){";
	echo "alertify.success('Encuesta realizada con éxito');";
	echo "});";
	echo "</script>";
}else{
	echo "no se inserto empresa";
}
?> 