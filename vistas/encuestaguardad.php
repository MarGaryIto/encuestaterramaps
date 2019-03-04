<?php
  //se inicia sesion para traer las variables de sesion 
session_start();
  //se extrae el valor de la variable sesion y se guarde en un id
$id = $_SESSION['id'];
require '../librerias/conexion.php';
	//realizar la consulta y guardarla
$max= "SELECT MAX(id_empresa) AS id FROM empresa";
$r=$mysqli->query($max);
while ($ver1 = $r->fetch_assoc()) {
  $vr = ($ver1['id']);
}
	//consulta el los datos del ultimo registro insertado en empresa
$query = "SELECT p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto AND em.id_empresa = '$vr'";
$resultado = $mysqli->query($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Nueva Encuesta</title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="shortcut icon" type="image/x-icon" href="../media/logo.png">

  <script src="../librerias/jquery-3.3.1.min.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.js"></script>
</head>
<body>
  <!--barra de navegacion-->
  <div class="bs-example">
    <nav class="navbar navbar-default">
      <!-- vista en dispositivos mobiles (sandwich)-->
      <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="../index.php" class="navbar-brand">
          <img src="../media/logo.png" alt="icon" style="width:110px; margin-left:10px; margin-top:5px;">
        </a> 
      </div>
      <!-- enlaces para la navegacion responsiva  -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" style="padding-top:6px;">
          <li><a href="../index.php">INICIO</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="padding-top:6px;">
          <li><a href="../includes/logout.php">SALIR</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <!-----------------formulario de registro---------------->
  <div class="container" style="background-color: #F8F8F8; border: solid #E7E7E7 1px;">
    <h2 align="center">Resultado de la encuesta</h2>
    <br>
    <!------------divisor--------->
    <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>

    <form class="" method="POST" action="../php/actualizarencuesta.php">
      <?php 
      while($ver=mysqli_fetch_row($resultado)): 
       ?>
      <!----cajas de los id de cada tabla---->
      <div>
         <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $ver[0] ?>">
         <input type="hidden" name="idinformacion" id="idinformacion" value="<?php echo $ver[4] ?>">
         <input type="hidden" name="iddireccion" id="iddireccion" value="<?php echo $ver[14] ?>">
         <input type="hidden" name="idproyecto" id="idproyecto" value="<?php echo $ver[26] ?>">
         <input type="hidden" name="idlider" id="idlider" value="<?php echo $ver[17] ?>">
         <input type="hidden" name="idpresupuesto" id="idpresupuesto" value="<?php echo $ver[20] ?>">
         <input type="hidden" name="idempresa" id="idempresa" value="<?php echo $ver[32] ?>">
      </div>
       <!-- Nombre -->
      <div class="form-group col-md-3">
        <label class=" control-label" for="nombre">Nombre:</label>
        <input id="nombre" onkeyup="this.value=Numtext(this.value)" name="nombre" type="text" value="<?php echo $ver[1]?>" class="form-control" required="">
      </div>

      <!--Telefono-->
      <div class="form-group col-md-2">
        <label class=" control-label" for="telefono">Teléfono:</label>
        <input id="telefono" name="telefono" onkeyup="this.value=Numeros(this.value)" value="<?php echo $ver[5]?>" type="tel" pattern="[0-9]{10}" placeholder="diez digitos" class="form-control" required/>
      </div>

      <!--Correo-->
      <div class="form-group col-md-3">
        <label class=" control-label" for="email">E-Mail:</label>
        <input id="email" name="email" value="<?php echo $ver[6]?>" type="email" placeholder="ingresar un correo"  class="form-control" required>
      </div>

      <!-----Edad------->
      <div class="form-group col-md-2">
        <label class=" control-label" for="edad">Edad:</label>
        <input id="edad" name="edad" onkeyup="this.value=Numeros(this.value)" value="<?php echo $ver[2]?>" value="0" type="number" min="0" max="999999" step="1" class="form-control" required/>
      </div>

      <!--Sexo -->
      <div class="form-group col-md-2">
        <label class="control-label" for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" class="form-control">
          <option value="<?php echo $ver[3]?>"><?php echo $ver[3]?></option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>

      <!-----------------Salto de linea ----------------------------------->
      <!-- Estudios -->
      <div class="form-group col-md-4">
        <br>
        <label class="control-label" for="estudios">Grado máximo de estudios:</label>
        <select id="estudios" name="estudios" class="form-control">
          <option value="<?php echo $ver[11]?>"><?php echo $ver[11]?></option>
          <option value="Preescolar">Preescolar</option>
          <option value="Primaria">Primaria</option>
          <option value="Secundaria">Secundaria</option>
          <option value="Preparatoria">Preparatoria</option>
          <option value="Bachillerato">Bachillerato</option>
          <option value="Superior">Superior</option>
          <option value="Otro">Otro</option>
        </select>
      </div>

      <!--Tipo de persona-->
      <div class="form-group col-md-3">
        <br>
        <label class="control-label" for="tipopersona">Tipo de persona:</label>
        <select id="tipopersona" name="tipopersona" class="form-control">
          <option value="<?php echo $ver[7]?>"><?php echo $ver[7]?></option>
          <option value="Física">Física</option>
          <option value="Moral">Moral</option>
          <option value="Gobierno">Gobierno</option>
        </select>
      </div>

      <!--Alta en SHCP -->
      <div class="form-group col-md-2">
        <label class="control-label" for="alta">Se encuentra dado de alta en SHCP:</label>
        <select id="alta" name="alta" class="form-control">
          <option value="<?php echo $ver[8]?>"><?php echo $ver[8]?></option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <!--Obligaciones -->
      <div class="form-group col-md-3">
        <label class="control-label" for="obligaciones">Se encuentra al corriente con sus obligaciones fiscales:</label>
        <select id="obligaciones" name="obligaciones" class="form-control">
          <option value="<?php echo $ver[9]?>"><?php echo $ver[9]?></option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->

      <!--Facturas -->
      <div class="form-group col-md-2">
        <label class="control-label" for="facturas">Emite facturas:</label>
        <select id="facturas" name="facturas" class="form-control">
          <option value="<?php echo $ver[10]?>"><?php echo $ver[10]?></option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <!--Razon social -->
      <div class="form-group col-md-4">
        <label class="control-label" for="razonsocial">Cual es su razón social:</label>
        <select id="razonsocial" name="razonsocial" class="form-control">
          <option value="<?php echo $ver[34]?>"><?php echo $ver[34]?></option>
          <option value="Asociación Civil (A. C.)">Asociación Civil (A. C.)</option>
          <option value="Sociedad Civil (S. C.)">Sociedad Civil (S. C.)</option>
          <option value="Sociedad en nombre colectivo">Sociedad en nombre colectivo</option>
          <option value="Comandita Simple (S. EN C.)">Comandita Simple (S. EN C.)</option>
          <option value="Comandita por Acciones (S. EN C. POR A.)">Comandita por Acciones (S. EN C. POR A.)</option>
          <option value="Sociedad Anonima (S.A.)">Sociedad Anonima (S.A.)</option>
          <option value="Sociedad de Responsabilidad Limitada (S. DE R. L.)">Sociedad de Responsabilidad Limitada (S. DE R. L.)</option>
          <option value="Sociedad Cooperativa: S.C.L. (LIMITADA), S.C.S. (SUPLEMENTADA)">Sociedad Cooperativa: S.C.L. (LIMITADA), S.C.S.(SUPLEMENTADA)</option>
          <option value="Asociación en Participación (A.P.)">Asociación en Participación (A.P.)</option>
          <option value="Sociedad mutualista de seguros de vida o de daños.">Sociedad mutualista de seguros de vida o de daños.</option>
          <option value="Sociedad de Responsabilidad Limitada de Interes Público (S. DE R.L. DE I.P.)">Sociedad de Responsabilidad Limitada de Interes Público (S. DE R.L. DE I.P.)</option>
          <option value="Sociedad Nacional de Credito y/o Institución de Banca de Desarrollo (S. N. C.)">Sociedad Nacional de Credito y/o Institución de Banca de Desarrollo (S. N. C.)</option>
          <option value="Institución de Banca Multiple">Institución de Banca Multiple</option>
          <option value="Sociedad de Inversión">Sociedad de Inversión</option>
          <option value="Agrupaciones Finanacieras (A.F.)">Agrupaciones Finanacieras (A.F.)</option>
          <option value="Sociedad Finanaciera de Objetivo Limitado (SOFOL)">Sociedad Finanaciera de Objetivo Limitado (SOFOL)</option>
          <option value="Administradoras de Fondos para el Retiro (AFORE)">Administradoras de Fondos para el Retiro (AFORE)</option>
          <option value="Sociedad de Inversión Especializada de Fondos para el Retiro (SIEFORE)">Sociedad de Inversión Especializada de Fondos para el Retiro (SIEFORE)</option>
          <option value="Sociedad de responsabilidad Limitada Microindustrial (S. DE R.L. MI), (S. DE R. L. ART)">Sociedad de responsabilidad Limitada Microindustrial (S. DE R.L. MI), (S. DE R. L. ART)</option>
          <option value="Sociedad de Solidaridad Social (S. DE S.S.)">Sociedad de Solidaridad Social (S. DE S.S.)</option>
          <option value="Organizaciones Auxiliares del Credito">Organizaciones Auxiliares del Credito</option>
        </select>
      </div>

      <!--Giro -->
      <div class="form-group col-md-3">
        <label class="control-label" for="giro">A que giro pertenece:</label>
        <select id="giro" name="giro" class="form-control">
          <option value="<?php echo $ver[35]?>"><?php echo $ver[35]?></option>
          <option value="Acuícola">Acuícola</option>
          <option value="Agroindustrial">Agroindustrial</option>
          <option value="Artesanal">Artesanal</option>
          <option value="Automotriz">Automotriz</option>
          <option value="Cafetería">Cafetería</option>
          <option value="Copiado">Copiado</option>
          <option value="Comercio">Comercio</option>
          <option value="Consultoria">Consultoria</option>
          <option value="Desarrollo Tecnológico">Desarrollo Tecnológico</option>
          <option value="Educativo">Educativo</option>
          <option value="Farmacia">Farmacia</option>
          <option value="Ganadero">Ganadero</option>
          <option value="Gim">Gim</option>
          <option value="Hotelería">Hotelería</option>
          <option value="Imprenta">Imprenta</option>
          <option value="Innovación">Innovación</option>
          <option value="Panadería">Panadería</option>
          <option value="Papelería">Papelería</option>
          <option value="Restaurante">Restaurante</option>
          <option value="Servicio">Servicio</option>
          <option value="Servicios de Belleza">Servicios de Belleza</option>
          <option value="Servicios empresariales">Servicios empresariales</option>
          <option value="Servicio Industrial">Servicio Industrial</option>
          <option value="Servicio varios">Servicio varios</option>
          <option value="Spa">Spa</option>
          <option value="Servicios para el hogar">Servicios para el hogar</option>
          <option value="Tecnología de la Información">Tecnología de la Información</option>
          <option value="Textil">Textil</option>
          <option value="Transporte">Transporte</option>
          <option value="Turistico">Turistico</option>
          <option value="Otro">Otro</option>
        </select>
      </div>

      <!-- Sector -->
      <div class="form-group col-md-3">
        <label class="control-label" for="sector">Sector al que pertenece:</label>
        <select id="sector" name="sector" class="form-control">
          <option value="<?php echo $ver[36]?>"><?php echo $ver[36]?></option>
          <option value="Agricola">Agricola</option>
          <option value="Gananaderia">Gananaderia</option>
          <option value="Arquitectura">Arquitectura</option>
          <option value="Construcción">Construcción</option>
          <option value="Consultoría">Consultoría</option>
          <option value="Capacitación">Capacitación</option>
          <option value="Contabilidad">Contabilidad</option>
          <option value="Medico">Medico</option>
          <option value="Abogado">Abogado</option>
          <option value="Desempleado">Desempleado</option>
          <option value="Estudiante">Estudiante</option>
          <option value="Fabricación">Fabricación</option>
          <option value="Imprenta">Imprenta</option>
          <option value="Diseño">Diseño</option>
          <option value="Impresión">Impresión</option>
          <option value="Publicidad">Publicidad</option>
          <option value="Independencia">Independencia</option>
          <option value="Negocio Propio">Negocio Propio</option>
          <option value="Reparando Cosas">Reparando Cosas</option>
          <option value="Restaurant Bar">Restaurant Bar</option>
          <option value="Servicio Público">Servicio Público</option>
          <option value="TI">TI</option>
          <option value="Transporte">Transporte</option>
          <option value="Venta a empresas">Venta a empresas</option>
          <option value="Venta al público">Venta al público</option>
          <option value="Venta por catálogo">Venta por catálogo</option>
          <option value="Otras">Otras</option>
        </select>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <!--Estratificacion-->
      <div class="form-group col-md-4">
        <br>
        <label class="control-label" for="estratificacion">Estratificación de acuerdo con los parámentros de la Secretaria de Economía:</label>
        <select id="estratificacion" name="estratificacion" class="form-control">
          <option value="<?php echo $ver[37]?>"><?php echo $ver[37]?></option>
          <option value="Micro">Micro</option>
          <option value="Pequeña">Pequeña</option>
          <option value="Mediana">Mediana</option>
          <option value="Grande">Grande</option>
        </select>
      </div>

      <!-- No. Empleados-->
      <div class="form-group col-md-4">
        <label class="control-label" for="empleados">Cuantos empleados tiene hoy en su negocio(cuéntese usted y familiares que laboren):</label>
        <input id="empleados" name="empleados" value="<?php echo $ver[38]?>" type="number" min="0" max="999999" step="1" placeholder="" onkeyup="this.value=Numeros(this.value)" class="form-control input-md" required>
      </div>

      <!--Estado -->
      <div class="form-group col-md-4">
        <br>
        <br>
        <label class="control-label" for="estado">Estado:</label>
        <select id="estados" name="estados" class="form-control">
          <option value="<?php echo $ver[15]?>"><?php echo $ver[15]?></option>
          <option value="Aguascalientes">Aguascalientes</option>
          <option value="Baja California">Baja California</option>
          <option value="Baja California Sur">Baja California Sur</option>
          <option value="Campeche">Campeche</option>
          <option value="CDMX">CDMX</option>
          <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
          <option value="Colima">Colima</option>
          <option value="Chiapas">Chiapas</option>
          <option value="Chihuahua">Chihuahua</option>
          <option value="Durango">Durango</option>
          <option value="Estado de México">Estado de México</option>
          <option value="Guanajuato">Guanajuato</option>
          <option value="Guerrero">Guerrero</option>
          <option value="Hidalgo">Hidalgo</option>
          <option value="Jalisco">Jalisco</option>
          <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
          <option value="Morelos">Morelos</option>
          <option value="Nayarit">Nayarit</option>
          <option value="Nuevo León">Nuevo León</option>
          <option value="Oaxaca de Juárez">Oaxaca de Juárez</option>
          <option value="Puebla">Puebla</option>
          <option value="Querétaro">Querétaro</option>
          <option value="Quintana Roo">Quintana Roo</option>
          <option value="San Luis Potosí">San Luis Potosí</option>
          <option value="Sinaloa">Sinaloa</option>
          <option value="Sonora">Sonora</option>
          <option value="Tabasco">Tabasco</option>
          <option value="Tamaulipas">Tamaulipas</option>
          <option value="Tlaxcala">Tlaxcala</option>
          <option value="Veracruz">Veracruz</option>
          <option value="Yucatán">Yucatán</option>
          <option value="Zacatecas">Zacatecas</option>
        </select>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <!--Municipio -->
      <div class="form-group col-md-4">
        <label class="control-label" for="municipio">Municipio:</label>
        <input id="municipio" value="<?php echo $ver[16]?>" onkeyup="this.value=NumText(this.value)" name="municipio" type="text" placeholder="Municipio"  class="form-control input-md" required>
      </div>

      <!-- Clase de proyecto -->
      <div class="form-group col-md-4">
        <label class="control-label" for="proyecto">Clase de Proyecto:</label>
        <select id="claseproyecto" name="claseproyecto" class="form-control">
          <option value="<?php echo $ver[31]?>"><?php echo $ver[31]?></option>
          <option value="Constitución">Constitución</option>
          <option value="Expansión">Expansión</option>
          <option value="Negocio cpmplementario">Negocio complementario</option>
          <option value="Emprendedor">Emprendedor</option>
        </select>
      </div>

      <!--Proyecto para--> 
      <div class="form-group col-md-4">
        <label class="control-label" for="proyecto">Requiere proyecto para:</label>
        <select id="proyecto" name="proyecto" class="form-control">
          <option value="<?php echo $ver[30]?>"><?php echo $ver[30]?></option>
          <option value="Equipo">Equipo</option>
          <option value="Maquinaria productiva">Maquinaria productiva</option>
          <option value="Capacitación y asesoría">Capacitación y asesoría</option>
          <option value="Campañas de publicidad">Campañas de publicidad</option>
          <option value="Mercancía e inventarios">Mercancía e inventarios </option>
          <option value="Sueldos y Salarios">Sueldos y Salarios</option>
          <option value="Diseño e Innovación">Diseño e Innovación</option>
          <option value="Desarrollo de Tecnología">Desarrollo de Tecnología</option>
          <option value="Registro de Marca">Registro de Marca</option>
          <option value="Propiedad Industrial">Propiedad Industrial</option>
        </select>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <div class="form-group col-md-12">
        <label class="control-label" for="descproyecto">Descripción del Proyecto:</label>
        <textarea id="descripcion" name="descripcion" type="textarea" placeholder="Descripcion" class="form-control" required=""><?php echo $ver[27]?></textarea>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <!-- Lider de proyecto-->
      <div class="form-group col-md-3">
        <br>
        <label class="control-label" for="nomlider">Nombre del líder de proyecto:</label> 
        <input id="nomlider" value="<?php echo $ver[19] ?>" onkeyup="this.value=NumText(this.value)" name="nomlider" type="text" placeholder="" class="form-control" required="">
      </div>

      <!--Experiencia-->
      <div class="form-group col-md-3">
        <label class="control-label" for="experiencia">Cuanto tiempo tiene de experiencia en la materia propia del proyecto:</label>
        <input id="experiencia" value="<?php echo $ver[18] ?>" onkeyup="this.value=NumText(this.value)" name="experiencia" type="text" placeholder="" class="form-control" required="">
      </div>

      <!--Foda -->
      <div class="form-group col-md-3">
        <label class="control-label" for="foda">Ha realizado algún análisis de factibilidad de su proyecto(FODA):</label>
        <select id="foda" name="foda" class="form-control">
          <option value="<?php echo $ver[21]?>"><?php echo $ver[21]?></option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <!--No. empleados-->
      <div class="form-group col-md-3">
        <label class="control-label" for="empleados">Cuantos empleados tiene planeados generar con su proyecto:</label>
        <input id="numempleados" name="numempleados" onkeyup="this.value=NumText(this.value)" value="<?php echo $ver[22]?>" type="number" min="0" max="999999" step="1" placeholder="" class="form-control" required/>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <!--Margen de utilidad-->
      <div class="form-group col-md-4">
        <label class="control-label" for="utilidad">Conoce el margen de utilidad de su proyecto o idea de negocio:</label>
        <input id="utilidad" name="utilidad" onkeyup="this.value=NumText(this.value)" value="<?php echo $ver[23]?>" type="text" placeholder="" class="form-control" required="">
      </div>

      <!--Valor estimado-->
      <div class="form-group col-md-4">
        <br>
        <label class="control-label" for="valor">Valor estimado del proyecto:</label>
        <input id="valor" name="valor" onkeyup="this.value=NumText(this.value)" value="<?php echo $ver[24]?>" type="number" min="0.00" max="999999999999.99" step="0.01" placeholder="" class="form-control" required/>
      </div>

      <!---Monto solicitado-->
      <div class="form-group col-md-4" >
        <br>
        <label class="control-label" for="monto">Monto Solicitado:</label>  
        <input id="monto" name="monto" value="<?php echo $ver[24]?>" type="number" min="0.00" max="999999999999.99" step="0.01" placeholder="" class="form-control" required/>
      </div>
      <input id="idaplicador" name="idaplicador" hidden="" value="<?php echo $id; ?>"/>

      <?php 
    endwhile;
    ?>

    <!------------divisor--------->
    <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>

    <div class="container row">
      <div class="col-md-6 col-md-offset-6">
        <div align="right">
          <!-- Button - guardar/cancelar -->
          <button type="submit" id="guardar" name="guardar" class="btn btn-info">Guardar cambios</button> 
          <button type="button" id="guardar" onclick="reporteabrir();" name="guardar" class="btn btn-primary">Generar Reporte</button>
          <button type="button" onclick="regencabrir();" style="width: 145px;" name="guardar" class="btn btn-warning">Atrás</button>
        </div>
      </div>
    </div>
  </form>  
</div>
<br>
</body>
</html>
<script>
  function reporteabrir(){
    window.open('../librerias/reporteencuesta.php');
  }
  function regencabrir(){
    location.href = '../vistas/Encuesta.php';
  }
</script>