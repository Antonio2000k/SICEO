<?php
require 'Config/conexion.php';

	require 'fpdf/fpdf.php';
	$estado = $_REQUEST['estado'];
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
				$this->Cell($c_ancho,$c_alto,'',0,0,'C',0); 
			} else{ 
			    $this->SetX($x_posicion); 
			    $this->Cell($c_ancho,$c_alto,$texto,0,0,'C',0);
			} 
		}

		function Header(){
			$estado = $_REQUEST['estado'];
			$this->Image('images/Siceom.png', 14, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(4);
			$this->Cell(30);
			//$this->SetX(8);
			$this->Cell(135,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 165, 20, 35 );
			$this->SetXY(135, 23);
			$this->SetFont('times','B',14);
			$this->Cell(30);
			//$this->SetX(8);
			$this->Cell(-115,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			//$this->Cell(30);
			$this->SetFont('times','B',8);
			$this->SetX(8);
			$this->Cell(200,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->SetXY(40, 31);
			$this->SetX(8);
     		$this->Cell(200,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
      		$this->SetXY(40, 34);
      		$this->SetX(8);
			$this->Cell(200,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			if($estado === "t"){
				$this->SetFont('times','B',16);
				$this->Ln(5);
				$this->SetFillColor(255, 255, 255);
	    		$this->SetTextColor(0,0,0);
	    		$this->SetX(8); 
				$this->Cell(200,10, 'Lista de proveedores activos',0,1,'C');
				$this->Ln(3);
			}else if($estado === "f"){
				$this->SetFont('times','B',16);
				$this->Ln(5);
				$this->SetFillColor(255, 255, 255);
	    		$this->SetTextColor(0,0,0);
	    		$this->SetX(8); 
				$this->Cell(200,10, 'Lista de proveedores de baja',0,1,'C');
				$this->Ln(3);
			}

			

			

			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('times','B',8);
			$this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '.date('d/m/Y, h:i:s') ),0,0,'R');

		}	

		
			
	}
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
	if($estado === "t"){
		$query_s= pg_query($conexion, "SELECT proveedor.cnombre, proveedor.capellido, proveedor.cempresa, proveedor.ctelefonof,
				proveedor.ccelular, proveedor.cdireccion, proveedor.cemail FROM paproveedor as proveedor WHERE proveedor.bestado = 't'");
	}else if($estado === "f") {
		$query_s= pg_query($conexion, "SELECT proveedor.cnombre, proveedor.capellido, proveedor.cempresa, proveedor.ctelefonof,
				proveedor.ccelular, proveedor.cdireccion, proveedor.cemail FROM paproveedor as proveedor WHERE proveedor.bestado = 'f'");
	}
	

	
	
	while($row=pg_fetch_assoc($query_s)){
		$pdf->SetFont('times','B',12); 	
	 	$pdf->SetFillColor(255, 255, 255);
    	$pdf->SetTextColor(0,0,0);
    	$pdf->SetX(18); 
      	$pdf->SetFillColor(255, 255, 255);
      	$pdf->SetTextColor(0,0,0);
      	
      	$pdf->SetDrawColor(25, 25, 112);
      	

      	$pdf->SetLineWidth(2);
		$pdf->cell(180,10,utf8_decode('EMPRESA' . "  " . $row['cempresa'] ),'B',1,'C',1);
		$y = $pdf->GetY();
      	$pdf->SetY($y+3);
		$pdf->SetDrawColor(0, 0, 0);
      	$pdf->SetLineWidth(0);
		$pdf->SetX(18); 
		$pdf->SetFont('times','B',10);
		$pdf->cell(100,10,'CONTACTO ',1,0,'C',1);
			
		$pdf->cell(80,10,utf8_decode("RESPONSABLE"),1,1,'C',1);
		$pdf->SetX(18); 
				
		$pdf->GetY();
		$pdf->cell(20,6,utf8_decode("Teléfono ") ,1,0,'L',1);
		$pdf->cell(80,6,utf8_decode($row['ctelefonof']) ,1,0,'L',1);
		$pdf->cell(15,9,utf8_decode("Nombre ") ,1,0,'L',1);
		$pdf->cell(65,9,utf8_decode($row['cnombre'] . " " . $row['capellido']) ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y+6);
		$pdf->SetX(18); 
		$pdf->cell(20,6,"E-mail " ,1,0,'L',1);
		$pdf->cell(80,6,$row['cemail'] ,1,0,'L',1);
			
		$y = $pdf->GetY();
		$pdf->SetY($y+6);
		$pdf->SetX(18); 
		$pdf->cell(20,6,utf8_decode("Dirección ") ,1,0,'L',1);
		$pdf->cell(80,6,utf8_decode($row['cdireccion'] ) ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y-3);
		$pdf->SetX(118);
		$pdf->cell(15,9,utf8_decode("Celular ") ,1,0,'L',1);
		$pdf->cell(65,9,utf8_decode($row['ccelular']) ,1,0,'L',1);
		$pdf->Ln();  
		$pdf->Ln();  	
		
			
	}

	
	

	$pdf->Output();
	
?>