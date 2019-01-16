<?php session_start(); 
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
                <li class="" role="presentation">
                    <a aria-expanded="true"  href="RegistraCompra.php" id="home-tab" >REGISTRAR COMPRA</a>
                </li>
                <li class="active" role="presentation">
                    <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">COMPRAS AL CONTADO</a>
                </li>
                <li class="" role="presentation">
                    <a aria-expanded="true"  href="Compracd.php" id="home-tab" >COMPRAS AL CREDITO</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPRAS AL CONTADO</h2>
                            <div class="form-group" style="float: right;">
                                <div class="btn-group" >
                                    
                                    <button float-right class="btn btn-info btn-icon left-icon "  data-toggle="modal" data-target="#impresion">
                                      <i class="fa fa-th-list"></i>
                                      <span style="color: white">Reporte</span>
                                    </button>
                                </div>   
                            </div>
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
                          $query_s= pg_query($conexion, "SELECT c.eid_compra,c.cid_empleado,c.ffecha_compra,c.rtotal_compra,c.ecuotas,c.eperiodo,c.rabono,empleados.cnombre,empleados.capellido FROM pbcompra as c INNER JOIN paempleados as empleados  ON c.cid_empleado = empleados.cid_empleado WHERE c.eperiodo <= 0 ORDER BY c.ffecha_compra asc");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                                <tr>
                                    <td><?php echo $fila[0]; ?></td>
                                    <td><?php echo $fila[7]; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($fila[2])); ?></td>
                                    <td>$<?php echo $fila[3]; ?></td>
                            <td class="text-center">
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('', '<?php echo $fila[0]; ?>','contado')"> <i class="fa fa-list-ul"></i></button>
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
        
        <!-- Modal Reporte -->
        <div class="modal fade" id="impresion" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Selección de parametros a imprimir</h3> </center>
              </div>
              <div class="modal-body">
                <div class="item form-group" > 
                  <button type="button" class="btn btn-info " id="daterange-btn" style="float: right;">
                    <i class="fa fa-calendar"></i> Rango
                    <i class="fa fa-caret-down"></i>
                  </button>
                  
                  <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha Inicio*</label>
                  <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" name="rango3" id="rango3"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Fecha Inico"  autocomplete="off" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
  
                </div>
                <br><br>
                <div class="item form-group"> 

                  <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha Final*</label>
                  <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" name="rango4" id="rango4" class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Fecha Inico"  autocomplete="off" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                        
                </div>
                              
               <br><br><br>
              </div>
              
                <div class="modal-footer">
                  <button class="btn btn-info btn-icon left-icon pull-left" id="imp" data-dismiss="modal" onclick="RepCompra('contado')"> <i class="fa fa-print"></i> Imprimir</button>
                  
                  <button type="button" class="btn btn-round btn-warning pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
          </div>
        </div>
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