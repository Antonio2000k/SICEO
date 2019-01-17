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

	$query_s= pg_query($conexion, "SELECT pcnotab.rsaldo, pcnotab.ffecha_pago, pcnotab.eid_ordenc,
    pbordenc.ccliente, paclientes.cnombre, paclientes.capellido, pbordenc.rtotal, paclientes.cdireccion
    FROM pcnotab INNER JOIN pbordenc ON pcnotab.eid_ordenc = pbordenc.eid_compra
INNER JOIN paclientes ON pbordenc.ccliente = paclientes.eid_cliente WHERE eid_nota = '$id'");

	$pdf->Image('images/notab.png', 1, 1, 137 );
	//Variable aux, hace que se mueva hacia abajo.
	$y = 88;
	$total = 0;
	$total_precios = 0;

	while($row=pg_fetch_assoc($query_s)) {
			$pdf->SetFont('times','B',14);
			$pdf->SetXY(24,59);

			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0,0,0);

			//Este es para el nombre.
			$pdf->SetXY(25,50);
			$pdf->Cell(100,6,$row['cnombre'] ." ". $row['capellido'],0,0,'D',1);

			//Este es para la direccion.
			$pdf->SetXY(28,59);
      $pdf->SetFont('times','B',12);
			$pdf->Cell(70,2,$row['cdireccion'] ,0,0,'D',1);

			//Este es para la fecha.
      $pdf->SetFont('times','B',14);
			$fecha = date('d/m/Y', strtotime($row["ffecha_pago"]));
      $pdf->SetXY(60,70);
			$pdf->Cell(75,5,$fecha,0,0,'D',1);

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

      //Para darle id.
			$pdf->SetXY(92,157);
			$pdf->SetTextColor(178,25,56);
			$pdf->SetFont('times','B',14);
			$pdf->Cell(25,9,$valor,0,0,'D',1);

      //Para darle id.
			$pdf->SetXY(55,135);
			$pdf->SetFont('times','B',20);
			$pdf->Cell(68,12,"",0,0,'D',1);

			//Cambia al color y tamaño nuevamente.
			$pdf->SetFont('times','B',9);
			$pdf->SetTextColor(0,0,0);

      $pendiente = 0;
      $mensaje = "";
      $id_compra = $row["eid_ordenc"];

      $query_notab = pg_query($conexion, "SELECT * FROM pcnotab WHERE eid_ordenc = $id_compra");

      while($fila=pg_fetch_array($query_notab)) {
        $pendiente+=$fila[1];
      }

      $pendiente = $row["rtotal"]-$pendiente;

      if($pendiente!=0) {
        $mensaje = "Saldo pendiente: $".$pendiente;
      }
      else {
        $mensaje = "CANCELADO";
      }

      //Para darle id.
			$pdf->SetXY(8,102);
			$pdf->SetFont('times','B',14);
			$pdf->Cell(25,8,$mensaje,0,0,'D',1);

      //Para darle el saldo abonado.
			$pdf->SetXY(86,126);
			$pdf->SetFont('times','B',14);
			$pdf->Cell(15,5,"$".$row["rsaldo"],0,0,'D',1);
	}

	$pdf->Output();

?>
