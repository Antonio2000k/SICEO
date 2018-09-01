<?php
	include 'plantillaPE.php';
	//require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'NOMBRE',1,0,'C',1);
	
	$pdf->Cell(50,6,'MONTO',1,0,'C',1);
	$pdf->Cell(50,6,'FECHA DE PAGO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	
		$pdf->Cell(70,6,'DANIEL VILLALTA',1,0,'C',1);
		
		$pdf->Cell(50,6,'20',1,0,'C',1);
		$pdf->Cell(50,6,'19/04/2018',1,1,'C',1);
		$pdf->Cell(70,6,'ALEJANDRO AVALOS',1,0,'C',1);
		
		$pdf->Cell(50,6,'10',1,0,'C',1);
		$pdf->Cell(50,6,'19/04/2018',1,1,'C',1);
		$pdf->Cell(70,6,'WALTER DURAN',1,0,'C',1);
		
		$pdf->Cell(50,6,'10',1,0,'C',1);
		$pdf->Cell(50,6,'19/04/2018',1,1,'C',1);
	
	$pdf->Output();
	
?>