<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

include("../../../Config/conexion.php");
$op=$_REQUEST['opcion'];
if($op==="producto"){
    $precioC=$_REQUEST["precioCompra"];
$precioV=$_REQUEST["precioVenta"];
$baccion=$_REQUEST["modelo"];
            pg_query("BEGIN");
          $result=pg_query($conexion,"update pbproductos set  rprecio_compra='$precioC', rprecio_venta='$precioV' where cmodelo='$baccion'");
            if(!$result){
				pg_query("rollback");
				//mensajeInformacion('Error','Datos no almacenados','error');
				}else{
          
          $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
          $accion = 'El usuario ' . $nomusAccess. ' modificó los precios de un producto ' ;
          while ($filas = pg_fetch_array($query_ide)) {
            $ida=$filas[0];                                 
            $ida++ ;
          } 
          ini_set('date.timezone', 'America/El_Salvador');
             $fechaA= date("d/m/Y");               
          $hora = date("Y/m/d ") . date("h:i:s a");
          $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$baccion')");

          if(!$consult ){
            pg_query("rollback");
            echo "<script type='text/javascript'>";
            echo pg_result_error($conexion);
            echo "alert('Error');";
            echo "</script>";
          }else{
            pg_query("commit");
            //mensajeInformacion('Informacion','Datos almacenados','info');
          }
					
				}
}else if($op="abono"){
    $abono=$_REQUEST["abono"];
    $id=$_REQUEST["id"];
        
        pg_query("BEGIN");
            
        $resultado=pg_fetch_array(pg_query($conexion, "select rabono from pbcompra where eid_compra=".$id));
        $abonoN=$abono+$resultado[0];
        $result=pg_query($conexion,"update pbcompra set  rabono='$abonoN' where eid_compra='$id'");
        
        if(!$result){
				  pg_query("rollback");
				  //mensajeInformacion('Error','Datos no almacenados','error');
				}else{
          
          $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
          $accion = 'El usuario ' . $nomusAccess. ' realizo un abono a deuda con proveedor ' ;
          while ($filas = pg_fetch_array($query_ide)) {
            $ida=$filas[0];                                 
            $ida++ ;
          } 
          ini_set('date.timezone', 'America/El_Salvador');
           $fechaA= date("d/m/Y");                 
          $hora = date("Y/m/d ") . date("h:i:s a");
          $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '')");

          if(!$consult ){
            pg_query("rollback");
            echo "<script type='text/javascript'>";
            echo pg_result_error($conexion);
            echo "alert('Error');";
            echo "</script>";
          }else{
            pg_query("commit");
            //mensajeInformacion('Informacion','Datos almacenados','info');
          }
					
				}
}
?>