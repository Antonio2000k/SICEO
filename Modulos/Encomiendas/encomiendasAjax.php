<?php
include '../../Config/conexion.php';

function obtenerValorSQL($consulta, $opcion, $id) {
  if($consulta != null) {
    while($fila_new = pg_fetch_array($consulta)) {

      switch ($opcion) {
        case "cliente":
          return "$fila_new[1]"." "."$fila_new[2]";
          break;

        case "id":
          return $fila_new[0];
          break;

        case "modelo":
          return "$fila_new[0]"." (".$fila_new[1].")";
          break;

        default:
        return "";
          break;
      }
    }
  }
}
?>


<div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
  <div class="x_content">
    <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
       <h3 align="center" style=" color: white">Datos de Encomienda</h3>
       <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" id="frmEncomiendas" name="frmEncomiendas" method="post">
        <div class="row">
          <!--Codigos-->
          <input type="hidden" id="bandera" name="bandera" value="">
          <input type="hidden" id="idCheckbox" name="idCheckbox" value="">
          <input type="hidden" id="id_fila" value="">
          <input type="hidden" id="idEncomendero" name="idEncomendero" value="">
          <!--fin codigos-->

          <div class="item form-group">
            <label class="control-label col-sm-2 col-md-2 col-xs-12">Encomendero (*) </label>
            <div class="col-sm-7 col-md-7 col-xs-12">
              <input type="text" class="form-control text-center" id="nombre_encomendero" style="font-size:medium" list="listaEncomenderos" oninput="obtenerDatosEncomendero(this.value);" placeholder="Nombre del encomendero" autocomplete="off">
              <datalist id="listaEncomenderos">
                <?php
                $consulta = pg_query($conexion, "SELECT * FROM paencomendero WHERE bestado = true");
                $cont = pg_num_rows($consulta);

                while ($fila = pg_fetch_array($consulta)) {
                  ?>
                  <option value="<?php echo $fila[1]." ".$fila[2] ?>"><?php echo $fila[1]." ".$fila[2] ?></option>
                  <?php
                }

                if($cont==0) {
                  echo " <option value=''>No hay registros</option>";
                }
                ?>
              </datalist>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

            </div>

            <a href="#registrar" onclick="modalEncomendero();" class="col-sm-3 col-md-3 col-xs-12"><h4><b>¿Desea registrar alguno?</b></h4></a>
          </div>

          <div class="item form-group">
            <label class="control-label col-sm-2 col-md-2 col-xs-12">Detalles (*) </label>
            <div class="col-sm-10 col-md-10 col-xs-12">
              <textarea class="form-control" id="detalle" name="detalle" placeholder="El vehiculo es de color verde, el numero del motorista es 7777-7777, seran llevado a tal laboratorio, etc."></textarea>
            </div>
          </div>

          <!--Inicio boton-->
          <br>
          <div class="form-group col-sm-12 col-md-12 col-xs-12">
            <div class="text-center">
              <h4 class="label label-default pull-center" id="total_pago"><b>Resultado de examenes</b></h4>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-round btn-primary" onclick="mostrarListado()">Ver encomiendas</button>
            </div>
          </div>
          <br>
          <!--Fin boton-->

          <!--Aqui va la tabla de la encomienda-->
          <div class="item form-group">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10%">Seleccionar</th>
                  <th width="40%">Nombre del Cliente</th>
                  <th width="25%">Modelo de los lentes</th>
                  <th width="15%" colspan="2">Acciones</th>
                </tr>
              </thead>
              <tbody id="recargarListaPrincipal">
                <?php
                $cliente = "";
                $modelo = "";
                $cont = 1;

                $result = pg_query($conexion, "SELECT * FROM pddetalle_examen WHERE bestado = false ");

                //Es para todos los examenes.
                while($fila = pg_fetch_array($result)) {
                    $consulta = pg_query($conexion, "SELECT * FROM paclientes WHERE eid_cliente='$fila[1]'");
                    $cliente = obtenerValorSQL($consulta, "cliente", "");

                    $consulta = pg_query($conexion, "SELECT * FROM pbproductos WHERE cmodelo='$fila[3]'");
                    $modelo = obtenerValorSQL($consulta, "modelo", "");

                    $result_examen = pg_query($conexion, "SELECT * FROM pcexamen WHERE eid_examen=$fila[2]");
                    $examen;
                    $id;
                    while ($fila_examen = pg_fetch_array($result_examen)) {
                      $id = $fila_examen[0];
                      $examen = $fila_examen[9];
                    }
                  ?>

                  <tr>
                    <!--Para las tablas dinamicas.-->
                    <input type="hidden" name="ids_lentes_final[]">
                    <input type="hidden" name="fila_lentes_final[]">
                    <input type="hidden" name="material_lentes_final[]">
                    <input type="hidden" name="tipo_lentes_final[]">
                    <input type="hidden" name="modelo_lentes_aux[]" value="<?php echo $fila[3] ?>">
                    <input type="hidden" name="cliente_lentes_aux[]" value="<?php echo $fila[1] ?>">
                    <input type="hidden" name="modelo_lentes_final[]">
                    <input type="hidden" name="cliente_lentes_final[]">

                    <td class="text-center">
                      <!-- <div class="checkbox">
                        <label>
                         <input type="checkbox" id="<?php echo "examen".$cont ?>">
                         <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                         </label>
                      </div> -->

                      <input type="checkbox" class="form-check-input" onclick="checkado(this, <?php echo $fila[0] ?>);" id="<?php echo "examen".$cont ?>">
                    </td>

                    <td><?php echo $cliente ?></td>

                    <td><?php echo $modelo ?></td>
                    <td class="text-center">
                      <button type="button" class="btn btn-warning" onclick="verExamen('<?php echo $examen; ?>', '<?php echo $id; ?>')"><i class="fa fa-book"></i></button>
                      <button id="<?php echo "especificaciones".$cont ?>" type="button" class="btn btn-info" onclick="especificaciones(this);" disabled><i class="fa fa-th-list"></i></button>
                    </td>
                  </tr>
                  <?php
                  $cont++;
                }
                ?>
              </tbody>
            </table>
          </div>

            <div class="item form-group">
              <center>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="registrarEncomienda();"> <i  class="fa fa-save"></i> <span >Guardar</span></button>
                    <button type="reset" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px "> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                  </div>
                </div>
              </center>
            </div>

          <!--Aqui termina la tabla-->
        </div>
        <!--Inicio modal-->
        <div class="modal fade" id="myLentes" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detalle del aro</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="hayCambioLentes" value="">
                <input type="hidden" id="idCambioLentes" value="">

                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div style="text-align: center">
                      <div class="form-group" style="text-align: center">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th colspan="2" style="text-align: center">Material</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="material_lente" name="material_lente" type="radio" value="CR 39" onclick="activarOtro(1, 'no')">
                              </td>
                              <td>CR 39</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="material_lente" name="material_lente" type="radio" value="PLOY" onclick="activarOtro(1, 'no')">
                              </td>
                              <td>PLOY</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="material_lente" name="material_lente" type="radio" value="VIDRIO" onclick="activarOtro(1, 'no')">
                              </td>
                              <td>VIDRIO</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="material_lente" name="material_lente" type="radio" value="HI INDEX" onclick="activarOtro(1, 'no')">
                              </td>
                              <td>HI INDEX</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="material_lente" name="material_lente" type="radio" value="HI LITE" onclick="activarOtro(1, 'no')">
                              </td>
                              <td>HI LITE</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="material_lente" name="material_lente" type="radio" value="otro" onclick="activarOtro(1, 'si')">
                              </td>
                              <td>
                                <input type="text" class="form-control" id="otro_material_lente" class="form-control col-md-9 col-xs-12" placeholder="Otro (especifique)" disabled>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div style="text-align: center">
                      <div class="form-group" style="text-align: center">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th colspan="2" style="text-align: center">Tipo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="VISION SENCILLA" onclick="activarOtro(2, 'no')">
                              </td>
                              <td>VISION SENCILLA</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="FLAP TOP" onclick="activarOtro(2, 'no')">
                              </td>
                              <td>FLAP TOP</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="PROGRESIVO" onclick="activarOtro(2, 'no')">
                              </td>
                              <td>PROGRESIVO</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="KRIP-TOP" onclick="activarOtro(2, 'no')">
                              </td>
                              <td>KRIP-TOP</td>
                            </tr>
                            <tr>
                              <td class="text-center">
                                <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="otro" onclick="activarOtro(2, 'si')">
                              </td>
                              <td>
                                <input type="text" class="form-control" id="otro_tipo_lente" class="form-control col-md-9 col-xs-12" placeholder="Otro (especifique)" disabled>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <center>
                  <button type="button" class="btn btn-success" onclick="caracteristicasAro(this.form)"><i class="fa fa-save"></i> Guardar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelar()"><i class="fa fa-close"></i> Cancelar</button>
                </center>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="myEspecificaciones" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detalle del aro</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="filaLenteModal">
                <div class="item form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div style="text-align: center">
                      <div class="form-group">
                        <label class="control-label" id="material_lente_carac" style="font-size: medium">Material: ....</label>
                      </div>
                      <div class="form-group">
                        <label class="control-label" id="tipo_lente_carac" style="font-size: medium">Tipo: ....</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <center>
                  <button type="button" class="btn btn-info" data-dismiss="modal" onclick="cambiar()"><i class="fa fa-refresh"></i> Hacer cambios</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelar()"><i class="fa fa-close"></i> Cancelar</button>
                </center>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="myListadoLentes" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Listado de lentes por enviar</h4>
              </div>
              <div class="modal-body">
                <table id="datatable-listado" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Material del lente</th>
                      <th>Tipo de lente</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <center>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                </center>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="myEncomendero" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Registrar Encomendero</h4>
              </div>
              <div class="modal-body">
                <?php include 'encomendero.php'; ?>
              </div>
              <div class="modal-footer">
                <center>
                  <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="registrarEncomendero();"> <i  class="fa fa-save"></i> <span >Guardar</span></button>

                  <button type="button" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="cerrarEncomendero();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                </center>
              </div>
            </div>
          </div>
        </div>

        <!--Fin modal-->
        <!--Aqui finaliza-->
      </form>
    </div>
  </div>
