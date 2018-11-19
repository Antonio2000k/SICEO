<?php
$year=$_REQUEST['year'];
include("../../../Config/conexion.php");
$tipo=$_REQUEST['tipo'];

if($tipo==="egreso"){
            pg_query("BEGIN");
            $enero=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-01'"));
            $febrero=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-02'"));
            $marzo=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-03'"));
            $abril=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-04'"));
            $mayo=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-05'"));
            $junio=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-06'"));
            $julio=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-07'"));
            $agosto=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-08'"));
            $septiembre=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-09'"));
            $octubre=pg_fetch_array(pg_query($conexion,"select sum(c.rabono) , sum(rtotal_compra)from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-10'"));
            $noviembre=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-11'"));
            $diciembre=pg_fetch_array(pg_query($conexion,"select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-12'"));
}
if($tipo==="ingreso")
{           pg_query("BEGIN");
            $enero=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-01'"));
            $febrero=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-02'"));
            $marzo=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-03'"));
            $abril=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-04'"));
            $mayo=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-05'"));
            $junio=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-06'"));
            $julio=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-07'"));
            $agosto=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-08'"));
            $septiembre=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-09'"));
            $octubre=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-10'"));
            $noviembre=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-11'"));
            $diciembre=pg_fetch_array(pg_query($conexion,"SELECT Sum(o.rtotal), sum(notab.rsaldo) FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-12'"));
}
  
    $array;
        $array[0][0]=round($enero[0]);
        $array[0][1]=round($febrero[0]);
        $array[0][2]=round($marzo[0]);
        $array[0][3]=round($abril[0]);
        $array[0][4]=round($mayo[0]);
        $array[0][5]=round($junio[0]);
        $array[0][6]=round($julio[0]);
        $array[0][7]=round($agosto[0]);
        $array[0][8]=round($septiembre[0]);
        $array[0][9]=round($octubre[0]);
        $array[0][10]=round($noviembre[0]);
        $array[0][11]=round($diciembre[0]);
        
        $array[1][0]=round($enero[1]);
        $array[1][1]=round($febrero[1]);
        $array[1][2]=round($marzo[1]);
        $array[1][3]=round($abril[1]);
        $array[1][4]=round($mayo[1]);
        $array[1][5]=round($junio[1]);
        $array[1][6]=round($julio[1]);
        $array[1][7]=round($agosto[1]);
        $array[1][8]=round($septiembre[1]);
        $array[1][9]=round($octubre[1]);
        $array[1][10]=round($noviembre[1]);
        $array[1][11]=round($diciembre[1]);
        echo json_encode($array);

?>