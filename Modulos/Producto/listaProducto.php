<?php session_start();
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from productos where cmodelo='$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $idProducto = $fila[0];
        $Rnombre = $fila[1];
        $precioCompra = $fila[3];
        $color = $fila[4];
        $precioVenta = $fila[5];
        $garantia = $fila[6];
        $proveedor = $fila[7];
        $marca = $fila[8];
        $tipoR=$fila[10];
        //echo $fila[10];
    } 
}else{
        $idProducto = null;
        $Rnombre = null;
        $precioCompra = null;
        $color = null;
        $precioVenta = null;
        $garantia = 0;
        $proveedor = 0;
        $marca = 0;
        $tipoR=0;
}
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SICEO | Producto </title>
        <?php
      include "../../ComponentesForm/estilos.php";
    ?>
            <script src="producto.js"></script>
    </head>

    <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="clearfix"> </div>
                        <?php
                        include "../../ComponentesForm/menu.php";
                        ?>
                    </div>
                    <!-- page content -->
         <div class="right_col" role="main">
         <div class="">
         <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div> <img align="left" src="../../production/images/compra.png" width="120" height="120">
                <h1 align="center">Productos</h1> </img>
            </div>
            <div align="center">
                <p> Bienvenido en esta sección aquí puede registrar productos en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente. En la pestaña de listado de productos se podran observar todos los productos registrados con sus existencias. </p>
            </div>
                                </div>
                            </div>

        <div class="form-group" style="float: right;">
              <div class="btn-group" >
                
                <button float-right class="btn btn-info btn-icon left-icon "  data-toggle="modal" data-target="#edad">
                  <i class="fa fa-th-list"></i>
                  <span>Reportes</span>
                </button>
              </div> 
              
                      
            </div>
         <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                        <li class="" role="presentation"> <a aria-expanded="false"  href="producto.php" id="profile-tab">
                            REGISTRAR PRODUCTO
                        </a> </li>
                        <li class="active" role="presentation"> <a aria-expanded="false" data-toggle="tab" href="#tab_content2" name="tab2" id="profile-tab" role="tab">
                            LISTA DE PRODUCTOS
                        </a> </li>
                        <li class="" role="presentation"> <a aria-expanded="false"  href="listaProductoi.php" id="profile-tab">
                            PRODUCTOS DADOS DE BAJA
                        </a> </li>
                        <li class="" role="presentation"> <a aria-expanded="false"  href="stock.php" id="profile-tab">
                            STOCK
                        </a> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="home-tab" class="tab-pane fade " id="tab_content1" role="tabpanel">
                <div class="x_content">
                    <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                        <h3 align="center" style=" color: white">Datos del Producto</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" id="formProducto" name="formProducto" method="post">
                           <div class="row" id="guardo" hidden>
                              <input type="hidden" name="guardoXD" id="guardoXD"/>
                          </div> 
                            <input type="hidden" name="bandera" id="bandera" />
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $idProducto;?>" />
                            <div id="cambiaso">
                                <input type="hidden" id="baccionVer" value="1" /> </div>
                            <div class="row">
                               <div class="row text-center">
                                           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevaMarca">
                                             <span class="glyphicon glyphicon-plus"></span> Nuevo Marca
                                            </button>
                                       </div>
                               <div class="clearfix"></div><br>
                               
                                <div class="item form-group col-md-12 col-sm-12 col-xs-12 form-group has-feedback text-center">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-5 col-sm-3 col-xs-12"> Tipo de Producto* </label>
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                   <?php
                                        if(!isset($iddatos)){
                                            echo '<select class="form-control STipo" name="tipo" id="tipo" onchange="cambioTipoModelo();">';
                                            echo '<option value="0" >Seleccione</option>';
                                            echo '<option value="1" >Lente</option>';
                                            echo '<option value="2" >Accesorio</option>';
                                        }else{
                                            echo '<select class="form-control STipo" name="tipo" id="tipo" onchange="cambioTipoModelo();" disabled>';
                                            echo '<option value="0">Seleccione</option>';                                         
                                           if($tipoR==="Lente")
                                                echo '<option value="1" selected="">Lente</option>';
                                            else if($tipoR==="Accesorio")
                                                echo '<option value="2" selected="">Accesorio</option>'; 
                                        }         
                                    echo '</select>';
                                            ?>                                    
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--Codigos-->                         
                                
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="divModelo">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Modelo* </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <?php
                                    if(!isset($iddatos)){
                                        ?>
                                        <input type="text" class="form-control has-feedback-left" id="modelo" class="form-control col-md-7 col-xs-12" name="modelo" placeholder="Ingrese el modelo" autocomplete="off" value="<?php echo $idProducto; ?>" onblur="verificarCodigo('codigo');">
                                            <?php
                                    }else{
                                        echo '<input type="text" class="form-control has-feedback-left" id="modelo" class="form-control col-md-7 col-xs-12" name="modelo" placeholder="Ingrese el modelo" autocomplete="off" value="'.$idProducto.'" disabled>';
                                    }
                                ?> <span class="fa fa-cog form-control-feedback left" aria-hidden="true"></span> </div>
                                </div>
                            
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Proveedor* </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control SProveedor" name="proveedor" id="proveedor">
                                        <option value="0">Seleccione</option>
                                        <?php
                                   include '../../Config/conexion.php';
                                    pg_query("BEGIN");
                                    $resultado=pg_query($conexion, "select * from proveedor");
                                    $nue=pg_num_rows($resultado);
                                        if($nue>0){
                                        while ($fila = pg_fetch_array($resultado)) {
                                        if($fila[0]==$proveedor){
                                    ?>
                                    <option selected="" value="<?php echo $fila[0]?>">
                                        <?php echo $fila[1].' '.$fila[2]?>
                                    </option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $fila[0]?>">
                                            <?php echo $fila[1].' '.$fila[2]?>
                                        </option>
                                        <?php }}} ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nombre* </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <?php 
                            if($tipoR==="Accesorio"){
                                echo '<input type="text" class="form-control has-feedback-left" id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" value="'.$Rnombre.'" disabled> <span class="fa fa-toggle-right form-control-feedback left" aria-hidden="true"></span> ';
                            }else{
                                ?>
                                    
                                <input type="text" class="form-control has-feedback-left" id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" value="<?php echo $Rnombre; ?>" onblur="verificarCodigo('nombre')" onkeypress="return soloLetras(event)"> <span class="fa fa-toggle-right form-control-feedback left" aria-hidden="true"></span>
                                <?php
                            }                           
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Marca* </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control SMarca" name="marca" id="marca">
                                <option value="0">Seleccione</option>
                                <?php
                                   include '../../Config/conexion.php';
                                    pg_query("BEGIN");
                                    $resultado=pg_query($conexion, "select * from marca");
                                    $nue=pg_num_rows($resultado);
                                        if($nue>0){
                                        while ($fila = pg_fetch_array($resultado)) {
                                        if($fila[0]==$marca){
                                    ?>
                                        <option selected="" value="<?php echo $fila[0]?>">
                                            <?php echo $fila[1]?>
                                        </option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $fila[0]?>">
                                                <?php echo $fila[1]?>
                                            </option>
                                            <?php }}} ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Precio de Compra* </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="precioCompra" class="form-control col-md-7 col-xs-12" name="precioCompra" placeholder="Precio de compra" autocomplete="off"  value="<?php  echo $precioCompra;?>" onkeypress="return soloNumeros(event)"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Garantia* </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                               <?php 
                                    if($tipoR==="Accesorio"){
                                        echo '<select class="form-control SGarantia" name="garantia" id="garantia" disabled>';
                                        echo '<option value="0" selected="">Seleccione</option>';
                                    }else{
                                        echo '<select class="form-control SGarantia" name="garantia" id="garantia">';
                                        echo '<option value="0" selected="">Seleccione</option>';
                                        include '../../Config/conexion.php';
                                    pg_query("BEGIN");
                                    $resultado=pg_query($conexion, "select * from garantia");
                                    $nue=pg_num_rows($resultado);
                                        if($nue>0){
                                        while ($fila = pg_fetch_array($resultado)) {
                                        if($fila[0]==$garantia){
                                    ?>
                                        <option selected="" value="<?php echo $fila[0]?>"><?php echo $fila[2]?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $fila[0]?>"><?php echo $fila[2]?></option>
                                            <?php }}}
                                    }                       
                                echo '</select>';
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Color* </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="color" class="form-control col-md-7 col-xs-12" name="color" placeholder="Ingrese el color" autocomplete="off" onkeypress="return soloLetras(event)" value="<?php  echo $color;?>"> <span class="fa fa-tint form-control-feedback left" aria-hidden="true"></span> </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Precio de Venta* </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="precioVenta" class="form-control col-md-7 col-xs-12" name="precioVenta" placeholder="Precio de venta" autocomplete="off" value="<?php  echo $precioVenta;?>" onkeypress="return soloNumeros(event)"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <center>
                            <div class="col-md-12 col-sm-6 col-xs-12 ">
                                <?php
                if(!isset($iddatos)){
                        ?>
                <button class="btn btn-success btn-icon left-icon;" onClick="verificar('guardar');"> <i class="fa fa-save" name="btnGuardar" id="btnGuardar"></i> <span>Guardar</span></button>
                <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return limpiarIn('limpiar');"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                <?php
                }else{
                    ?>
                <button class="btn btn-info btn-icon left-icon;" onClick="verificar('modificar');"> <i class="fa fa-save" name="btnModificar" id="btnModificar"></i> <span>Modificar</span></button>
                <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return limpiarIn('limpiarM');"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                <?php
                }?>
                </div>
                </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>PRODUCTOS </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="btn-group" style="margin-left: 50%;">
							<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>  Exportar Tabla</button>
							<ul class="dropdown-menu " role="menu">
								<li><a href="#" onclick="$('#datatable-fixed-header').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="../../images/pdf.png" width="24px"> PDF</a></li>
								<li><a href="#" onclick="$('#datatable-fixed-header').tableExport({type:'excel',escape:'false'});"> <img src="../../images/excel.png" width="24px"> EXCEL</a></li>
							</ul>
						</div>
                   
                    <div class="x_content" id="imprimirTablaActivados">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered" id="tblEmpleados">
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Precio Venta</th>
                                    <th>Existencia</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                          include("../../Config/conexion.php");
                          $query_s= pg_query($conexion, "select * from productos where bestado='t' order by cmodelo");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                        <tr>
                            <td><?php echo $fila[0]; ?></td>
                            <td><?php echo $fila[1]; ?></td>
                            <td><?php echo $fila[10]; ?></td>
                            <td>$<?php echo $fila[5]; ?></td>
                            <?php
                              if($fila[2]<=3){
                                  echo '<td class="p-3 mb-2 bg-danger text-white">'.$fila[2].'</td>';
                              }else{
                                 echo '<td>'.$fila[2].'</td>';
                              }
                        ?>
                        <td class="text-center">
                            <button class="btn btn-info btn-icon left-icon" onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i></button>
                            <?php 
                                if($fila[2]==0){
                            ?>
                            <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!');"> <i class="fa fa-arrow-circle-down"></i></button>
                            <?php
                                }
                            ?>
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#exampleModal" onclick="ajax_act('', '<?php echo $fila[0]; ?>')"> <i class="fa fa-list-ul"></i></button>
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
        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>PRODUCTOS DADOS DE BAJA</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" id="tblBajaProducto">
                                <thead>
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Precio Venta</th>
                                        <th>Existencia</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="imprimirTablaDesactivados">
                                    <?php
                          include("../../Config/conexion.php");
                          $query_s= pg_query($conexion, "select * from productos where bestado='f' order by cmodelo ");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                                <tr>
                                    <td><?php echo $fila[0]; ?></td>
                                    <td><?php echo $fila[1]; ?></td>
                                    <td><?php echo $fila[10]; ?></td>
                                    <td>$<?php echo $fila[5]; ?></td>
                                    <?php
                              if($fila[2]<=3){
                                  echo '<td class="p-3 mb-2 bg-danger text-white">'.$fila[2].'</td>';
                              }else{
                                 echo '<td>'.$fila[2].'</td>';
                              }
                        ?>
                        <td class="text-center">
                            <button class="btn btn-primary btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','alta','Esta seguro de querer dar de alta al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Alta!')"> <i class="fa fa-arrow-circle-up"></i></button>
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#exampleModal" onclick="ajax_act('', '<?php echo $fila[0]; ?>')"> <i class="fa fa-list-ul"></i></button>
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
         <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>STOCK PRODUCTOS </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Precio Venta</th>
                                        <th>Existencia</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="imprimirTablaDesactivados">
                                    <?php
                          include("../../Config/conexion.php");
                          $query_s= pg_query($conexion, "select * from productos where bestado='t' and estock<3 order by cmodelo");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                                <tr>
                                    <td><?php echo $fila[0]; ?></td>
                                    <td><?php echo $fila[1]; ?></td>
                                    <td><?php echo $fila[10]; ?></td>
                                    <td>$<?php echo $fila[5]; ?></td>
                                    <?php
                              if($fila[2]<=3){
                                  echo '<td class="p-3 mb-2 bg-danger text-white">'.$fila[2].'</td>';
                              }else{
                                 echo '<td>'.$fila[2].'</td>';
                              }
                        ?>
                        <td class="text-center">
                           <?php
                              if($fila[2]==0){
                            ?>
                            <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!')"> <i class="fa fa-arrow-circle-down"></i></button>
                            <?php
                              }
                            ?>
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#exampleModal" onclick="ajax_act('', '<?php echo $fila[0]; ?>')"> <i class="fa fa-list-ul"></i></button>
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
                </div>
            </div>
        </div>
        <!-- /page content -->
        <!--- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h3 class="modal-title" id="exampleModalLabel">Informacion producto.</h3> </center>
                    </div>
                    <div class="modal-body" id="cargala"> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edad" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Selección de parametros a imprimir</h3> </center>
              </div>
              <br>
                <center>
                  <button class="btn btn-info btn-icon left-icon " id="e1" onclick="mostrarFormularios('prov');"> <i class="fa fa-print"></i> Proveedor</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e2" onclick="mostrarFormularios('est');"> <i class="fa fa-print"></i> Estado</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e3" onclick="mostrarFormularios('tipo');"> <i class="fa fa-print"></i> Tipo</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e4" onclick="mostrarFormularios('marca');"> <i class="fa fa-print"></i> Marca</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e5" onclick="mostrarFormularios('garantia');"> <i class="fa fa-print"></i> Garantia</button> 
                </center>
                <br>
                <div id="cambio">
                  <div class="modal-body">
                    <div class="item form-group" id="divPro" hidden>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Proveedor * </label>
                        
                            <select style="width:220px" class="form-control SProveedor" name="proved" id="proved">
                                <option value="">Seleccione</option>
                                <?php
                                   include '../../Config/conexion.php';
                                    pg_query("BEGIN");
                                    $resultado=pg_query($conexion, "select * from proveedor");
                                    $nue=pg_num_rows($resultado);
                                        if($nue>0){
                                        while ($fila = pg_fetch_array($resultado)) {
                                        if($fila[0]==$proveedor){
                                ?>
                                    <option selected="" value="<?php echo $fila[0]?>">
                                        <?php echo $fila[3]?>
                                    </option>
                                <?php }else{ ?>
                                        <option value="<?php echo $fila[0]?>">
                                            <?php echo $fila[3]?>
                                        </option>
                                <?php }}} ?>
                            </select>
                        
                        
                    </div>
                    <div class="item form-group" id="divMar" hidden>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Marca* </label>
                        
                        <select style="width:220px" class="form-control SMarca" name="marcaL" id="marcaL">
                            <option value="">Seleccione</option>
                            <?php
                                include '../../Config/conexion.php';
                                pg_query("BEGIN");
                                $resultado=pg_query($conexion, "select * from marca");
                                $nue=pg_num_rows($resultado);
                                if($nue>0){
                                    while ($fila = pg_fetch_array($resultado)) {
                                        if($fila[0]==$marca){
                            ?>
                                            <option selected="" value="<?php echo $fila[1]?>">
                                                <?php echo $fila[1]?>
                                            </option>
                                <?php }else{ ?>
                                            <option value="<?php echo $fila[1]?>">
                                                <?php echo $fila[1]?>
                                            </option>
                                    <?php }}} ?>
                        </select>
                    </div>
                    <div class="item form-group" id="divGar" hidden>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Garantia* </label>
                        <select style="width:220px" class="form-control SGarantia" name="garantias" id="garantias">;
                            <option value="" selected="">Seleccione</option>;
                               <?php 
                                    
                                    include '../../Config/conexion.php';
                                    pg_query("BEGIN");
                                    $resultado=pg_query($conexion, "select * from garantia");
                                    $nue=pg_num_rows($resultado);
                                        if($nue>0){
                                        while ($fila = pg_fetch_array($resultado)) {
                                        if($fila[0]==$garantia){
                                    ?>
                                        <option selected="" value="<?php echo $fila[2]?>"><?php echo $fila[2]?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $fila[2]?>"><?php echo $fila[2]?></option>
                                            <?php }}}
                                                           
                                ?>
                        </select>;
                    </div>

                    <div class="item form-group" id="divEstado" hidden> 
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Estado *</label>
                      <div class="col-md-10 col-sm-4 col-xs-12 form-group has-feedback">
                        <div class="col-md-4 col-xs-12 col-sm-4">
                          <label>Activo</label>  <input type="radio" class="flat" name="estad" id="estActi" value="t"/>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                          <label>De Baja</label>  <input type="radio" class="flat" name="estad" id="estDes" value="f" />
                        </div>
                      </div>
                      <br><br>
                    </div>

                    <div class="item form-group" id="divTip" hidden> 
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Tipo *</label>
                      <div class="col-md-10 col-sm-4 col-xs-12 form-group has-feedback">
                        <div class="col-md-4 col-xs-12 col-sm-4">
                          <label>Lente</label>  <input type="radio" class="flat" name="tipos" id="tipoLen" value="Lente"/>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                          <label>Accesorio</label>  <input type="radio" class="flat" name="tipos" id="tipoAc" value="Accesorio" />
                        </div>
                      </div>
                      <br><br>
                    </div>
                    
                    
                  </div>
                  
                  <div class="modal-footer">
                    
                      <button class='btn btn-info btn-icon left-icon pull-left' id='impri' data-dismiss='modal' onclick='RepEdad()' > <i class='fa fa-print'></i> Imprimir</button>
                    
                    
                    <button type="button" class="btn btn-round btn-warning pull-right" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal -->
        
        <?php include 'Modal/nuevaMarca.php';?>
        <footer>
            <?php
              include "../../ComponentesForm/footer.php";
             ?>
        </footer>
        </div>
        <!--Aqui va fin el contenido-->
        </div>
        </div>
        <?php
          include "../../ComponentesForm/scripts.php";
        ?>
            <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.STipo').select2()
                    $('.SMarca').select2()
                    $('.SProveedor').select2()
                    $('.SGarantia').select2()
                    $('tblBajaProducto').DataTable();
                })
            </script>
    </body>

    </html>
    <?php
