<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>SICEO | Compras </title>
    <?php include "../../ComponentesForm/estilos.php";  ?>
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
                                <form class="form-horizontal form-label-left" name="formCompra" id="formCompra" method="get">
                                        <div class="item form-group">
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Proveedor* </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control SProveedor" name="proveedor" id="proveedor" onchange="actualiza('cambioModelo')">
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
                                            <option selected="" value="<?php echo $fila[0]?>"><?php echo $fila[1].' '.$fila[2]?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $fila[0]?>"><?php echo $fila[1].' '.$fila[2]?></option>
                                                <?php }}} ?>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Modelo* </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control SProducto" name="modelo" id="modelo" onchange="actualiza('cambioNombre')">
                                            <option value="0">Seleccione</option>
                                            <?php /*
                                           include '../../Config/conexion.php';
                                            pg_query("BEGIN");
                                            $resultado=pg_query($conexion, "select * from productos");
                                            $nue=pg_num_rows($resultado);
                                                if($nue>0){
                                                while ($fila = pg_fetch_array($resultado)) {
                                                if($fila[0]==$proveedor){
                                            ?>
                                            <option selected="" value="<?php echo $fila[0]?>"><?php echo $fila[1].' '.$fila[2]?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $fila[0]?>"><?php echo $fila[1].' '.$fila[2]?></option>
                                                <?php }}}  */?>
                                            </select>
                                            </div>
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
                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha*</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div class="control-group">
                                                    <div class="controls" style="padding-left: 15px;">
                                                        <div class="xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal1" aria-describedby="inputSuccess2Status" style="padding-left: 55px;">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" style="padding-left:0px; margin-left: -10px;"></span>
                                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="item form-group" align="center">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <button class="btn btn-primary source" onclick="verificar();"><i class="fa fa-plus"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </form>
                                <div class="row">
                                <div class="item form-group">
                                <div class="row">
                                    <div class="x_content" id="mostrar">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Modelo</th>
                                                    <th>Cantidad</th>
                                                    <th>Nombre</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                    <button class="btn btn-success btn-icon left-icon"> <i class="fa fa-save"></i> <span>Guardar</span></button>
                                    <button class="btn btn-danger  btn-icon left-icon"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
                        <div class="x_title"><h2>COMPRAS </h2><div class="clearfix"></div></div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" id="tblBajaProducto">
                                <thead>
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Nombre</th>
                                        <th>Color</th>
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
                                    <td><?php echo $fila[4]; ?></td>
                                    <td>$<?php echo $fila[5]; ?></td>
                                    <?php
                                  if($fila[2]<=3){
                                      echo '<td class="p-3 mb-2 bg-danger text-white">'.$fila[2].'</td>';
                                  }else{
                                     echo '<td>'.$fila[2].'</td>';
                                  }
                                ?>
                            <td class="text-center">
                                <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','alta','Esta seguro de querer dar de alta al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Alta!')"> <i class="fa fa-ban"></i></button>
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
    <!--Aqui va fin el contenido-->
    <footer><?php        include "../../ComponentesForm/footer.php";      ?> </footer>
</div>        
</div>
</div>
    <?php include "../../ComponentesForm/scripts.php";    ?>
     <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.SProveedor').select2()
                    $('.SProducto').select2()
                })
            </script>
</body>
</html>
