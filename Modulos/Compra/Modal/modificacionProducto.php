<!-- Modal -->
<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4> </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body"> 
    <form class="form-horizontal form-label-left" id="formProductoM" name="formProductoM" method="post">
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Tipo de Producto* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <select class="form-control STipo" name="tipo" id="tipo" onchange="cambioTipoModelo();" style="width: 100%">
                        <option value="0">Seleccione</option>
                        <option value="1">Lente</option>
                        <option value="2">Accesorio</option>
                    </select>   
                </div>
         </div>
        <div class="item form-group col-md-12 col-sm-12 col-xs-12" id="divModelo">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12"> Modelo* </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control has-feedback-left" id="modeloP" class="form-control col-md-7 col-xs-12" name="modelo" placeholder="Ingrese el modelo" autocomplete="off" onblur="verificarCodigo('codigo');">
                        <span class="fa fa-cog form-control-feedback left" aria-hidden="true"></span> </div>                      
        </div>
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Proveedor* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <select class="form-control SProveedorP" name="proveedorP" id="proveedorP" style="width: 100%">
                        <option value="0">Seleccione un proveedor</option>
                        <?php
                   include '../../../Config/conexion.php';
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
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Nombre* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">                                    
                        <input type="text" class="form-control has-feedback-left" id="nombreP" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" onblur="verificarCodigo('nombre')"> <span class="fa fa-toggle-right form-control-feedback left" aria-hidden="true"></span>                       
                </div>
        </div>    
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Marca* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <select class="form-control SMarca" name="marca" id="marca" style="width: 100%">
                        <option value="0">Seleccione</option>
                        <?php
                           include '../../../Config/conexion.php';
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
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Precio de Compra* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control has-feedback-left" id="precioCompra" class="form-control col-md-7 col-xs-12" name="precioCompra" placeholder="Precio de compra" autocomplete="off" onkeypress="return soloNumeros(event)"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
        </div>
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Garantia* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                   <?php 
                        if($tipoR==="Accesorio"){
                            echo '<select class="form-control SGarantia" name="garantia" id="garantia" disabled style="width: 100%">';
                            echo '<option value="0" selected="">Seleccione</option>';
                        }else{
                            echo '<select class="form-control SGarantia" name="garantia" id="garantia" style="width: 100%">';
                            echo '<option value="0" selected="">Seleccione</option>';
                            include '../../../Config/conexion.php';
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
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Color* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control has-feedback-left" id="color" class="form-control col-md-7 col-xs-12" name="color" placeholder="Ingrese el color" autocomplete="off" onkeypress="return soloLetras(event)"> <span class="fa fa-tint form-control-feedback left" aria-hidden="true"></span> </div>
        </div>
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12"> Precio de Venta* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control has-feedback-left" id="precioVenta" class="form-control col-md-7 col-xs-12" name="precioVenta" placeholder="Precio de venta" autocomplete="off" onkeypress="return soloNumeros(event)"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
        </div>

            <div class="row text-center">
                <button type="button" class="btn btn-primary" id="guardar_datos" onclick="verificarP('guardar');"><i class="fa fa-save"></i><span>  Guardar</span></button>
            </div>

        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-close"></i><span>  Cerrar</span></button>
      </div>
    </div>
  </div>
</div>