<?php
	include 'Config/conexion.php';
	include 'plantillaCliente.php';

	$id = $_REQUEST["id"];
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
	$pdf->Cell(20,6,'TELEFONO',1,0,'C',1);
	$pdf->Cell(120,6,utf8_decode("FECHA DE ENVIO"),1,0,'C',1);
	$pdf->Cell(30,6,utf8_decode("FECHA DE RECIBIDO"),1,0,'C',1);
	$pdf->Cell(30,6,'DETALLE',1,1,'C',1);

	$query_s= pg_query($conexion, "SELECT * FROM pbencomienda WHERE eid_encomienda = $id");

	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(15);
	$pdf->SetFillColor(255,255,255);

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

		$pdf->Cell(70,8,$nombre,1,0,'C',1);
		$pdf->Cell(20,8,$telefono,1,0,'C',1);
		$pdf->Cell(120,8,date('d/m/Y', strtotime($fila[1])),1,0,'C',1);
		$pdf->Cell(30,8,date('d/m/Y', strtotime($fila[5])),1,0,'C',1);
		$pdf->Cell(30,8,$fila[4],1,1,'C',1);
	}

	$pdf->Output();

?>
