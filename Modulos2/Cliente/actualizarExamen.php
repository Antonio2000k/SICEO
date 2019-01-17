<?php //session_start();
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["iddd"];
    $query_s = pg_query($conexion, "select cl.eid_cliente, cl.cnombre, cl.capellido, cl.eedad, cl.csexo,
                                    cl.ctelefonof, cl.cdireccion from expediente as ex 
                                    INNER JOIN clientes as cl on ex.eid_cliente = cl.eid_cliente
                                    WHERE ex.eid_expediente = '$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidCliente = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Redad =  $fila[3];
        $Rsexo = $fila[4];
        $Rtelefono = $fila[5];
        $Rdireccion = $fila[6];
        $RidExpediente = $fila[7];
    }
}else{
        $RidCliente = null;
        $Rnombre = null;
        $Rapellido =null;
        $Redad =  null;
        $Rsexo = null;
        $Rtelefono = null;
        $Rdireccion = null;
        
}
?>
<?php
                                          include("../../Config/conexion.php");
                                          $query_s2= pg_query($conexion, "SELECT
                                          expediente.eid_expediente,
                                          clientes.cnombre,
                                          clientes.capellido,
                                          examen.ffecha
                                          FROM
                                          expediente
                                          INNER JOIN clientes ON expediente.eid_cliente = clientes.eid_cliente
                                          INNER JOIN examen ON examen.eid_expediente = expediente.eid_expediente
                                          WHERE expediente.eid_expediente = '$iddatos' ");
                                        
                                          while($fila=pg_fetch_array($query_s2)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>
                                      
                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon"  onClick="Expediente('<?php echo $row[0]; ?>')"> <i class="fa fa-th-list"></i> <span>Ver</span></button>
                                      
                                       <!-- <button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>-->

                                      </td>
                                    </tr>
                                    <?php
                                      }
                                        ?>