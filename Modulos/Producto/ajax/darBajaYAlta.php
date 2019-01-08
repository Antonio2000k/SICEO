<?php
    include("../../../Config/conexion.php");
    $baccion=$_REQUEST['id'];
    $estado=$_REQUEST['opcion'];
     pg_query("BEGIN");
      $result=pg_query($conexion,"update productos set bestado='$estado' where cmodelo='$baccion'");      
      if(!$result)
        pg_query("rollback");
        else
            pg_query("commit");
        
?>