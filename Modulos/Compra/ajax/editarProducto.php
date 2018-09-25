<?php
include("../../../Config/conexion.php");
$precioC=$_REQUEST["precioCompra"];
$precioV=$_REQUEST["precioVenta"];
$baccion=$_REQUEST["modelo"];
            pg_query("BEGIN");
          $result=pg_query($conexion,"update productos set  rprecio_compra='$precioC', rprecio_venta='$precioV' where cmodelo='$baccion'");
            if(!$result){
				pg_query("rollback");
				//mensajeInformacion('Error','Datos no almacenados','error');
				}else{
					pg_query("commit");
                    //mensajeInformacion('Informacion','Datos almacenados','info');
				}
?>