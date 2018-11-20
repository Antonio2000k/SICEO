<?php
$year=$_REQUEST['year'];
$mes=$_REQUEST['mes'];
$tipo=$_REQUEST["tipo"];
include("../../../Config/conexion.php");
if($mes<=9)
    $mes='0'.$mes;

  pg_query("BEGIN");
if($tipo==='egreso'){
            $número = cal_days_in_month(CAL_GREGORIAN, $mes, $year); // 31
            //echo "Hubo {$número} días en agosto del 2003";
    
            $consulta="select c.rabono, c.ffecha_compra, rtotal_compra from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."' order by c.ffecha_compra";
            $query_s=pg_query($conexion,$consulta);
            $cont=0;
            $matriz;
                while($fila=pg_fetch_array($query_s)){
                $matriz[0][$cont]=round($fila[0]);
                $matriz[1][$cont]=$fila[1];
                $matriz[2][$cont]=round($fila[2]);
                    $cont++;
                }
        echo json_encode($matriz);
}
if($tipo==='ingreso'){
    $consulta="SELECT o.rtotal, o.ffecha, notab.rsaldo FROM ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') = '".$year."-".$mes."'";
            $query_s=pg_query($conexion,$consulta);
            $cont=0;
            $matriz;
                while($fila=pg_fetch_array($query_s)){
                $matriz[0][$cont]=round($fila[0]);
                $matriz[1][$cont]=$fila[1];
                $matriz[2][$cont]=round($fila[2]);
                    $cont++;
                }
        echo json_encode($matriz);
}
?>