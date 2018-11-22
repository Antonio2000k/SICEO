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
                    <p>Pantalla que muestra el listado de compras realizadas al credito, con la opcion de poder observar el detalle de compra y poder abonarla.</p>
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
                    <a aria-expanded="true"  href="pagoProveedores.php" id="home-tab" >PAGO A PROVEEDORES</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                            
                 <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>COMPRAS AL CREDITO</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="cargaDetallePago">
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Empleado</th>
                                        <th>Fecha de Compra</th>
                                        <th>Total Compra</th>
                                        <th>Saldo Pendiente</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                          include("../../Config/conexion.php");
                          $query_s= pg_query($conexion, "SELECT c.eid_compra,c.cid_empleado,c.ffecha_compra,c.rtotal_compra,c.ecuotas,c.eperiodo,c.rabono,empleados.cnombre,empleados.capellido FROM compra as c INNER JOIN empleados  ON c.cid_empleado = empleados.cid_empleado WHERE c.eperiodo > 0 ORDER BY c.ffecha_compra asc");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                                <tr>
                                    <td><?php echo $fila[0]; ?></td>
                                    <td><?php echo $fila[7].' '.$fila[8]; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($fila[2])); ?></td>
                                    <td>$<?php echo $fila[3]; ?></td>
                                    <td>$<?php echo $fila[3]-$fila[6]; ?></td>
                            <td class="text-center">
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('', '<?php echo $fila[0]; ?>','credito')"> <i class="fa fa-list-ul"></i></button>
                            
                            <?php
                              if($fila[3]===($fila[6])){
                            ?>
                            <button class="btn btn-dark btn-icon left-icon" onclick="pago('si', '<?php echo $fila[0]; ?>')"> <i class="fa fa-money"></i></button>
                            <?php }else{ ?>
                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalPago" onclick="pago('', '<?php echo $fila[0]; ?>')"> <i class="fa fa-money"></i></button>
                            <?php } ?>
                            
                            
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
        
        <!--- Modal Pago Proveedores-->
        <div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h3 class="modal-title" id="exampleModalLabel">Pago Proveedores</h3> </center>
                    </div>
                    <div class="modal-body" id="cargarDetalleCompraPago"> <br><br><br><br><br><br><br><br></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                        
			            <button type="button" class="btn btn-primary" id="actualizar_datos" onclick="guardarAbonoCompra();">Actualizar datos</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        <div id="cambiaso">
            
        </div>
        <!-- fin iziModal-->
        
        <?php include'Modal/modificacionProducto.php'; ?>
    <!--Aqui va fin el contenido-->
    <footer><?php        include "../../ComponentesForm/footer.php";      ?> </footer>
</div>        
</div>
</div>
    <?php include "../../ComponentesForm/scripts.php";    ?>
</body>
</html>