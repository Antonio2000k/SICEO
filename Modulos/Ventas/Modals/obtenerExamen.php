<!-- Modal incia examen-->
<?php
  include '../../../Config/conexion.php';
?>

<thead>
  <tr>
    <th></th>
    <th style="text-align: center">Fecha de realización</th>
    <th>Reporte de examen</th>
  </tr>
</thead>
<tbody>
  <?php
    $id=$_REQUEST['idCliente'];
    $modelo=$_REQUEST['modelo'];

    $query_expediente = pg_query($conexion, "SELECT * FROM pbexpediente2 WHERE eid_cliente='$id'");

    $expediente = "";
    while($fila=pg_fetch_array($query_expediente)) {
      $expediente = $fila[0];
    }

    $query = pg_query($conexion, "SELECT * FROM pcexamen WHERE cid_expediente='$expediente'");
    $id_examen = 0;
    $fecha = "";

    $expediente = 0;

    while ($fila = pg_fetch_array($query)) {
      $id_examen = $fila[0];
      $fecha = date('d-m-Y', strtotime($fila[7]));
      $expediente = $fila[9];
    }

    if($fecha!="" || $fecha!=null) {
      ?>
      <tr>
        <td class="text-center">
          <input class="medium" id="id_examen" name="id_examen" type="radio" value="<?php echo $id_examen; ?>" onclick="obtenerExamenCliente(<?php echo $id_examen; ?>);">
        </td>
        <td class="text-center"><?php echo $fecha; ?></td>
        <td class="text-center"><button type="button" class="btn btn-info btn-icon left-icon" onclick="reporteExamen('<?php echo $expediente ?>', '<?php echo $id_examen ?>')"><i class="fa fa-book"></i> </button></td>
      </tr>
      <?php
    }
  ?>
</tbody>
<!-- fin del modal examen-->
