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
include "../../ComponentesForm/menu2.php";
?>
</div>
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

<li class="active" role="presentation"> <a aria-expanded="false" data-toggle="tab" href="#tab_content2" name="tab2" id="profile-tab" role="tab">
LISTA DE PRODUCTOS
</a> </li>

<li class="" role="presentation"> <a aria-expanded="false"  href="stock.php" id="profile-tab">
STOCK
</a> </li>
</ul>
<div class="tab-content" id="myTabContent">

<div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>PRODUCTOS </h2>
<div class="form-group" style="float: right;">
<div class="btn-group" >
<button float-right class="btn btn-info btn-icon left-icon "  data-toggle="modal" data-target="#edad">
<i class="fa fa-th-list"></i>
<span style="color: white">Reportes</span>
</button>
</div>    
</div>
<div class="clearfix"></div>
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
$query_s= pg_query($conexion, "select * from pbproductos where bestado='t' order by cmodelo");
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
<button class="btn btn-info btn-icon left-icon " id="e2" onclick="RepPro('activo');"> <i class="fa fa-print"></i> Activos</button> 
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
$resultado=pg_query($conexion, "select * from paproveedor");
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
$resultado=pg_query($conexion, "select * from pamarca");
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
$resultado=pg_query($conexion, "select * from pagarantia");
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
