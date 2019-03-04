<?php
	//traer la conexion y la plantilla
	include 'plantillallamadas.php';
	require 'conexion.php';
	
	$id = $_POST['id_persona'];  

	//consulta el los datos del ultimo registro insertado en llamdas
	$query = "SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona AND c.id_persona = '$id'";
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
	$pdf->SetFont('Arial','',15);
	//recorrer los elementos
	while($row = $resultado->fetch_assoc())
	{
		
		$pdf->Cell(55,8,'Fecha de la llamada:',1,0,'C',1);
		$pdf->Cell(40,8,utf8_decode($row['fecha']),1,1,'C');
		//separador
		$pdf->Cell(190,4,'',0,1,'C',0);
		
		//siguiente linea
		$pdf->Cell(25,8,'Nombre:',1,0,'C',1);
		$pdf->Cell(80,8,$row['nombre'],1,0,'C');

		$pdf->Cell(20,8,utf8_decode("Edad:"),1,0,'C',1);
		$pdf->Cell(15,8,utf8_decode($row['edad']),1,0,'C');

		$pdf->Cell(20,8,'Sexo:',1,0,'C',1);
		$pdf->Cell(30,8,utf8_decode($row['sexo']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);

		//salto de linea 1
		$pdf->Cell(25,8,utf8_decode("Teléfono:"),1,0,'C',1);
		$pdf->Cell(40,8,utf8_decode($row['telefono']),1,0,'C');

		$pdf->Cell(25,8,'Correo:',1,0,'C',1);
		$pdf->Cell(100,8,utf8_decode($row['correo']),1,1,'C');

		//separador
		$pdf->Cell(190,.8,'',0,1,'C',0);
		
		//salto de linea 2

		$pdf->Cell(35,8,'Comentario:',1,0,'C',1);
		$pdf->MultiCell(155,8,utf8_decode($row['comentario'] ),1,'J', False);

	}
	//dar salida al pdf
	$pdf->Output('d');
?>