    <?php
                include '../../../Config/conexion.php';
                $cambio=$_REQUEST['idd'];
   ?>
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
                       <?php
                        $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT productos.rprecio_compra, productos.rprecio_venta FROM productos INNER JOIN proveedor ON productos.eid_proveedor = proveedor.eid_proveedor INNER JOIN marca ON productos.eid_marca = marca.eid_marca where productos.cmodelo='".$cambio."'");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {                               
                                    echo '<tr>';
                                    echo '<th class="text-center"><b>Precio de compra:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><i>$'.$fila[0].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</i><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspPrecio de Venta: </b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$'.$fila[1].'</i></th>';
                                    echo '</tr>';                                    
                            }
                        }
                      ?>                      
                    </table>
                    
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
                </div>
              </div>
