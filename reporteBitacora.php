<?php
require 'Config/conexion.php';

  require 'fpdf/fpdf.php';
  
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
      $this->Cell(26);
      $this->Cell(140,10, utf8_decode('Bitácora de Sistema'),0,1,'C');
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
      $this->Line(10, $this->GetY()+7 , 202 , $this->GetY()+7);

      $x_posicion=$this->getx(); 
      
      
      $this->vcellT(20,6,$x_posicion,'ID BITACORA',0,0,'C',1);
      $x_posicion=$this->getx(); 
      $this->vcellT(25,6,$x_posicion,'ID USUARIO',0,0,'C',1);
      $x_posicion=$this->getx(); 
      $this->vcellT(110,6,$x_posicion,utf8_decode('ACCIÓN'),0,0,'C',1);
      $x_posicion=$this->getx();  
      $this->vcellT(18,6,$x_posicion,'FECHA', 0,1,'C',1);
      $x_posicion=$this->getx();  
      $this->vcellT(19,6,$x_posicion,'HORA', 0,1,'C',1);
      $this->Ln(); 
      
      $y = $this->GetY();
      $this->SetY($y+3);

      $this->SetDrawColor(0, 0, 0);
      $this->SetLineWidth(0);

      $this->SetFillColor(255, 99, 71);
      $this->Rect(10, 71, 192, 174, '');
      
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
  
    $query_s= pg_query($conexion, "SELECT bitacora.eid_bitacora, bitacora.cid_usuario, bitacora.accion, bitacora.ffecha FROM bitacora order by  bitacora.ffecha ");
  
  while($row=pg_fetch_assoc($query_s)){ 
    ini_set('date.timezone', 'America/El_Salvador');
    $dia = date_create($row['ffecha']);
    $dia1 = date_format($dia, 'd-m-Y');
    $hora = date_create($row['ffecha']);
    $hora2 = date_format($hora, 'h:i:s a'); 
    
    
    $pdf->SetFont('times','B',9);
    $pdf->SetX(10); 
    $x_posicion=$pdf->getx(); 
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->cell(20,6,$row['eid_bitacora'], 1,0,'C',1);
    
    
    $x_posicion=$pdf->getx();   
    $pdf->cell(25,6,$row['cid_usuario'] ,1,0,'C',1);
    $x_posicion=$pdf->getx(); 
    $pdf->cell(110,6,utf8_decode($row['accion']),1,0,'C',1);
    
    $x_posicion=$pdf->getx(); 
    $pdf->cell(18,6,$dia1, 1,0,'C',1);
    $x_posicion=$pdf->getx();   
    $pdf->cell(19,6,$hora2 ,1,1,'C',1);
      
  }

  
  

  $pdf->Output();
  
?>