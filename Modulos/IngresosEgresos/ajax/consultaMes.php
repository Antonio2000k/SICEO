<?php
$year=$_REQUEST['year'];
$mes=$_REQUEST['mes'];
$tipo=$_REQUEST["tipo"];
include("../../../Config/conexion.php");
$numero = cal_days_in_month(CAL_GREGORIAN, $mes, $year);
if($mes<=9)
    $mes='0'.$mes;
$array;
  pg_query("BEGIN");
if($tipo==='egreso'){  
            for($i=1 ; $i<=$numero; $i++){
                if($i<10)
                    $dia='0'.$i;
                else
                    $dia=$i;
                $resultado=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from pbcompra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM-DD')='".$year."-".$mes."-".$dia."'"));
                $array[0][($i-1)]=round($resultado[0]);
                $array[1][($i-1)]=round($resultado[1]);
                $array[2][($i-1)]=round($i);
            }
}
if($tipo==='ingreso'){
    for($i=1 ; $i<=$numero; $i++){
        if($i<10)
                    $dia='0'.$i;
                else
                    $dia=$i;
    $consulta="SELECT  sum(notab.rsaldo),sum(o.rtotal) FROM pbordenc as o INNER JOIN pcnotab as notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM-DD') = '".$year."-".$mes."-".$dia."'";
            $resultado=pg_fetch_array(pg_query($conexion,$consulta));
                $array[0][($i-1)]=round($resultado[0]);
                $array[1][($i-1)]=round($resultado[1]);
                $array[2][($i-1)]=round($i);
                }    
}
if($tipo==="todo"){
    for($i=1 ; $i<=$numero; $i++){
                if($i<10)
                    $dia='0'.$i;
                else
                    $dia=$i;
                $resultado=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from pbcompra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM-DD')='".$year."-".$mes."-".$dia."'"));
                $array[0][($i-1)]=round($resultado[0]);
                $array[1][($i-1)]=round($resultado[1]);
        
                $consulta="SELECT sum(o.rtotal), sum(notab.rsaldo) FROM pbordenc as o INNER JOIN pcnotab as notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM-DD') = '".$year."-".$mes."-".$dia."'";
            $resultado=pg_fetch_array(pg_query($conexion,$consulta));
                $array[2][($i-1)]=round($resultado[1]);
                $array[3][($i-1)]=round($resultado[0]);
                $array[4][($i-1)]=round($i);
            }
}
echo json_encode($array);
?>