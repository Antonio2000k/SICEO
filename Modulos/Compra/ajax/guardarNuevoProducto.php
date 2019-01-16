<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

$modelo=$_REQUEST["modeloP"];
$nombre=($_REQUEST["nombreP"]);
$color=($_REQUEST["color"]);
$precioV=($_REQUEST["precioVenta"]);
$precioC=($_REQUEST["precioCompra"]);
$proveedor=$_REQUEST["proveedorP"];
$marca=($_REQUEST["marca"]);
$garantia=($_REQUEST["garantia"]);
$tipo=$_REQUEST["tipo"];
if($tipo==="1")
    $tipoc="Lente";
else
    $tipoc="Accesorio";

include("../../../Config/conexion.php");
    pg_query("BEGIN");
    if($tipo=="1"){
          $result=pg_query($conexion,"insert into productos(cmodelo, cnombre, estock, rprecio_compra, ccolor, rprecio_venta,
            eid_garantia, eid_proveedor, eid_marca, bestado, ctipo) values('$modelo','$nombre','0','$precioC','$color','$precioV','$garantia','$proveedor','$marca','1','$tipoc')");  
    }else if($tipo==="2"){
        $result=pg_query($conexion,"insert into productos(cmodelo, cnombre, estock, rprecio_compra, ccolor, rprecio_venta,
            eid_garantia, eid_proveedor, eid_marca, bestado, ctipo) values('$nombre','$nombre','0','$precioC','$color','$precioV','1','$proveedor','$marca','1','$tipoc')"); 
    }
    if(!$result){
                    pg_query("rollback");
        echo '0';
                    //mensajeInformacion('Error','Datos no almacenados','error');
                    }else{
                        
                            $fechaA= date("d/m/Y");
                            $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                            $accion = 'El usuario ' . $nomusAccess. ' Registro un nuevo producto ' ;
                            while ($filas = pg_fetch_array($query_ide)) {
                                $ida=$filas[0];                                 
                                $ida++ ;
                            } 
                            ini_set('date.timezone', 'America/El_Salvador');
                            
                            $hora = date("Y/m/d ") . date("h:i:s a");
                            $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$modelo')");

                            if(!$consult ){
                                    pg_query("rollback");
                                    echo "<script type='text/javascript'>";
                                    echo pg_result_error($conexion);
                                    echo "alert('Error');";
                                    echo "</script>";
                            }else{
                                pg_query("commit");
                                echo '1';
                            }
                            
                            //mensajeInformacion('Informacion','Datos almacenados','info');
                    

  
?>