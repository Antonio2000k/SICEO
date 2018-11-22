<?php
require 'Config/conexion.php';

	require 'fpdf/fpdf.php';
	
	$estado =$_REQUEST['estado'];
	
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
				$this->Cell($c_ancho,$c_alto,'',1,0,'C',0); 
			}else{ 
			    $this->SetX($x_posicion); 
			    $this->Cell($c_ancho,$c_alto,$texto, 1,0,'C',0);
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
				$this->Cell($c_ancho,$c_alto,'','B',0,'C',0); 
			} else{ 
			    $this->SetX($x_posicion); 
			    $this->Cell($c_ancho,$c_alto,$texto,'B',0,'C',0);
			} 
		}

		function Header(){
			$estado =$_REQUEST['estado'];
			$this->Image('images/Siceom.png', 14, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(6);
			$this->Cell(30);
			$this->Cell(135,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 165, 20, 35 );
			$this->SetXY(135, 25);
			$this->SetFont('times','B',14);
			$this->Cell(30);
			$this->Cell(-115,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('times','B',8);
			$this->Cell(135,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->SetXY(40, 33);
     		$this->Cell(135,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
      		$this->SetXY(40, 36);
			$this->Cell(130,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			
			if($estado === "t"){
				$this->SetFont('times','B',16);
				$this->Ln(5);
				$this->Cell(30);
				$this->Cell(140,10, 'Lista de Empleados activos',0,1,'C');
				$this->Ln(5);
			} if($estado === "f"){
				$this->SetFont('times','B',16);
				$this->Ln(5);
				$this->Cell(30);
				$this->Cell(140,10, 'Lista de Empleados de baja',0,1,'C');
				$this->Ln(5);
			}

			$this->SetFont('times','B',9);
			$this->Ln(1);
			$this->Cell(30); 

			$y = $this->GetY();
			$this->SetY($y+5);

			$this->SetX(9); 
			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0,0,0);
			$this->SetFont('times','B',8);
			$this->SetDrawColor(25, 25, 112);
		    $this->SetLineWidth(2);
			

			$x_posicion=$this->getx(); 
			
			
			$this->vcellT(15,6,$x_posicion,'ID',0,0,'C',1);
			$x_posicion=$this->getx(); 
			$this->vcellT(60,6,$x_posicion,'NOMBRE',0,0,'C',1);
			$x_posicion=$this->getx(); 
			$this->vcellT(20,6,$x_posicion,utf8_decode("DUI"),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(103,6,$x_posicion,utf8_decode("CONTACTO"),1,0,'C',1);
			$this->Ln(); 
			
			$y = $this->GetY();
			$this->SetY($y+3);

			$this->SetDrawColor(0, 0, 0);
			$this->SetLineWidth(0);

			$this->SetFillColor(255, 99, 71);
			$this->Rect(9, 76, 198, 172, '');
			
		}
		
		function Footer()
		{
			$this->SetY(-30);
			$this->SetFont('times','B',8);
			$this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '.date('d/m/Y, h:i:s') ),0,0,'R');

		}	

		
			
	}
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
	
	if($estado!= ""){
		$query_s= pg_query($conexion, "SELECT empleados.cid_empleado, empleados.cnombre, empleados.capellido, empleados.ctelefonof, empleados.ccelular, empleados.cdui, empleados.cdireccion, empleados.ccorreo 
			FROM empleados WHERE empleados.bestado =  '$estado'  ");
	}
	
	while($row=pg_fetch_assoc($query_s)){	
	 	
		
	 	
		$pdf->SetFont('times','B',9);
		$pdf->SetX(9); 
		$x_posicion=$pdf->getx(); 
		
		$pdf->vcell(15,28,$x_posicion,$row['cid_empleado'], 0,0,'C',1);// pass all values inside the cell
		
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0,0,0);
		$x_posicion=$pdf->getx(); 	
		$pdf->vcell(60,28,$x_posicion,$row['cnombre'] . " " . $row['capellido'] ,0,0,'C',1);
		$x_posicion=$pdf->getx(); 
		$pdf->vcell(20,28,$x_posicion,utf8_decode($row['cdui']),0,0,'C',1);
		$x=$pdf->getX(); 
		$pdf->SetX($x);	
		$pdf->GetY();
		$pdf->cell(18,7,utf8_decode("Teléfono ") ,1,0,'L',1);
		$pdf->cell(85,7,utf8_decode($row['ctelefonof']) ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y+7);
		$x=$pdf->getX(); 
		$pdf->SetX($x+94);
		$pdf->cell(18,7,utf8_decode("Celular " ),1,0,'L',1);
		$pdf->cell(85,7,utf8_decode($row['ccelular']) ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y+7);
		$x=$pdf->getX(); 
		$pdf->SetX($x+94);
		$pdf->cell(18,7,utf8_decode("E-mail " ),1,0,'L',1);
		$pdf->cell(85,7,utf8_decode($row['ccelular']) ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y+7);
		$x=$pdf->getX(); 
		$pdf->SetX($x+94);
		$pdf->cell(18,7,utf8_decode("Dirección " ),1,0,'L',1);
		$pdf->cell(85,7,utf8_decode($row['cdireccion']) ,1,0,'L',1);
		$pdf->Ln();
		$pdf->Ln(0.8);
		  	
		
			
	}

	
	

	$pdf->Output();
	
?>