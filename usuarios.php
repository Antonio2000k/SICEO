<?php 
require 'fpdf/fpdf.php';
class ConductPDF extends FPDF { 
function vcell($c_ancho,$c_alto,$x_posicion,$texto){ 
$altura=$c_alto/3; 

$primera=$altura+2; 

$segunda=$primera+$primera+3; 

$tercera=$segunda+13; 

$len=strlen($texto);// check the length of the cell and splits the texto into 7 character each and saves in a array 
if($len>15){ 
$w_texto=str_split($texto,19); 
$this->SetX($x_posicion); 
$this->Cell($c_ancho,$primera,$w_texto[0],'','',''); 
$this->SetX($x_posicion); 
$this->Cell($c_ancho,$segunda,$w_texto[1],'','',''); 
$this->SetX($x_posicion); 
$this->Cell($c_ancho,$tercera,$w_texto[2],'','',''); 
$this->SetX($x_posicion); 
$this->Cell($c_ancho,$c_alto,'','LTRB',0,'L',0); 
} 
else{ 
    $this->SetX($x_posicion); 
    $this->Cell($c_ancho,$c_alto,$texto,'LTRB',0,'L',0);} 
    } 
} 
$pdf = new ConductPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','',16); 

$pdf->Ln(); 
$x_posicion=$pdf->getx(); 

$c_ancho=75;// cell width 
$c_alto=26;// cell height 


$x_posicion=$pdf->getx(); 

$texto="aim success "; 
$pdf->vcell($c_ancho,$c_alto,$x_posicion,'Hi4'); 
$x_posicion=$pdf->getx(); 
$pdf->vcell($c_ancho,$c_alto,$x_posicion,'Hi5(xtra)ajdhajkshHHKJHJKJASHDKJASHDKJHAKJDHASKJHKJAdkkjhkjhkjhkjjashdakjajhsjkahskj'); 


$pdf->Ln(); 

$pdf->Output(); 
?> 