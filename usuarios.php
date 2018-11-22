<?php
require 'Config/conexion.php';

  require 'fpdf/fpdf.php';
  $tipo = $_REQUEST['tipo'];
  $fechaini=$_REQUEST['fechaini'];
  $fechafini=$_REQUEST['fechafini'];
  class PDF extends FPDF
  {
    function vcell($c_ancho,$c_alto,$x_posicion,$texto){ 
      $altura=$c_alto/3; 

      $primera=$altura+2; 

      $segunda=$primera+$primera+3; 

      $tercera=$segunda+13; 

      $len=strlen($texto); 
      if($len>=1){ 
        $w_texto=str_split($texto,40); 
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$primera,$w_texto[0],0,0,'C',0); 
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$segunda,$w_texto[1],0,0,'C',0); 
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$tercera,$w_texto[2],0,0,'C',0); 
        
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$c_alto,'',1,0,'C',0); 
      }else{ 
          $this->SetX($x_posicion); 
          $this->Cell($c_ancho,$c_alto,$texto, 1,0,'C',0);
      } 
    } 

    function vcellT($c_ancho,$c_alto,$x_posicion,$texto){ 
      $altura=$c_alto/3; 

      $primera=$altura+2; 

      $segunda=$primera+$primera+3; 


      $len=strlen($texto); 
      if($len>=1){ 
      $w_texto=str_split($texto,11); 
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$primera,$w_texto[0],0,0,'C',0); 
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$segunda,$w_texto[1],0,0,'C',0); 
        $this->SetX($x_posicion); 
        $this->Cell($c_ancho,$c_alto,'',0,0,'C',0); 
      } else{ 
          $this->SetX($x_posicion); 
          $this->Cell($c_ancho,$c_alto,$texto,0,0,'C',0);
      } 
    }

    function Header(){
      $tipo = $_REQUEST['tipo'];
	  $fechaini=$_REQUEST['fechaini'];
	  $fechafini=$_REQUEST['fechafini'];
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
      
      if($tipo === "notab"){
        $this->SetFont('times','B',16);
        $this->Ln(4);
        $this->Cell(26);
        $this->Cell(140,10, utf8_decode('Lista de notas de abono'),0,1,'C');
        $this->Ln(5);

        $this->SetFont('times','B',9);
        $this->Ln(1);
        $this->Cell(30); 

        $y = $this->GetY();
        $this->SetY($y+3);

        $this->SetX(30); 
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0,0,0);
        $this->SetFont('times','B',8);
        $this->SetDrawColor(25, 25, 112);
        $this->SetLineWidth(2);
        $this->Line(10, $this->GetY()+7 , 202 , $this->GetY()+7);

        $x_posicion=$this->getx(); 
        
        
        $this->vcellT(18,6,$x_posicion,'FECHA',0,0,'C',1);
        $x_posicion=$this->getx(); 
        $this->vcellT(8,6,$x_posicion,'ID',0,0,'C',1);
        $x_posicion=$this->getx(); 
        $this->vcellT(59,6,$x_posicion,utf8_decode('CLIENTE'),0,0,'C',1);
        $x_posicion=$this->getx();  
        $this->vcellT(15,6,$x_posicion,'ABONO', 0,1,'C',1);
        
        $this->Ln(); 
        
        $y = $this->GetY();
        $this->SetY($y+3);

        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0);

        $this->SetFillColor(255, 99, 71);
        $this->Rect(10, 71, 192, 174, '');
      }else if($tipo === "ordenc"){
        $this->SetFont('times','B',16);
        $this->Ln(4);
        $this->Cell(26);
        $this->Cell(140,10, utf8_decode('Lista de orden de compra'),0,1,'C');
        $this->Ln(5);

        $this->SetFont('times','B',9);
        $this->Ln(1);
        $this->Cell(30); 

        $y = $this->GetY();
        $this->SetY($y+3);

        $this->SetX(8); 
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0,0,0);
        $this->SetFont('times','B',8);
        $this->SetDrawColor(25, 25, 112);
        $this->SetLineWidth(2);
        $this->Line(10, $this->GetY()+9 , 202 , $this->GetY()+9);

        $x_posicion=$this->getx(); 
        
        
        $this->vcellT(20,8,$x_posicion,'FECHA',0,0,'C',1);
        $x_posicion=$this->getx(); 
        $this->vcellT(15,8,$x_posicion,'CANTIDAD',0,0,'C',1);
        $x_posicion=$this->getx(); 
        $this->vcellT(42,8,$x_posicion,utf8_decode('PRODCUCTO'),0,0,'C',1);
        $x_posicion=$this->getx();  
        $this->vcellT(18,8,$x_posicion,'PRECIO', 0,1,'C',1);
        $x_posicion=$this->getx();  
        $this->vcellT(40,8,$x_posicion,'PROVEEDOR', 0,1,'C',1);
        $x_posicion=$this->getx();  
        $this->vcellT(19,8,$x_posicion,'TOTAL', 0,1,'C',1);
        $x_posicion=$this->getx();  
        $this->vcellT(19,8,$x_posicion,'ABONO', 0,1,'C',1);
        $x_posicion=$this->getx();  
        $this->vcellT(19,8,$x_posicion,'   SALDO   PENDIENTE', 0,1,'C',1);
        $this->Ln(); 
        
        $y = $this->GetY();
        $this->SetY($y+3);

        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0);

        $this->SetFillColor(255, 99, 71);
        $this->Rect(10, 73, 192, 174, '');
      }
      
    }
    
    function Footer()
    {
      $this->SetY(-15);
      $this->SetFont('times','B',8);
      $this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
      
      $this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '.date('d/m/Y, h:i:s') ),0,0,'R');

    } 

    
      
  }
  
  $pdf = new PDF('P','mm','letter');
  $pdf->AliasNbPages();

  $pdf->AddPage();
  if($tipo === "notab"){
    $query_s= pg_query($conexion, "SELECT notab.eid_nota, notab.ffecha_pago, notab.rsaldo, clientes.cnombre, clientes.capellido
	FROM notab INNER JOIN ordenc ON notab.eid_ordenc = ordenc.eid_compra
	INNER JOIN clientes ON ordenc.ccliente = clientes.eid_cliente
   	WHERE notab.ffecha_pago BETWEEN CAST ('$fechaini ' AS DATE) AND CAST ('$fechafini ' AS DATE) order by notab.ffecha_pago desc ");
     

    while($row=pg_fetch_assoc($query_s)){ 
      ini_set('date.timezone', 'America/El_Salvador');
      
      
      
      $pdf->SetFont('times','B',9);
      $pdf->SetX(30); 
      $x_posicion=$pdf->getx(); 
      $pdf->SetFillColor(255, 255, 255);
      $pdf->SetTextColor(0,0,0);
      $pdf->cell(18,6, date("d/m/Y", strtotime($row['ffecha_compra'])) , 1,0,'C',1);
      $x_posicion=$pdf->getx(); 
      $pdf->cell(8,6, utf8_decode($row['eid_nota']) , 1,0,'C',1);
      $x_posicion=$pdf->getx();   
      $pdf->cell(59,6,$row['cnombre'] . " ". $row['capellido'] ,1,0,'C',1);
      $x_posicion=$pdf->getx();   
      $pdf->cell(15,6,"$ ".$row['rsaldo'] ,1,1,'C',1);
    }

    $consultai= pg_query($conexion, "SELECT sum(o.rtotal), sum(notab.rsaldo) from ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE notab.ffecha_pago BETWEEN CAST ('$fechaini ' AS DATE) AND CAST ('$fechafini ' AS DATE) ");
       $pdf->SetFont('times','B',10);
        $pdf->SetXY(140,72);
        $pdf->cell(40,8,'INGRESOS TOTALES ',0,1,'C',1);
        $pdf->SetXY(150,78);

        while($resultadoi=pg_fetch_array($consultai)){	
			if($resultadoi[1]===null){
				$totalI = $resultadoi[1];
	            $pdf->cell(20,8,'$0.00' ,0,1,'C',1);
	        }else{
	        	$totalI = $resultadoi[1];
	            $pdf->cell(20,8,'$'.$resultadoi[1],0,1,'C',1);
	        }
		} 

 }else if($tipo === "ordenc"){ 
    $query_s2= pg_query($conexion, "SELECT clientes.cnombre, clientes.capellido, ordenc.ffecha, ordenc.rtotal, ordenc.eid_compra
	FROM ordenc INNER JOIN clientes ON ordenc.ccliente = clientes.eid_cliente 
	where ordenc.ffecha BETWEEN CAST ('$fechaini ' AS DATE) AND CAST ('$fechafini ' AS DATE) order by ordenc.ffecha desc ");

    while($row=pg_fetch_assoc($query_s2)){ 
      ini_set('date.timezone', 'America/El_Salvador');
      
      $pdf->SetFont('times','B',9);
      $pdf->SetX(114); 
      $x_posicion=$pdf->getx(); 
      $pdf->SetFillColor(255, 255, 255);
      $pdf->SetTextColor(0,0,0);
      $pdf->cell(18,6, date("d/m/Y", strtotime($row['ffecha'])) , 1,0,'C',1);
      $x_posicion=$pdf->getx(); 
      $pdf->cell(8,6, utf8_decode($row['eid_compra']) , 1,0,'C',1);
      $x_posicion=$pdf->getx();   
      $pdf->cell(59,6,$row['cnombre'] . " ". $row['capellido'] ,1,0,'C',1);
      $x_posicion=$pdf->getx();   
      $pdf->cell(15,6,"$ ".$row['rtotal'] ,1,1,'C',1);
        
    }
  
  
  }

  
  

  $pdf->Output();
  
?>