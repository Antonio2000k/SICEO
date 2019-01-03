<?php
	require 'Config/conexion.php';
	
	$fechaini=$_REQUEST['fechaini'];
	$fechafini=$_REQUEST['fechafini'];
	$sexo =$_REQUEST['sexo'];
	$edad =$_REQUEST['edad'];
	$edadMe =$_REQUEST['edadMe'];
	$edadMa =$_REQUEST['edadMa'];
	ini_set('date.timezone',  'America/El_Salvador');

	//include 'plantillaCliente.php';
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header(){
			$fechaini=$_REQUEST['fechaini'];
			$fechafini=$_REQUEST['fechafini'];
			$sexo =$_REQUEST['sexo'];
			$edad =$_REQUEST['edad'];
			$edadMe =$_REQUEST['edadMe'];
			$edadMa =$_REQUEST['edadMa'];
			$meses = array("0","Enero", "Febrero", "Marzo", "Abril","Mayo", "Junio", "Julio", "Agosto","Septiembre", "Octubre", "Noviembre", "Diciembre");
			$diaIni=substr($fechaini, 0, 2);
			$anio=substr($fechaini, 6, 4);
			$mes=substr($fechaini, 3, 2);
			if($mes<10){
				$mes=substr($mes,1);
			}
			$diaFini=substr($fechafini,  0, 2);
			$aniofini=substr($fechafini, 6, 4);
			$mesFini=substr($fechafini, 3, 2);
			if($mesFini<10){
				$mesFini=substr($mesFini,1);
			}
			$this->Image('images/Siceom.png', 14, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(135,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 165, 20, 35 );
			$this->SetXY(135, 23);
			$this->SetFont('times','B',14);
			$this->Cell(30);
			$this->Cell(-115,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('times','B',8);
			$this->Cell(135,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->SetXY(40, 31);
	      	$this->Cell(135,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
	      	$this->SetXY(40, 34);
			$this->Cell(130,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			$this->SetFont('times','B',16);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(135,10, 'Lista de clientes',0,1,'C');
			$this->Ln(4);

			$this->SetFont('times','B',9);
			$this->Ln(-10);
			$this->Cell(30);

			switch ($sexo) {
				case 'M':
					$this->Cell(135,10, "Del sexo Masculino" ,0,1,'C');
					break;
				case 'F':
					$this->Cell(135,10, "Del sexo Femenino" ,0,1,'C');
					break;
				default:
					
					break;
			}

			
			if($edadMe!= "" && $edadMa!="" ){
				$this->Cell(135,10, utf8_decode("Entre la edad de ". $edadMe . " a " . $edadMa ." años") ,0,1,'C');
			} else if($edadMe!= "" ){
				$this->Cell(135,10, utf8_decode("Menores a ". $edadMe . " años" ),0,1,'C');
			}else if($edadMa!= "" ){
				$this->Cell(135,10, utf8_decode("Mayores a ". $edadMa . " años" ),0,1,'C');
			}  else if($edad!= "" ){
				$this->Cell(135,10, "De la edad de ". $edad ,0,1,'C');
			}
			if($diaIni != "" && $diaFini!="" && $mes !="" && $mesFini!= "" && $anio != "" && $aniofini!="" ){
				if($diaIni == $diaFini && $mes == $mesFini && $anio == $aniofini  ){
					$this->Cell(135,10, utf8_decode("Del día ". $diaIni." de " . $meses[$mes] . " del ".$anio) ,0,1,'C');
				} else if($diaIni == 01 && $diaFini == 29 || $diaFini == 30 || $diaFini == 31 || $diaFini == date('d') && $mes == $mesFini && $anio == $aniofini){
					$this->Cell(135,10, "Del Mes de " . $meses[$mes] . " del ".$anio ,0,1,'C');
				} else if($diaIni == date('d')-6 && $diaFini == date('d') && $anio == $aniofini){
					$this->Cell(135,10, utf8_decode("Del los ultimos 7 días ") ,0,1,'C');
				}   if($diaIni == '01' && $diaFini == date('d') && $mes == '01' && $mesFini == date('m') && $anio == '2015' && $aniofini= date('Y')){
					$this->Cell(135,10, "Todos los registros" ,0,1,'C');
				} 
				if($diaIni == '01' && $diaFini == date('d') && $mes == '01' && $mesFini == date('m') && $anio == date('Y') && $aniofini= date('Y')){
					$this->Cell(135,10, utf8_decode("De este año ".$anio) ,0,1,'C');
				} 
				//$this->Cell(135,10, "Fecha Inicio ". $diaIni." de " . $meses[$mes] . " del ".$anio ." - " .  "Fecha Final ". $fechafini,0,1,'C');
				//Del  echo $diaIni." de ".$meses[$mes]." del ".$aniofini;  al  echo $diaFini." de ".$meses[$mesFini]." del ".$anio; 
			}
			$y = $this->GetY();
			$this->SetY($y+4);

			$this->SetX(7); 
			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0,0,0);
			$this->SetFont('times','B',8);
			$this->SetDrawColor(25, 25, 112);
		    $this->SetLineWidth(2);
			$this->Line(7, $this->GetY()+7 , 209 , $this->GetY()+7);


		    $this->Cell(22,6,'EXPEDIENTE',0,0,'C',1);
			$this->Cell(50,6,'NOMBRE',0,0,'C',1);
			$this->Cell(10,6,'SEXO',0,0,'C',1);
			$this->Cell(15,6,'EDAD',0,0,'C',1);
			$this->Cell(87,6,utf8_decode("DIRECCIÓN"),0,0,'C',1);
			$this->Cell(18,6,utf8_decode("TELÉFONO"),0,1,'C',1);
			
			
			$this->SetDrawColor(0, 0, 0);
			$this->SetLineWidth(0);

			$y = $this->GetY();
			$this->SetY($y+3);

			$this->SetFillColor(255, 99, 71);
			$this->Rect(7, 70, 202, 180, '');
		}
		
		function Footer()
		{
			$this->SetY(-30);
			$this->SetFont('times','B',8);
			$this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '.date('d/m/Y, h:i:s') ),0,0,'R');

		}		
	}
	
	//$pdf = new PDF('L','mm',array(140 , 216));
	$pdf = new PDF('P','mm', 'letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();

	
	
	
	if($fechaini!= "" && $fechafini!= "" ){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
		INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.ffechar BETWEEN CAST ('$fechaini ' AS DATE) AND CAST ('$fechafini ' AS DATE) order by clientes.ffechar asc  " );
	}
	if($sexo!= ""){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, 	clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
	INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.csexo = '".$sexo."' ");
	}
	if($fechaini!= "" && $fechafini!= "" && $sexo!= ""){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
		INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.ffechar BETWEEN CAST ('$fechaini ' AS DATE) AND CAST ('$fechafini ' AS DATE) AND clientes.csexo = '$sexo' 	" );
	}
	if($edad!= ""){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, 	clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
	INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.eedad = '".$edad."' ");
	}
	if($edadMe!= ""){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, 	clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
	INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.eedad < '".$edadMe."' ");
	}
	if($edadMa!= ""){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, 	clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
	INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.eedad > '".$edadMa."' ");
	}
	if($edadMe!= "" && $edadMa!=""){
		$query_s= pg_query($conexion, "SELECT clientes.ffechar, ex.cid_expediente, clientes.eid_cliente, clientes.cnombre, clientes.capellido, 	clientes.ffecha, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, clientes.eedad FROM clientes 
	INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente WHERE clientes.eedad > '$edadMe'  AND clientes.eedad < '$edadMa' ");
	}

	
	
	while($row=pg_fetch_assoc($query_s)){	
		
	 	
			$pdf->SetFont('times','B',9);
			$pdf->SetX(7); 
		
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0,0,0);
			//$pdf->Cell(22,8,date('d/m/Y', strtotime($row['ffechar'])), 0,0,'C',1);
			$pdf->Cell(22,8,$row['cid_expediente'], 1,0,'C',1);
			$pdf->Cell(50,8,$row['cnombre'] ." ". $row['capellido'],1,0,'D',1);
			$pdf->Cell(10,8,$row['csexo'],1,0,'C',1);
			if($row['eedad']==1){
				$pdf->Cell(15,8,utf8_decode($row['eedad']. " año"),1,0,'C',1);
			}
			else{
				$pdf->Cell(15,8,utf8_decode($row['eedad']. " años"),1,0,'C',1);
			}
			$pdf->Cell(87,8,$row['cdireccion'], 1,0,'D',1);
			$pdf->Cell(18,8,$row['ctelefonof'],1,1,'C',1);
			
	}
	$pdf->Output();
	
?>