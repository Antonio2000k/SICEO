<?php
  include '../../Config/conexion.php';

  if($_POST) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];

    $resultado = pg_query($conexion,"SELECT MAX(encomendero.eid_encomendero) FROM encomendero");
    $contado = 0;
    while ($fila = pg_fetch_array($resultado)) {
      $contado = $fila[0];
    }
    $contado++;

    $query_encomendero = pg_query($conexion, "INSERT INTO encomendero (eid_encomendero, cnombre, capellido, ctelefonof, ccelular, bestado) VALUES ($contado, '$nombre', '$apellido', '$telefono', '$celular', true)");

    if($query_encomendero) {
      echo "true";
    }
    else {
      echo "false";
    }
  }
  else {
    echo "false";
  }
?>
