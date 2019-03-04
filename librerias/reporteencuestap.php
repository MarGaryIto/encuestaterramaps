<?php
	//traer la conexion y la plantilla
	include 'plantillaencuesta.php';
	require 'conexion.php';
	$id = $_POST['id_empresa'];
	//consulta el los datos del ultimo registro insertado en empresa
	$query = "SELECT p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto AND em.id_empresa = '$id'";
	$resultado = $mysqli->query($query);
	//crear un nuevo objeto de la clase PDF
	$pdf = new PDF();
	//traer variable del numero de paginas
	$pdf->AliasNbPages();
	//agregar pagina
	$pdf->AddPage();
	//definir el color de la cabecera de la tabla en rgb
	$pdf->SetFillColor(232,232,232);
	//tamaño,negrita y tamaño de la fuente
	$pdf->SetFont('Arial','B',10);
	//encabezados
	//largo,ancho,nombrecol,borde,saltolinea(para formar una lin40),centrado,relleno
	/////////
	//poner la fuente de los elementos de la tabla	
	$pdf->SetFont('Arial','',12);
	//recorrer los elementos
	while($row = $resultado->fetch_assoc())
	{
		
		$pdf->Cell(30,8,'Nombre:',1,0,'C',1);
		$pdf->Cell(100,8,utf8_decode($row['nombre']),1,1,'C');
		//separador
		$pdf->Cell(190,4,'',0,1,'C',0);
		//siguiente linea
		$pdf->Cell(30,8,'Edad:',1,0,'C',1);
		$pdf->Cell(30,8,$row['edad'],1,0,'C');

		$pdf->Cell(20,8,'Sexo:',1,0,'C',1);
		$pdf->Cell(40,8,utf8_decode($row['sexo']),1,0,'C');

		$pdf->Cell(25,8,utf8_decode('Teléfono:'),1,0,'C',1);
		$pdf->Cell(45,8,utf8_decode($row['telefono']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);

		//salto de linea 1
		$pdf->Cell(25,8,utf8_decode("Correo:"),1,0,'C',1);
		$pdf->Cell(85,8,utf8_decode($row['correo']),1,0,'C');

		$pdf->Cell(45,8,'Tipo de persona:',1,0,'C',1);
		$pdf->Cell(35,8,utf8_decode($row['tipo_persona']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		
		//salto de linea 2

		$pdf->Cell(50,8,'Alta en la SHCP:',1,0,'C',1);
		$pdf->Cell(20,8,utf8_decode($row['alta_shcp']),1,0,'C');


		$pdf->Cell(60,8,'Obligaciones fiscales:',1,0,'C',1);
		$pdf->Cell(15,8,utf8_decode($row['observasiones_fiscales']),1,0,'C');

		$pdf->Cell(30,8,utf8_decode('¿Factura?:'),1,0,'C',1);
		$pdf->Cell(15,8,utf8_decode($row['factura']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto en linea 3

		$pdf->Cell(30,8,'Estudios:',1,0,'C',1);
		$pdf->Cell(40,8,utf8_decode($row['estudios']),1,0,'C');

		$pdf->Cell(20,8,'Estado:',1,0,'C',1);
		$pdf->Cell(100,8,utf8_decode($row['estado']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 4

		$pdf->Cell(35,8,'Municipio:',1,0,'C',1);
		$pdf->Cell(100,8,utf8_decode($row['municipio']),1,0,'C');

		$pdf->Cell(35,8,'Experiencia:',1,0,'C',1);
		$pdf->Cell(20,8,utf8_decode($row['experiencia']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 5

		$pdf->Cell(75,8,'Nombre del lider de proyecto:',1,0,'C',1);
		$pdf->Cell(115,8,utf8_decode($row['nombrelider']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 6

		$pdf->Cell(30,8,utf8_decode('¿Foda?:'),1,0,'C',1);
		$pdf->Cell(15,8,utf8_decode($row['foda']),1,0,'C');

		$pdf->Cell(35,8,'Empleados:',1,0,'C',1);
		$pdf->Cell(40,8,utf8_decode($row['empleados']),1,0,'C');

		$pdf->Cell(30,8,'Utilidad:',1,0,'C',1);
		$pdf->Cell(40,8,utf8_decode($row['utilidad']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 7

		$pdf->Cell(20,8,'Valor:',1,0,'C',1);
		$pdf->Cell(65,8,utf8_decode($row['valor']),1,0,'C');

		$pdf->Cell(40,8,'Monto:',1,0,'C',1);
		$pdf->Cell(65,8,utf8_decode($row['monto']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 8

		$pdf->Cell(35,8,'Descripcion:',1,0,'C',1);
		$pdf->MultiCell(155,8,utf8_decode($row['descripcion']),1,'J',False);

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 9

		$pdf->Cell(60,8,'Proyecto para:',1,0,'C',1);
		$pdf->Cell(130,8,utf8_decode($row['proyectopara']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 10

		$pdf->Cell(60,8,'Clase de proyecto:',1,0,'C',1);
		$pdf->Cell(130,8,utf8_decode($row['claseproyecto']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 11

		$pdf->Cell(35,8,'Razon social:',1,0,'C',1);
		$pdf->MultiCell(155,8,utf8_decode($row['razon_social']),1,'J',False);

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 12

		$pdf->Cell(35,8,'Giro:',1,0,'C',1);
		$pdf->Cell(155,8,utf8_decode($row['giro']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 13

		$pdf->Cell(35,8,'Sector:',1,0,'C',1);
		$pdf->Cell(155,8,utf8_decode($row['sector']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		//salto de linea 14

		$pdf->Cell(50,8,'Estratificacion:',1,0,'C',1);
		$pdf->Cell(45,8,utf8_decode($row['estratificacion']),1,0,'C');

		$pdf->Cell(50,8,'Empleados:',1,0,'C',1);
		$pdf->Cell(45,8,utf8_decode($row['empleados']),1,1,'C');

		//separador final por si se quiere hacer un reporte general
		$pdf->Cell(190,4,'',0,1,'C',0);

	}
	//dar salida al pdf
	$pdf->Output('D');
?>