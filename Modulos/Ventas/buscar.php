<?php
$text = isset($_POST['texto']) ? $_POST['texto']:null;
$opcion = isset($_POST['opcion']) ? $_POST["opcion"]:null;

if($text && $opcion) {
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
				$query_s = pg_query($conexion, "SELECT * FROM paclientes WHERE cnombre='$nombre' AND capellido='$apellido'");

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

					$query_s = pg_query($conexion, "SELECT * FROM paclientes WHERE cnombre='$nombre' AND capellido='$apellido'");

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
	    else if($opcion==2) {
	      $query_s = pg_query($conexion, "SELECT * FROM pbproductos WHERE cmodelo='".$_POST['texto']."'");
				$contar = pg_num_rows($query_s);

		    if($contar==0) {
		      echo "0.00";
		    }
		    else {
					while($fila=pg_fetch_array($query_s)){
						echo $fila[5];
					}
		    }
	    }
		}
		//Para otra validacion, opcion 3
		else if($opcion==3) {
			echo $text;
    }
		//Para buscar el expediente del cliente.
		else if($opcion==4) {
			$query_expediente = pg_query($conexion, "SELECT * FROM pbexpediente2 WHERE eid_cliente='$text'");
			$conteo = pg_num_rows($query_expediente);

			if($conteo>0) {
				while($fila=pg_fetch_array($query_expediente)) {
					echo $fila[0];
				}
			}
			else {
				echo "";
			}
		}
		//Para registrar cliente
		else if($opcion==5) {
			$nombre = $_POST["texto"];
			$apellido = $_POST["apellido"];
			$sexo = $_POST["sexo"];
			$telefono = $_POST["telefono"];
			$celular = $_POST["celular"];
			$direccion = $_POST["direccion"];
			$fecha = $_POST["fecha"];
			$fecha_registro = date('d-m-Y');
			$id = generar($nombre, $apellido);

			$edad = 0;

			pg_query("BEGIN");

			$query_cliente = pg_query($conexion, "INSERT INTO paclientes (eid_cliente, cnombre, capellido, eedad, csexo, ctelefonof, cdireccion, ffecha, ffechar) VALUES ('$id', '$nombre', '$apellido', $edad, '$sexo', '$telefono', '$celular', '$fecha', '$fecha_registro')");

			if($query_cliente) {
				pg_query("COMMIT");
				echo "exito";
			}
			else {
				pg_query("ROLLBACK");
				echo "";
			}
		}
  }
  else {
    echo "";
  }
}

function generar($nombree, $apellidos){
	$str=trim($nombree).trim($apellidos);
  $cad="";
  for($i=0; strlen($cad)<2; $i++){
    $cad.=substr($str,rand(0,strlen($str)-1),1);
  }

	return strtoupper($cad);
}
?>
