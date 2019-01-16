<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];


  include '../../Config/conexion.php';

  if($_POST) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];

    $resultado = pg_query($conexion,"SELECT MAX(paencomendero.eid_encomendero) FROM paencomendero");
    $contado = 0;
    while ($fila = pg_fetch_array($resultado)) {
      $contado = $fila[0];
    }
    $contado++;

    $query_encomendero = pg_query($conexion, "INSERT INTO paencomendero (eid_encomendero, cnombre, capellido, ctelefonof, ccelular, bestado) VALUES ($contado, '$nombre', '$apellido', '$telefono', '$celular', true)");

    if($query_encomendero) {
       $query_ide=pg_query($conexion,"SELECT MAX(eid_bitacora) FROM pcbitacora ");
            $accion = 'El usuario ' . $nomusAccess. ' Registro al encomendero '. $nombre .' '.$apellido;
            while ($filas = pg_fetch_array($query_ide)) {
                $ida=$filas[0];
                $ida++ ;
            }
            ini_set('date.timezone', 'America/El_Salvador');

            $hora = date("Y/m/d ") . date("h:i:s a");
            $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha) VALUES ($ida, $idAccess, '".$accion."' , '$hora' )");

            if(!$consult ){
                    pg_query("rollback");
                    echo "<script type='text/javascript'>";
                    echo pg_result_error($conexion);
                    echo "alert('Error');";
                    echo "</script>";
            }else{
                  echo "true";
            }
    }
    else {
      echo "false";
    }
  }
  else {
    echo "false";
  }
?>
