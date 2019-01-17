<?php
	require 'Config/conexion.php';
	
	$id = $_REQUEST['id'];

	ini_set('date.timezone',  'America/El_Salvador');

	//include 'plantillaCliente.php';
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header(){
			
			
		}
		
		function Footer()
		{
			

		}		
	}
	
	//$pdf = new PDF('L','mm',array(137 , 214));
	$pdf = new PDF('P','mm', array(137 , 214));
	$pdf->AliasNbPages();

	$pdf->AddPage();

	$query_s= pg_query($conexion, "SELECT
pddetalle_notab.cmodelo,
pddetalle_notab.ecantidad,
pcnotab.ffecha_pago,
pcnotab.rsaldo,
paclientes.cnombre,
paclientes.capellido,
paclientes.cdireccion,
pbordenc.eid_compra
FROM pddetalle_notab
INNER JOIN pcnotab ON pddetalle_notab.eid_nota = pcnotab.eid_nota
INNER JOIN pbordenc ON pcnotab.eid_ordenc = pbordenc.eid_compra
INNER JOIN paclientes ON pbordenc.ccliente = paclientes.eid_cliente where pbordenc.eid_compra = '$id'");
	

	$pdf->Image('images/ordenc.jpg', 1, 1, 137 );
	while($row=pg_fetch_assoc($query_s)){	
		
	 	
			$pdf->SetFont('times','B',9);
			$pdf->SetXY(24,59); 
		
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(24,59); 
			$pdf->Cell(90,5,$row['cnombre'] ." ". $row['capellido'],0,0,'D',1);
			$pdf->SetXY(24,65); 
			$pdf->Cell(90,6,$row['cdireccion'] ,0,0,'D',1);
			
			
	}
	$pdf->Output();
	
?>