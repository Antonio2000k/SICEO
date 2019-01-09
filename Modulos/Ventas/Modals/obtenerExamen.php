<!-- Modal incia examen-->
<?php
  include '../../../Config/conexion.php';
?>

<thead>
  <tr>
    <th></th>
    <th style="text-align: center">Modelo de lentes</th>
  </tr>
</thead>
<tbody>
  <?php
    $id=$_REQUEST['idCliente'];
    $modelo=$_REQUEST['modelo'];

    $query = pg_query($conexion, "SELECT * FROM detalle_examen WHERE bestado = true AND cmodelo='$modelo' AND cid_cliente='$id'");

    while($fila=pg_fetch_array($query)) {
      ?>
      <tr>
        <td class="text-center">
          <input class="medium" id="id_examen" name="id_examen" type="radio" value="<?php echo $modelo ?>" onclick="obtenerExamenCliente(this);">
        </td>
        <?php
          // $cliente = "";
          //
          // $query_cliente = pg_query($conexion, "SELECT * FROM clientes WHERE eid_cliente = '$fila[1]'");
          // while($fila_cliente=pg_fetch_array($query_cliente)) {
          //   $cliente = $fila_cliente[1]." ".$fila_cliente[2];
          // }
        ?>
        <!--$fila[3]-->
        <td><?php echo $modelo; ?></td>
      </tr>
      <?php
    }
  ?>
</tbody>
<!-- fin del modal examen-->
