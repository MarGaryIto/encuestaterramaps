<?php
  //se inicia sesion para traer las variables de sesion 
session_start();
  //se extrae el valor de la variable sesion y se guarde en un id
$id = $_SESSION['id'];
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
  <script src="../js/funciones.js"></script>
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
          <img src="../media/logo.png" alt="icon" style="width: 170px; margin-left:50px;">
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
    <h2 align="center">FORMULARIO DE REGISTRO</h2>
    <br>
    <!------------divisor--------->
    <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
    
    <form class="" method="POST" action="../php/registroencuesta.php">
      <!-- Nombre -->
      <div class="form-group col-md-3">
        <label class=" control-label" for="nombre">Nombre:</label>
        <input id="nombre" name="nombre" onkeyup="this.value=NumText(this.value)" type="text" placeholder="ingresar un nombre(s)" class="form-control" required="">
      </div>

      <!--Telefono-->
      <div class="form-group col-md-2">
        <label class=" control-label" for="telefono">Teléfono:</label>
        <input id="telefono" name="telefono" onkeyup="this.value=Numeros(this.value)" type="tel" pattern="[0-9]{10}" placeholder="diez digitos" class="form-control" required/>
      </div>

      <!--Correo-->
      <div class="form-group col-md-3">
        <label class=" control-label" for="email">E-Mail:</label>
        <input id="email" name="email" type="email" placeholder="ingresar un correo"  class="form-control" required>
      </div>
      
      <!-----Edad------->
      <div class="form-group col-md-2">
        <label class=" control-label" onkeyup="this.value=Numeros(this.value)" for="edad">Edad:</label>
        <input id="edad" name="edad" value="0" type="number" min="0" max="999999" step="1" class="form-control" required/>
      </div>

      <!--Sexo -->
      <div class="form-group col-md-2">
        <label class="control-label" for="sexo">Sexo:</label>
        <div class="radio">
          <label for="sexo-0">
            <input type="radio" name="sexo" id="sexo" value="Masculino" checked="checked">
            Masculino
          </label>
        </div>
        <div class="radio">
          <label for="sexo-1">
            <input type="radio" name="sexo" id="sexo" value="Femenino">
            Femenino
          </label>
        </div>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>

      <!-----------------Salto de linea ----------------------------------->
      <!-- Estudios -->
      <div class="form-group col-md-4">
        <label class="control-label" for="estudios">Grado máximo de estudios:</label>
        <select id="estudios" name="estudios" class="form-control">
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
        <label class="control-label" for="tipopersona">Tipo de persona:</label>
        <select id="tipopersona" name="tipopersona" class="form-control">
          <option value="Física">Física</option>
          <option value="Moral">Moral</option>
          <option value="Gobierno">Gobierno</option>
        </select>
      </div>
      
      <!--Alta en SHCP -->
      <div class="form-group col-md-2">
        <label class="control-label" for="alta">Se encuentra dado de alta en SHCP:</label>
        <div class="radio">
          <label for="alta-0">
            <input type="radio" id="alta" name="alta" value="si"> Si
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="alta" name="alta" value="no"> No
          </label>
        </div>
      </div>
      
      <!--Obligaciones -->
      <div class="form-group col-md-3">
        <label class="control-label" for="obligaciones">Se encuentra al corriente con sus obligaciones fiscales:</label>
        <div class="radio">
          <label>
            <input type="radio" name="obligaciones" value="si"> Si
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="obligaciones" value="no"> No
          </label>
        </div>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->

      <!--Facturas -->
      <div class="form-group col-md-2">
        <label class="control-label" for="facturas">Emite facturas:</label>
        <div class="radio">
          <label>
            <input type="radio" id="facturas" name="facturas" value="si"> Si
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="facturas" name="facturas" value="no"> No
          </label>
        </div>
      </div>

      <!--Razon social -->
      <div class="form-group col-md-4">
        <label class="control-label" for="razonsocial">Cual es su razón social:</label>
        <select id="razonsocial" name="razonsocial" class="form-control">
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
          <option value="Micro">Micro</option>
          <option value="Pequeña">Pequeña</option>
          <option value="Mediana">Mediana</option>
          <option value="Grande">Grande</option>
        </select>
      </div>

      <!-- No. Empleados-->
      <div class="form-group col-md-4">
        <label class="control-label" for="empleados">Cuantos empleados tiene hoy en su negocio(cuéntese usted y familiares que laboren):</label>
        <input id="empleados" onkeyup="this.value=Numeros(this.value)" name="empleados" value="0" type="number" min="0" max="999999" step="1" placeholder="" class="form-control input-md" required>
      </div>

      <!--Estado -->
      <div class="form-group col-md-4">
        <br>
        <br>
        <label class="control-label" for="estado">Estado:</label>
        <select id="estados" name="estados" class="form-control">
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
        <input id="municipio" name="municipio" onkeyup="this.value=NumText(this.value)" type="text" placeholder="Municipio"  class="form-control input-md" required>
      </div>

      <!-- Clase de proyecto -->
      <div class="form-group col-md-4">
        <label class="control-label" for="proyecto">Clase de Proyecto:</label>
        <select id="claseproyecto" name="claseproyecto" class="form-control">
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
        <input type="text" placeholder="otro" name="otro" class="form-control input-md" />
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <div class="form-group col-md-12">
        <label class="control-label" for="descproyecto">Descripción del Proyecto:</label>
        <textarea id="descripcion" name="descripcion" onkeyup="this.value=NumTex(this.value)" type="textarea" placeholder="Descripcion" class="form-control" required=""></textarea>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <!-- Lider de proyecto-->
      <div class="form-group col-md-3">
        <br>
        <label class="control-label" for="nomlider">Nombre del líder de proyecto:</label> 
        <input id="nomlider" name="nomlider" onkeyup="this.value=NumText(this.value)" type="text" placeholder="" class="form-control" required="">
      </div>

      <!--Experiencia-->
      <div class="form-group col-md-3">
        <label class="control-label" for="experiencia">Cuanto tiempo tiene de experiencia en la materia propia del proyecto:</label>
        <input id="experiencia" name="experiencia" type="text" placeholder="" class="form-control" required="">
      </div>

      <!--Foda -->
      <div class="form-group col-md-3">
        <label class="control-label" for="foda">Ha realizado algún análisis de factibilidad de su proyecto(FODA):</label>
        <div class="radio">
          <label>
            <input type="radio" id="foda" name="foda" value="si"> Si
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="foda" name="foda" value="no"> No
          </label>
        </div>
      </div>
      
      <!--No. empleados-->
      <div class="form-group col-md-3">
        <label class="control-label" for="empleados">Cuantos empleados tiene planeados generar con su proyecto:</label>
        <input id="numempleados" name="numempleados" onkeyup="this.value=Numeros(this.value)" value="0" type="number" min="0" max="999999" step="1" placeholder="" class="form-control" required/>
      </div>

      <!------------divisor--------->
      <div class="form-group col-md-12" style="border:solid #F0F0F0 1px;"></div>
      <!-----------salto de linea ---------------->
      <!--Margen de utilidad-->
      <div class="form-group col-md-4">
        <label class="control-label" for="utilidad">Conoce el margen de utilidad de su proyecto o idea de negocio:</label>
        <input id="utilidad" name="utilidad" type="text" placeholder="" class="form-control" required="">
      </div>

      <!--Valor estimado-->
      <div class="form-group col-md-4">
        <br>
        <label class="control-label" for="valor">Valor estimado del proyecto:</label>
        <input id="valor" name="valor" value="0.00" onkeyup="this.value=Numeros(this.value)" type="number" min="0.00" max="999999999999.99" step="0.01" placeholder="" class="form-control" required/>
      </div>
      
      <!---Monto solicitado-->
      <div class="form-group col-md-4" >
        <br>
        <label class="control-label" for="monto">Monto Solicitado:</label>  
        <input id="monto" name="monto" value="0.00" onkeyup="this.value=Numeros(this.value)" type="number" min="0.00" max="999999999999.99" step="0.01" placeholder="" class="form-control" required/>
      </div>
      
      <input id="idaplicador" name="idaplicador" hidden="" value="<?php echo $id; ?>"/>

      <!-- Button - guardar/cancelar -->
      <div class="container row">
        <div class="col-md-6 col-md-offset-6" style="">
          <div align="right">
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-default">Cancelar</button>            
          </div>
        </div>
      </div>

    </form>
    <br>  
  </div>
  <br>
</body>
</html>