</div>

<!--3 pestaña-->
<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ENCOMIENDAS </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Cod</th>
              <th>Fecha de envio</th>
              <th>Fecha de recibido</th>
              <th>Encomendero</th>
              <th>Estado</th>
              <th>Reporte</th>
            </tr>
          </thead>
          <tbody id="recargarListaEncomiendas">
            <?php
            $consulta = pg_query($conexion, "SELECT * FROM pbencomienda");

            while($fila = pg_fetch_array($consulta)) {
              $consulta_encomendero = pg_query($conexion, "SELECT * FROM paencomendero");
              $encomendero = "";

              while ($fila_encomendero = pg_fetch_array($consulta_encomendero)) {
                $encomendero = $fila_encomendero[1]." ".$fila_encomendero[2];
              }
              ?>
              <tr>
                <td><?php echo $fila[0] ?></td>
                <td><?php echo $fila[1] ?></td>
                <td>
                  <?php
                    if($fila[5]) {
                      echo $fila[5];
                    }
                    else {
                      echo "Sin fecha";
                    }
                  ?>
                </td>
                <td><?php echo $encomendero ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-success"  onclick="verEstado('<?php echo $fila[2] ?>', <?php echo $fila[0] ?>);"><i class="fa fa-info"></i> <span></span></button>
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning" onclick="verReporteEncomienda()"><i class="fa fa-book"></i> <span></span></button>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!--Inicio modal-->
<div class="modal fade" id="myEstado" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Estado de la encomienda</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_estado" value="">
        <div class="item form-group">
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <div class="form-group" style="text-align: center">
              <label style="font-size:medium; color: red" class="control-label col-md-12 col-sm-12 col-xs-12" id="estado_encomienda">PENDIENTE</label>
            </div>
            <div class="form-group" style="text-align: center">
              <br>
              <label style="font-size:medium" class="control-label col-md-6 col-sm-6 col-xs-12">Actualizar estado</label>
              <input type="radio" class="flat col-md-6 col-sm-6 col-xs-12" id="estado" value="true" /> <label>RECIBIDA</label>
            </div>
            <!-- <br>
            <br> -->
          </div>
        </div>
        <!-- <br>
        <br>
        <br>
        <br> -->
      </div>
      <div class="modal-footer">
        <center>
          <button type="button" class="btn btn-success" onclick="cambiarEstado()" id="guardar_estado"><i class="fa fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--Fin modal-->
<!--fin 3 pestaña-->
