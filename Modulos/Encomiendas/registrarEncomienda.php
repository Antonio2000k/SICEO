<?php
//error_reporting(0);
session_start();
$t=$_SESSION["nivelUsuario"];
//$iddatos=$_SESSION["idUsuario"];
if($_SESSION['autenticado']!="yeah" || $t!=1){
  header("Location: ../../login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Encomiendas</title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>

    <script type="text/javascript">
      function checkado(id) {
        alert("Se checko el examen, fila: "+id);
      }

      function verEstado(id) {
        $('#myEstado').modal();
      }
    </script>

    <style type="text/css">
    .checkbox label:after {
      content: '';
      display: table;
      clear: both;
    }

    .checkbox .cr {
      position: relative;
      display: inline-block;
      border: 1px solid #a9a9a9;
      border-radius: .25em;
      width: 1.3em;
      height: 1.3em;
      float: left;
      margin-right: .5em;
    }

    .checkbox .cr .cr-icon {
      position: absolute;
      font-size: .8em;
      line-height: 0;
      top: 50%;
      left: 15%;
    }

    .checkbox label input[type="checkbox"] {
      display: none;
    }

    .checkbox label input[type="checkbox"]+.cr>.cr-icon {
      opacity: 0;
    }

    .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
      opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled+.cr {
      opacity: .5;
    }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <?php
              include "../../ComponentesForm/menu.php";
            ?>

            <div class="right_col" role="main">
              <div class="">
                <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                    <div>
                                        <img align="left" src="../../production/images/encomienda.png" width="128" height="128">
                                            <h1 align="center">
                                               Encomiendas
                                            </h1>
                                    </div>
                                    <div align="center">
                                        <p>
                                            Bienvenido, en esta sección aquí puede registrar o ver las encomiendas realizadas en el sistema.
                                        </p>
                                        <p>
                                          <b>Debe de llenar todos los campos obligatorios (*) para poder registrar una encomienda en el sistema.</b>
                                        </p>
                                    </div>
                                </div>
                            </div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="" data-example-id="togglable-tabs" role="tabpanel">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                           <li class="active" role="presentation">
                              <a aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab">
                                NUEVA ENCOMIENDA
                              </a>
                            </li>
                            <li class="" role="presentation">
                              <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                                LISTA DE ENCOMIENDAS
                              </a>
                            </li>
                        </ul>
                      <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                          <div class="x_content">
                            <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                               <h3 align="center" style=" color: white">Datos de Encomienda</h3>
                               <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <form class="form-horizontal form-label-left" id="frmVenta" name="frmVenta" method="post">
                                <div class="row">
                                  <!--Codigos-->
                                  <input type="hidden" id="bandera" name="bandera" value="">
                                  <!--fin codigos-->

                                  <div class="item form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-xs-12">Encomendero (*) </label>
                                    <div class="col-sm-7 col-md-7 col-xs-12">
                                      <select class="form-control text-center" id="nombre_encomendero" style="font-size:medium">
                                        <option value="">Seleccione</option>
                                      </select>

                                    </div>

                                    <a href="../Cliente/registrarCliente.php?nuevo_cliente=si" class="col-sm-3 col-md-3 col-xs-12"><h4><b>¿Desea registrar alguno?</b></h4></a>
                                  </div>

                                  <!-- <div class="item form-group">
                                    <label class="control-label col-sm-5 col-md-5 col-xs-12">Fecha de envio (*) </label>
                                    <div class="col-sm-4 col-md-4 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left text-center" id="single_cal1" aria-describedby="inputSuccess2Status" data-validate-length-range="6" data-validate-words="2" disabled>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div> -->

                                  <div class="item form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-xs-12">Detalles (*) </label>
                                    <div class="col-sm-10 col-md-10 col-xs-12">
                                      <textarea class="form-control" id="detalle"  placeholder="El vehiculo es de color verde, el numero del motorista es 7777-7777, seran llevado a tal laboratorio, etc."></textarea>
                                      <!-- <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span> -->
                                    </div>
                                  </div>

                                  <!--Inicio boton-->
                                  <br>
                                  <div class="item form-group text-center">
                                    <h4 class="label label-default pull-center" id="total_pago"><b>Resultado de examenes</b></h4>
                                  </div>
                                  <br>
                                  <!--Fin boton-->

                                  <!--Aqui va la tabla de la venta-->
                                  <div class="item form-group">
                                    <table id="datatable" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th width="10%">Seleccionar</th>
                                          <th width="40%">Nombre del Cliente</th>
                                          <th width="25%">Modelo de los lentes</th>
                                          <th width="15%">Examen</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="text-center">
                                            <div class="checkbox">
                                              <label>
                                               <input type="checkbox" value="" onclick="checkado(1)">
                                               <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                               </label>
                                            </div>
                                          </td>
                                          <td>Francisco Antonio</td>
                                          <td>Lacoste</td>
                                          <td class="text-center"><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>

                                    <div class="item form-group">
                                      <center>
                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                          <div class="form-group">
                                            <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="registarEncomiendas()"> <i  class="fa fa-save"></i> <span >Registrar</span></button>
                                            <button type="button" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="limpiarDatos()"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                          </div>
                                        </div>
                                      </center>
                                    </div>

                                  <!--Aqui termina la tabla-->
                                </div>
                                  <!--Aqui finaliza-->
                              </form>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>ENCOMIENDAS </h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content" id="recargarEncomiendas">
                                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Fecha</th>
                                      <th>Encomendero</th>
                                      <th>Estado</th>
                                      <th>Reporte</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Hoy</td>
                                      <td>Francisco Antonio</td>
                                      <td class="text-center"><button type="button" class="btn btn-success" onclick="verEstado(1)"><i class="fa fa-info"></i> <span>Ver</span></button></td>
                                      <td class="text-center"><button type="button" class="btn btn-warning"><i class="fa fa-book"></i> <span></span></button></td>
                                    </tr>
                                  </tbody>
                                </table>
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
                                  <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <div class="form-group" style="text-align: center">
                                        <label style="font-size:medium; color: red" class="control-label col-md-12 col-sm-12 col-xs-12">PENDIENTE</label>
                                      </div>
                                      <div class="form-group" style="text-align: center">
                                        <br>
                                        <label style="font-size:medium" class="control-label col-md-6 col-sm-6 col-xs-12">Actualizar estado</label>
                                        <input type="radio" class="flat col-md-6 col-sm-6 col-xs-12" name="estado" id="estado" value="true" /> <label>RECIBIDA</label>
                                        <!-- <br><br>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label class="control-label col-sm-5 col-md-5 col-xs-12">Fecha de entrega (*) </label>
                                          <div class="col-sm-5 col-md-5 col-xs-12">
                                            <input type="text" class="form-control has-feedback-left text-center" id="single_cal1" aria-describedby="inputSuccess2Status" data-validate-length-range="6" data-validate-words="2" disabled>
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                        </div> -->
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
                                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-save"></i> Actualizar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                                  </center>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--Fin modal-->

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <?php
            include "../../ComponentesForm/footer.php";
          ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    </div>

    <?php
        include "../../ComponentesForm/scripts.php";
    ?>
  </body>
</html>
