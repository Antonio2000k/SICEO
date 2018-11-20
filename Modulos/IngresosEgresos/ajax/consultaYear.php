<?php
$year=$_REQUEST['year'];
include("../../../Config/conexion.php");
$tipo=$_REQUEST['tipo'];
    $array;
if($tipo==="egreso"){
    pg_query("BEGIN");
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
if($tipo==="ingreso")
{           
    pg_query("BEGIN");
        for($i=1 ; $i<=12 ; $i++){
            if($i<10)
                $mes='0'.$i;
            else
                $mes=$i;
            $resultado=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-".$mes."'"));
             $array[0][($i-1)]=round($resultado[0]);
            $array[1][($i-1)]=round($resultado[1]);
        }
}
        echo json_encode($array);

?>