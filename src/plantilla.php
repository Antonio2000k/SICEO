<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../pdf/images/logo1.png', 5, 5, 30 );
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->Cell(120,10,'Gimnasio MAYA',0,1,'C');
			$this->Cell(30);
			$this->Cell(120,10,'Barrio San Juan de Dios, Calle Dr Jose Rosa Pacas 22, San Vicente',0,1,'C');
			$this->Cell(30);
			$this->Cell(120,5,'Telefono: 7700 5022',0,1,'C');
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Pagos de Servicios',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
			
			$this->Cell(0,10,'Fecha y hora de imprecion: '.date('d/m/Y,h:i:s'),0,0,'R');

		}		
	}
?>