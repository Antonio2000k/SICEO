<?php
require 'Config/conexion.php';

	require 'fpdf/fpdf.php';
	$tipo=$_REQUEST['tipo'];
	$tipos=$_REQUEST['tipos'];
    $year=$_REQUEST['year'];
    $rango=$_REQUEST['rango'];
    $mes=$_REQUEST['mes'];
    

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
				$this->Cell($c_ancho,$c_alto,'',1,1,'C',0); 
			}else{ 
			    $this->SetX($x_posicion); 
			    $this->Cell($c_ancho,$c_alto,$texto, 1,1,'C',0);
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
			$tipo=$_REQUEST['tipo'];
			$tipos=$_REQUEST['tipos'];
		    $year=$_REQUEST['year'];
		    $rango=$_REQUEST['rango'];
		    $mes=$_REQUEST['mes'];

			$this->Image('images/Siceom.png', 35, 20, 40 );
			$this->SetFont('times','B',14);
			$this->Ln(4);
			$this->Cell(30);
			$this->Cell(200,11,utf8_decode("ÓPTICA"),0,0,'C');
			// 1º Datos del cliente
			$this->Image('images/Grupo.png', 205, 20, 35 );
			$this->SetXY(200, 23);
			$this->SetFont('times','B',14);
			$this->Cell(30);
			$this->Cell(-180,5,utf8_decode("VISIÓN CENTRAL"),0,1,'C');
			$this->Cell(30);
			$this->SetFont('times','B',8);
			$this->Cell(200,5,utf8_decode(" \"TU VISIÓN, ES NUESTRA MISIÓN\""),0,1,'C');
			$this->SetXY(40, 31);
     		$this->Cell(200,5,'Av. Crescencio Miranda #2, 40mts al Sur del Cuartel, San Vicente.',0,1,'C');
      		$this->SetXY(40, 34);
			$this->Cell(195,5,utf8_decode("Teléfono: 2328 - 9312"),0,1,'C');
			
			
				$this->SetFont('times','B',16);
				$this->Ln(5);
				$this->Cell(30);
				$this->Cell(200,10, 'Flujo de Efectivo ',0,1,'C');
				$this->Ln(5);
			
			
			

			$this->SetFont('times','B',9);
			$this->Ln(1);
			$this->Cell(35); 

			$y = $this->GetY();
			$this->SetY($y+3);

			$this->SetX(34); 
			$this->SetFillColor(255, 255, 255);
			$this->SetTextColor(0,0,0);
			$this->SetFont('times','B',8);
			

			
			$x_posicion=$this->getx(); 
			$this->vcellT(17,7,$x_posicion,'ENERO',0,0,'C',1);
			$x_posicion=$this->getx(); 
			$this->vcellT(17,7,$x_posicion,'FEBRERO',0,0,'C',1);
			$x_posicion=$this->getx(); 
			$this->vcellT(17,7,$x_posicion,utf8_decode("MARZO"),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(17,7,$x_posicion,utf8_decode("ABRIL"),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(17,7,$x_posicion,utf8_decode('MAYO'),0,0,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(17,7,$x_posicion,'JUNIO', 0,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(17,7,$x_posicion,'JULIO', 1,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(20,7,$x_posicion,'AGOSTO', 1,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(20,7,$x_posicion,'SEPTIEMBRE', 1,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(20,7,$x_posicion,'OCTUBRE', 1,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(20,7,$x_posicion,'NOVIEMBRE', 1,1,'C',1);
			$x_posicion=$this->getx(); 	
			$this->vcellT(20,7,$x_posicion,'DICIEMBRE', 1,1,'C',1);
			$this->Ln(); 
			$this->SetDrawColor(25, 25, 112);
		    $this->SetLineWidth(2);
			$this->Line(36, $this->GetY()-2 , 253 , $this->GetY()-2);
			$this->SetDrawColor(0,0,0);
		    
		    $this->SetLineWidth(0);
			$this->SetX(14); 
			$this->cell(23,8,'INGRESOS',0,1,'C',1);
			$this->SetX(14); 
			$this->cell(23,8,'EGRESOS',0,1,'C',1);
			$this->SetX(14); 
			$this->cell(23,8,'RESULTADO',0,0,'C',1);


			

			$y = $this->GetY();
			$this->SetY($y+4);

			$this->SetDrawColor(0, 0, 0);
			$this->SetLineWidth(0);

			
		}
		
		function Footer()
		{
			$fecha = new DateTime(null, new DateTimeZone('America/El_Salvador'));
			$hora = $fecha->format("d/m/Y, h:i:s");

			$this->SetY(-30);
			$this->SetFont('times','B',8);
			$this->Cell(0,10, utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C' );
			
			$this->Cell(0,10,utf8_decode('Fecha y hora de impresión: '. $hora ),0,0,'R');

		}	

		

		
			
	}
	
	$pdf = new PDF('L','mm','letter');
	$pdf->AliasNbPages();

	$pdf->AddPage();
	$pdf->SetFont('times','B',9);
	$pdf->SetX(7); 
		
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetTextColor(0,0,0);
	
	
	
	for($i=1 ; $i<=12 ; $i++){
            if($i<10)
            $mes='0'.$i;
        else
            $mes=$i;
        
        if($tipos==="ingreso")
            $consulta="SELECT sum(o.rtotal), sum(notab.rsaldo) from ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') ='".$year."-".$mes."'";
        $resultado=pg_fetch_array(pg_query($conexion,$consulta));
        
        $pdf->SetFont('times','B',9);
		$pdf->SetXY(35,70); 
			
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0,0,0);
        if($i=== 1){
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        }
                  
        } 
        if($i=== 2){
        	$X=$pdf->getx(); 
        	$pdf->SetXY($X+17,70); 
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        } 
        } 
        if($i=== 3){
        	
        	$pdf->SetXY(69,70); 
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        }  
        } 
        if($i=== 4){
        	
        	$pdf->SetXY(86,70); 
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        }  
        } 
        if($i=== 5){
        	 
        	$pdf->SetXY(103,70); 
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        } 
        } 
        if($i=== 6){
        	$pdf->SetXY(120,70); 
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        }
        } 
        if($i=== 7){
        	$pdf->SetXY(137,70); 
        	if($resultado[1]===null){
	            $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(17,8,'$'.$resultado[1],1,1,'C',1);
	        } 
        } 
        if($i=== 8){
        	
        	$pdf->SetXY(153,70); 
        	if($resultado[1]===null){
	            $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(20,8,'$'.$resultado[1],1,1,'C',1);
	        } 
        } 
        if($i=== 9){
        	
        	$pdf->SetXY(173,70); 
        	if($resultado[1]===null){
	            $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(20,8,'$'.$resultado[1],1,1,'C',1);
	        } 
        } 
        if($i=== 10){
        	$pdf->SetXY(193,70); 
        	if($resultado[1]===null){
	            $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(20,8,'$'.$resultado[1],1,1,'C',1);
	        }  
        } 
        if($i=== 11){
        	$pdf->SetXY(213,70); 
        	if($resultado[1]===null){
	            $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(20,8,'$'.$resultado[1],1,1,'C',1);
	        }  
        } 
        if($i=== 12){
        	$pdf->SetXY(233,70); 
        	if($resultado[1]===null){
	            $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	            $pdf->cell(20,8,'$'.$resultado[1],1,1,'C',1);
	        }
        }         
                
    } 
	for($i=1 ; $i<=12 ; $i++){
            if($i<10)
            $mes='0'.$i;
        else
            $mes=$i;
        if($tipo==="egreso")
            $consulta="select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'";
        $resultado=pg_fetch_array(pg_query($conexion,$consulta));
        
        $pdf->SetFont('times','B',9);
		$pdf->SetXY(35,78); 
			
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0,0,0);
        if($i=== 1){
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                }   
        } 
        if($i=== 2){
        	$pdf->SetXY(47+5,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                }    
        } 
        if($i=== 3){
        	$pdf->SetXY(64+5,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                }   
        } 
        if($i=== 4){
        	$pdf->SetXY(81+5,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                }  
        } 
        if($i=== 5){
        	$pdf->SetXY(98+5,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                }   
        } 
        if($i=== 6){
        	$pdf->SetXY(115+5,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                } 
        } 
        if($i=== 7){
        	$pdf->SetXY(132+5,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(17,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(17,8,'$'.$resultado[0],1,1,'C',1);
                }    
        } 
        if($i=== 8){
        	$pdf->SetXY(149+4,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(20,8,'$'.$resultado[0],1,1,'C',1);
                }  
        } 
        if($i=== 9){
        	$pdf->SetXY(169+4,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(20,8,'$'.$resultado[0],1,1,'C',1);
                }    
        } 
        if($i=== 10){
        	$pdf->SetXY(189+4,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(20,8,'$'.$resultado[0],1,1,'C',1);
                }   
        } 
        if($i=== 11){
        	$pdf->SetXY(209+4,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(20,8,'$'.$resultado[0],1,1,'C',1);
                }  
        } 
        if($i=== 12){
        	$pdf->SetXY(229+4,78); 
        	if($resultado[0]===null){
                  
                   $pdf->cell(20,8,'$0.00' ,1,1,'C',1);
                }else{
	                $pdf->cell(20,8,'$'.$resultado[0],1,1,'C',1);
                }  
        }          
                
    } 
    

    for($i=1 ; $i<=12 ; $i++){
            if($i<10)
            $mes='0'.$i;
        else
            $mes=$i;
        	$consultae= pg_query($conexion, "SELECT sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'");

         while($resultadoe=pg_fetch_array($consultae)){		
			if($resultadoe[0]===null){
				$totalE = $resultadoe[0];
	            //$pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	            //$pdf->cell(20,8,'$'.$resultadoe[0],1,1,'C',1);
	            $totalE = $resultadoe[0];
	        }
		} 
        
        
        $consultai= pg_query($conexion, "SELECT sum(o.rtotal), sum(notab.rsaldo) from ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') ='".$year."-".$mes."' ");
        
        while($resultadoi=pg_fetch_array($consultai)){	
			if($resultadoi[1]===null){
				$totalI = $resultadoi[1];
	            //$pdf->cell(20,8,'$0.00' ,1,1,'C',1);
	        }else{
	        	$totalI = $resultadoi[1];
	            //$pdf->cell(20,8,'$'.$resultadoi[1],1,1,'C',1);
	        }
		}        
        
        
       
        if($i=== 1){
	     	$diferencia = $totalI - $totalE ;
	     	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);  
				$pdf->SetXY(35,86); 
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->SetXY(35,86); 
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}
                  
        } 
        $pdf->SetFillColor(255,255,255);
        if($i=== 2){
	     	$diferencia = $totalI - $totalE ;
	     	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
				$pdf->SetXY(47+5,86); 
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->SetXY(47+5,86); 
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}
        } 
        if($i=== 3){
        	$pdf->SetXY(64+5,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}
        } 
        if($i=== 4){
        	$pdf->SetXY(81+5,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1); 
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			} 
        } 
        if($i=== 5){
        	$pdf->SetXY(98+5,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}
        } 
        if($i=== 6){
        	$pdf->SetXY(115+5,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}
        } 
        if($i=== 7){
        	$pdf->SetXY(132+5,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(17,8,'$'.$diferencia,1,1,'C',1);
			}
        } 
        if($i=== 8){
        	$pdf->SetXY(149+4,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1); 
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1); 
			}
        } 
        if($i=== 9){
        	$pdf->SetXY(169+4,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1);
			}
        } 
        if($i=== 10){
        	$pdf->SetXY(189+4,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1);  
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1);  
			}
        } 
        if($i=== 11){
        	$pdf->SetXY(209+4,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1); 
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1); 
			}
        } 
        if($i=== 12){
        	$pdf->SetXY(229+4,86); 
        	$diferencia = $totalI - $totalE ;
        	if($diferencia >0){
	     		$pdf->SetFillColor(130, 250, 113);
			$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1);
			}else{
				$pdf->SetFillColor(250, 113, 113);
				$pdf->cell(20,8,'$'.$diferencia,1,1,'C',1);
			}
        }  
        $pdf->SetFillColor(255,255,255);
             

                
    } 

     
	
	
		function nombremes($mes){
	        setlocale(LC_TIME, 'spanish');  
	        $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
	        return $nombre;
	    } 

	$pdf->Output();
	
?>