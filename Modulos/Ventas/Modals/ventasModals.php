<!--Modal incia cliente-->
<div class="modal fade" id="myCliente" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registro de cliente</h4>
      </div>
      <div class="modal-body">
        <?php include 'cliente.php'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="registrarCliente()"><i class="fa fa-save"></i> Registrar</button>
        <button type="button" class="btn btn-danger" onclick="verificarCamposCliente()"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--Modal termina cliente-->

<!-- Modal incia descuento-->
<div class="modal fade" id="myDescuento" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ingrese el % de descuento</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="index_descuento" id="index_descuento" value="">
        <div class="item form-group">
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Descuento</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" id="porcentaje_descuento" name="porcentaje_descuento">
                  <option value="Seleccione">Seleccione</option>
                  <?php
                  for ($i=10; $i <= 70; $i+=10) {
                    ?><option value=<?php echo $i?>><?php echo $i."%"?></option><?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal" onclick="aplicarDescuento()"><i class="fa fa-plus"></i> Aplicar</button>
        <button type="button" class="btn btn-danger" onclick="verificarCamposDescuento()" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin del modal descuento-->

<!--Aqui inicia pago-->
  <div class="modal fade" id="myAbono" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingrese el abono para la venta</h4>
        </div>
        <div class="modal-body">
          <div class="item form-group">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="form-group">
                <label style="font-size:medium" class="control-label col-md-4 col-sm-4 col-xs-12">Cantidad abonada</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" class="form-control has-feedback-left" id="abono" name="abono" placeholder="$$$" autocomplete="off" maxlength="10" onkeydown="return validarNumerosVenta(event, '');" oninput="obtenerPrecioRestante(this.value, '');"><span class="fa fa-money form-control-feedback left"></span>
                </div>
              </div>
              <!-- <br>
              <br> -->
              <div class="form-group">
                <label style="font-size:medium;text-align:left" class="control-label col-md-6 col-sm-6 col-xs-12" id="total_abono" name="total_abono">Total $$$</label>
                <label style="font-size:medium;text-align:right" class="control-label col-md-6 col-sm-6 col-xs-12" id="diferencia_abono" name="diferencia_abono">Restante $0.00</label>
              </div>
            </div>
          </div>
          <!-- <br>
          <br>
          <br>
          <br> -->
        </div>
        <div class="modal-footer">
          <center>
            <button type="submit" class="btn btn-success" onclick="registrarVenta('', 'vender')" form="frmVenta"><i class="fa fa-save"></i> Guardar</button>
            <button type="button" class="btn btn-danger" onclick="limpiarAbono()"><i class="fa fa-close"></i> Cancelar</button>
          </center>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myObtenerExamen" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Seleccione su examen</h4>
      </div>
      <div class="modal-body">
        <div class="item form-group">
          <label class="control-label col-sm-12 col-md-12 col-xs-12" id="nombre_cliente_modal" style="text-align:center; font-size: medium">Cliente: </label>
          <input type="hidden" id="fila_id_cliente">
        </div>
        <table id="datatable-examen-cliente" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th></th>
              <th style="text-align: center">Modelo de lentes</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <center>
          <button type="button" class="btn btn-success" onclick="agregarExamen()"><i class="fa fa-plus"></i> Agregar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
        </center>
      </div>
    </div>
  </div>
</div>
