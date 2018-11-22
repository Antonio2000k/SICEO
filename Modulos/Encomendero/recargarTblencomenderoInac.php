 <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "select * from encomendero where bestado='f' order by cnombre");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>
                                      <td> <?php echo $fila[4]; ?> </td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      <?php if($fila[5]=='t'){ ?>
                                      <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al encomendero '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!')"> <i class="fa fa-folder-open-o"></i> <span>Dar de Baja</span></button>
                                      <?php }if($fila[5]=='f'){?>
                                        <button class="btn btn-success btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','alta','Esta seguro de querer activar al encomendero '+' <?php echo $fila[1]; ?>','Si, Activar!')"> <i class="fa fa-folder-open-o"></i> <span>Activar</span></button> 
                                      <?php }?>
                                      </td>
                                    </tr>
                                    <?php
                                      }
                                        ?>