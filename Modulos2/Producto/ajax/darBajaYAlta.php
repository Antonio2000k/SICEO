<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

    include("../../../Config/conexion.php");
    $baccion=$_REQUEST['id'];
    $estado=$_REQUEST['opcion'];
     pg_query("BEGIN");
      $result=pg_query($conexion,"update pbproductos set bestado='$estado' where cmodelo='$baccion'");      
      if(!$result)
        pg_query("rollback");
        else{
            if($estado == "1"){
	        	
	            $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
	            $accion = 'El usuario ' . $nomusAccess. ' dio de alta a un producto' ;
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
	                
	            }
        	}else if($estado == "0"){
        		
                $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                $accion = 'El usuario ' . $nomusAccess. ' dio de baja a un producto ';
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
                    
                }
        	}
        }
        
?>