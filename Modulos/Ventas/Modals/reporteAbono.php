<?php include '../../../Config/conexion.php'; ?>

<table id="datatable-abono-cuentas" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Fecha de Abono</th>
      <th>Empleado que lo atendio</th>
      <th>Cantidad abonada</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $id=$_REQUEST['id_comprac'];
    $query=pg_query($conexion,"SELECT * FROM notab WHERE eid_ordenc=$id order by eid_nota asc");

    while ($fila=pg_fetch_array($query)) {
    ?>
    <tr>
      <?php $newDate = date("d/m/Y", strtotime($fila[2])); ?>
      <td><?php echo $newDate ?></td>
      <?php
      $query_emp=pg_query($conexion, "SELECT * FROM empleados WHERE cid_empleado='$fila[3]'");
      $empleado;
      while ($result=pg_fetch_array($query_emp)) {
        $empleado=$result[1]." ".$result[2];
      }
      ?>
      <td><?php echo $empleado; ?></td>
      <td>$<?php echo $fila[1]; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
