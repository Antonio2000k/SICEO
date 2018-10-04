<?php
	 $codigo=$_REQUEST['codigo'];
     $opcion=$_REQUEST['opcion'];
	 //echo '<input type="text" name="esta" value="'.$codigo.'">';
	 include '../../../Config/conexion.php';
    if($opcion==="dui"){
        pg_query("BEGIN");
				 $result=pg_query($conexion,"select * from empleados where cdui='".$codigo."'");
				 $nue=pg_num_rows($result);
						 if($nue>0){
							 pg_query("commit");
							  echo '<input type="hidden" id="baccionVer" value="0"/>';
						 }else {
							 pg_query("rollback");
						 	echo '<input type="hidden" id="baccionVer" value="1"/>';
						 }
    }else if($opcion==="correo"){
        pg_query("BEGIN");
				 $result=pg_query($conexion,"select * from empleados where ccorreo='".$codigo."'");
				 $nue=pg_num_rows($result);
						 if($nue>0){
							 pg_query("commit");
							  echo '<input type="hidden" id="baccionVer" value="0"/>';
						 }else {
							 pg_query("rollback");
						 	echo '<input type="hidden" id="baccionVer" value="1"/>';
						 }
    }
 ?>