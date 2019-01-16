<?php include '../../Config/conexion.php'; ?>

<table id="datatable-fixed-header" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Cod</th>
      <th>Fecha</th>
      <th>Cliente</th>
      <th>Total de la venta</th>
      <th>Saldo pendiente</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query_s= pg_query($conexion, "SELECT * FROM pbordenc order by eid_compra asc");
    while ($fila=pg_fetch_array($query_s)) {
    ?>
    <tr>
      <?php $newDate = date("d/m/Y", strtotime($fila[1])); ?>
      <td><?php echo $fila[0]; ?></td>
      <td><?php echo $newDate ?></td>
      <td>
        <?php
          $query_cliente=pg_query($conexion, "SELECT * FROM paclientes WHERE eid_cliente='$fila[4]'");

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
        $query=pg_query($conexion,"SELECT * FROM pcnotab WHERE eid_ordenc=$fila[0]");

        while($result=pg_fetch_array($query)) {
          $abonado+=$result[1];
        }

        if($query) {
          $restante=round($fila[2], 2)-round($abonado, 2);
        }
      ?>
      <td>$<?php echo round($restante, 2); ?></td>
      <td class="text-center">
        <?php
        if(round($restante, 2)==0) {
          ?>
          <button class="btn btn-danger btn-icon left-icon" onclick="abonarCuenta(<?php echo round($restante, 2) ?>, <?php echo $fila[0] ?>)"> <i class="fa fa-money"></i> <span></span></button>
          <?php
        }
        else {
          ?>
          <button class="btn btn-success btn-icon left-icon" onclick="abonarCuenta(<?php echo round($restante, 2) ?>, <?php echo $fila[0] ?>)"> <i class="fa fa-money"></i> <span></span></button>
          <?php
        }
        ?>
        <button class="btn btn-warning btn-icon left-icon" onclick="reporteAbono(<?php echo $fila[0]; ?>)"> <i class="fa fa-book"></i> <span></span></button>
      <?php } ?>
      </td>
    </tr>
  </tbody>
</table>

<?php include 'Modals/listaVentasModals.php'; ?>
