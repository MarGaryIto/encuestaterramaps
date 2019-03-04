<?php 
require_once "conexion.php";
$conexion = conexion();
//salvar los id de las tablas a actualizar
$idpersona = $_POST['idpersona'];
$idinformacion = $_POST['idinformacion'];
$iddireccion = $_POST['iddireccion'];
$idproyecto = $_POST['idproyecto'];
$idlider = $_POST['idlider'];
$idpresupuesto = $_POST['idpresupuesto'];
$idempresa = $_POST['idempresa'];
//campos para tabla persona
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
//campos para tabla informacion
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



$persona = "UPDATE persona SET nombre = '$nombre', edad = '$edad', sexo = '$sexo' WHERE id_persona = '$idpersona'";
$p = mysqli_query($conexion, $persona);
if ($p) {
	$informacion = "UPDATE informacion SET telefono = '$telefono', correo = '$email', tipo_persona = '$tipopersona', alta_shcp = '$altashcp', observasiones_fiscales = '$obligafiscales', factura = '$factura', estudios = '$estudios', id_persona = '$idpersona', id_aplicador = '$idaplicador' WHERE id_informacion = '$idinformacion'";
	$i = mysqli_query($conexion, $informacion);
	if ($i) {
		$direccion = "UPDATE direccion SET estado = '$estados', municipio = '$municipio' WHERE id_direccion = '$iddireccion'";
		$d = mysqli_query($conexion, $direccion);
		if ($d) {
			$proyecto = "UPDATE proyecto SET descripcion = '$descripcion', id_lider = '$idlider', id_presupuesto = '$idpresupuesto', proyectopara = '$proyectopara', claseproyecto = '$clase' WHERE id_proyecto = '$idproyecto'";
			$p = mysqli_query($conexion, $proyecto);
			if ($p) {
				$lider = "UPDATE lider SET experiencia = '$experiencia', nombrelider = '$nomlider' WHERE id_lider = '$idlider'";
				$l = mysqli_query($conexion, $lider);
				if ($l) {
					$presupuesto = "UPDATE presupuesto SET foda = '$foda', empleados = '$empleados', utilidad = '$utilidad', valor = '$valor', monto = '$monto' WHERE id_presupuesto = '$idpresupuesto'";
					$pre = mysqli_query($conexion, $presupuesto);
					if ($pre) {
						$empresa = "UPDATE empresa SET id_proyecto = '$idproyecto', razon_social = '$razonsocial', giro = '$giro', sector = '$sector', estratificacion = '$estratificacion', empleados = '$numempleados', id_direccion = '$iddireccion', id_informacion = '$idinformacion' WHERE id_empresa = '$idempresa'";
						$em = mysqli_query($conexion, $empresa);
						if ($em) {
							clearstatcache();
							require_once "../vistas/Reporte_encuesta.php";
							echo "<script type='text/javascript'>";
							echo "$(document).ready(function(){";
							echo "alertify.success('se ha modificado la encuesta');";
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
					}else{
						echo "no se guardo presupuesto correctamente <br>";
					}
				}else{
					echo "no se guardo lider correctamente <br>";
				}
			}else{
				echo "no se guardo proyecto correctamente <br>";
			}
		}else{
			echo "no se guardo direccion correctamente <br>";
		}

	}else{
		echo "no se guardo informacion correctamente <br>";
	}
}else{
	echo "no se guardo persona correctamente <br>";
}
?>