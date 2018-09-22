<?php session_start();     
    $opcion=$_REQUEST["opcion"];

	if($opcion=="agregar"){	
		$acumulador=$_SESSION["acumulador"];    
        $id=$_REQUEST["modelo"];
        $cantidad=$_REQUEST["cantidad"];
        if(existeCodigo($id)){
            $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>  Producto ya se encuentra en la lista</h5></div>';            
        }else{
            $matriz=$_SESSION["matriz"];
            $acumulador++;
            $matriz[$acumulador][0]=$id;
            $matriz[$acumulador][1]=$cantidad;
            $_SESSION['acumulador']=$acumulador;
            $_SESSION['matriz']=$matriz;
            $mensaje='<div class="text-center success"><strong><h5><i class="fa fa-info-circle"></i>Exito</strong> Producto agregado a la lista</h5></div>';
        }
        $_SESSION["mensaje"]=$mensaje;
     //impresion($mensaje);
	}

	if($opcion=="quitar"){
        $quitar=$_REQUEST['quitar'];
		$matriz=$_SESSION['matriz'];
        //var_export($matriz);//Muestra todos los elementos del array
		unset($matriz[$quitar]);//Eliminacion de un indice en la matriz
        //echo'<br><br>';
        //var_export($matriz);//Muestra todos los elementos del array
		$_SESSION['matriz']=$matriz;
        $acumulador--;
        $mensaje='<div class="text-center info"><strong><h5><i class="fa fa-info-circle"></i>Exito</strong> Producto eliminado a la lista</h5></div>';
        $_SESSION["mensaje"]=$mensaje;
		//impresion();
	}
function existeCodigo($codigo){
    $valor=false;
    $acumulador=$_SESSION["acumulador"];
    $matriz=$_SESSION["matriz"];
    for($i=1 ; $i<=$acumulador; $i++){
       if($codigo===$matriz[$i][0])
           $valor=true;
    }
    return $valor;
}

function impresion($mensaje){
   echo $mensaje;
 ?><table id="tabla" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Opciones</th>
            </tr>
        </thead>        
       <tbody id="myTable">
        <tr>
        <?php
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
		for($i=1 ; $i<=$acumulador ; $i++){
			if(array_key_exists($i, $matriz)){//Verifica si existe el indice en la matriz  
            $id=$matriz[$i][0];
            include '../../Config/conexion.php';
            pg_query("BEGIN");
            $resultado=pg_query($conexion, "select * from productos where cmodelo='".$id."'");
            $nue=pg_num_rows($resultado);
                if($nue>0){
                while ($fila = pg_fetch_array($resultado)) {
                     echo '<td>'.$fila[0].'</td>';
                     echo '<td>'.$fila[1].'</td>';
                    echo '<td>'.$matriz[$i][1].'</td>'; ?>
                    <td class="text-center"><button class="btn btn-warning btn-icon left-icon" onClick="Eliminar('<?php echo $i;?>');"> <i class="fa fa-remove"></i></button><button class="btn btn-info btn-icon left-icon" onClick="verificar();"> <i class="fa fa-edit"></i></button></td>
                    <?php
                    }
                }
        
        echo '</tr>';
        }  }?>
        </tbody>
</table>
<script></script>
<?php } ?>

