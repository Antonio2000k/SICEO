<?php

$postCedula = ( isset($_POST['user']) )? trim($_POST['user']) : '';

if( !empty($_POST['user']) ) ){
  require_once ("../../Config/conexion.php");
  

  $sql = "SELECT * FROM usuarios WHERE cusuario = '$usuario'"
  $result = pg_query()($connection, $sql);
  $counter = pg_num_rows($result);

  if($result AND $counter){ // Cero 0, PHP lo toma como FALSE
     echo "Usuario ya existe";
  }
  else {
     echo "No existe" 
  }
}