if(isset($_REQUEST["bandera"])){
$baccion=$_REQUEST["baccion"];
$bandera=$_REQUEST["bandera"];
$modelo=$_REQUEST["modelo"];
$nombre=($_REQUEST["nombre"]);
$color=($_REQUEST["color"]);
$precioV=($_REQUEST["precioVenta"]);
$precioC=($_REQUEST["precioCompra"]);
$proveedor=$_REQUEST["proveedor"];
$marca=($_REQUEST["marca"]);
$garantia=($_REQUEST["garantia"]);
$tipo=$_REQUEST["tipo"];
if($tipo==="1")
    $tipoc="Lente";
else
    $tipoc="Accesorio";

include("../../Config/conexion.php");
if($bandera=="add"){
    //mensajeInformacion('Esta','Entre  '.$modelo,'info');
    pg_query("BEGIN");
    if($tipo=="1"){
          $result=pg_query($conexion,"insert into productos(cmodelo, cnombre, estock, rprecio_compra, ccolor, rprecio_venta,
            eid_garantia, eid_proveedor, eid_marca, bestado, ctipo) values('$modelo','$nombre','0','$precioC','$color','$precioV','$garantia','$proveedor','$marca','1','$tipoc')");  
    }else if($tipo==="2"){
        $result=pg_query($conexion,"insert into productos(cmodelo, cnombre, estock, rprecio_compra, ccolor, rprecio_venta,
            eid_garantia, eid_proveedor, eid_marca, bestado, ctipo) values('$nombre','$nombre','0','$precioC','$color','$precioV','1','$proveedor','$marca','1','$tipoc')"); 
    }
    if(!$result){
                    pg_query("rollback");
                    mensajeInformacion('Error','Datos no almacenados','error');
                    }else{
                        pg_query("commit");
                        mensajeInformacion('Informacion','Datos almacenados','info');
                    }

  }
if($bandera=='modificar'){
    pg_query("BEGIN");
          if($tipoR=="Lente"){
              $result=pg_query($conexion,"UPDATE productos SET rprecio_compra='$precioC', cnombre='$nombre', ccolor='$color', rprecio_venta='$precioV', eid_garantia='$garantia', eid_proveedor='$proveedor',eid_marca='$marca' where cmodelo='$baccion'");
          }else if($tipoR=="Accesorio"){
              $result=pg_query($conexion,"UPDATE productos SET rprecio_compra='$precioC', ccolor='$color', rprecio_venta='$precioV', eid_proveedor='$proveedor',eid_marca='$marca' where cmodelo='$baccion'");
          }    
            if(!$result){
				pg_query("rollback");   
				mensajeInformacion('Error','Datos no almacenados','error');
				}else{
					pg_query("commit");
                    mensajeInformacion('Informacion','Datos almacenados','info');
				}
}
    if($bandera=="Dbajar" || $bandera=='Dactivar'){
    if($bandera=="Dbajar"){
        $estado='0';
    }
    else
        $estado='1';
     pg_query("BEGIN");
      $result=pg_query($conexion,"update productos set bestado='$estado' where cmodelo='$baccion'");
      if(!$result){
				pg_query("rollback");
				mensajeInformacion('Error','Datos no almacenados','error');
				}else{
					pg_query("commit");
                    mensajeInformacion('Informacion','Datos almacenados','info');
				}
}
if($bandera=="cancelar"){
                    echo "<script type='text/javascript'>";
                    echo "document.location.href='producto.php';";
                    echo "</script>";
}

}
function mensajeInformacion($titulo,$mensaje,$tipo){
            echo "<script language='javascript'>";
            echo "alertaSweet('".$titulo."','".$mensaje."', '".$tipo."','avanzar');";
            echo "document.getElementById('bandera').value='';";
            echo "document.getElementById('baccion').value='';";
            echo "</script>";

}
?>
