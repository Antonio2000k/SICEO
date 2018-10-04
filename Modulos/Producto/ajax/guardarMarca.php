<?php
$nombre=$_REQUEST["nombreM"];
include("../../../Config/conexion.php");
    pg_query("BEGIN");
    $resultado=pg_query($conexion,"select MAX(marca.eid_marca) from marca");
    while ($fila = pg_fetch_array($resultado)) {$contado=$fila[0];}
    $contado++;
    $result=pg_query($conexion,"insert into marca(eid_marca, cnombre) values('$contado','".$nombre."')"); 
    if(!$result){
            pg_query("rollback");
            echo '0';
            //mensajeInformacion('Error','Datos no almacenados','error');
            }else{
                pg_query("commit");
            echo '1';
                //mensajeInformacion('Informacion','Datos almacenados','info');
    }

  
?>