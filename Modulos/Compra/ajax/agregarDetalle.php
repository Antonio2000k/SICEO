<?php session_start();     
    $opcion=$_REQUEST["opcion"];

    if($opcion==="guardarTodo"){
    $acumulador=$_SESSION["acumulador"];
    $matriz=$_SESSION["matriz"];
    $total=total();
    $quepaso=1;
    $fechita=date("m-d-Y", strtotime($_REQUEST["fecha"]));
    $id_empleado=$_SESSION["cid_empleado"];
      include '../../../Config/conexion.php';
      pg_query("BEGIN");
      $result=pg_query($conexion,"INSERT INTO compra(cid_empleado, ffecha_compra, rtotal_compra) values('".$id_empleado."','".$fechita."','".$total."')");
      if(!$result){
                pg_query("rollback");
                $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>Datos no almacenados Ingreso Compra</h5></div>';
                $quepaso=0;
                }else{                    
                    pg_query("commit");
                    $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>Datos Almacenados</h5></div>';
                        pg_query("BEGIN");
                      $resultado=pg_query($conexion, "SELECT max(compra.eid_compra) FROM compra");
                      $nue=pg_num_rows($resultado);
                            if($nue>0){ while ($fila = pg_fetch_array($resultado)) {$maximo=$fila[0];}}
                    
                    for($k=1 ; $k<=$acumulador+1 ; $k++){
                        pg_query("BEGIN");
                        $resulta=pg_query($conexion,"INSERT INTO detalle_compra(id_producto, ecantidad, id_compra) values('".$matriz[$k][0]."','".$matriz[$k][1]."','".($maximo)."')");
                        if(!$resulta){
                            pg_query("rollback");
                             $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>Datos no almacenados Ingreso detalle</h5></div>';
                            $quepaso=0;
                        }else{
                            pg_query("commit");
                            $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>Datos Almacenados</h5></div>';
                        }
                    }
                            actualizaStock();
                            $matriz=$_SESSION["matriz"];
                    for($j=1 ; $j<=$acumulador ; $j++){                        
                            pg_query("BEGIN");                            
                            //echo "update productos set estock='".$matriz[$j][1]."' where cmodelo='".$matriz[$j][0]."'";
                            $result=pg_query($conexion,"update productos set estock='".$matriz[$j][1]."' where cmodelo='".$matriz[$j][0]."'");
                            if(!$result){
                            pg_query("rollback");
                             $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>Datos no almacenados Ingreso ActualizacionStock</h5></div>';
                            $quepaso=0;
                            }else{
                                pg_query("commit");
                                $mensaje='<div class="text-center info"><strong><h5><i class="fa fa-remove"></i>Error</strong>Datos Almacenados</h5></div>';
                            }
                    }
                }
        imprimirGuardar($mensaje,$quepaso);
    }

    if($opcion=="modificar"){
        $acumulador=$_SESSION["acumulador"];
        $matriz=$_SESSION["matriz"];
        $id=$_REQUEST["modelo"];
        $cantidad=$_REQUEST["cantidad"];
        $quepaso=1;
        
        for($n=1 ; $n<=$acumulador ; $n++){
            if($matriz[$n][0]===$id){
                $matriz[$n][1]=$cantidad;
                $_SESSION["matriz"]=$matriz;
                $mensaje='<div class="text-center success"><strong><h5><i class="fa fa-info-circle"></i>Exito</strong> Producto modificado</h5></div>';
            }
        }        
        impresion($mensaje,$quepaso);
    }
	if($opcion=="agregar"){	
		$acumulador=$_SESSION["acumulador"];    
        $id=$_REQUEST["modelo"];
        $cantidad=$_REQUEST["cantidad"];
        $quepaso=1;
        if(existeCodigo($id)){
            $mensaje='<div class="text-center error"><strong><h5><i class="fa fa-remove"></i>Error</strong>  Producto ya se encuentra en la lista</h5></div>'; 
            $quepaso=0;
        }else{
            $matriz=$_SESSION["matriz"];
            $acumulador++;
            $matriz[$acumulador][0]=$id;
            $matriz[$acumulador][1]=$cantidad;
            $_SESSION['acumulador']=$acumulador;
            $_SESSION['matriz']=$matriz;
            $mensaje='<div class="text-center success"><strong><h5><i class="fa fa-info-circle"></i>Exito</strong> Producto agregado a la lista</h5></div>';
        }
        //$_SESSION["mensaje"]=$mensaje;
        impresion($mensaje,$quepaso);
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
        //$_SESSION["mensaje"]=$mensaje;
		impresion($mensaje,1);
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

function actualizaStock(){
    $acumulador=$_SESSION["acumulador"];
    $matriz=$_SESSION["matriz"];
    include '../../../Config/conexion.php';
    for($i=1 ; $i<=$acumulador ; $i++){
            pg_query("BEGIN");
            $resultado=pg_query($conexion, "select * from productos");
            $nue=pg_num_rows($resultado);
                if($nue>0){
                while ($fila = pg_fetch_array($resultado)) {
                        if($fila[0]==$matriz[$i][0]){
                            $matriz[$i][1]=$matriz[$i][1]+$fila[2];
                        }
                    }
                }
    }
    $_SESSION["matriz"]=$matriz;
}

function imprimirGuardar($mensaje,$quepaso){
      echo $mensaje;
?>  
       <input type="hidden"id="quepaso" value="<?php echo $quepaso ?>"/>
       <input type="hidden" id="estaVacio" value="<?php echo $_SESSION["acumulador"]; ?>"/>
       <?php
}
function impresion($mensaje,$quepaso){
   echo $mensaje;
?>  
       <input type="hidden"id="quepaso" value="<?php echo $quepaso ?>"/>
       <input type="hidden" id="estaVacio" value="<?php echo $_SESSION["acumulador"]; ?>"/>
       <div class="item form-group text-center">
        <div class="col-md-3 col-sm-9 col-xs-12">
            <label class="form-control has-feedback-center" class="form-control col-md-3 col-xs-12">Total Compra $<?php echo total();?></label>
        </div>
    </div>
       <table id="tabla" class="table table-striped table-bordered" style="paddign-top:20px;">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>SubTotal</th>
                <th>Opciones</th>
            </tr>
        </thead>        
       <tbody>
        <tr>
        <?php
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
		for($i=1 ; $i<=$acumulador ; $i++){
			if(array_key_exists($i, $matriz)){//Verifica si existe el indice en la matriz  
            $id=$matriz[$i][0];
            include '../../../Config/conexion.php';
            pg_query("BEGIN");
            $resultado=pg_query($conexion, "select * from productos where cmodelo='".$id."'");
            $nue=pg_num_rows($resultado);
                if($nue>0){
                while ($fila = pg_fetch_array($resultado)) {
                     echo '<td>'.$fila[0].'</td>';
                     echo '<td>'.$fila[1].'</td>';
                    echo '<td>'.$matriz[$i][1].'</td>';echo '<td>$'.$fila[3].'</td>';
                    echo '<td>$'.$matriz[$i][1]*$fila[3].'</td>';
                    
                ?>
                    
                    <td class="text-center"><button class="btn btn-warning btn-icon left-icon" onClick="Eliminar('<?php echo $i;?>');"> <i class="fa fa-remove"></i></button><button class="btn btn-info btn-icon left-icon" onClick="modificarLista('<?php echo $matriz[$i][1];?>','<?php echo $matriz[$i][0]?>','<?php echo $fila[7]?>');"> <i class="fa fa-edit"></i></button></td>
                    <?php
                    }
                }
        
        echo '</tr>';
        }  }?>
        </tbody>
</table>
<?php }


function total(){
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
        $valor=0;
		for($i=1 ; $i<=$acumulador ; $i++){
			if(array_key_exists($i, $matriz)){//Verifica si existe el indice en la matriz  
            $id=$matriz[$i][0];
            include '../../../Config/conexion.php';
            pg_query("BEGIN");
            $resultado=pg_query($conexion, "select * from productos where cmodelo='".$id."'");
            $nue=pg_num_rows($resultado);
                if($nue>0){
                while ($fila = pg_fetch_array($resultado)) {
                        $valor=$valor+($matriz[$i][1]*$fila[3]);            
                   }
                }
             }  
        }
    return $valor;
}
?>




