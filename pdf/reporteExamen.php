<?php


	include 'plantillaExamen.php';
	//require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
    

	$pdf->SetFont('Arial','B',12);
	
	$pdf->SetX(20);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0,0,0);

	$pdf->Cell(170,6,'DATOS PEROSNALES',1,1,'C',1);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0,0,0);
	
	$y = $pdf->GetY();
	$pdf->SetY($y+5);
	$pdf->SetX(20);
	$pdf->Cell(20,6,'Nombre: ',0,0,'L',0);
	
	$y = $pdf->GetY();
	$pdf->SetY($y+6);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode("Dirección"),0,0,'L',0);
	
	$y = $pdf->GetY();
	$pdf->SetY($y+6);
	$pdf->SetX(20);
	$pdf->Cell(20,6,'Edad: ',0,0,'L',0);


	$y = $pdf->GetY();
	$pdf->SetY($y+10);
	$pdf->SetX(18); 
	$pdf->Cell(182,6,'LENSOMETRIA',1,1,'C',1);
	$pdf->SetX(18); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(22,6,'',1,0,'C',1);
	$pdf->Cell(20,6,'Esfera',1,0,'C',1);
	$pdf->Cell(20,6,'Cilindro',1,0,'C',1);
	$pdf->Cell(20,6,'Eje',1,0,'C',1);
	$pdf->Cell(20,6,'Adiccion',1,0,'C',1);
	$pdf->Cell(20,6,'Prisma',1,0,'C',1);
	$pdf->Cell(20,6,'CB',1,0,'C',1);
	$pdf->Cell(20,6,'AV LEJ',1,0,'C',1);
	$pdf->Cell(20,6,'AV CE',1,1,'C',1);
	

	$pdf->SetFont('Arial','',10);
	$pdf->SetX(18); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(22,8,'Ojo derecho',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,1,'C',1);
	$pdf->SetX(18); 
		$pdf->Cell(22,8,'Ojo izquierdo',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,0,'C',1);
		$pdf->Cell(20,8,'',1,1,'C',1);

		$y = $pdf->GetY();
	$pdf->SetY($y+5);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode("Diseño y tiempo de uso: "),0,0,'L',0);


	
	$y = $pdf->GetY();
	$pdf->SetY($y+15);
	$pdf->SetX(12); 
	$pdf->SetFillColor(232,232,232);
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(192,6,utf8_decode("REFRACCIÓN FINAL"),1,1,'C',1);
	$pdf->SetX(12); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(22,6,'',1,0,'C',1);
	$pdf->Cell(17,6,'AVscL',1,0,'C',1);
	$pdf->Cell(17,6,'AVscC',1,0,'C',1);
	$pdf->Cell(17,6,'Esfera',1,0,'C',1);
	$pdf->Cell(17,6,'Cilindro',1,0,'C',1);
	$pdf->Cell(17,6,'Eje',1,0,'C',1);
	$pdf->Cell(17,6,'Adiccion',1,0,'C',1);
	$pdf->Cell(17,6,'Prisma',1,0,'C',1);
	$pdf->Cell(17,6,'CB',1,0,'C',1);
	$pdf->Cell(17,6,'AV LEJ',1,0,'C',1);
	$pdf->Cell(17,6,'AV CE',1,1,'C',1);
	

	$pdf->SetFont('Arial','',10);
	$pdf->SetX(12); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(22,8,'Ojo derecho',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,1,'C',1);
$pdf->SetX(12); 
		$pdf->Cell(22,8,'Ojo izquierdo',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,1,'C',1);

$y = $pdf->GetY();
	$pdf->SetY($y+15);
	$pdf->SetX(17); 
	$pdf->SetFillColor(232,232,232);
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(176,6,utf8_decode("MEDIDAS"),1,1,'C',1);
	$pdf->SetX(17); 
	$pdf->Cell(116,6,'MEDIDAS',1,0,'C',1);
	$pdf->Cell(60,6,'EXAMINO',1,1,'C',1);
	$pdf->SetX(17); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(22,6,'',1,0,'C',1);
	$pdf->Cell(17,6,'DNP',1,0,'C',1);
	$pdf->Cell(17,6,'DIP',1,0,'C',1);
	$pdf->Cell(30,6,'ALT PUPILAR',1,0,'C',1);
	$pdf->Cell(30,6,'ALT DE OBLEA',1,0,'C',1);
	$pdf->Cell(60,6,'',1,1,'C',1);
	
	

$pdf->SetX(17); 
	$pdf->SetFont('Arial','',10);
		$pdf->SetX(17); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(22,8,'Ojo derecho',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(60,8,'',1,1,'C',1);
		
		$pdf->SetX(17); 
		$pdf->Cell(22,8,'Ojo izquierdo',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(17,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(30,8,'',1,0,'C',1);
		$pdf->Cell(60,8,'',1,1,'C',1);
		

	$y = $pdf->GetY();
	$pdf->SetY($y+5);
	$pdf->SetX(20);
	$pdf->Cell(20,6,'Observaciones: ',0,0,'L',0);
	$pdf->Output();
	
?>