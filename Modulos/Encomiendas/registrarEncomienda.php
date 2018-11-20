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
          return "modelo";
          break;

        default:
        return "algo xd";
          break;
      }
    }
  }
}

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

    <link rel="stylesheet" href="Estilos/checkbox.css">
    <link rel="stylesheet" href="Estilos/radio.css">

    <title>SICEO | Encomiendas</title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>

    <script type="text/javascript">

      function verExamen() {
        alert("Mostrara el reporte del examen");
      }

      function especificaciones(fila) {
        alert("Mostrara las especificaciones");
      }

      function checkado(id) {
        if(document.getElementById("examen"+id).checked) {
          $('#myLentes').modal({backdrop: 'static', keyboard: false});
          document.getElementById('idCheckbox').value=id;
        }
        else {
          swal({
            title: "¿Seguro quiere eliminar esta encomienda?",
            text: "No podrás deshacer este paso.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5CBDD9",
            cancelButtonColor: "#D9534F",
            confirmButtonText: "No",
            cancelButtonText: "Si",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
          }).then(function(isConfirm) {
            if(isConfirm.value!=true) {
              //Codigo de confimacion.
              swal("Informacion", "Encomienda eliminada", "info");
              document.getElementById('idCheckbox').value="";
              $("#especificaciones"+id).prop("disabled", true);
            }
            else {
              document.getElementById("examen"+id).checked=1;
            }
          })
        }
      }

      function activarOtro(opcion, checkado) {
        if(opcion==1) {
          if(checkado=="si") {
            $("#otro_material_lente").prop("disabled", false);
          }
          else {
            $("#otro_material_lente").prop("disabled", true);
            document.getElementById("otro_material_lente").value="";
          }
        }
        else {
          if(checkado=="si") {
            $("#otro_tipo_lente").prop("disabled", false);
          }
          else {
            $("#otro_tipo_lente").prop("disabled", true);
            document.getElementById("otro_tipo_lente").value="";
          }
        }
      }

      function caracteristicasAro(objForm) {
        var tipo = "";
        var material = "";

        for (x = 0; x < objForm.tipo_lente.length; x++) {
          if (objForm.tipo_lente[x].checked) {
            tipo = objForm.tipo_lente[x].value;
            break;
          }
        }

        for (x = 0; x < objForm.material_lente.length; x++) {
          if (objForm.material_lente[x].checked) {
            material = objForm.material_lente[x].value;
            break;
          }
        }

        if(tipo!="" && material!="") {
          var fila = document.getElementById('idCheckbox').value;
          document.getElementById('idCheckbox').value = "";

          for (x = 0; x < objForm.tipo_lente.length; x++) {
            objForm.tipo_lente[x].checked=0;
          }

          for (x = 0; x < objForm.material_lente.length; x++) {
            objForm.material_lente[x].checked=0;
          }

          $('#myLentes').modal('toggle');
          $("#especificaciones"+fila).prop("disabled", false);
        }
        else {
          swal("Error", "Debe seleccionar un tipo y material", "error");
        }
      }

      function cancelar() {
        var id=document.getElementById('idCheckbox').value;
        document.getElementById('examen'+id).checked=0;
        document.getElementById('idCheckbox').value="";
      }

      function registarEncomiendas() {
      }

      function verEstado(id) {
        $('#myEstado').modal();
      }

      function alertaSweet(titulo,texto,tipo){
        swal(titulo,texto,tipo);
      }

      function cambiarEstado() {
        if(document.getElementById('estado').checked) {
          <?php
          ?>
          if(true) {
            swal('Hecho', 'Encomienda actualizada con exito', 'success');
            $("#myEstado").modal('toggle');
          }
        }
        else {
          swal('Error', 'Debe seleccionar que fue recibida la encomienda', 'error');
        }
      }
    </script>

    <style type="text/css">

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
                              <form class="form-horizontal form-label-left" id="frmEncomiendas" name="frmEncomiendas" method="post">
                                <div class="row">
                                  <!--Codigos-->
                                  <input type="hidden" id="bandera" name="bandera" value="">
                                  <input type="hidden" id="idCheckbox" name="idCheckbox" value="">
                                  <!--fin codigos-->

                                  <div class="item form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-xs-12">Encomendero (*) </label>
                                    <div class="col-sm-7 col-md-7 col-xs-12">
                                      <select class="form-control text-center" id="nombre_encomendero" style="font-size:medium">
                                        <option value="">Seleccione</option>
                                      </select>

                                    </div>

                                    <a href="../Encomendero/registrarEncomendero.php?nuevo_encomendero=si" class="col-sm-3 col-md-3 col-xs-12"><h4><b>¿Desea registrar alguno?</b></h4></a>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-xs-12">Detalles (*) </label>
                                    <div class="col-sm-10 col-md-10 col-xs-12">
                                      <textarea class="form-control" id="detalle"  placeholder="El vehiculo es de color verde, el numero del motorista es 7777-7777, seran llevado a tal laboratorio, etc."></textarea>
                                    </div>
                                  </div>

                                  <!--Inicio boton-->
                                  <br>
                                  <div class="item form-group text-center">
                                    <h4 class="label label-default pull-center" id="total_pago"><b>Resultado de examenes</b></h4>
                                  </div>
                                  <br>
                                  <!--Fin boton-->

                                  <!--Aqui va la tabla de la encomienda-->
                                  <div class="item form-group">
                                    <table id="datatable" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th width="10%">Seleccionar</th>
                                          <th width="40%">Nombre del Cliente</th>
                                          <th width="25%">Modelo de los lentes</th>
                                          <th width="15%" colspan="2">Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $cliente = "";
                                        $modelo = "";
                                        $cont = 1;

                                        $result = pg_query($conexion, "SELECT * FROM examen");

                                        //Es para todos los examenes.
                                        while($fila = pg_fetch_array($result)) {
                                          $result_expediente = pg_query($conexion, "SELECT * FROM expediente2 WHERE cid_expediente='$fila[9]'");

                                          //Es para obtener expediente.
                                          while($expediente = pg_fetch_array($result_expediente)) {
                                            //Es para obtener cliente.
                                            $consulta = pg_query($conexion, "SELECT * FROM clientes WHERE eid_cliente='$expediente[1]'");
                                            $cliente = obtenerValorSQL($consulta, "cliente", "");

                                            $consulta = pg_query($conexion, "SELECT * FROM clientes WHERE eid_cliente='$expediente[1]'");
                                            $modelo = obtenerValorSQL($consulta, "modelo", "");
                                          }
                                          ?>

                                          <tr>
                                            <td class="text-center">
                                              <div class="checkbox">
                                                <label>
                                                 <input type="checkbox" onclick="checkado(<?php echo $cont ?>)" id="<?php echo "examen".$cont ?>">
                                                 <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                 </label>
                                              </div>
                                            </td>

                                            <td><?php echo $cliente ?></td>

                                            <td><?php echo $modelo ?></td>
                                            <td class="text-center">
                                              <button type="button" class="btn btn-warning" onclick="verExamen()"><i class="fa fa-book"></i></button>
                                              <button id="<?php echo "especificaciones".$cont ?>" type="button" class="btn btn-info" onclick="especificaciones(<?php echo $cont ?>)" disabled><i class="fa fa-th-list"></i></button>
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
                                            <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="registarEncomiendas()"> <i  class="fa fa-save"></i> <span >Guardar</span></button>
                                            <button type="button" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px "> <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
                                <!--Fin modal-->
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
                                      <th>Fecha de envio</th>
                                      <th>Fecha de recibido</th>
                                      <th>Encomendero</th>
                                      <th>Estado</th>
                                      <th>Reporte</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Hoy</td>
                                      <td>Ayer</td>
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
                                    <button type="button" class="btn btn-success" onclick="cambiarEstado()"><i class="fa fa-save"></i> Guardar</button>
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
