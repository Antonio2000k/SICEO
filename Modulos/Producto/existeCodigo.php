
<?php
	 $codigo=$_REQUEST['codigo'];
     $opcion=$_REQUEST['opcion'];
	 //echo '<input type="text" name="esta" value="'.$codigo.'">';
	 include '../../Config/conexion.php';
    if($opcion==="codigo"){
        pg_query("BEGIN");
				 $result=pg_query($conexion,"select * from productos where cmodelo='".$codigo."'");
				 $nue=pg_num_rows($result);
						 if($nue>0){
							 pg_query("commit");
							  echo '<input type="hidden" id="baccionVer" value="0"/>';
						 }else {
							 pg_query("rollback");
						 	echo '<input type="hidden" id="baccionVer" value="1"/>';
						 }
    }else if($opcion==="nombre"){
        pg_query("BEGIN");
				 $result=pg_query($conexion,"select * from productos where cnombre='".$codigo."'");
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
