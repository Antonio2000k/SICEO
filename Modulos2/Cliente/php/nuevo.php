  <!-- Modal -->
      <div class="modal fade" id="exampleModal"  role="dialog" >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                  <div style="float: right; color: red">
                <button style="color: red" type="button"  data-dismiss="modal" aria-label="Close">
                  <span style="color: red" aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                <h5 align="center" style=" color: white">NUEVO CLIENTE</h5>
                <div class="clearfix"></div>
              </div>
                  
                </div>
                <div class="modal-body">
                  <div class="x_content">
              <div class="x_content">
                <form class="form-horizontal form-label-left" id="formCliente" name="formCliente" method="post">
                  <input type="hidden" name="bandera" id="bandera"/>
                  <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidCliente;?>"/>
                                          
                  <div class="row">
                  <!--Codigos-->
                    <div class="ln_solid"></div>

                      <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-2 col-xs-12">Nombres*</label>
                        <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" onblur="vali('nombre');" autocomplete="off" >
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <label class="control-label col-md-1 col-sm-2 col-xs-12">Apellidos*</label>
                          <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" onblur="vali('apellido');" autocomplete="off" >
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-1 col-sm-2 col-xs-12">Sexo*</label>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                              <div class="col-md-4 col-xs-12 col-sm-4">
                                <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M" checked="" <?php if ($Rsexo == "M") echo "checked"; ?>/>
                              </div>
                              <div class="col-md-4 col-xs-12 col-sm-4">
                                <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" <?php if ($Rsexo == "F") echo "checked"; ?> />
                              </div>
                            </div>

                            <div class="item form-group">                          
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                                          
                                <label class="control-label col-md-5 col-sm-3 col-xs-12">Fecha de Nacimiento*</label>
                                <div class="form-group">
                                  <div class='input-group date' id='myDatepicker2'>
                                    <input type='text' class="form-control has-feedback-left col-md-4 col-sm-4 col-xs-12"  id="fecha" name="fecha"    data-inputmask="'mask': '99/99/9999'"  autocomplete="off" onblur="vali('fecha');"/>
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>


                        <div class="item form-group">
                          <label class="control-label col-md-2 col-sm-3 col-xs-12">Telefono de contacto*</label>
                          <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" data-inputmask="'mask': '9999-9999'" value="<?php echo $Rtelefono; ?>" autocomplete="off" onblur="vali('telefono');">
                            <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <br><br><br>
                                                  

                          <label class="control-label col-md-1 col-sm-3 col-xs-12">Direcci&oacuten*</label>
                              <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>" autocomplete="off" onblur="vali('direccion');">
                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                              </div>
                        </div>

                                                
                                                              
                        <div class="ln_solid"></div>
                                                              
                          <div class="item form-group">
                            <center>
                              <div class="col-md-12 col-sm-6 col-xs-12 ">
                                <?php
                                  if(!isset($iddatos)){
                                ?>
                                  <button class="btn btn-success btn-icon left-icon;" onClick="verificar('guardar');"> <i  class="fa fa-save"  name="btnGuardar" id="btnGuardar"></i> <span >Guardar</span></button>
                                  <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return limpiarIn('limpiar');"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                <?php
                                  }else{
                                ?>
                                  <button class="btn btn-info btn-icon left-icon;" onClick="verificar('modificar');"> <i  class="fa fa-save"  name="btnModificar" id="btnModificar"></i> <span >Modificar</span></button>
                                  <button class="btn btn-danger  btn-icon left-icon" onclick="cancelar();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                <?php
                                  }
                                ?>
                              </div>
                            </center>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  
                  <br><br><br><br><br>
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>
        <!-- /footer content -->
      </div>
    </div>
