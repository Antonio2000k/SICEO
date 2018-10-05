<?php
$text = isset($_POST['texto']) ? $_POST['texto']:null;
$opcion = isset($_POST['opcion']) ? $_POST["opcion"]:null;

if($text && $opcion){
	include '../../Config/conexion.php';
	if(isset($_POST['texto']) && isset($_POST['opcion'])) {

    if($opcion==1 || $opcion==2) {
			if($opcion==1) {
				$nombres = explode(" ", $text);
				$nombre="";
				$apellido="";
				$cont=sizeof($nombres);

				if($cont>2) {
					//Este es por si es, 2 nombres y 1 apellido.
					if($cont==3) {
						$nombre = $nombres[0]." ".$nombres[1];
						$apellido = $nombres[2];
					}
					//Este es por si es, 2 nombres y 2 apellidos.
					else if($cont==4) {
						$nombre = $nombres[0]." ".$nombres[1];
						$apellido = $nombres[2]." ".$nombres[3];
					}
					//Este es por si es, 2 nombres y 3 apellidos.
					else if($cont==4) {
						$nombre = $nombres[0]." ".$nombres[1];
						$apellido = $nombres[2]." ".$nombres[3]." ".$nombres[4];
					}
				}
				else {
					$nombre = $nombres[0];
					$apellido = $nombres[1];
				}

	      //$query_s = pg_query($conexion, "SELECT * FROM clientes WHERE eid_cliente='$text'");
				$query_s = pg_query($conexion, "SELECT * FROM empleados WHERE cnombre='$nombre' AND capellido='$apellido'");

				if($query_s) {
					$contar = pg_num_rows($query_s);
			    if($contar==0) {
			      echo "";
			    }
			    else {
						while($fila=pg_fetch_array($query_s)){
							echo $fila[0];
						}
			    }
				}
				else {
					//Este es por si es, 1 nombre y 2 apellidos.
					if($cont==3) {
						$nombre = $nombres[0];
						$apellido = $nombres[1]." ".$nombres[2];
					}

					$query_s = pg_query($conexion, "SELECT * FROM empleados WHERE cnombre='$nombre' AND capellido='$apellido'");

					if($query_s) {
						$contar = pg_num_rows($query_s);
				    if($contar==0) {
				      echo "";
				    }
				    else {
							while($fila=pg_fetch_array($query_s)){
								echo $fila[0];
							}
				    }
					}
				}
	    }
	    
		//Para otra validacion, opcion 3
		}else {
			echo $text;
    }
  }
  else {
    echo "";
  }
}
?>
