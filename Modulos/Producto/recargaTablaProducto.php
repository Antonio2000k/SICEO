<?php
                          include("../../Config/conexion.php");
                          $query_s= pg_query($conexion, "select * from productos where bestado='t' order by cmodelo");
                          while($fila=pg_fetch_array($query_s)){
                      ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $fila[0]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila[1]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fila[4]; ?>
                                                        </td>
                                                        <td>$
                                                            <?php echo $fila[5]; ?>
                                                        </td>
                                                        <?php
                              if($fila[2]<=3){
                                  echo '<td class="p-3 mb-2 bg-danger text-white">'.$fila[2].'</td>';
                              }else{
                                 echo '<td>'.$fila[2].'</td>';
                              }
                        ?>

                                                        <td class="text-center"><button class="btn btn-info btn-icon left-icon" onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al producto '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!');"> <i class="fa fa-ban"></i></button>
                                                            <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#exampleModal" onclick="ajax_act('', '<?php echo $fila[0]; ?>')"> <i class="fa fa-list-ul"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                      }
                        ?>
