<?php
require 'Config/conexion.php';

	require 'fpdf/fpdf.php';
	$proveedor =$_REQUEST['proveedor'];
	$estado =$_REQUEST['estado'];
	$tipo =$_REQUEST['tipo'];
	$marca =$_REQUEST['marca'];
	$garantia =$_REQUEST['garantia'];
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
			$this->Image('images/Siceom.png', 14, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(135,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 165, 20, 35 );
			$this->SetXY(135, 23);
			$this->SetFont('times','B',14);
			$this->Cell(30);
			$this->Cell(-115,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('times','B',8);
			$this->Cell(135,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->SetXY(40, 31);
     		$this->Cell(135,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
      		$this->SetXY(40, 34);
			$this->Cell(130,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			$this->SetFont('times','B',16);
			$this->Ln(5);
			$this->Cell(30);
			$this->Cell(140,10, 'Lista de productos',0,1,'C');
			$this->Ln(5);

			$this->SetFont('times','B',9);
			$this->Ln(1);
			$this->Cell(30); 

			$y = $this->GetY();
			$this->SetY($y+3);

			$this->SetX(7); 
			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0,0,0);
			$this->SetFont('times','B',8);
			$this->SetDrawColor(25, 25, 112);
		    $this->SetLineWidth(2);
			$this->Line(7, $this->GetY()+10 , 209 , $this->GetY()+10);

			$x_posicion=$this->getx(); 
			
			
			$this->vcellT(20,10,$x_posicion,'MODELO',0,0,'C',1);
			$x_posicion=$this->getx(); 
			$this->vcellT(25,10,$x_posicion,'NOMBRE',0,0,'C',1);
			$x_posicion=$this->getx(); 
			$this->vcellT(20,10,$x_posicion,utf8_decode("PRECIO DE  COMPRA"),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(20,10,$x_posicion,utf8_decode("PRECIO DE  VENTA"),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(65,10,$x_posicion,utf8_decode('DESCRIPCIÓN'),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(12,10,$x_posicion,'STOCK', 0,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(40,10,$x_posicion,'PROVEEDOR', 0,1,'C',1);
			$this->Ln(); 
			
			$y = $this->GetY();
			$this->SetY($y+3);

			$this->SetDrawColor(0, 0, 0);
			$this->SetLineWidth(0);

			$this->SetFillColor(255, 99, 71);
			$this->Rect(7, 76, 202, 176, '');
			
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
	if($proveedor!= ""){
		$query_s= pg_query($conexion, "SELECT producto.cmodelo, producto.cnombre, producto.estock, producto.rprecio_compra, 
			producto.ccolor, producto.rprecio_venta, producto.bestado, producto.ctipo, marca.cnombre as marcas, garantia.etiempo,
			garantia.cdenominacion, proveedors.cempresa FROM proveedor as proveedors
			INNER JOIN productos as producto ON producto.eid_proveedor = proveedors.eid_proveedor
			INNER JOIN marca as marca ON producto.eid_marca = marca.eid_marca
			INNER JOIN garantia as garantia ON producto.eid_garantia = garantia.eid_garantia 
			WHERE proveedors.eid_proveedor = '$proveedor'  ");
	} 
	 if($tipo!= "" && $estado!= ""){
		$query_s= pg_query($conexion, "SELECT producto.cmodelo, producto.cnombre, producto.estock, producto.rprecio_compra, 
			producto.ccolor, producto.rprecio_venta, producto.bestado, producto.ctipo, marca.cnombre as marcas, garantia.etiempo,
			garantia.cdenominacion, proveedors.cempresa FROM proveedor as proveedors
			INNER JOIN productos as producto ON producto.eid_proveedor = proveedors.eid_proveedor
			INNER JOIN marca as marca ON producto.eid_marca = marca.eid_marca
			INNER JOIN garantia as garantia ON producto.eid_garantia = garantia.eid_garantia 
			WHERE producto.ctipo = '$tipo' AND producto.bestado = '$estado'  ");
	}
	if($estado!= ""){
		$query_s= pg_query($conexion, "SELECT producto.cmodelo, producto.cnombre, producto.estock, producto.rprecio_compra, 
			producto.ccolor, producto.rprecio_venta, producto.bestado, producto.ctipo, marca.cnombre as marcas, garantia.etiempo,
			garantia.cdenominacion, proveedors.cempresa FROM proveedor as proveedors
			INNER JOIN productos as producto ON producto.eid_proveedor = proveedors.eid_proveedor
			INNER JOIN marca as marca ON producto.eid_marca = marca.eid_marca
			INNER JOIN garantia as garantia ON producto.eid_garantia = garantia.eid_garantia 
			WHERE producto.bestado = '$estado'  ");
	} 

	if($tipo!= ""){
		$query_s= pg_query($conexion, "SELECT producto.cmodelo, producto.cnombre, producto.estock, producto.rprecio_compra, 
			producto.ccolor, producto.rprecio_venta, producto.bestado, producto.ctipo, marca.cnombre as marcas, garantia.etiempo,
			garantia.cdenominacion, proveedors.cempresa FROM proveedor as proveedors
			INNER JOIN productos as producto ON producto.eid_proveedor = proveedors.eid_proveedor
			INNER JOIN marca as marca ON producto.eid_marca = marca.eid_marca
			INNER JOIN garantia as garantia ON producto.eid_garantia = garantia.eid_garantia 
			WHERE producto.ctipo = '$tipo'  ");
	}

	if($marca!= ""){
		$query_s= pg_query($conexion, "SELECT producto.cmodelo, producto.cnombre, producto.estock, producto.rprecio_compra, 
			producto.ccolor, producto.rprecio_venta, producto.bestado, producto.ctipo, marca.cnombre as marcas, garantia.etiempo,
			garantia.cdenominacion, proveedors.cempresa FROM proveedor as proveedors
			INNER JOIN productos as producto ON producto.eid_proveedor = proveedors.eid_proveedor
			INNER JOIN marca as marca ON producto.eid_marca = marca.eid_marca
			INNER JOIN garantia as garantia ON producto.eid_garantia = garantia.eid_garantia 
			WHERE marca.cnombre = '$marca'  ");
	}
	if($garantia!= ""){
		$query_s= pg_query($conexion, "SELECT producto.cmodelo, producto.cnombre, producto.estock, producto.rprecio_compra, 
			producto.ccolor, producto.rprecio_venta, producto.bestado, producto.ctipo, marca.cnombre as marcas, garantia.etiempo,
			garantia.cdenominacion, proveedors.cempresa FROM proveedor as proveedors
			INNER JOIN productos as producto ON producto.eid_proveedor = proveedors.eid_proveedor
			INNER JOIN marca as marca ON producto.eid_marca = marca.eid_marca
			INNER JOIN garantia as garantia ON producto.eid_garantia = garantia.eid_garantia 
			WHERE garantia.cdenominacion = '$garantia'  ");
	}
	

	
	
	while($row=pg_fetch_assoc($query_s)){	
	 	
		
	 	
		$pdf->SetFont('times','B',9);
		$pdf->SetX(7); 
		$x_posicion=$pdf->getx(); 
		
		$pdf->vcell(20,18,$x_posicion,$row['cmodelo'], 0,0,'C',1);// pass all values inside the cell
		
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0,0,0);
		$x_posicion=$pdf->getx(); 	
		$pdf->vcell(25,18,$x_posicion,$row['cnombre'] ,0,0,'C',1);
		$x_posicion=$pdf->getx(); 
		$pdf->vcell(20,18,$x_posicion,utf8_decode("$ ".$row['rprecio_compra']),0,0,'C',1);
		$x_posicion=$pdf->getx(); 	
		$pdf->vcell(20,18,$x_posicion,utf8_decode("$ ".$row['rprecio_venta']),0,0,'C',1);
		$x=$pdf->getX(); 
		$pdf->SetX($x);	
		$pdf->GetY();
		$pdf->cell(65,6,"Marca: ". $row['marcas'] . "      Color: " . $row['ccolor'],1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y+6);
		$x=$pdf->getX(); 
		$pdf->SetX($x+82);
		$pdf->cell(65,6,"Tipo Garantia: ".$row['cdenominacion'] ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y+6);
		$x=$pdf->getX(); 
		$pdf->SetX($x+82);
		$pdf->cell(65,6,"Tiempo de Garantia: " .$row['etiempo'] . " meses" ,1,0,'L',1);
		$y = $pdf->GetY();
		$pdf->SetY($y-12);
		$x=$pdf->getX(); 
		$pdf->SetX($x+147);
		$x_posicion=$pdf->getx(); 
		$pdf->vcell(12,18,$x_posicion,$row['estock'], 0,0,'C',1);
		$x_posicion=$pdf->getx(); 	
		$pdf->vcell(40,18,$x_posicion,$row['cempresa'] ,0,0,'C',1);
		$pdf->Ln();  	
		
			
	}

	
	

	$pdf->Output();
	
?>