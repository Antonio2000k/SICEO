<?php
// Queremos hacer en pdf la factura numero 1 de la tipica BBDD de facturacion

include 'plantillaOrden.php';
	//require 'conexion.php';
	
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	//$resultado = $mysqli->query($query);
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();


$pdf->SetFont('Arial','B',10);
// 1º Datos del cliente
$texto1=utf8_decode("Nombre: "."\nDirección: "."\nFecha: ");
$pdf->SetXY(25, 80);
$pdf->MultiCell(170,10,$texto1,1,"L");


// 3º Una tabla con los articulos comprados

// La cabecera de la tabla (en azulito sobre fondo rojo)
$pdf->SetXY(18, 120);
$pdf->SetFillColor(232,232,232);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(18,10,"Cant.",1,0,"C",true);
$pdf->Cell(120,10,"Articulo",1,0,"C",true);
$pdf->Cell(20,10,"Precio U",1,0,"C",true);
$pdf->Cell(25,10,"Valor",1,1,"C",true);
$total=0;

// Los datos (en negro)
$pdf->SetTextColor(0,0,0);


$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");


$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");

$pdf->SetX(18);
$pdf->Cell(18,10,'',1,0,"C");
$pdf->Cell(120,10,'',1,0,"L");
$pdf->Cell(20,10,'',1,0,"C");
$pdf->Cell(25,10,'',1,1,"R");









$pdf->SetX(115);

$pdf->Cell(41,10,"Total:",0,0,"C");
$pdf->Cell(20,10,number_format(1.04*$total,2),1,0,"R");
$pdf->Cell(25,10,number_format(1.04*$total,2),1,1,"R");


// El documento enviado al navegador
$pdf->Output();
?>