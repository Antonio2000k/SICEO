<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/Siceom.png', 15, 20, 40 );
			$this->SetFont('Arial','B',14);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(135,11,utf8_decode("ÓPTICA"),0,0,'C');
			$this->SetFont('Arial','B',8);
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 165, 20, 35 );
			
			$this->SetXY(160, 17);
			
			
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(135,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('Arial','B',8);
			$this->Cell(135,5,utf8_decode("TU VISIÓN, ES NUESTRA MISIÓN"),0,1,'C');
			$this->Cell(30);
			$this->Cell(135,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
			$this->Cell(30);
			$this->Cell(130,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			$this->SetFont('Arial','B',14);
			$this->Ln(1);
			$this->Cell(30);
			$this->Cell(135,10, 'Examen Oftalmologico',0,1,'C');
			$this->Ln(1);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: ').date('d/m/Y,h:i:s'),0,0,'R');

		}		
	}
?>