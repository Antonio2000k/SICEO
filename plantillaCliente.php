<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header(){
			$this->Image('images/Siceom.png', 14, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(135,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 165, 20, 35 );
			$this->SetXY(135, 23);
			$this->SetFont('Arial','B',14);
			$this->Cell(30);
			$this->Cell(-115,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('Arial','B',8);
			$this->Cell(135,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->Cell(30);
			$this->Cell(135,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
			$this->Cell(30);
			$this->Cell(130,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			$this->SetFont('times','B',16);
			$this->Ln(5);
			$this->Cell(30);
			$this->Cell(135,10, 'Reporte de clientes',0,1,'C');
			$this->Ln(5);

			$y = $this->GetY();
			$this->SetY($y+4);

			$this->SetX(7); 
			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0,0,0);
			$this->SetFont('times','B',8);
			$this->SetDrawColor(25, 25, 112);
		    $this->SetLineWidth(2);
			$this->Line(7, $this->GetY()+7 , 209 , $this->GetY()+7);


		    $this->Cell(22,6,'EXPEDIENTE',0,0,'C',1);
			$this->Cell(50,6,'NOMBRE',0,0,'C',1);
			$this->Cell(10,6,'SEXO',0,0,'C',1);
			$this->Cell(15,6,'EDAD',0,0,'C',1);
			$this->Cell(85,6,utf8_decode("DIRECCIÓN"),0,0,'C',1);
			$this->Cell(18,6,utf8_decode("TELÉFONO"),0,1,'C',1);
			
			
			$this->SetDrawColor(0, 0, 0);
			$this->SetLineWidth(0);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('times','B',8);
			$this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '.date('d/m/Y, h:i:s') ),0,0,'R');

		}		
	}
?>