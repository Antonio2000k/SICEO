<?php session_start(); 
    $opcion=$_REQUEST["opcion"];
    $cantidad=$_REQUEST["cantidad"];
    
	if($opcion=="agregar"){
		$id=$_REQUEST["id"];
		$acumulador=$_SESSION["acumulador"];
		$matriz=$_SESSION["matriz"];
		$acumulador++;
		$matriz[$acumulador][0]=$idlugar;
		$_SESSION['acumulador']=$acumulador;
		$_SESSION['matriz']=$matriz;

		impresion();
	}

	if($opcion=="quitar"){
		$id= $_GET["id"];

		$matriz=$_SESSION['matriz'];
		unset($matriz[$id]);//Eliminacion de un indice en la matriz

		$_SESSION['matriz']=$matriz;
		impresion();
	}

function impresion(){
 ?>
<table id="datatable-fixed-header" class="table table-striped table-bordered" id="tblEmpleados">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Opciones</th>
            </tr>
        </thead>
	<?php
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
		for($i=1 ; $i<=$acumulador ; $i++){
			if(array_key_exists($i, $matriz)){//Verifica si existe el indice en la matriz
	 ?>
	
        <tbody>
        <tr>
        <td class="text-center">
        <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!');"> <i class="fa fa-ban"></i></button>
        </td>
        </tr>
        <?php }  }?>
        </tbody>
</table>
<?php } ?>

<?php
function impresion2(){
 ?>
<table id="example1" class="table table-bordered table-striped">
	<thead>
	<tr>
		<th align="center">Sintomas</th>
		<th align="center">Accion</th>
	</tr>
	</thead>
	<?php
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
		for($i=1 ; $i<=$acumulador ; $i++){
			if(array_key_exists($i, $matriz)){//Verifica si existe el indice en la matriz
	 ?>
	<tr style="font-size: 14px;">
	<?php
		include("../../config/conexion.php");
		$idlugar=$matriz[$i][0];

		$result=$conexion->query("select * from sintoma where id='$idlugar' order by nombre");
		if($result){
			while($fila=$result->fetch_object()){
				$xnombre=$fila->nombre;
			}
		}
	 ?>
	 <td align="left"><?php echo $xnombre; ?></td>
	 <td>
		<button type="button" name="btn" class="btn btn-block btn-success" onclick="showUser('quitar','<?php echo $i ?>')">Quitar</button>
		</td>
	 </tr>
	 <?php }  }?>

</table>
<?php } ?>
