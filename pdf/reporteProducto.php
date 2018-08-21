<?php


	include 'plantillaProductos.php';
	//require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
    

	$pdf->SetFont('Arial','B',12);
	

	$y = $pdf->GetY();
	$pdf->SetY($y+5);

	$pdf->SetX(15); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
    
    $pdf->Cell(30,6,'MODELO',1,0,'C',1);
	$pdf->Cell(30,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode("MARCA"),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode("PRECIO"),1,0,'C',1);
	$pdf->Cell(30,6,'GARANTIA',1,0,'C',1);
	$pdf->Cell(30,6,'DISPONIBILIDAD',1,1,'C',1);

	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(15); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,1,'C',1);

		
		


	

	$pdf->Output();
	
?>