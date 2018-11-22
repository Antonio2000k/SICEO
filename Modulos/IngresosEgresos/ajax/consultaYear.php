<?php
$year=$_REQUEST['year'];
include("../../../Config/conexion.php");
$tipo=$_REQUEST['tipo'];
    $array;
    pg_query("BEGIN");
if($tipo==="egreso"){
    for($i=1 ; $i<=12 ; $i++){
        if($i<10)
            $mes='0'.$i;
        else
            $mes=$i;
        $resultado=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'"));
        $array[0][($i-1)]=round($resultado[0]);
        $array[1][($i-1)]=round($resultado[1]);
    }
}
if($tipo==="ingreso"){
        for($i=1 ; $i<=12 ; $i++){
            if($i<10)
                $mes='0'.$i;
            else
                $mes=$i;
            $resultado=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-".$mes."'"));
             $array[0][($i-1)]=round($resultado[1]);
            $array[1][($i-1)]=round($resultado[0]);
        }
}
if($tipo==="todo"){
    for($i=1 ; $i<=12 ; $i++){
        if($i<10)
            $mes='0'.$i;
        else
            $mes=$i;
        $resultado=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'"));        
        $array[0][($i-1)]=round($resultado[0]);
        $array[1][($i-1)]=round($resultado[1]);
        $resultado=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-".$mes."'"));
        $array[2][($i-1)]=round($resultado[1]);
        $array[3][($i-1)]=round($resultado[0]);
    }
}
        echo json_encode($array);

?>