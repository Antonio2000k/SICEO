<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

$nombre=$_REQUEST["nombreM"];
include("../../../Config/conexion.php");
    pg_query("BEGIN");
    $resultado=pg_query($conexion,"select MAX(marca.eid_marca) from pamarca");
    while ($fila = pg_fetch_array($resultado)) {$contado=$fila[0];}
    $contado++;
    $result=pg_query($conexion,"insert into pamarca(eid_marca, cnombre) values('$contado','".$nombre."')"); 
    if(!$result){
            pg_query("rollback");
            echo '0';
            //mensajeInformacion('Error','Datos no almacenados','error');
            }else{
                $fechaA= date("d/m/Y");
                $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                $accion = 'El usuario ' . $nomusAccess. ' Registro una nueva marca' ;
                while ($filas = pg_fetch_array($query_ide)) {
                    $ida=$filas[0];                                 
                    $ida++ ;
                } 
                ini_set('date.timezone', 'America/El_Salvador');
                                
                $hora = date("Y/m/d ") . date("h:i:s a");
                $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$nombre')");

                if(!$consult ){
                    pg_query("rollback");
                    echo "<script type='text/javascript'>";
                    echo pg_result_error($conexion);
                    echo "alert('Error');";
                    echo "</script>";
                }else{
                    pg_query("commit");
                    echo '1';
                    //mensajeInformacion('Informacion','Datos almacenados','info');
                }
                
    }

  
?>