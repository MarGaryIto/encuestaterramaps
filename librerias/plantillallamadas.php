<?php
	//incluir la libreria fpdf
	require 'fpdf.php';
	//generar una clase llamada PDF que hereda todos los atributos de la libreria FPDF
	class PDF extends FPDF
	{
		//metodo para realizar el encabezado del pdf
		function Header()
		{
			//de la clase se utiliza el atributo Image
			//ruta de la imagen, posision en milim. en X,Y y tamaño de la imagen
			$this->Image('../media/logo.png', 15, 8, 40 );
			$this->SetFont('Arial','B',20);
			$this->Cell(40);
			$this->Cell(110,20, 'Reporte de encuesta',0,0,'C');
			$this->Ln(25);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>