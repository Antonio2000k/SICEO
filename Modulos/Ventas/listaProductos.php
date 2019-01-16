<?php
  if(isset($_REQUEST["opcion"])) {
    $opcion = $_REQUEST["opcion"];

    include('../../Config/conexion.php');

    $query_s=pg_query($conexion,"SELECT * FROM pbproductos WHERE ctipo = '$opcion'");
    $cont = pg_num_rows($query_s);

    while($fila=pg_fetch_array($query_s)) {
      echo "<option value='$fila[0]' label='$fila[1] - $fila[0]'>";
    }
    if($cont==0) {
      echo "<option value='' label='No hay registros'>";
    }
  }
  else {
    echo "<option value='' label='No hay registros'>";
  }
?>
