<?php
include '../../Config/conexion.php';
$query_s= pg_query($conexion, "SELECT * FROM ordenc order by eid_compra asc");
while ($fila=pg_fetch_array($query_s)) {
?>
<tr>
  <?php $newDate = date("d/m/Y", strtotime($fila[1])); ?>
  <td><?php echo $fila[0]; ?></td>
  <td><?php echo $newDate ?></td>
  <td>
    <?php
      $query_cliente=pg_query($conexion, "SELECT * FROM clientes WHERE eid_cliente='$fila[4]'");

      while ($result=pg_fetch_array($query_cliente)) {
        echo $result[1]." ".$result[2];
      }
    ?>
  </td>
  <td>$<?php echo $fila[2]; ?></td>
  <?php
    $restante=0.00;
    $id_abono;
    $abonado=0;
    $query=pg_query($conexion,"SELECT * FROM notab WHERE eid_ordenc=$fila[0]");

    while($result=pg_fetch_array($query)) {
      $abonado+=$result[1];
    }

    if($query) {
      $restante=$fila[2]-$abonado;
    }
  ?>
  <td>$<?php echo $restante; ?></td>
  <td class="text-center">
    <?php
    if($restante==0) {
      ?>
      <button class="btn btn-danger btn-icon left-icon" onclick="abonarCuenta(<?php echo $restante ?>, <?php echo $fila[0] ?>)"> <i class="fa fa-money"></i> <span></span></button>
      <?php
    }
    else {
      ?>
      <button class="btn btn-success btn-icon left-icon" onclick="abonarCuenta(<?php echo $restante ?>, <?php echo $fila[0] ?>)"> <i class="fa fa-money"></i> <span></span></button>
      <?php
    }
    ?>
    <button class="btn btn-warning btn-icon left-icon"> <i class="fa fa-book"></i> <span></span></button>
  <?php } ?>
  </td>
</tr>
