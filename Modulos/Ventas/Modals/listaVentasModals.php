<!--Aqui inicia-->
<!--Modal abono por cuotas-->
<?php include '../../Config/conexion.php'; ?>
<div class="modal fade" id="myAbonoActualizado" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ingrese el abono que hara</h4>
      </div>
      <div class="modal-body">
        <div class="item form-group">
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <div class="form-group">
              <label style="font-size:medium" class="control-label col-md-4 col-sm-4 col-xs-12">Cantidad abonada</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" class="form-control has-feedback-left" id="abono_actualizar" name="abono_actualizar" placeholder="$$$" autocomplete="off" maxlength="5" onkeydown="return validarNumerosVenta(event, '_actualizar');" oninput="obtenerPrecioRestante(this.value, '_actualizar');"><span class="fa fa-money form-control-feedback left"></span>
              </div>
            </div>
            <br>
            <br>
            <div class="form-group">
              <label style="font-size:medium;text-align:left" class="control-label col-md-6 col-sm-6 col-xs-12" id="total_abono_actualizar" name="total_abono_actualizar">Total $$$</label>
              <label style="font-size:medium;text-align:right" class="control-label col-md-6 col-sm-6 col-xs-12" id="diferencia_abono_actualizar" name="diferencia_abono_actualizar">Restante $0.00</label>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
      </div>
      <div class="modal-footer">
        <center>
          <button type="submit" class="btn btn-success" onclick="registrarVenta('_actualizar', 'abonar')" form="frmVenta"><i class="fa fa-save"></i> Guardar</button>
          <button type="reset" class="btn btn-danger" onclick="limpiarAbono()" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
        </center>
      </div>
    </div>
  </div>
</div>

<!--Modal reporte abonos-->
<div class="modal fade" id="myReporteAbonos" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalle de abonos a cuenta</h4>
      </div>
      <div class="modal-body">
        <table id="datatable-abono-cuentas" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Fecha de Abono</th>
              <th>Empleado que lo atendio</th>
              <th>Cantidad abonada</th>
            </tr>
          </thead>
          <tbody>
            <!--Aqui no va nada-->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <center>
          <button type="button" class="btn btn-success" onclick="mostrarOrdenCompra()"><i class="fa fa-print"></i> Imprimir</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--fin modals-->
