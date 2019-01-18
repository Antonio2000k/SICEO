<?php
	include 'Config/conexion.php';
	include 'plantillaEncomiendas.php';

	$id = $_REQUEST["id"];
	//require 'conexion.php';

	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);

	$pdf = new PDF('L','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();

	$y = $pdf->GetY();
	$pdf->SetY($y+5);

	$pdf->SetX(8);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','B',7);

	$pdf->Cell(60,6,'ENCOMENDERO',0,0,'C',1);
	$pdf->Cell(18,6,'TELEFONO',0,0,'C',1);
	$pdf->Cell(133,6,utf8_decode("DETALLE"),0,0,'C',1);
	$pdf->Cell(25,6,utf8_decode("FECHA DE ENVIO"),0,0,'C',1);
	$pdf->Cell(28,6,'FECHA DE RECIBIDO',0,1,'C',1);		
	$pdf->SetDrawColor(25, 25, 112);
	$pdf->SetLineWidth(2);
	$pdf->Line(8, $pdf->GetY()+1 , 271 , $pdf->GetY()+1);

	$y = $pdf->GetY();
	$pdf->SetY($y+3);
	

	$query_s= pg_query($conexion, "SELECT * FROM pbencomienda WHERE eid_encomienda = $id");

	$pdf->SetFont('Arial','B',8);
	$pdf->SetX(8);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetDrawColor(0, 0, 0);
	$pdf->SetLineWidth(0);
	while($fila = pg_fetch_array($query_s)) {
		// $pdf->Cell(70,8,'Alexander Enmanuel Orellana Corvera',1,0,'C',1);
		// $pdf->Cell(20,8,'M',1,0,'C',1);
		// $pdf->Cell(120,8,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',1,0,'C',1);
		// $pdf->Cell(30,8,'2345 - 8965',1,0,'C',1);
		// $pdf->Cell(30,8,'11/06/1998',1,1,'C',1);

		$query_encomendero= pg_query($conexion, "SELECT * FROM paencomendero WHERE eid_encomendero = $fila[3]");

		$nombre = "";
		$telefono = "";

		while($fila_encomendero = pg_fetch_array($query_encomendero)) {
			$nombre = $fila_encomendero[1]." ".$fila_encomendero[2];
			$telefono = $fila_encomendero[3];
		}

		$pdf->Cell(60,8,$nombre,1,0,'C',1);
		$pdf->Cell(18,8,$telefono,1,0,'C',1);
		$pdf->Cell(133,8,$fila[4],1,0,'C',1);
		$pdf->Cell(25,8,date('d/m/Y', strtotime($fila[1])),1,0,'C',1);
		if($fila[2]== 't'){
			$pdf->Cell(28,8,date('d/m/Y', strtotime($fila[5])),1,1,'C',1);
		}else if($fila[2]== 'f'){
			$pdf->Cell(28,8,'PENDIENTE',1,1,'C',1);
		}
	}
	$query_detalle= pg_query($conexion, "SELECT pcdetalle_encomienda.cmodelo,  pcdetalle_encomienda.cmaterial, pcdetalle_encomienda.ctipo, pbencomienda.eid_encomienda, paclientes.cnombre, pcdetalle_encomienda.eid_encomienda, paclientes.capellido , pcdetalle_encomienda.eid_encomienda 
			FROM pcdetalle_encomienda INNER JOIN pbencomienda ON pcdetalle_encomienda.eid_encomienda = pbencomienda.eid_encomienda INNER JOIN paclientes ON pcdetalle_encomienda.cid_cliente = paclientes.eid_cliente WHERE pcdetalle_encomienda.eid_encomienda = $id");
	

	$pdf->Ln(10);
	$pdf->SetX(8);
	$pdf->SetFont('times','B',13);
	$pdf->Cell(269,6,'Detalle de paquete enviado',0,1,'C',1);
	$pdf->Ln(2);
	$pdf->SetX(50);
	$pdf->SetFont('arial','B',8);
	$pdf->Cell(60,8,'CLIENTE',0,0,'C',1);
	$pdf->Cell(60,8,'MODELO',0,0,'C',1);
	$pdf->Cell(30,8,'MATERIAL',0,0,'C',1);
	$pdf->Cell(30,8,'TIPO',0,1,'C',1);
	
	$pdf->SetDrawColor(25, 25, 112);
	$pdf->SetLineWidth(2);
	$pdf->Line(50, $pdf->GetY() , 230 , $pdf->GetY());
	$pdf->Ln(2);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetDrawColor(0, 0, 0);
	$pdf->SetLineWidth(0);

		while($fila_d = pg_fetch_array($query_detalle)) {
			$pdf->SetX(50);
			$pdf->Cell(60,8,$fila_d[4] . ' ' . $fila_d[6],1,0,'C',1);
			$pdf->Cell(60,8,$fila_d[0],1,0,'C',1);
			$pdf->Cell(30,8,$fila_d[1],1,0,'C',1);
			$pdf->Cell(30,8,$fila_d[2],1,1,'C',1);
			
		}

	$pdf->Output();

?>
