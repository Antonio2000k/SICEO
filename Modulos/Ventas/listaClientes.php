<?php
include("../../Config/conexion.php");
$query_s = pg_query($conexion,"SELECT * FROM paclientes");
$cont = pg_num_rows($query_s);

while($fila=pg_fetch_array($query_s)) {
  echo " <option value='$fila[1] $fila[2]'>";
  //echo "<option value='$fila[0]'>$fila[1] $fila[2]</option>";
}

if($cont==0) {
  echo " <option value=''>No hay registros</option>";
}
?>
