<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function vcell($c_ancho,$c_alto,$x_posicion,$texto){ 
			$altura=$c_alto/3; 

			$primera=$altura+2; 

			$segunda=$primera+$primera+3; 

			$tercera=$segunda+13; 

			$len=strlen($texto); 
			if($len>=1){ 
				$w_texto=str_split($texto,40); 
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$primera,$w_texto[0],0,0,'C',0); 
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$segunda,$w_texto[1],0,0,'C',0); 
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$tercera,$w_texto[2],0,0,'C',0); 
				
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$c_alto,'',1,1,'C',0); 
			}else{ 
			    $this->SetX($x_posicion); 
			    $this->Cell($c_ancho,$c_alto,$texto, 1,1,'C',0);
			} 
		} 

		function vcellT($c_ancho,$c_alto,$x_posicion,$texto){ 
			$altura=$c_alto/3; 

			$primera=$altura+2; 

			$segunda=$primera+$primera+3; 


			$len=strlen($texto); 
			if($len>=1){ 
			$w_texto=str_split($texto,11); 
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$primera,$w_texto[0],0,0,'C',0); 
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$segunda,$w_texto[1],0,0,'C',0); 
				$this->SetX($x_posicion); 
				$this->Cell($c_ancho,$c_alto,'',0,0,'C',0); 
			} else{ 
			    $this->SetX($x_posicion); 
			    $this->Cell($c_ancho,$c_alto,$texto,0,0,'C',0);
			} 
		}

		function Header(){
			$tipo=$_REQUEST['tipo'];
			$tipos=$_REQUEST['tipos'];
		    $year=$_REQUEST['year'];
		    $rango=$_REQUEST['rango'];
		    $mes=$_REQUEST['mes'];

			$this->Image('images/Siceom.png', 35, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(200,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 205, 20, 35 );
			$this->SetXY(200, 23);
			$this->SetFont('times','B',14);
			$this->Cell(30);
			$this->Cell(-180,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('times','B',8);
			$this->Cell(200,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->SetXY(40, 31);
     		$this->Cell(200,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
      		$this->SetXY(40, 34);
			$this->Cell(195,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			
				$this->SetFont('times','B',16);
				$this->Ln(5);
				$this->Cell(30);
				$this->Cell(200,10, 'Reporte de encomiendas ',0,1,'C');
				$this->Ln(5);
			
			
			

			
			$this->Ln(1);
			$this->Cell(35); 


			
			

			$this->SetDrawColor(0, 0, 0);
			$this->SetLineWidth(0);

			
		}
		
		function Footer()
		{
			$fecha = new DateTime(null, new DateTimeZone('America/El_Salvador'));
			$hora = $fecha->format("d/m/Y, h:i:s");

			$this->SetY(-30);
			$this->SetFont('times','B',8);
			$this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '. $hora ),0,0,'R');

		}
		
		
			
	}
?>