<?php session_start(); 
if(isset($_SESSION["acumulador"])){
    unset($_SESSION["matriz"]);
    unset($_SESSION["acumulador"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>SICEO | Compras </title>
    <?php include "../../ComponentesForm/estilos.php";  ?>
    <link href="propio.css" rel="stylesheet">
    <script src="compra.js"></script>
</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
    <div class="left_col scroll-view"><?php include "../../ComponentesForm/menu.php";  ?></div>
    <!--Aqui va inicio el contenido-->
    <div class="right_col" role="main">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div>
                    <img align="left" src="../../production/images/compra.png" width="120" height="120"><h1 align="center">Compras</h1>
                </div>
                <div align="center">
                    <p>Formulario el cual servira para poder registrar las compras que se hacen al proveedor. La pestaña de listado de compras muestra todas las compras realizadas.</p>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_content">
        <div class="" data-example-id="togglable-tabs" role="tabpanel">
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="active" role="presentation">
                    <a aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab">REGISTRAR COMPRA</a>
                </li>
                <li class="" role="presentation">
                    <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">LISTADO DE COMPRAS</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                        <div class="x_title" style="background: #2A3F54"><h2 style="text-indent: 400px; color: white">Datos del producto</h2>
                            <ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                                <form class="form-horizontal form-label-left" name="formCompra" id="formCompra" method="post">
                                     <div class="row" id="modificarLista">
                                          <input type="hidden" name="bandera" id="bandera" />
                                      <input type="hidden" name="baccion" id="baccion"/>
                                       <div class="row text-center">
                                           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
                                             <span class="glyphicon glyphicon-plus"></span> Nuevo producto
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
                                             <span class="glyphicon glyphicon-user"></span> Nuevo proveedor
                                            </button>
                                       </div>
                                        <div class="item form-group">
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Proveedor* </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control SProveedor" name="proveedor" id="proveedor" onchange="actualiza('cambioModelo')">
                                            <option value="0">Seleccione</option>
                                            <?php
                                           include '../../Config/conexion.php';
                                            pg_query("BEGIN");
                                            $resultado=pg_query($conexion, "select * from proveedor where bestado='t'");
                                            $nue=pg_num_rows($resultado);
                                                if($nue>0){
                                                while ($fila = pg_fetch_array($resultado)) {
                                                if($fila[0]==$proveedor){
                                            ?>
                                            <option selected="" value="<?php echo $fila[0]?>"><?php echo $fila[1].' '.$fila[2]?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $fila[0]?>"><?php echo $fila[1].' '.$fila[2]?></option>
                                                <?php }}} ?>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Modelo* </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control SProducto" name="modelo" id="modelo" onchange="actualiza('cambioNombre')">
                                            <option value="0">Seleccione</option>
                                            </select>
                                            </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-1 col-sm-6 col-xs-12 form-group has-feedback">
                                                <button class="btn btn-info btn-icon left-icon" data-toggle="modal" data-target="#editarProducto" onclick="lanzaModal();" id="btnInfoProducto" disabled> <i class="fa fa-info-circle"></i></button>
                                            </div>  
                                            
                                                                                    
                                                                                                                                                                    
                                        </div>
                                        <div class="item form-group">
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre*</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12" id="nombresito">
                                                <input type="text" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Nombre" name="nombre" id="nombre" disabled>
                                                <span class="fa  fa-toggle-right form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad*</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Cantidad" name="cantidad" id="cantidad">
                                                <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            </div>                                            
                                        </div>
                                        <div class="item form-group">
                                            <div class="item form-group" align="center">
                                                <div class="col-md-12 col-sm-12 col-xs-12" id="divAgregar">
                                                    <button class="btn btn-primary source" onclick="verificar();"><i class="fa fa-plus"></i> Agregar</button>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" hidden id="divModificar">
                                                    <button class="btn btn-primary source" onclick="verificar('modificar');"><i class="fa fa-refresh"></i> Modificar</button>
                                                </div>
                                            </div>
                                        </div>
                                     </div>                                        
                                </form>
                                <div class="row">
                                
                                <div class="row">
                                    <div class="x_content" id="mostrar">
                                       <input type="hidden" id="estaVacio" value="<?php echo $_SESSION["acumulador"];?>"/>
                                        
                                    </div>
                                </div>
                            
                            <div class="item form-group text-center">
                                <div class="col-md-12">
                                    <button class="btn btn-success btn-icon left-icon" onclick="guardar();"> <i class="fa fa-save"></i> <span>Guardar</span></button>
                                    <button class="btn btn-danger  btn-icon left-icon" onclick="cancelar();"> <i class="fa fa-close"></i><span>Cancelar</span></button>
                                </div>
                            </div>
                            </div>
                                                                   
                        </div>                                  
                        </div>      
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPRAS </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" id="tblBajaProducto">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Empleado</th>
                                        <th>Fecha</th>
                                        <th>Total Compra</th>
                                        <th>Ver Mas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                          include("../../Config/conexion.php");
                          $query_s= pg_query($conexion, "select * from compra order by ffecha_compra");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                                <tr>
                                    <td><?php echo $fila[0]; ?></td>
                                    <td><?php echo $fila[1]; ?></td>
                                    <td><?php echo $fila[2]; ?></td>
                                    <td>$<?php echo $fila[3]; ?></td>
                            <td class="text-center">
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('', '<?php echo $fila[0]; ?>')"> <i class="fa fa-list-ul"></i></button>
                        </td>
                </tr>
                <?php
                      }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                                                                                                
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    
    <!--- Modal -->
        <div class="modal fade" id="editarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h3 class="modal-title" id="exampleModalLabel">Informaci&oacuten producto</h3> </center>
                    </div>
                    <div class="modal-body" id="cargala">
                        <form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			            <div id="resultados_ajax2"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			            <button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
        <!--- Modal -->
        <div class="modal fade" id="modalDetalleCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h3 class="modal-title" id="exampleModalLabel">Detalle Compra</h3> </center>
                    </div>
                    <div class="modal-body" id="cargaDetalle"> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
    <!--Aqui va fin el contenido-->
    <footer><?php        include "../../ComponentesForm/footer.php";      ?> </footer>
</div>        
</div>
</div>
    <?php include "../../ComponentesForm/scripts.php";    ?>
     <script>
        $(function () {
            $('.SProveedor').select2()
            $('.SProducto').select2()
        });
    </script>
</body>
</html>
<?php
$bandera=$_REQUEST["bandera"];
//total();

if($bandera==="guardarTodo"){
    $acumulador=$_SESSION["acumulador"];
    $matriz=$_SESSION["matriz"];
    
  pg_query("BEGIN");
  $result=pg_query($conexion,"INSERT INTO compra(eid_compra, cid_empleado, ffecha_venta, rtotal_venta) values('5','te','2018-12-12','".total()."')");
  if(!$result){
            pg_query("rollback");
            mensajeInformacion('Error','Datos no almacenados','error');
            }else{
                pg_query("commit");
                mensajeInformacion('Informacion','Datos almacenados','info');
            }
}

function mensajeInformacion($titulo,$mensaje,$tipo){
            echo "<script language='javascript'>";
            echo "alertaSweet('".$titulo."','".$mensaje."', '".$tipo."');";
            echo "document.getElementById('bandera').value='';";
            echo "document.getElementById('baccion').value='';";
            echo "</script>";

}

function total(){
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];
        $valor=0;
		for($i=1 ; $i<=$acumulador ; $i++){
			if(array_key_exists($i, $matriz)){//Verifica si existe el indice en la matriz  
            $id=$matriz[$i][0];
            include '../../Config/conexion.php';
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