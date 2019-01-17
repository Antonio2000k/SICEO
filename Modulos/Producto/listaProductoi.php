<?php session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SICEO | Producto </title>
<?php
include "../../ComponentesForm/estilos.php";
?>
<script src="js/producto.js"></script>
</head>

<body class="nav-md">
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
<h1 align="center">Productos</h1>
</div>
<div align="center">
<p> Bienvenido en esta sección aquí puede registrar productos en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente. En la pestaña de listado de productos se podran observar todos los productos registrados con sus existencias. </p>
</div>
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
<li class="" role="presentation"> <a aria-expanded="false"  href="listaProducto.php" id="profile-tab" >
LISTA DE PRODUCTOS
</a> </li>
<li class="active" role="presentation"> <a aria-expanded="false" data-toggle="tab" href="#tab_content2" name="tab3" id="profile-tab" role="tab">
PRODUCTOS DADOS DE BAJA
</a> </li>
<li class="" role="presentation"> <a aria-expanded="false"  href="stock.php" id="profile-tab">
STOCK
</a> </li>
</ul>
<div class="tab-content" id="myTabContent">
<div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>PRODUCTOS DADOS DE BAJA</h2>
<div class="form-group" style="float: right;">
<div class="btn-group" >
<button float-right class="btn btn-info btn-icon left-icon "  onclick="RepPro('baja')">
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
$query_s= pg_query($conexion, "select * from pbproductos where bestado='f' order by cmodelo ");
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
<button class="btn btn-primary btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','1','Esta seguro de querer dar de alta al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Alta!')"> <i class="fa fa-arrow-circle-up"></i></button>
<button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#exampleModal" onclick="ActualizarModalCombo('<?php echo $fila[0]; ?>','modal','cargala')"> <i class="fa fa-list-ul"></i></button>
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
                               <h5 align="center" style=" color: white">ASISTENCIA PRODUCTOS DADOS DE BAJA</h5>
                               <div class="clearfix"></div>
                             </div>
                         </div>
                         <div class="modal-body modal-md">
                           <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel" >
                             <!-- Wrapper for slides -->
                             <div class="carousel-inner">
                               <div class="item active">
                                 <img class="img-responsive" src="../Ayuda/Productos/producto9.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Se nos muestra una lista con todos los productos dados de baja y podemos dar de alta al producto o ver la informacion de ese producto. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Productos/producto10.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black";> Al pulsar la opcion de ver información se lanza una ventana donde se muestran los datos mas relevantes del producto. </p>
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
<?php include 'Modal/nuevaMarca.php';?>
<footer>
<?php
include "../../ComponentesForm/footer.php";
?>
</footer>
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