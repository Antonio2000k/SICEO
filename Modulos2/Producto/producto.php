<?php session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

if($_SESSION['autenticado']!="yeah" || $t!=2  ){
  header("Location: ../../index.php");
  exit();
  }
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from pbproductos where cmodelo='$iddatos'");
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
            <script src="js/producto.js"></script>
    </head>

    <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="clearfix"> </div>
                        <?php
                        include "../../ComponentesForm/menu2.php";
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
         <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                        <li class="active" role="presentation"> <a aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab">
                            REGISTRAR PRODUCTO
                        </a> </li>
                        <li class="" role="presentation"> <a aria-expanded="false"  href="listaProducto.php" id="profile-tab">
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
                        <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
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
                                            echo '<select class="form-control STipo" name="tipo" id="tipo" onchange="cambioTipoModelo();" >';
                                            echo '<option value="0">Seleccione</option>';                                         
                                           if($tipoR==="Lente"){
                                                echo '<option value="1" selected="">Lente</option>';
                                                echo '<option value="2" >Accesorio</option>';
                                            }else if($tipoR==="Accesorio")
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
                                    $resultado=pg_query($conexion, "select * from paproveedor where bestado='t'");
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
                                    $resultado=pg_query($conexion, "select * from pamarca");
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
                                    $resultado=pg_query($conexion, "select * from pagarantia");
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
          $result=pg_query($conexion,"insert into pbproductos(cmodelo, cnombre, estock, rprecio_compra, ccolor, rprecio_venta,
            eid_garantia, eid_proveedor, eid_marca, bestado, ctipo) values('$modelo','$nombre','0','$precioC','$color','$precioV','$garantia','$proveedor','$marca','1','$tipoc')");  
    }else if($tipo==="2"){
        $result=pg_query($conexion,"insert into pbproductos(cmodelo, cnombre, estock, rprecio_compra, ccolor, rprecio_venta,
            eid_garantia, eid_proveedor, eid_marca, bestado, ctipo) values('$nombre','$nombre','0','$precioC','$color','$precioV','1','$proveedor','$marca','1','$tipoc')"); 
    }
    if(!$result){
                    pg_query("rollback");
                    mensajeInformacion('Error','Datos no almacenados','error');
                    }else{
                         
                            $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                            $accion = 'El usuario ' . $nomusAccess. ' Registro un nuevo producto';
                            while ($filas = pg_fetch_array($query_ide)) {
                                $ida=$filas[0];                                 
                                $ida++ ;
                            } 
                            ini_set('date.timezone', 'America/El_Salvador');
                            $fechaA= date("d/m/Y");
                            $hora = date("Y/m/d ") . date("h:i:s a");
                            $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$modelo')");

                            if(!$consult ){
                                    pg_query("rollback");
                                    echo "<script type='text/javascript'>";
                                    echo pg_result_error($conexion);
                                    echo "alert('Error');";
                                    echo "</script>";
                            }else{
                                pg_query("commit");
                                mensajeInformacion('Informacion','Datos almacenados','info');
                            }
                        
                    }

  }
if($bandera=='modificar'){
    pg_query("BEGIN");
          if($tipoR=="Lente"){
              $result=pg_query($conexion,"UPDATE pbproductos SET rprecio_compra='$precioC', cnombre='$nombre', ccolor='$color', rprecio_venta='$precioV', eid_garantia='$garantia', eid_proveedor='$proveedor',eid_marca='$marca' where cmodelo='$baccion'");
          }else if($tipoR=="Accesorio"){
              $result=pg_query($conexion,"UPDATE pbproductos SET rprecio_compra='$precioC', ccolor='$color', rprecio_venta='$precioV', eid_proveedor='$proveedor',eid_marca='$marca' where cmodelo='$baccion'");
          }    
            if(!$result){
				pg_query("rollback");   
				mensajeInformacion('Error','Datos no almacenados','error');
				}else{
                     
                            $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                            $accion = 'El usuario ' . $nomusAccess. ' modificó un producto';
                            while ($filas = pg_fetch_array($query_ide)) {
                                $ida=$filas[0];                                 
                                $ida++ ;
                            } 
                            ini_set('date.timezone', 'America/El_Salvador');
                            $fechaA= date("d/m/Y");
                            $hora = date("Y/m/d ") . date("h:i:s a");
                            $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$baccion')");

                            if(!$consult ){
                                    pg_query("rollback");
                                    echo "<script type='text/javascript'>";
                                    echo pg_result_error($conexion);
                                    echo "alert('Error');";
                                    echo "</script>";
                            }else{
                                pg_query("commit");
                                mensajeInformacion('Informacion','Datos almacenados','info');
                            }
					
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
