<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

			$this->Image('images/Siceom.png', 20, 20, 45 );
			$this->SetFont('Arial','B',20);
			$this->Ln(10);
			$this->Cell(30);
			$this->Cell(130,19,utf8_decode("ÓPTICA"),0,0,'C');
			
			$this->SetFont('Arial','B',10);
			// 1º Datos del cliente
			$texto1=utf8_decode("Orden de Compra "."\nN° 1 ");
			$this->SetXY(160, 18);
			$this->MultiCell(40,10,$texto1,1,"C");
			
			
			$this->SetFont('Arial','B',20);
			$this->Cell(30);
			$this->Cell(130,10,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('Arial','B',8);
			$this->Cell(130,5,utf8_decode("TU VISIÓN, ES NUESTRA MISIÓN"),0,1,'C');
			$this->Cell(30);
			$this->Cell(130,10,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
			$this->Cell(30);
			$this->Cell(130,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			$this->SetFont('Arial','B',16);
			$this->Ln(5);
			
			$this->Ln(5);
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