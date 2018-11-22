<?php
$server="localhost";
$puerto="5433";
$database="SiceoDBC";
$usuario="postgres";
$clave="root";

$conexion=pg_connect("host=$server port=$puerto dbname=$database user=$usuario password=$clave");
if(!$conexion){
	echo"Error de conexion a la Base de Datos";
	}

        else {
   //echo"conectado";
        }

?>