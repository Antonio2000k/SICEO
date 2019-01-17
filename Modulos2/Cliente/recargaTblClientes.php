<?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT clientes.eid_cliente, clientes.cnombre,
                                              clientes.capellido, clientes.eedad, clientes.csexo, clientes.ctelefonof,
                                              clientes.cdireccion, ex.cid_expediente
                                              FROM clientes
                                              INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente
                                               order by clientes.cnombre");
                                        
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[7]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>
                                      <td> <?php echo $fila[5]; ?> </td>
                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon"  onClick="Expediente('<?php echo $fila[0]; ?>')"><i class="fa fa-th-list"></i> <span>Ver</span></button> 

                                        <button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      </td>
                                    </tr>
                                    <?php
                                      }
                                        ?>