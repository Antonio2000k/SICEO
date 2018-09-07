<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$iddatos=$_SESSION["idUsuario"];
$us =$_SESSION["nombrUsuario"]; 
$nombreE =  $_SESSION["nombreEmpleado"];
$apellidoE = $_SESSION["apellidoEmpleado"];
if($_SESSION['autenticado']!="yeah" || $t!=1){
  header("Location: login.php");
  exit();
  }
  ?>
<!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Informacion Personal</h4>
                </div>
                <div class="modal-body">
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pregunta</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="pregunta_usuario" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pregunta_usuario" placeholder="Pregunta" autocomplete="off" maxlength="60"><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal" onclick="agregarPregunta()"><i class="fa fa-plus"></i> Agregar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                </div>
              </div>
            </div>
          </div>