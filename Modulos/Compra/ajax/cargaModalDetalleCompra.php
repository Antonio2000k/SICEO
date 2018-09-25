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
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT detalle_compra.ecantidad, productos.rprecio_compra, productos.cnombre FROM
                        compra INNER JOIN detalle_compra ON detalle_compra.id_compra = compra.eid_compra INNER JOIN productos ON detalle_compra.id_producto = productos.cmodelo where compra.eid_compra=$cambio");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>'.$fila[2].'</td>';
                                echo '<td>$'.$fila[1].'</td>';
                                echo '<td>'.$fila[0].'</td>';
                                echo '<td>$'.$fila[0]*$fila[1].'</td>';
                                echo '</tr>';
                            }
                        }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
