                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        include '../../../Config/conexion.php';
                        $cambio=$_REQUEST["idd"];
                        $tipo=$_REQUEST["tipo"];
                        if($tipo==="credito"){
                             pg_query("BEGIN");
                            $resultado=pg_query($conexion, "SELECT compra.ecuotas, compra.eperiodo, compra.rabono,compra.rtotal_compra FROM compra  where compra.eid_compra=$cambio");
                            $nue=pg_num_rows($resultado);
                            if($nue>0){
                            while ($fila = pg_fetch_array($resultado)) {
                                echo '<div class="text-center infoCompleto"><strong><h5><i class="fa fa-info-circle"></i> Detalle Credito</strong></h5></div>';
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12">Cuotas: </label>
                                <label class="control-label col-md-7 col-sm-7 col-xs-12"><?php echo $fila[0];?></label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12">Periodo: </label>
                                <label class="control-label col-md-7 col-sm-7 col-xs-12"><?php echo $fila[1];?> (dias)</label>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12">Abonado: </label>
                                <label class="control-label col-md-7 col-sm-7 col-xs-12">$ <?php echo $fila[2];?></label>
                                </div> 
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback text-center">
                                <label class="control-label col-md-7 col-sm-7 col-xs-12 text-right">Saldo pendiente: </label>
                                <label class="control-label col-md-5 col-sm-5 col-xs-12 text-left">$ <?php echo $fila[3]-$fila[2];?></label>
                                </div>
                                <?php
                                echo '<br><br><br><div class="text-center infoCompleto"><strong><h5><i class="fa fa-info-circle"></i> Detalle Compra</strong></h5></div>';
                                }
                            }
                        }
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT detalle_compra.ecantidad, productos.rprecio_compra, productos.cnombre, detalle_compra.rprecio_compradetalle FROM
                        compra INNER JOIN detalle_compra ON detalle_compra.id_compra = compra.eid_compra INNER JOIN productos ON detalle_compra.id_producto = productos.cmodelo where compra.eid_compra=$cambio");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>'.$fila[2].'</td>';
                                echo '<td>$'.$fila[3].'</td>';
                                echo '<td>'.$fila[0].'</td>';
                                echo '<td>$'.$fila[0]*$fila[3].'</td>';
                                echo '</tr>';
                            }
                        }
                      ?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
