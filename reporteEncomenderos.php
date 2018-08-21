<?php


	include 'plantillaEncomenderos.php';
	//require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();

	$pdf->AddPage();
    

	$pdf->SetFont('Arial','B',12);
	

	$y = $pdf->GetY();
	$pdf->SetY($y+5);

	$pdf->SetX(15); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);

	$pdf->Cell(70,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(20,6, utf8_decode("TELÉFONO"),1,0,'C',1);
	$pdf->Cell(180,6, utf8_decode("DESCRIPCIÓN"),1,1,'C',1);
	

	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(15); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		$pdf->Cell(20,8,'2301 - 1212',1,0,'C',1);
		$pdf->Cell(180,8,'Surline, Azafata: Karla Escobar, Placa: ATD-121, Ruta: 116 ',1,1,'L',1);	
	
	$pdf->Output();
	
?>