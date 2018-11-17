<?php
$texto = isset($_POST['texto']) ? $_POST["texto"]:null;
if($texto)
{
	if($_POST["texto"]) {
    include "../../Config/conexion.php";
    $consulta = pg_query($conexion, "SELECT * FROM usuarios WHERE cusuario='".$_POST['texto']."'");
    $contar = pg_num_rows($consulta);

    if($contar==0) {
      echo "no";
    }
    else {
      echo "si";
    }
  }
  else {
    echo "no";
  }
}
?>
