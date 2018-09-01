<?php


	include 'plantillaNota.php';
	//require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
    

	$pdf->SetFont('Arial','B',12);
	

	$y = $pdf->GetY();
	$pdf->SetY($y+5);

	$pdf->SetX(13); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
    
	$pdf->Cell(70,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(20,6,'SEXO',1,0,'C',1);
	$pdf->Cell(105,6,utf8_decode("DIRECCIÓN"),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode("TELÉFONO"),1,0,'C',1);
	$pdf->Cell(30,6,'FECHA NACIMIENTO',1,1,'C',1);
	

	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(13); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		$pdf->Cell(20,8,'M',1,0,'C',1);
		$pdf->Cell(105,8,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',1,0,'C',1);
		$pdf->Cell(30,8,'2345 - 8965',1,0,'C',1);
		$pdf->Cell(30,8,'11/06/1998',1,1,'C',1);
		

		$pdf->SetX(13); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		$pdf->Cell(20,8,'M',1,0,'C',1);
		$pdf->Cell(105,8,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',1,0,'C',1);
		$pdf->Cell(30,8,'2345 - 8965',1,0,'C',1);
		$pdf->Cell(30,8,'11/06/1998',1,1,'C',1);
		

		$pdf->SetX(13); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		$pdf->Cell(20,8,'M',1,0,'C',1);
		$pdf->Cell(105,8,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',1,0,'C',1);
		$pdf->Cell(30,8,'2345 - 8965',1,0,'C',1);
		$pdf->Cell(30,8,'11/06/1998',1,1,'C',1);
		

		$pdf->SetX(13); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		$pdf->Cell(20,8,'M',1,0,'C',1);
		$pdf->Cell(105,8,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',1,0,'C',1);
		$pdf->Cell(30,8,'2345 - 8965',1,0,'C',1);
		$pdf->Cell(30,8,'11/06/1998',1,1,'C',1);

		$pdf->SetX(13); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		$pdf->Cell(20,8,'M',1,0,'C',1);
		$pdf->Cell(105,8,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',1,0,'C',1);
		$pdf->Cell(30,8,'2345 - 8965',1,0,'C',1);
		$pdf->Cell(30,8,'11/06/1998',1,1,'C',1);
		


	

	$pdf->Output();
	
?>