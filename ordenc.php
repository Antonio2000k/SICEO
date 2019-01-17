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
	//Variable aux, hace que se mueva hacia abajo.
	$y = 88;
	$total = 0;
	$total_precios = 0;

	while($row=pg_fetch_assoc($query_s)) {
			$pdf->SetFont('times','B',9);
			$pdf->SetXY(24,59);

			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0,0,0);

			//Este es para el nombre.
			$pdf->SetXY(24,59);
			$pdf->Cell(90,5,$row['cnombre'] ." ". $row['capellido'],0,0,'D',1);

			//Este es para la direccion.
			$pdf->SetXY(24,67);
			$pdf->Cell(70,2,$row['cdireccion'] ,0,0,'D',1);

			//Este es para la direccion.
			$fecha = date('d-m-Y', strtotime($row["ffecha_pago"]));
			$fechas = explode("-", $fecha);

			$pdf->SetFont('times','B',10);

			//dia
			$pdf->SetXY(86,49);
			$pdf->Cell(5,2,$fechas[0] ,0,0,'D',1);
			//mes
			$pdf->SetXY(102,49);
			$pdf->Cell(5,2,$fechas[1] ,0,0,'D',1);
			//año
			$pdf->SetXY(118,49);
			$pdf->Cell(5,2,$fechas[2] ,0,0,'D',1);

			//Para el id de la nota.
			$valor = "";

			if($id<9) {
				$valor = "00000".$id;
			}
			if($id>=10 && $id<99) {
				$valor = "0000".$id;
			}
			if($id>=100 && $id<999) {
				$valor = "000".$id;
			}
			if($id>=1000 && $id<9999) {
				$valor = "00".$id;
			}
			if($id>=10000 && $id<99999) {
				$valor = "0".$id;
			}
			if($id>=100000 && $id<999999) {
				$valor = $id;
			}

			$pdf->SetXY(102,17);
			$pdf->SetTextColor(178,25,56);
			$pdf->SetFont('times','B',14);
			$pdf->Cell(22,8,$valor,0,0,'D',1);

			//Cambia al color y tamaño nuevamente.
			$pdf->SetFont('times','B',9);
			$pdf->SetTextColor(0,0,0);

			//Para cada fila.
			$x = 10;

			$pdf->SetFont('times','B',12);

			//Cantidad
			$pdf->SetXY($x,$y);
			$pdf->Cell(5,2,$row["ecantidad"],0,0,'D',1);
			$x=$x+12;

			$articulo = "";
			$precio = -1;

			if($row["cmodelo"]=="") {
				$articulo = "Examen";
				$precio = 10;
			}
			else {
				$articulo = $row["cmodelo"];
				$query_producto = pg_query($conexion, "SELECT * FROM pbproductos WHERE cmodelo = '$articulo'");

				while($fila = pg_fetch_array($query_producto)) {
					$precio = $fila[5];
				}
			}

			$sub_total = $precio*$row["ecantidad"];

			//Articulo
			$pdf->SetXY($x,$y);
			$pdf->Cell(5,2,$articulo,0,0,'D',1);
			$x=$x+64;

			//Precio
			$pdf->SetFont('times','B',10);
			$pdf->SetXY($x,$y);
			$pdf->Cell(5,2,"$".$precio,0,0,'D',1);
			$x=$x+20;

			//Sub-Total
			$pdf->SetFont('times','B',10);
			$pdf->SetXY($x,$y);
			$pdf->Cell(5,2,"$".$sub_total,0,0,'D',1);
			$x=$x+20;


			$y=$y+7;
			$x = 10;

			$total+=$sub_total;
			$total_precios+=$precio;
	}

	//Para el total de precios.
	$pdf->SetFont('times','B',12);
	$pdf->SetXY(85,190);
	$pdf->Cell(5,2,"$".$total_precios,0,0,'D',1);

	//Para el total final.
	$pdf->SetFont('times','B',12);
	$pdf->SetXY(105,190);
	$pdf->Cell(5,2,"$".$total,0,0,'D',1);

	$pdf->Output();

?>
