                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tablaDetalle" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Abono</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        include '../../../Config/conexion.php';
                        $mes=$_REQUEST["mes"];
                        $year=$_REQUEST["year"];
                        $tipo=$_REQUEST["tipo"];
                          if($mes<10)
                              $mes='0'.$mes;
                        if($tipo==="egreso"){
                             pg_query("BEGIN");
                            $consulta="select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'";
                            $resultado=pg_query($conexion,$consulta);
                            $nue=pg_num_rows($resultado);
                            if($nue>0){
                            while ($fila = pg_fetch_array($resultado)) {
                                ?>
                                <div align='center'>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label class="control-label">Egresos Netos: </label>
                                    <label class="control-label">    $<?php echo $fila[0];?></label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label class="control-label">Egresos Totales: </label>
                                    <label class="control-label">    $<?php echo $fila[1];?></label>
                                    </div>
                                </div>
                                <?php
                                echo '<br><br><div class="text-center infoCompleto"><strong><h5><i class="fa fa-info-circle"></i> Detalle </strong></h5></div><br>';
                                }
                            }
                        }
                        pg_query("BEGIN");
                        $consulta="select c.rabono, c.ffecha_compra, rtotal_compra from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."' order by c.ffecha_compra";
                        $resultado=pg_query($conexion,$consulta);
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>'.$fila[0].'</td>';
                                echo '<td>$'.$fila[2].'</td>';
                                echo '<td>'.$fila[1].'</td>';
                                echo '</tr>';
                            }
                        }
                      ?>
                        </tbody>
                    </table>
