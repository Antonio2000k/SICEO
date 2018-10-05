<?php session_start();
  if(isset($_REQUEST["id"])){
      include("../../Config/conexion.php");
      $iddatos = $_REQUEST["id"];

      $query_s = pg_query($conexion, "SELECT eid_examen, cobservaciones, eid_expediente, eid_antecedente_medico,
                                      eid_antecedente_ocular, eid_lensometria, eid_refraccion, eid_medidas, ffecha,
                                      cid_empleado FROM examen WHERE eid_expediente = '$iddatos'");
      while ($fila = pg_fetch_array($query_s)) {
          $RidExpediente = $fila[2];

      }
  }else{
          $RidExpediente = null;

  }

  date_default_timezone_set('America/El_Salvador');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Examen </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>

<script type="text/javascript">
  function validaFloat(numero){
    if (!/^([0-9])*[.]?[0-9]*$/.test(numero))
     alert("El valor " + numero + " no es un número");
  }

  function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla) == -1 && !tecla_especial){
                NotificacionSoloLetras2('error',"<b>Error: </b>Solo se permiten letras");
                return false;
            }
        }
        

  function verificar(){
          var opc=true;
          if(document.getElementById('idexpediente').value=="" || document.getElementById('examino').value==""
           || document.getElementById('avsclred').value=="" || document.getElementById('avsclrei').value==""
            || document.getElementById('avsccred').value=="" || document.getElementById('avsclrei').value==""
            || document.getElementById('esfred').value=="" || document.getElementById('esfrei').value==""
            || document.getElementById('cilred').value=="" || document.getElementById('cilrei').value==""
            || document.getElementById('ejered').value=="" || document.getElementById('ejerei').value==""
            || document.getElementById('adiccionred').value=="" || document.getElementById('adiccionrei').value==""
            || document.getElementById('prismared').value=="" || document.getElementById('prismarei').value==""
            || document.getElementById('cbred').value=="" || document.getElementById('cbrei').value==""
            || document.getElementById('avlejred').value=="" || document.getElementById('avlejrei').value==""
            || document.getElementById('avcered').value=="" || document.getElementById('avcerei').value==""){

                alertaSweet('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc=false;
            }else{

                document.getElementById('bandera').value="add";
                setTimeout(document.formExam.submit(),2000);
                opc=true;
            }

          $(document).ready(function(){
          $("#formExam").submit(function() {
              if (opc!=true) {
                return false;
              } else
                  return true;
            });
        });

      }

      function limpia() {
            var val = document.getElementById("nombre").value;
            var tam = val.length;
            for(i = 0; i < tam; i++) {
                if(!isNaN(val[i]))
                    document.getElementById("nombre").value = '';
            }
        }

      function limpiarIn(opcion){
        if(opcion=="limpiarM"){
            document.getElementById('bandera').value='cancelar';
        }else{
            $(document).ready(function(){
              $("#formCliente")[0].reset();
              $("#formCliente").submit(function() {
                  return false;
                });
            });
        }
    }

  function alertaSweet(titulo,texto,tipo){
      swal({
            position:'center',
            text: texto,
            type: tipo,
            title: titulo,
            showConfirmButton: false,

          });
    }

    function llamarPagina(id){
     window.open("registrarCliente.php?id="+id, '_parent');
  }

  function cancelar(){
    location.href=('listaCliente.php');
  }


    function NotificacionSoloLetras2(tipo,msg){
        notif({
          type:tipo,
          msg:msg ,
          position: "center",
          timeout: 3000,
          clickable: true

        });
    }

    function vali(opcion) {

            if(opcion==='expediente'){
                var valor = document.getElementById('idexpediente').value;
                if (valor!="") {

                }else {
                    document.getElementById('idexpediente').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Seleccione <b>Cliente</b>");
                }
            }
    }
</script>

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
                       <img width="120" height="120" align="left" src="../../production/images/examen.png">
                           <h1 align="center">
                                           Examen
                            </h1>
                        </img>
                    </div>
                 <div align="center">
                  <p>
                      Bienvenido en esta sección puede registrar los examenes en el sistema.
                  </p>
                  </div>
                </div>
            </div>
            <!--<div align="right"> <a href="../SICEOElmer/pdf/reporteExamen.php" class="btn btn-success btn-info"  ><span class="fa fa-print"  >     Imprimir</span></a> </div>
            <br>-->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <form  class="form-horizontal form-label-left" id="formExam" name="formExam" method="post">
                    <div class="item form-group">


                      <label class="control-label col-md-1 col-sm-2 col-xs-12">Cliente*</label>
                      <input type="hidden" name="bandera" id="bandera"/>
                      <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidExpediente;?>"/>

                      <div class="col-md-5 col-sm-3 col-xs-8 form-group ">

                        <input type="text" class="form-control has-feedback-left  "  id="idexpediente" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="idexpediente" onblur="vali('expediente');" placeholder="Cliente" value="<?php echo $RidExpediente; ?>"  autocomplete="off" list="listaCliente" >
                        <datalist id="listaCliente" >
                            <?php
                             include("../../Config/conexion.php");

                              $query_s=pg_query($conexion,"select cl.eid_cliente, cl.cnombre, cl.capellido, cl.eedad, cl.csexo, cl.ctelefonof, cl.cdireccion, ex.cid_expediente from expediente2 as ex
                                INNER JOIN clientes as cl on ex.eid_cliente = cl.eid_cliente order by cid_expediente");

                              while($fila=pg_fetch_array($query_s)){
                                echo " <option value='$fila[7] - $fila[1]  $fila[2]'>";
                              }
                            ?>
                        </datalist>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

                      </div>

                      <div class="col-md-2 col-sm-3 col-xs-8 form-group ">
                          <button float-right class="btn btn-info btn-icon left-icon"  data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-th-list"></i> <span>Nuevo Cliente</span></button>
                      </div>

                      <label  style="text-align: justify;"class="control-label col-md-1 col-sm-2 col-xs-12">Fecha*</label>
                        <div class="col-md-3 col-sm-4 col-xs-12 form-group has-feedback">
                          <input style="text-align: center;" type="text" class="form-control has-feedback-left"  id="single_cal1" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="factual"   autocomplete="off" value="<?php ini_set('date.timezone',  'America/El_Salvador'); echo date('d/m/Y');  ?>" disabled="" >
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                   </div>
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">

                            <div class="row">
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
                                              <button  class="btn btn-success btn-icon left-icon;" onClick="verificar();"> <i  class="fa fa-save"  name="btnGuardar" id="btnGuardar"></i> <span >Guardar</span></button>
                                              <button class="btn btn-danger  btn-icon left-icon" onClick="cancelar();"  > <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
                                                      <td width="2%">GLUCOSA</td>

                                                      <td width="50%"><input id="dm" name="dm" type="text" class="form-control" ></td>

                                                    </tr>
                                                     <tr>
                                                      <td width="2%">PRESION ART.</td>
                                                      <td width="2%"><input id="ha" name="ha" type="text" class="form-control" ></td>

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
                                                    <td><input   type="text" class="form-control" id="esflend" name="esflend" ></td>
                                                    <td><input   type="text" class="form-control"  id="cillend" name="cillend"></td>
                                                    <td><input  type="text" class="form-control"  id="ejelend" name="ejelend"></td>
                                                    <td><input   type="text" class="form-control"  id="adiccionlend" name="adiccionlend"></td>
                                                    <td><input    type="text" class="form-control"  id="prismalend" name="prismalend"></td>
                                                    <td><input  type="text" class="form-control"  id="cblend" name="cblend"></td>
                                                    <td><input  type="text" class="form-control"  id="avlejlend" name="avlejlend"></td>
                                                    <td><input  type="text" class="form-control"  id="avcelend"  name="avcelend"></td>
                                                  </tr>

                                                  <tr>
                                                    <td>Ojo Izquierdo</td>
                                                    <td><input    type="text" class="form-control" id="esfleni" name="esfleni"></td>
                                                    <td><input   type="text" class="form-control" id="cilleni" name="cilleni"></td>
                                                    <td><input   type="text" class="form-control" id="ejeleni" name="ejeleni"></td>
                                                    <td><input   type="text" class="form-control" id="adiccionleni" name="adiccionleni"></td>
                                                    <td><input   type="text" class="form-control" id="prismaleni" name="prismaleni"></td>
                                                    <td><input   type="text" class="form-control" id="cbleni" name="cbleni"></td>
                                                    <td><input "   type="text" class="form-control" id="avlejleni" name="avlejleni"></td>
                                                    <td><input   type="text" class="form-control" id="avceleni" name="avceleni"></td>
                                                  </tr>
                                                </tbody>
                                              </table>

                                              <div style="text-align: center;">
                                                <label ">Diseño y tiempo de uso</label>
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
                                                    <td><input   type="number" class="form-control" id="avsclred" name="avsclred"></td>
                                                    <td><input   type="text" class="form-control" id="avsccred" name="avsccred"></td>
                                                    <td><input  type="text" class="form-control" id="esfred" name="esfred"></td>
                                                    <td><input   type="text" class="form-control" id="cilred" name="cilred"></td>
                                                    <td><input  type="text" class="form-control" id="ejered" name="ejered"></td>
                                                    <td><input  type="text" class="form-control" id="adiccionred" name="adiccionred"></td>
                                                    <td><input  type="text" class="form-control" id="prismared" name="prismared"></td>
                                                    <td><input  type="text" class="form-control" id="cbred" name="cbred"></td>
                                                    <td><input   type="text" class="form-control" id="avlejred" name="avlejred"></td>
                                                    <td><input  type="text" class="form-control" id="avcered" name="avcered"></td>
                                                  </tr>

                                                  <tr>
                                                    <td>Ojo Izquierdo</td>
                                                    <td><input  type="text" class="form-control" id="avsclrei" name="avsclrei"></td>
                                                    <td><input   type="text" class="form-control" id="avsccrei" name="avsccrei"></td>
                                                    <td><input  type="text" class="form-control" id="esfrei" name="esfrei"></td>
                                                    <td><input  type="text" class="form-control" id="cilrei" name="cilrei"></td>
                                                    <td><input   type="text" class="form-control" id="ejerei" name="ejerei"></td>
                                                    <td><input   type="text" class="form-control" id="adiccionrei" name="adiccionrei"></td>
                                                    <td><input   type="text" class="form-control" id="prismarei" name="prismarei"></td>
                                                    <td><input   type="text" class="form-control" id="cbrei" name="cbrei"></td>
                                                    <td><input   type="text" class="form-control" id="avlejrei" name="avlejrei"></td>
                                                    <td><input  type="text" class="form-control" id="avcerei" name="avcerei"></td>
                                                  </tr>
                                                </tbody>
                                              </table>

                                              <div style="text-align: center;">
                                                <label ">Diseño</label>
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
                                                  <tr align="center"">
                                                    <th style="text-align:center;" colspan="5">Medidas</th>
                                                    <th style="text-align:center;">Examino</th>

                                                  </tr>
                                                </thead>

                                                <tbody>
                                                  <tr>
                                                    <td width="50" height="16"</td>
                                                    <td style="width:50px; height:20px; text-align:center;">DNP</td>
                                                    <td style="width:50px; height:20px; text-align:center;">DIP</td>
                                                    <td style="width:50px; height:20px; text-align:center;">ALT PUPILAR</td>
                                                    <td style="width:50px; height:20px; text-align:center;">ALT DE OBLEA</td>
                                                    <td style="width:50px; height:20px; text-align:center;"></td>

                                                  </tr>

                                                  <tr>
                                                    <td width="50" height="16">Ojo Derecho</td>
                                                    <td style="width:60px; height:40px;"><input  type="tex" class="form-control" id="dnpde" name="dnpde"></td>
                                                    <td  style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5" type="text" class="form-control" id="dip"  name="dip" /></td>
                                                    <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5"  type="text" class="form-control" id="altpupi"  name="altpupi"></td>
                                                    <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5"   type="text"  class="form-control" id="altoblea"  name="altoblea"></td>
                                                    <td style="width:100; height:100px;" rowspan="4">
                                                      <input cols="40" rows="5"    type="text" class="form-control" id="examino"  name="examino" list="listaEmp"><datalist id="listaEmp" >
                                                          <?php
                                                            include("../../Config/conexion.php");

                                                            $query_s=pg_query($conexion,"select * from empleados order by cnombre");

                                                            while($fila=pg_fetch_array($query_s)){
                                                              echo " <option value='$fila[0] $fila[1]  $fila[2]'>";
                                                            }
                                                          ?>
                                                      </datalist>
                                                    </td>

                                                  </tr>

                                                  <tr>
                                                    <td width="50" height="16">Ojo Izquierdo</td>
                                                    <td style="width:60px; height:40px;"><input  type="text" class="form-control" id="dnpiz" name="dnpiz"></td>


                                                  </tr>
                                                </tbody>
                                              </table>

                                              <div style="text-align: center;">
                                                <label>Observacion</label>
                                                  <br>
                                                  <textarea style="width: 400px; height: 50px;" rows="5" cols="100"  id="" id="observacion" name="observacion"></textarea>
                                              </div>
                                              <br><br>
                                              </div>
                                            </div>
                                            </div>

                                            <ul class="pager wizard">
                                              <li class="previous"><a>Anterior</a></li>
                                                <li class="next"><a>Siguiente</a></li>
                                            </ul>



                                          </div>

                                        </div>

                                      </section>

                                    </div>

                                </div>
                              </div>
                          </form>
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


    <?php
        include "../../ComponentesForm/scripts.php";
    ?>

    <script>
        $(function () {
            $('.SExamen').select2()
            $('.SProducto').select2()
        });
    </script>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
      <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../vendors/bootstrap/dist/js/jquery.bootstrap.wizard.js"></script>

        <script>
        $(document).ready(function() {
          $('#rootwizard').bootstrapWizard({'tabClass': 'nav nav-pills'});
      });
        </script>


  </body>
</html>
<?php

function cortar($palabra){
    $parte = explode(" ",$palabra);

    return $parte[0];
      }
if(isset($_REQUEST["bandera"])){
$baccion=$_REQUEST["baccion"];
$bandera=$_REQUEST["bandera"];
$idexpediente= cortar($_REQUEST["idexpediente"]);
$fechaA= date("d-m-Y");

//datos de antecedentes medicos
$antmcdm = $_REQUEST["dm"];
$antmcha = $_REQUEST["ha"];
$antmccyte =$_REQUEST["cyt"];
$antmtiroides =$_REQUEST["tiroides"];
$antmcotros =$_REQUEST["otros"];

//datos de antecedentes oculares
$antoglaucomap = $_REQUEST["glaucomap"];
$antoglaucomaf = $_REQUEST["glaucomaf"];
$antocataratap =$_REQUEST["cataratap"];
$antocatarataf =$_REQUEST["catarataf"];
$antocdoctor =$_REQUEST["drp"];
$antocotro = $_REQUEST["otro"];
$antooperad = $_REQUEST["op"];

//datos de lensometria
$lesfojoderecho = floatval($_REQUEST["esflend"]);
$lesfojoizquierdo = floatval($_REQUEST["esfleni"]);
$lcilojoderecho = floatval($_REQUEST["cillend"]);
$lcilojoizquierdo = floatval($_REQUEST["cilleni"]);
$lejeojoderecho = floatval($_REQUEST["ejelend"]);
$lejeojoizquierdo = floatval($_REQUEST["ejeleni"]);
$ladicojoderecho = floatval($_REQUEST["adiccionlend"]);
$ladicojoizquierdo = floatval($_REQUEST["adiccionleni"]);
$lprisojoderecho = floatval($_REQUEST["prismalend"]);
$lprisojodizquierdo = floatval($_REQUEST["prismaleni"]);
$lcbojoderecho = floatval($_REQUEST["cblend"]);
$lcbojoizquierdo = floatval($_REQUEST["cbleni"]);
$lavlejojoderecho = floatval($_REQUEST["avlejlend"]);
$lavlejojoizquierdo = floatval($_REQUEST["avlejleni"]);
$lavcerojoderecho = floatval($_REQUEST["avcelend"]);
$lavcerojoizquierdo = floatval($_REQUEST["avceleni"]);
$ldescripcion = $_REQUEST["descriplenso"];

//datos de refraccion
$ravsclojoderecho = floatval($_REQUEST["avsclred"]);
$ravsclojoizquierdo = floatval($_REQUEST["avsclrei"]);
$ravsccojoderecho = floatval($_REQUEST["avsccred"]);
$ravsccojoizquierdo = floatval($_REQUEST["avsccrei"]);

$resfojoderecho = floatval($_REQUEST["esfred"]);
$resfojoizquierdo = floatval($_REQUEST["esfrei"]);
$rcilojoderecho = floatval($_REQUEST["cilred"]);
$rcilojoizquierdo = floatval($_REQUEST["cilrei"]);
$rejeojoderecho = floatval($_REQUEST["ejered"]);
$rejeojoizquierdo = floatval($_REQUEST["ejerei"]);
$radicojoderecho = floatval($_REQUEST["adiccionred"]);
$radicojoizquierdo = floatval($_REQUEST["adiccionrei"]);
$rprisojoderecho = floatval($_REQUEST["prismared"]);
$rprisojodizquierdo = floatval($_REQUEST["prismarei"]);
$rcbojoderecho = floatval($_REQUEST["cbred"]);
$rcbojoizquierdo = floatval($_REQUEST["cbrei"]);
$ravlejojoderecho = floatval($_REQUEST["avlejred"]);
$ravlejojoizquierdo = floatval($_REQUEST["avlejrei"]);
$ravcerojoderecho = floatval($_REQUEST["avcered"]);
$ravcerojoizquierdo = floatval($_REQUEST["avcerei"]);
$rdescripcion = $_REQUEST["descriprefrac"];


//datos de medidas
$rdnpojoderecho = floatval($_REQUEST["dnpde"]);
$rdnpojoizquierdo = floatval($_REQUEST["dnpiz"]);
$rdip = floatval($_REQUEST["dip"]);
$raltpupilar = floatval($_REQUEST["altpupi"]);
$raltoblea = floatval($_REQUEST["altoblea"]);
$cexamino = cortar($_REQUEST["examino"]);
$cobservacion = $_REQUEST["observacion"];





include("../../Config/conexion.php");
  if($bandera=='add'){
      pg_query("BEGIN");

      $query_s1=pg_query($conexion,"select count(*) from antecedente_medico ");
        while ($fila = pg_fetch_array($query_s1)) {
            $idantm=$fila[0];
            $idantm++ ;
        }

      $result1=pg_query($conexion,"INSERT INTO  antecedente_medico (eid_antecedente_medico, cdm, cha, ccyt, ctiroides, cotros)  VALUES ($idantm, '$antmcdm', '$antmcha', '$antmccyte', '$antmtiroides', '$antmcotros') ");

      $query_s2=pg_query($conexion,"select count(*) from antecedente_ocular ");
        while ($fila = pg_fetch_array($query_s2)) {
            $idanto=$fila[0];
            $idanto++ ;
        }

      $ressult2= pg_query($conexion,"INSERT INTO antecedente_ocular (eid_antecedente_ocular, cglaucomap, cglaucomaf, ccataratap, ccatarataf, cdoctor, cotro, coperadod) VALUES ($idanto, '$antoglaucomap', '$antoglaucomaf', '$antocataratap', '$antocatarataf', '$antocdoctor', '$antocotro', '$antooperad')");

      $query_s3=pg_query($conexion,"select count(*) from lensometria ");
        while ($fila = pg_fetch_array($query_s3)) {
            $idlen=$fila[0];
            $idlen++ ;
        }
      $ressult3= pg_query($conexion,"INSERT INTO lensometria (eid_lensometria, resfera_ojoderecho,
        resfera_ojoizquierdo, rcilindro_ojoderecho, rcilindro_ojoizquierdo, reje_ojoderecho, reje_ojoizquierdo,
        radiccion_ojoderecho, radiccion_ojoizquierdo, rprisma_ojoderecho, rprisma_ojodizquierdo, rcb_ojoderecho,
         rcb_ojoizquierdo, rav_lej_ojoderecho, rav_lej_ojoizquierdo, rav_cer_ojoderecho, rav_cer_ojoizquierdo,
         cdescripcion)  VALUES ($idlen, $lesfojoderecho, $lesfojoizquierdo, $lcilojoderecho, $lcilojoizquierdo,
        $lejeojoderecho, $lejeojoizquierdo, $ladicojoderecho, $ladicojoizquierdo, $lprisojoderecho,
        $lprisojodizquierdo, $lcbojoderecho, $lcbojoizquierdo, $lavlejojoderecho, $lavlejojoizquierdo,
        $lavcerojoderecho, $lavcerojoizquierdo, '$ldescripcion')");

      $query_s4=pg_query($conexion,"select count(*) from refraccion ");
        while ($fila = pg_fetch_array($query_s4)) {
            $idref=$fila[0];
            $idref++ ;
        }
      $ressult4= pg_query($conexion,"INSERT INTO refraccion (eid_refraccion, ravscl_ojoderecho, ravscl_ojoizquierdo,
       ravscc_ojoderecho, ravscc_ojoizquierdo, resfera_ojoderecho, resfera_ojoizquierdo, rcilindro_ojoderecho,
       rcilindro_ojoizquierdo, reje_ojoderecho, reje_ojoizquierdo, radiccion_ojoderecho, radiccion_ojoizquierdo,
       rprisma_ojoderecho, rprisma_ojoizquierdo, rcb_ojoderecho, rcb_ojoizquierdo, ravlej_ojoderecho,
       ravlej_ojoizquierdo, ravcer_ojoderecho, ravcer_ojoizquierdo, cdescripcion) VALUES ($idref, $ravsclojoderecho,
       $ravsclojoizquierdo, $ravsccojoderecho, $ravsccojoizquierdo, $resfojoderecho, $resfojoizquierdo,
       $rcilojoderecho , $rcilojoizquierdo, $rejeojoderecho, $rejeojoizquierdo, $radicojoderecho,
       $radicojoizquierdo, $rprisojoderecho, $rprisojodizquierdo, $rcbojoderecho, $rcbojoizquierdo, $ravlejojoderecho,
        $ravlejojoizquierdo, $ravcerojoderecho, $ravcerojoizquierdo, '$rdescripcion')");

      $query_s5=pg_query($conexion,"select count(*) from medidas ");
        while ($fila = pg_fetch_array($query_s5)) {
            $idmed=$fila[0];
            $idmed++ ;
        }
      $ressult5= pg_query($conexion,"INSERT INTO medidas (eid_medidas, rdnp_ojoderecho, rdnp_ojoizquierdo, rdip, ralt_pupilar, ralt_oblea, cexamino, cobservacion) VALUES ($idmed, $rdnpojoderecho, $rdnpojoizquierdo, $rdip,
       $raltpupilar, $raltoblea, '$cexamino', '$cobservacion')");

      $query_s6=pg_query($conexion,"select count(*) from examen ");
        while ($fila = pg_fetch_array($query_s6)) {
            $idexam=$fila[0];
            $idexam++ ;
        }
      $ressult6= pg_query($conexion,"INSERT INTO examen (eid_examen, cobservaciones, eid_antecedente_medico, eid_antecedente_ocular, eid_lensometria, eid_refraccion, eid_medidas, ffecha, cid_empleado, cid_expediente)  VALUES ($idexam, '$cobservacion', $idantm, $idanto, $idlen, $idref, $idmed, '$fechaA', '$cexamino',  '$idexpediente')");


              if(!$result1 || !$ressult2 || !$ressult3 || !$ressult4 || !$ressult5 || !$ressult6){
                pg_query("rollback");
                echo "<script type='text/javascript'>";
                  echo pg_result_error($conexion);
                  echo "alertaSweet('Error','Datos no almacenados', 'error');";
                  echo "document.getElementById('bandera').value='';";
                  echo "document.getElementById('baccion').value='';";
                echo "</script>";
              }else{
                pg_query("commit");
                  echo "<script type='text/javascript'>";
                      echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
                    //echo "location.href=('expediente.php?id='+'".$caccion."');";
                      echo "setTimeout (function llamarPagina(){
                                        location.href=('expediente.php?id='+'".$idexpediente."');
                                     }, 2000);";
                      echo "document.getElementById('bandera').value='';";
                      echo "document.getElementById('baccion').value='';";

                  echo "</script>";
              }

  }
  if($bandera=="cancelar"){
                      echo "<script type='text/javascript'>";
                      echo "document.location.href='examen.php';";
                      echo "</script>";
  }


}


?>
