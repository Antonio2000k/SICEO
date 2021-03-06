<?php session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

if(isset($_SESSION["acumulador"])){
    unset($_SESSION["matriz"]);
    unset($_SESSION["acumulador"]);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>SICEO | Compras </title>
    <?php include "../../ComponentesForm/estilos.php";  ?>
    <link href="css/propio.css" rel="stylesheet">
    <script src="js/compra.js"></script>
    <script src="js/nuevoProducto.js"></script>
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
                    <a aria-expanded="true"  href="Comprac.php" id="home-tab">COMPRAS AL CONTADO</a>
                </li>
                <li class="" role="presentation">
                    <a aria-expanded="true"  href="Compracd.php" id="home-tab">COMPRAS AL CREDITO</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)"><h2 style="text-indent: 400px; color: white">Datos de la compra</h2>
                            <ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                                <form class="form-horizontal form-label-left" name="formCompra" id="formCompra" method="post">
                                     <div class="row" id="modificarLista">
                                    <input type="hidden" name="bandera" id="bandera" />
                                      <input type="hidden" name="baccion" id="baccion"/>
                                      <input type="hidden" name="baccion" id="baccionVer"/>
                                      <div class="row" id="guardo">
                                          <input type="hidden" name="guardoXD" id="guardoXD"/>
                                      </div>                                      
                                       <div class="row text-center" hidden>
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
                                            $resultado=pg_query($conexion, "select * from paproveedor where bestado='t'");
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
                                                <input type="number" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Cantidad" name="cantidad" id="cantidad" onkeypress="return soloNumeros(event,'entero')" min="1" max="100" value="1">
                                                <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            </div>                                            
                                        </div>
                                        <div class="item form-group">
                                        <label class="control-label col-md-5 col-sm-3 col-xs-12">Fecha *</label>
                                            <div class="form-group">
                                                <div class='input-group date' id='myDatepicker1'>
                                                    <input type='text' class="form-control has-feedback-left col-md-4 col-sm-4 col-xs-12"  id="fecha" name="fecha"    data-inputmask="'mask': '99/99/9999'"  autocomplete="off" onblur="valiFecha();"/>
                                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <span id="txtHint"></span>
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
                                       <input type="hidden" id="estaVacio" value=""/>
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
                            <h3 class="modal-title" id="exampleModalLabel">Información producto</h3> </center>
                    </div>
                    <div class="modal-body" id="cargala">                       
                       <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_content">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th class="text-center"><b><i class="fa fa-shopping-cart"></i>Producto</b></th>
                                </tr>
                              </thead>
                              <tbody>                      
                            </table>
                             </div>
                        </div>
                      </div>
			               
                            <div class="text-center">
                        <button class="btn btn-info btn-icon" onClick="aparecer();"> <i class="fa fa-refresh"></i> <span>Modificar</span></button>
                    </div>                    
                    
                    <div class="row" hidden id="divModificarProducto">
                        <div class="item form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12"> Precio de Compra* </label>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12"> Precio de Venta* </label>
                    </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <div class="col-md-12 col-sm-9 col-xs-12">
                                <input type="number" class="form-control has-feedback-left" id="precioCompra" class="form-control col-md-7 col-xs-12" name="precioCompra"  autocomplete="off" min="0" onkeypress="return soloNumeros(event,'punto')"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="number" class="form-control has-feedback-left" id="precioVenta" class="form-control col-md-7 col-xs-12" name="precioVenta" autocomplete="off" min="0" onkeypress="return soloNumeros(event,'punto')"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			            <button type="submit" class="btn btn-primary" id="actualizar_datos" onclick="modificarPreciosProducto();">Actualizar datos</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
        <!--- Modal Detalle Compra-->
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
        
        <!--- Modal Tipo de Compra-->
        <div class="modal fade" id="tipoCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center><h3 class="modal-title" id="exampleModalLabel">Tipo Compra</h3> </center>
                    </div>
                    <div class="modal-body"> 
                        <div class="col-md-12 text-center">
                            <button class="btn btn-dark btn-icon left-icon" onclick="guardarContado('lanza');"> <i class="fa fa-money"></i> <span>  Contado</span></button>
                            <button class="btn btn-warning  btn-icon left-icon" onclick="cargarC();"> <i class="fa fa-credit-card"></i><span>  Credito</span></button>
                        </div>
                        <br>
                        <br>
                        <div  class="row" hidden id="cargarCredito">
                        <div class="item form-group text-center">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Cuotas* </label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12"> Periodo(dias)* </label>
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                <div class="col-md-12 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control has-feedback-left" id="cuotas" class="form-control col-md-7 col-xs-12" name="cuotas" autocomplete="off" min="1" value="1" onkeypress="return soloNumeros(event,'entero')"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" class="form-control has-feedback-left" id="periodo" class="form-control col-md-7 col-xs-12" name="periodo" autocomplete="off" min="1" value="1" onkeypress="return soloNumeros(event,'entero')"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback text-center">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">Abono inicial</label>
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <div class="col-md-12 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control has-feedback-left" id="abonoInicial" class="form-control col-md-7 col-xs-12" name="abonoInicial" autocomplete="off" min="0" value="0" onkeypress="return soloNumeros(event,'punto')"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <button type="button" class="btn btn-success" id="btnguardarcredito" onclick="guardarCredito();"><i class="fa fa-save"></i><span>  Guardar compra</span></button>   
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">                    
                        <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>                
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
    <!--Inicio modal ayuda-->
                    <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <div style="float: right; color: red">
                               <button style="color: red" type="button"  data-dismiss="modal" aria-label="Close">
                                 <span style="color: red" aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                               <h5 align="center" style=" color: white">ASISTENCIA REGISTRO DE COMPRAS</h5>
                               <div class="clearfix"></div>
                             </div>
                         </div>
                         <div class="modal-body modal-md">
                           <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel" >
                             <!-- Wrapper for slides -->
                             <div class="carousel-inner">
                               <div class="item active">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra.png" alt="...">
                                 <div class="carousel-caption" style="margin-bottom:0px;">
                                   <p style="color:black";> Formulario principal en donde se hacen el registro de compras, tener en cuenta que debe existir un producto en la lista para generar una compra. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra1.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Notificación que se muestra cuando se quiere guardar sin ingresar productos a la lista. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra2.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Tras seleccionar el proveedor, se cargaran todos los modelos que este ofrece, al seleccionar un modelo se carga automaticamente el nombre del producto y solo resta asignar una cantidad y agregarlo a la lista. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra3.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Al presionar el boton de agregar, se carga el producto en la tabla, se debe tener en cuenta que los campos proveedor, modelo y cantidad son obligatorios, en la tabla cada producto tiene la opcion de ser eliminado de la lista y modificado. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra4.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Cuando se presiona el boton de modificar, nos aparece una notificación consultando si desea modificar el producto. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra5.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Tras aceptar la opcion de modificar se cargan los datos del proveedor y el modelo, pero sin posibilidad de modificarlos el unico dato que se permite modificar es la cantidad del producto. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra6.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Si en un caso se desea modificar los precios de los productos, existe un boton a la derecha del modelo y al pulsarlo nos lanza una ventana donde podemos modificar los precios. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra7.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Al tener listo el registro y darle a la opcion de guardar, nos aparecera una ventana en donde podemos seleccionar si el pago sera al contado o al credito, si el pago es al contado solo nos pide aceptar y guardamos. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Compras/compra8.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Si el tipo de pago es al credito debemos llenar los campos de cuotas y periodo el campo de abono inicial es opcional. </p>
                                 </div>
                               </div>

                               

                             </div>

                             <!-- Controls -->
                             <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                               <span class="glyphicon glyphicon-chevron-left"></span>
                             </a>
                             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                             </a>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <!--Fin modal ayuda-->
        
        <?php include'Modal/modificacionProducto.php'; ?>
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
            $('.STipo').select2()
            $('.SProveedorP').select2()
            $('.SMarca').select2()
            $('.SGarantia').select2()
        });
    </script>
</body>
</html>