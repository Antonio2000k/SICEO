 <table id="datatable-fixed-header" class="table table-striped table-bordered tablaDetallePago">
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
                          include("../../../Config/conexion.php");
                          $query_s= pg_query($conexion, "SELECT c.eid_compra,c.cid_empleado,c.ffecha_compra,c.rtotal_compra,c.ecuotas,c.eperiodo,c.rabono,empleados.cnombre,empleados.capellido FROM pbcompra as c INNER JOIN paempleados as empleados  ON c.cid_empleado = empleados.cid_empleado WHERE c.eperiodo > 0 ORDER BY c.ffecha_compra asc");
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