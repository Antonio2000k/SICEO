<?php
include '../../Config/conexion.php';
$query_s= pg_query($conexion, "SELECT * FROM ordenc order by eid_compra asc");
while ($fila=pg_fetch_array($query_s)) {
?>
<tr>
  <?php $newDate = date("d/m/Y", strtotime($fila[1])); ?>
  <td><?php echo $fila[0]; ?></td>
  <td><?php echo $newDate ?></td>
  <td><?php echo $fila[4]; ?></td>
  <td>$<?php echo $fila[2]; ?></td>
  <td class="text-center">
    <button class="btn btn-info btn-icon left-icon"> <i class="fa fa-info-circle"></i> <span>Ver reporte</span></button>
  <?php } ?>
  </td>
</tr>
