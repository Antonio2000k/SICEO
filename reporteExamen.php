<?php
	ini_set('date.timezone',  'America/El_Salvador');

	include 'plantillaExamen.php';
	
   
    $iddatos = $_REQUEST["id"];
    $idexam= $_REQUEST["idexam"];

	require 'Config/conexion.php';
	
	$query_s = pg_query($conexion, "SELECT
	expediente.cid_expediente,
	clientes.eid_cliente,
	clientes.cnombre,
	clientes.capellido,
	clientes.eedad,
	clientes.csexo,
	clientes.ctelefonof,
	clientes.cdireccion,
	examen.eid_examen,
	examen.cobservaciones,
	examen.cid_expediente,
	examen.eid_antecedente_medico,
	examen.eid_antecedente_ocular,
	examen.eid_lensometria,
	examen.eid_refraccion,
	examen.eid_medidas,
	examen.ffecha,
	examen.cid_empleado,
	antecedente_medico.eid_antecedente_medico,
	antecedente_medico.cdm,
	antecedente_medico.cha,
	antecedente_medico.ccyt,
	antecedente_medico.ctiroides,
	antecedente_medico.cotros,
	antecedente_ocular.eid_antecedente_ocular,
	antecedente_ocular.cglaucomap,
	antecedente_ocular.cglaucomaf,
	antecedente_ocular.ccataratap,
	antecedente_ocular.ccatarataf,
	antecedente_ocular.cdoctor,
	antecedente_ocular.cotro,
	antecedente_ocular.coperadod,
	lensometria.eid_lensometria,
	lensometria.resfera_ojoderecho as lesfojoderecho,
	lensometria.resfera_ojoizquierdo as lesfojoizquierdo,
	lensometria.rcilindro_ojoderecho as lcilojoderecho,
	lensometria.rcilindro_ojoizquierdo as lcilojoizquierdo,
	lensometria.reje_ojoderecho as lejeojoderecho,
	lensometria.reje_ojoizquierdo as lejeojoizquierdo,
	lensometria.radiccion_ojoderecho as ladicojoderecho,
	lensometria.radiccion_ojoizquierdo as ladicojoizquierdo,
	lensometria.rprisma_ojoderecho as lprisojoderecho,
	lensometria.rprisma_ojodizquierdo as lprisojodizquierdo,
	lensometria.rcb_ojoderecho as lcbojoderecho,
	lensometria.rcb_ojoizquierdo as lcbojoizquierdo,
	lensometria.rav_lej_ojoderecho as lavlejojoderecho,
	lensometria.rav_lej_ojoizquierdo as lavlejojoizquierdo,
	lensometria.rav_cer_ojoderecho as lavcerojoderecho,
	lensometria.rav_cer_ojoizquierdo as lavcerojoizquierdo,
	lensometria.cdescripcion as ldescripcion,
	refraccion.eid_refraccion,
	refraccion.ravscl_ojoderecho as ravsclojoderecho,
	refraccion.ravscl_ojoizquierdo as ravsclojoizquierdo,
	refraccion.ravscc_ojoderecho as ravsccojoderecho,
	refraccion.ravscc_ojoizquierdo as ravsccojoizquierdo,
	refraccion.resfera_ojoderecho as resfojoderecho,
	refraccion.resfera_ojoizquierdo as resfojoizquierdo,
	refraccion.rcilindro_ojoderecho as rcilojoderecho,
	refraccion.rcilindro_ojoizquierdo as rcilojoizquierdo,
	refraccion.reje_ojoderecho as rejeojoderecho,
	refraccion.reje_ojoizquierdo as rejeojoizquierdo,
	refraccion.radiccion_ojoderecho as radicojoderecho,
	refraccion.radiccion_ojoizquierdo as radicojoizquierdo,
	refraccion.rprisma_ojoderecho as rprisojoderecho,
	refraccion.rprisma_ojoizquierdo as rprisojoizquierdo,
	refraccion.rcb_ojoderecho as rcbojoderecho,
	refraccion.rcb_ojoizquierdo as rcbojoizquierdo,
	refraccion.ravlej_ojoderecho as ravlejojoderecho,
	refraccion.ravlej_ojoizquierdo as ravlejojoizquierdo,
	refraccion.ravcer_ojoderecho as ravcerojoderecho,
	refraccion.ravcer_ojoizquierdo as ravcerojoizquierdo,
	refraccion.cdescripcion as rdescripcion,
	medidas.eid_medidas,
	medidas.rdnp_ojoderecho,
	medidas.rdnp_ojoizquierdo,
	medidas.rdip,
	medidas.ralt_pupilar,
	medidas.ralt_oblea,
	medidas.cexamino,
	medidas.cobservacion 
FROM
	pbexpediente2 as expediente
	INNER JOIN paclientes as clientes ON expediente.eid_cliente = clientes.eid_cliente
	INNER JOIN pcexamen as examen ON examen.cid_expediente = expediente.cid_expediente
	INNER JOIN paantecedente_medico as antecedente_medico ON examen.eid_antecedente_medico = antecedente_medico.eid_antecedente_medico
	INNER JOIN paantecedente_ocular as antecedente_ocular ON examen.eid_antecedente_ocular = antecedente_ocular.eid_antecedente_ocular
	INNER JOIN palensometria as lensometria ON examen.eid_lensometria = lensometria.eid_lensometria
	INNER JOIN parefraccion as refraccion ON examen.eid_refraccion = refraccion.eid_refraccion
	INNER JOIN pamedidas as medidas ON examen.eid_medidas = medidas.eid_medidas WHERE examen.cid_expediente = '$iddatos' and examen.eid_examen = '$idexam'");

	
	
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
    

	$pdf->SetFont('Arial','B',9);
	
	$pdf->SetX(20);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetTextColor(0,0,0);

	
	$pdf->SetFont('Arial','B',9);
	// 1º Datos del cliente
	while($row = pg_fetch_assoc($query_s)){
		
		//$pdf->cell(170,6,$row['cnombre'],1,"L");
		$texto1=utf8_decode("\nApellidos:  ".$row['capellido']."   		                         "."Nombres:  ".$row['cnombre']." 																										"."Edad:  ".$row['eedad']." años"."\n\nFecha:  ". date('d/m/Y', strtotime($row['ffecha']))."                                     			 	   "."Tel:  ".$row['ctelefonof']."                                              ");	

		
	
	$pdf->SetXY(25, 55);
	$pdf->MultiCell(168,4,$texto1,1,"L");

$y = $pdf->GetY();
	$pdf->SetY($y+7);
	
	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(90,5,utf8_decode("ANTECEDENTES MÉDICOS"),1,0,'C',1);
	$pdf->Cell(90,5,'ANTEC Y DX OCULAR',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	
	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(90,5,'',1,0,'C',1);

	$pdf->Cell(20,5,'',1,0,'C',1);
	$pdf->Cell(35,5,'Personal',1,0,'C',1);
	$pdf->Cell(35,5,'Familiar',1,1,'C',1);

	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(25,5,'GLUCOSA',1,0,'C',1);
	$pdf->Cell(65,5, $row['cdm'] ,1,0,'C',1);

	$pdf->Cell(20,5,'GLAUCOMA',1,0,'C',1);
	$pdf->Cell(35,5,$row['cglaucomap'],1,0,'C',1);
	$pdf->Cell(35,5,$row['cglaucomaf'],1,1,'C',1);

	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(25,5,'PRESION ART.',1,0,'C',1);
	$pdf->Cell(65,5,$row['cha'],1,0,'C',1);

	$pdf->Cell(20,5,'CATARATA',1,0,'C',1);
	$pdf->Cell(35,5,$row['ccataratap'],1,0,'C',1);
	$pdf->Cell(35,5,$row['ccatarataf'],1,1,'C',1);
	

	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(25,5,'TRIGLICERIDOS',1,0,'C',1);
	$pdf->Cell(65,5,$row['ccyt'],1,0,'C',1);

	$pdf->Cell(10,5,'DR',1,0,'C',1);
	$pdf->Cell(80,5,$row['cdoctor'],1,1,'C',1);

	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(25,5,'TIROIDES',1,0,'C',1);
	$pdf->Cell(65,5,$row['ctiroides'],1,0,'C',1);

	$pdf->Cell(10,5,'OTRO',1,0,'C',1);
	$pdf->Cell(80,5,$row['cotro'],1,1,'C',1);

	$pdf->SetX(18); 
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(25,5,'OTROS',1,0,'C',1);
	$pdf->Cell(65,5,$row['cotros'],1,0,'C',1);

	$pdf->Cell(10,5,'OP DE',1,0,'C',1);
	$pdf->Cell(80,5,$row['coperadod'],1,1,'C',1);

	$y = $pdf->GetY();
	$pdf->SetY($y+7);
	$pdf->SetX(18); 
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(182,6,'LENSOMETRIA',1,1,'C',1);
	$pdf->SetX(18); 

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	
	$pdf->Cell(22,6,'',1,0,'C',1);
	$pdf->Cell(20,6,'Esfera',1,0,'C',1);
	$pdf->Cell(20,6,'Cilindro',1,0,'C',1);
	$pdf->Cell(20,6,'Eje',1,0,'C',1);
	$pdf->Cell(20,6,'Adiccion',1,0,'C',1);
	$pdf->Cell(20,6,'Prisma',1,0,'C',1);
	$pdf->Cell(20,6,'CB',1,0,'C',1);
	$pdf->Cell(20,6,'AV LEJ',1,0,'C',1);
	$pdf->Cell(20,6,'AV CE',1,1,'C',1);
	

	$pdf->SetFont('Arial','',8);
	$pdf->SetX(18); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(22,7,'Ojo derecho',1,0,'C',1);
		$pdf->Cell(20,7,$row['lesfojoderecho'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lcilojoderecho'],1,0,'C',1);
		$pdf->Cell(20,7,utf8_decode($row['lejeojoderecho'].'°'),1,0,'C',1);
		$pdf->Cell(20,7,$row['ladicojoderecho'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lprisojoderecho'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lcbojoderecho'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lavlejojoderecho'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lavcerojoderecho'],1,1,'C',1);
	$pdf->SetX(18); 
		$pdf->Cell(22,7,'Ojo izquierdo',1,0,'C',1);
		$pdf->Cell(20,7,$row['lesfojoizquierdo'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lcilojoizquierdo'],1,0,'C',1);
		$pdf->Cell(20,7,utf8_decode($row['lejeojoizquierdo'].'°'),1,0,'C',1);
		$pdf->Cell(20,7,$row['ladicojoizquierdo'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lprisojodizquierdo'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lcbojoizquierdo'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lavlejojoizquierdo'],1,0,'C',1);
		$pdf->Cell(20,7,$row['lavcerojoizquierdo'],1,1,'C',1);

		$y = $pdf->GetY();
	$pdf->SetY($y+4);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode("Diseño y tiempo de uso: " .$row['cdm']),0,0,'L',0);


	
	$y = $pdf->GetY();
	$pdf->SetY($y+15);
	$pdf->SetX(12); 
	$pdf->SetFillColor(232,232,232);
	
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(192,6,utf8_decode("REFRACCIÓN FINAL"),1,1,'C',1);
	$pdf->SetX(12); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
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
	

	$pdf->SetFont('Arial','',8);
	$pdf->SetX(12); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(22,7,'Ojo derecho',1,0,'C',1);
		$pdf->Cell(17,7,$row['ravsclojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['ravsccojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['resfojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['rcilojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,utf8_decode($row['rejeojoderecho'].'°'),1,0,'C',1);
		$pdf->Cell(17,7,$row['radicojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['rprisojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['rcbojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['ravlejojoderecho'],1,0,'C',1);
		$pdf->Cell(17,7,$row['ravcerojoderecho'],1,1,'C',1);
$pdf->SetX(12); 
		$pdf->Cell(22,7,'Ojo izquierdo',1,0,'C',1);
		$pdf->Cell(17,7,$row['ravsclojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['ravsccojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['resfojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['rcilojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,utf8_decode($row['rejeojoizquierdo'].'°'),1,0,'C',1);
		$pdf->Cell(17,7,$row['radicojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['rprisojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['rcbojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['ravlejojoizquierdo'],1,0,'C',1);
		$pdf->Cell(17,7,$row['ravcerojoizquierdo'],1,1,'C',1);

$y = $pdf->GetY();
	$pdf->SetY($y+4);
	$pdf->SetX(20);
	$pdf->Cell(20,6,utf8_decode("Diseño y tiempo de uso: ".$row['rdescripcion']),0,0,'L',0);


	
	$y = $pdf->GetY();
	$pdf->SetY($y+15);
	$pdf->SetX(18); 
	$pdf->SetFillColor(232,232,232);
	
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(176,6,utf8_decode("MEDIDAS"),1,1,'C',1);
	$pdf->SetX(18); 
	$pdf->Cell(116,6,'MEDIDAS',1,0,'C',1);
	$pdf->Cell(60,6,'EXAMINO',1,1,'C',1);
	$pdf->SetX(18); 
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(22,6,'',1,0,'C',1);
	$pdf->Cell(17,6,'DNP',1,0,'C',1);
	$pdf->Cell(17,6,'DIP',1,0,'C',1);
	$pdf->Cell(30,6,'ALT PUPILAR',1,0,'C',1);
	$pdf->Cell(30,6,'ALT DE OBLEA',1,0,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(60,6,'',1,1,'C',0);
	
	

$pdf->SetX(18); 
	$pdf->SetFont('Arial','',8);
		$pdf->SetX(18); 
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(22,6,'Ojo derecho',1,0,'C',1);
		$pdf->Cell(17,6,$row['rdnp_ojoderecho'],1,0,'C',1);
		$pdf->Cell(17,12,$row['rdip'],1,0,'C',0);
		$pdf->Cell(30,12,$row['ralt_pupilar'],1,0,'C',0);
		$pdf->Cell(30,12,$row['ralt_oblea'],1,0,'C',0);
		$pdf->Cell(60,12,$row['cexamino'],1,1,'C',1);
		
		$pdf->SetXY(18, 234);
		$pdf->Cell(22,6,'Ojo izquierdo',1,0,'C',1);
		$pdf->Cell(17,6,$row['rdnp_ojoizquierdo'],1,1,'C',1);
		
		

	$y = $pdf->GetY();
	$pdf->SetY($y+4);
	$pdf->SetX(20);
	$pdf->Cell(20,6,'Observaciones: '.$row['cobservaciones'],0,0,'L',0);
	$pdf->Output();
	}
?>