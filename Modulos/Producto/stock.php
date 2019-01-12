<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SICEO | Producto </title>
<?php  include "../../ComponentesForm/estilos.php"; ?>
<script src="js/producto.js"></script>
</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
<div class="left_col scroll-view">
<div class="clearfix"> </div>
<?php include "../../ComponentesForm/menu.php"; ?>
</div>
<div class="right_col" role="main">
<div class="">
<div class="col-md-12 col-xs-12">
<div class="x_panel">
<div> <img align="left" src="../../production/images/compra.png" width="120" height="120"><h1 align="center">Productos</h1></div>
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
<li class="" role="presentation"> <a aria-expanded="false"  href="listaProductoi.php" id="profile-tab" >
PRODUCTOS DADOS DE BAJA
</a> </li>
<li class="active" role="presentation"> <a aria-expanded="false" data-toggle="tab" href="#tab_content2" name="tab3" id="profile-tab" role="tab">
STOCK
</a> </li>
</ul>
<div class="tab-content" id="myTabContent">
<div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="profile-tab">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title"><h2>STOCK PRODUCTOS </h2><div class="clearfix"></div></div>

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
<!-- /page content -->
<!--- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header"><center><h3 class="modal-title" id="exampleModalLabel">Informacion producto.</h3> </center></div>
<div class="modal-body" id="cargala"> </div>
<div class="modal-footer">
<button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>
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
