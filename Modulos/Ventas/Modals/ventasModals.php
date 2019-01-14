<!--Modal incia cliente-->
<div class="modal fade" id="myCliente" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registro de cliente</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="registrarCliente()"><i class="fa fa-save"></i> Registrar</button>
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

<!--Modal para registrar el examen-->
<div class="modal fade" id="myRegistrarExamen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div style="float: right; color: red">
          <button style="color: red" type="button"  data-dismiss="modal" aria-label="Close">
            <span style="color: red" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
          <h5 align="center" style=" color: white">EXAMEN OFTALMOLOGICO</h5>
          <div class="clearfix"></div>
        </div>
        <div style="font-size: medium;" class="item form-group">
          <span id="idexpediente" name="idexpediente" ><?php echo $RidExpediente; ?></span>
          <div style="float: right;">
          <label>Fecha</label>
          <span><?php ini_set('date.timezone',  'America/El_Salvador'); echo date('d/m/Y');  ?></span>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <form  class="form-horizontal form-label-left" id="formExam" name="formExam" method="post">
          <input type="hidden" name="bandera2" id="bandera2"/>
          <input type="hidden" name="bacciones" id="bacciones" value="<?php echo $RidExpediente;?>"/>
          <input type="hidden" id="nombre_clienteID" name="nombre_clienteID" value="">
        <div class="x_panel">
              <section id="wizard">
                <div id="rootwizard">
                  <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul>
                          <li><a href="#tab1" data-toggle="tab">Antecedentes Medicos</a></li>
                          <li><a href="#tab2" data-toggle="tab">Antecedentes Oculares</a></li>
                          <li><a href="#tab3" data-toggle="tab">Lensometria</a></li>
                          <li><a href="#tab4" data-toggle="tab">Refraccion final </a></li>
                          <li><a href="#tab5" data-toggle="tab">Medidas</a></li>
                          <div style="float: right;">
                            <button type="button" class="btn btn-success btn-icon left-icon;" onclick="registrarExamen();" > <i  class="fa fa-save" name="btnGuardar" id="btnGuardar" ></i> <span >Guardar</span></button>
                          </div>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                      <div class="x_panel">
                        <div class="x_content">
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th style=" text-align:center;" colspan="3">Antecedentes Medicos</th>
                              </tr>
                            </thead>

                          <tbody>
                            <tr>
                              <td width="2%" >GLUCOSA</td>
                              <td width="50%"><input id="dm" name="dm" type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                              <td width="2%">PRESION ART.</td>
                              <td width="50%"><input id="ha" name="ha" type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                              <td width="2%">TRIGLICERIDOS</td>
                              <td width="50%"><input id="cyt" name="cyt" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                              <td width="2%">TIROIDES</td>
                              <td width="50%"><input id="tiroides" name="tiroides" type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                              <td width="2%">OTROS</td>
                              <td width="50%"><input id="otros" name="otros" type="text" class="form-control" ></td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab2">
                    <div class="x_panel">
                      <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th style=" text-align:center;" colspan="3">Antec y Dx Ocular</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td width="2%"></td>
                              <td colspan="1" width="50%">PERSONAL</td>
                              <td colspan="1" width="50%">FAMILIAR</td>
                            </tr>

                            <tr>
                              <td width="2%">GLAUCOMA</td>
                              <td width="50%"><input id="glaucomap" name="glaucomap" type="text" class="form-control" ></td>
                              <td width="50%"><input id="glaucomf"  type="text" class="form-control" name="glaucomf"></td>
                            </tr>

                            <tr>
                              <td width="2%">CATARATA</td>
                              <td width="40%"><input id="cataratap"  type="text" class="form-control" name="cataratap"></td>
                              <td width="40%"><input id="catarataf"  type="text" class="form-control" name="catarataf"></td>
                            </tr>
                            <tr>
                              <td width="2%">DR</td>
                              <td colspan="3" width="100%"><input id="drp"  type="text" class="form-control" name="drp"></td>
                            </tr>
                            <tr>
                              <td width="2%">OTRO</td>
                              <td colspan="3" width="50%"><input id="otro"  type="text" class="form-control" name="otro"></td>
                            </tr>
                            <tr>
                              <td width="2%">OP DE</td>
                              <td colspan="3" width="50%"><input id="op"  type="text" class="form-control" name="op"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab3">
                    <div class="x_panel">
                      <div class="x_content">
                        <table class="table table-bordered table-striped table-condensed">
                          <thead>
                            <tr>
                              <th></th>
                              <th style="text-align:center;">Esfera</th>
                              <th style="text-align:center;">Cilindro</th>
                              <th style="text-align:center;" >Eje</th>
                              <th style="text-align:center;" >Adiccion</th>
                              <th style="text-align:center;" >Prisma</th>
                              <th style="text-align:center;" >CB</th>
                              <th style="text-align:center;" >AV LEJ</th>
                              <th style="text-align:center;" >AV CE</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>Ojo Derecho</td>
                              <td><input   type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="esflend" name="esflend"></td>
                              <td><input  type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="cillend" name="cillend"></td>
                              <td><input  type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="ejelend" name="ejelend"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="adiccionlend" name="adiccionlend"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="prismalend" name="prismalend"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="cblend" name="cblend"></td>
                              <td><input  type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="avlejlend" name="avlejlend"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control"  id="avcelend"  name="avcelend"></td>
                            </tr>

                            <tr>
                              <td>Ojo Izquierdo</td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="esfleni" name="esfleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="cilleni" name="cilleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')"class="form-control" id="ejeleni" name="ejeleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="adiccionleni" name="adiccionleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="prismaleni" name="prismaleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="cbleni" name="cbleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')"class="form-control" id="avlejleni" name="avlejleni"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avceleni" name="avceleni"></td>
                            </tr>
                          </tbody>
                        </table>

                        <div style="text-align: center;">
                          <label >Diseño y tiempo de uso</label>
                          <br>
                            <textarea style="width: 400px; height: 52px;" id="descriplenso" name="descriplenso"></textarea>
                        </div>
                      </div>
                    </div >
                  </div >

                  <div class="tab-pane" id="tab4">
                    <div class="x_panel">
                      <div class="x_content">
                        <table class="table table-bordered table-striped table-condensed">
                          <thead>
                            <tr>
                              <th></th>
                              <th style="text-align:center;" >AVscL</th>
                              <th style="text-align:center;" >AVscC</th>
                              <th style="text-align:center;">Esfera</th>
                              <th style="text-align:center;">Cilindro</th>
                              <th style="text-align:center;" >Eje</th>
                              <th style="text-align:center;" >Adiccion</th>
                              <th style="text-align:center;" >Prisma</th>
                              <th style="text-align:center;" >CB</th>
                              <th style="text-align:center;" >AV LEJ</th>
                              <th style="text-align:center;" >AV CE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Ojo Derecho</td>
                              <td><input  type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avsclred" name="avsclred"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avsccred" name="avsccred"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="esfred" name="esfred"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="cilred" name="cilred"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="ejered" name="ejered"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="adiccionred" name="adiccionred"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="prismared" name="prismared"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="cbred" name="cbred"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avlejred" name="avlejred"></td>
                              <td><input  type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avcered" name="avcered"></td>
                            </tr>
                            <tr>
                              <td>Ojo Izquierdo</td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avsclrei" name="avsclrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avsccrei" name="avsccrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="esfrei" name="esfrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="cilrei" name="cilrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="ejerei" name="ejerei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="adiccionrei" name="adiccionrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="prismarei" name="prismarei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="cbrei" name="cbrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avlejrei" name="avlejrei"></td>
                              <td><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="avcerei" name="avcerei"></td>
                            </tr>
                          </tbody>
                        </table>

                        <div style="text-align: center;">
                          <label >Diseño</label>
                          <br>
                          <textarea  style="width: 400px; height: 52px;" id="descriprefrac" name="descriprefrac"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="tab5">
                    <div class="x_panel">
                      <div class="x_content">
                        <table class="table table-bordered table-striped table-condensed">
                          <thead>
                            <tr align="center">
                              <th style="width: 202000px; text-align:center;" colspan="5">Medidas</th>
                              <th style="width:100px; text-align:center; ">Examino</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td width="50" height="16"></td>
                              <td style="width:50px; height:20px; text-align:center;">DNP</td>
                              <td style="width:50px; height:20px; text-align:center;">DIP</td>
                              <td style="width:50px; height:20px; text-align:center;">ALT PUPILAR</td>
                              <td style="width:50px; height:20px; text-align:center;">ALT DE OBLEA</td>
                              <td style="width:100px; text-align:center;"></td>
                            </tr>

                              <tr>
                                <td width="50" height="16">Ojo Derecho</td>
                                <td style="width:60px; height:40px;"><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="dnpde" name="dnpde"></td>
                                <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5" type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="dip"  name="dip" /></td>
                                <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5"  type="number" onkeypress="return soloNumeros(event,'punto')"class="form-control" id="altpupi"  name="altpupi"></td>
                                <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5"   type="number" onkeypress="return soloNumeros(event,'punto')"  class="form-control" id="altoblea"  name="altoblea"></td>
                                <td style="width:50px; height:100px;" rowspan="4">
                                  <select  style="width:280px" class="form-control SExamino" id="examino" name="examino"  >
                                    <option>Empleado</option>
                                    <?php
                                      include("../../Config/conexion.php");

                                      $query_s=pg_query($conexion,"select * from empleados order by cnombre");

                                      while($fila=pg_fetch_array($query_s)){
                                        echo " <option value='$fila[0] '>$fila[1]  $fila[2]</option>";
                                      }
                                    ?>
                                  </select>

                                </td>
                              </tr>

                              <tr>
                                <td width="50" height="16">Ojo Izquierdo</td>
                                <td style="width:60px; height:40px;"><input  type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="dnpiz" name="dnpiz"></td>
                              </tr>
                            </tbody>
                          </table>

                          <div style="text-align: center;">
                            <label >Observacion</label>
                            <br>
                            <textarea style="width: 400px; height: 50px;" rows="5" cols="100"  id="" id="observacion" name="observacion"></textarea>
                          </div>

                        </div>
                      </div>
                    </div>

                     <ul class="pager wizard">
                        <li class="previous first" style="display:none;"><a href="#">Primera</a></li>
                        <li class="previous"><a >Anterior</a></li>
                        <li class="next last" style="display:none;"><a href="#">Ultima</a></li>
                        <li class="next"><a >Siguiente</a></li>
                      </ul>
                  </div>
                </div>
              </section>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>

<!--Fin modal registro examen-->
