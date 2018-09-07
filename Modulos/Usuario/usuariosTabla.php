<?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT * FROM usuarios order by cid_usuario asc");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                      <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[4]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>

                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon" onclick="location='registrarUsuarios.php?id=<?php echo $fila[0]; ?>'"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      <?php } ?>
                                      </td>
                                    </tr>