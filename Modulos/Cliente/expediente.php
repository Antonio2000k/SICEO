<?php //session_start();
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $idexam = $_REQUEST["idexam"];
    $query_s = pg_query($conexion, "select cl.eid_cliente, cl.cnombre, cl.capellido, cl.eedad, cl.csexo,
                                    cl.ctelefonof, cl.cdireccion, ex.cid_expediente from expediente2 as ex
                                    INNER JOIN clientes as cl on ex.eid_cliente = cl.eid_cliente
                                    WHERE ex.cid_expediente = '$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidCliente = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Redad =  $fila[3];
        $Rsexo = $fila[4];
        $Rtelefono = $fila[5];
        $Rdireccion = $fila[6];
        $RidExpediente = $fila[7];
    }

      $sexo=$_SESSION["sexoT"];
      $man='../assets/img/user01.png';
      $woman='../assets/img/userWoman.png';
      $user='user-picture';
      $class='img-responsive img-circle center-box';
      $style='max-width: 110px;';
      if(isset($_SESSION)){
        if($sexo=='masculino'){
          //echo "<img src="../assets/img/user01.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">";
          echo "<img src=\"".$man."\" alt=\"".$user."\" class=\"".$class."\" >";
        }else{
          if($sexo=='femenino'){
            echo "<img src=\"".$woman."\" alt=\"".$user."\" class=\"".$class."\" >";
          }
        }
      }
}else{
        $RidCliente = null;
        $Rnombre = null;
        $Rapellido =null;
        $Redad =  null;
        $Rsexo = null;
        $Rtelefono = null;
        $Rdireccion = null;
        $RidExpediente = null;

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../images/title.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Expediente </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/expediente.js">
      

    </script>
  </head>

  <body class="nav-sm">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col" >
                    <div class="left_col scroll-view" >

                        <div class="clearfix">
                        </div>

                        <?php
                        include "../../ComponentesForm/menu.php";
                        ?>

                    </div>

         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                    <div class="item form-group" >
                      <?php
                        if(isset($_REQUEST["id"])){
                          include("../../Config/conexion.php");

                          $sexo=$Rsexo;
                          $man='../../production/images/boy1.png';
                          $woman='../../production/images/Woman.png';
                          $nombre=$Rnombre;
                          $apellido=$Rapellido;
                          $style='max-width: 110px;';

                             if($sexo=='M'){
                              //echo "<img src="../assets/img/user01.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">";
                                echo "<div class=\"control-label col-md-6 col-sm-6 col-xs-6\"><h3 id=\"perfil\"  align=\"left\" style=\"color: white\">&nbsp&nbsp&nbsp&nbsp&nbsp<img src=\"".$man."\" width=\"35\" height=\"35\" > &nbsp $nombre $apellido </h3></div>
                                <div class=\"control-label col-md-6 col-sm-6 col-xs-6\"><h3 id=\"perfil\"  align=\"right\" style=\"color: white\">N° Expediente: $RidExpediente</h3></div>";
                             }else{

                               if($sexo=='F'){
                                echo "<div class=\"control-label col-md-6 col-sm-6 col-xs-6\"><h3 id=\"perfil\"  align=\"left\" style=\"color: white\"><img src=\"".$woman."\" width=\"35\" height=\"35\" >&nbsp $nombre $apellido </h3></div>
                                <div class=\"control-label col-md-6 col-sm-6 col-xs-6\"><h3 id=\"perfil\"  align=\"right\" style=\"color: white\">N° Expediente: $RidExpediente</h3></div>";

                               }
                             }

                        }
                      ?>
                                <!--  <h3 id="perfil"  align="center" style="color: white"><img width="35" height="35" src="../../production/images/boy1.png"><?php echo " &nbsp ".$Rnombre." ".$Rapellido; ?></h3> -->
                            </div>

                          <div class="clearfix"></div>
                  </div>
                  <?php
                    include("../../Config/conexion.php");
                    $query_s= pg_query($conexion, "SELECT ex.cid_expediente, clientes.cnombre, clientes.capellido FROM expediente2 as ex INNER JOIN clientes ON ex.eid_cliente = clientes.eid_cliente  WHERE ex.cid_expediente = '$iddatos' ");

                    while($fila=pg_fetch_array($query_s)){
                  ?>
                        <div style="float: right;">
                          <button float-right class="btn btn-info btn-icon left-icon"  data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-th-list"></i>
                            <span>Nuevo Examen</span>
                          </button>
                        </div>
                  <?php
                    }
                  ?>
                  <br><br><br>
                  <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist" style="font-size: 15px;">
                        <li class=" active col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab" style="font-size: 2vw;">
                            EXPEDIENTE
                          </a>
                        </li>

                        <li class="col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab" style="font-size: 2vw;">
                            LISTA DE EXAMENES
                          </a>
                        </li>


                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">

                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="formCliente" name="formCliente" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidCliente;?>"/>
                            <input type="hidden" name="caccion" id="caccion" value="<?php echo $RidExpediente;?>"/>
                             <div class="row">
                                <!--Codigos-->
                                  <div class="ln_solid"></div>

                                <div class="item form-group">
                                   <label style="text-align: justify;" class="control-label col-md-1 col-sm-2 col-xs-12">Nombres*</label>
                                   <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" autocomplete="off" readonly="readonly" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   <label  style="text-align: justify;"class="control-label col-md-1 col-sm-2 col-xs-12">Apellidos*</label>
                                    <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" readonly="readonly" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" autocomplete="off" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                  <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                    <div class="col-sm-3">
                                      <label style="text-align: justify;" class="control-label col-md-3 col-sm-4 col-xs-12">Sexo*</label>
                                    </div>
                                       <div class="col-sm-3">
                                          <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M" checked="" <?php if ($Rsexo == "M") echo "checked"; ?>/>
                                       </div>
                                       <div class="col-sm-3">
                                           <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" <?php if ($Rsexo == "F") echo "checked"; ?> />
                                       </div>
                                  </div>


                                  <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="form-group">
                                            <label  class="control-label col-md-5 col-sm-2 col-xs-12">Edad*</label>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control has-feedback-left" id="edad" name="edad"    aria-describedby="inputSuccess2Status" style="padding-left: 55px;"  placeholder="Edad" value="<?php
                                                if($Redad==1){
                                                  echo $Redad  ." "."año";
                                                }else{
                                                  echo $Redad  ." "."años";
                                                }
                                                 ?>" autocomplete="off" readonly="readonly">

                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
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

                                    <br><br><br><br>


                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Direcci&oacuten*</label>
                                            <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="tel" class="form-control has-feedback-left" id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>" autocomplete="off">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                  </div>



                                  <div class="ln_solid"></div>

                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                            <button class="btn btn-info btn-icon left-icon;" onClick="verificar();"> <i  class="fa fa-rotate-left"  name="btnModificar" id="btnModificar"></i> <span >Actualizar Información</span></button>
                                            <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return cancelar();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                      </div>
                                    </center>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">


                                <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>N- Expediente</th>
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Fecha</th>
                                      <th>Ver Examen</th>
                                    </tr>
                                  </thead>


                                  <tbody id="recargarExamen">
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT
                                          ex.cid_expediente,
                                          clientes.cnombre,
                                          clientes.capellido,
                                          examen.ffecha,
                                          examen.eid_examen
                                          FROM
                                          expediente2 as ex
                                          INNER JOIN clientes ON ex.eid_cliente = clientes.eid_cliente
                                          INNER JOIN examen ON examen.cid_expediente = ex.cid_expediente
                                          WHERE ex.cid_expediente = '$iddatos' ");

                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo date('d/m/Y', strtotime($fila[3])); ?></td>

                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon"  onClick="Exam('<?php echo $fila[0]; ?>','<?php echo $fila[4]; ?>')"> <i class="fa fa-th-list"></i> <span>Ver</span></button>

                                       <!-- <button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>-->

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
        <!--modal-->
     <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div style="float: right; color: red">
                <button style="color: red" type="button"  data-dismiss="modal" aria-label="Close">
                  <span style="color: red" aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                <h5 align="center" style=" color: white">ASISTENCIA DE EXPEDIENTE</h5>
                <div class="clearfix"></div>
              </div>
          </div>
          <div class="modal-body modal-md">
            <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel" >

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img class="img-responsive" src="../Ayuda/Clientes/expediente.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/listaExamen.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/examenModal1.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/examenModal2.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/examenModal3.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/examenModal4.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/examenModal5.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/examenModalError.png" alt="...">
                  <div class="carousel-caption">

                  </div>

                </div>
              </div>


              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- footer content -->
        <footer>
          <?php
            include "../../ComponentesForm/footer.php";
          ?>
        </footer>
        </div>
                <!--Aqui va fin el contenido-->
     </div>
  </div>

    <?php
          include "../../ComponentesForm/scripts.php";
        ?>

        <!--<script src="../../bootstrap/js/bootstrap.min.js"></script>  -->
        <script src="../../bootstrap/jquery.bootstrap.wizard.js"></script>

        <script>
        $(document).ready(function() {
            $('#rootwizard').bootstrapWizard();
          window.prettyPrint && prettyPrint()
        });
        </script>

  <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <div  style="font-size: medium;" class="item form-group">
                <label>Paciente: </label>
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
                                  <button  class="btn btn-success btn-icon left-icon;" onclick="guardar();" > <i  class="fa fa-save" name="btnGuardar" id="btnGuardar" ></i> <span >Guardar</span></button>

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
                                      <td style="width:60px; height:40px;"><input type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="dnpde" name="dnpde"></td>
                                      <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5" type="number" onkeypress="return soloNumeros(event,'punto')" class="form-control" id="dip"  name="dip" /></td>
                                      <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5"  type="number" onkeypress="return soloNumeros(event,'punto')"class="form-control" id="altpupi"  name="altpupi"></td>
                                      <td style="width:50px; height:100px;" rowspan="2"><input cols="40" rows="5"   type="number" onkeypress="return soloNumeros(event,'punto')"  class="form-control" id="altoblea"  name="altoblea"></td>
                                      <td style="width:100; height:100px;" rowspan="4">
                                        <input cols="40" rows="5" placeholder="Empleado" type="text" class="form-control examino" id="examino"  name="examino" list="listaEmp">
                                        <datalist id="listaEmp" >
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

  </body>
</html>
<?php

if(isset($_REQUEST["bandera"]) || isset($_REQUEST["bandera2"]) ){
$baccion=$_REQUEST["baccion"];
$bandera2 =$_REQUEST["bandera2"];
$bacciones = $_REQUEST["bacciones"];
$caccion=$_REQUEST["caccion"];
$bandera=$_REQUEST["bandera"];
$nombre=($_REQUEST["nombre"]);
$apellido=($_REQUEST["apellido"]);
$telefono=($_REQUEST["telefono"]);
$edad= cortar($_REQUEST["edad"]);
$direccion=($_REQUEST["direccion"]);
$sexo=$_REQUEST["genero"];

$idexpediente= cortar($_REQUEST["bacciones"]);
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
  if($bandera2=='add'){
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
include("../../Config/conexion.php");
if($bandera=='modificar'){
      pg_query("BEGIN");

            $result=pg_query($conexion,"update clientes set  cnombre='$nombre', capellido='$apellido', eedad='$edad', csexo='$sexo', ctelefonof='$telefono' ,cdireccion='$direccion' where eid_cliente='$baccion'");
              if(!$result){
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
                                      location.href=('expediente.php?id='+'".$caccion."');
                                    }, 2000);";
                echo "document.getElementById('bandera').value='';";
                echo "document.getElementById('baccion').value='';";

                echo "document.getElementById('caccion').value='';";

              echo "</script>";


             }

  }

}
function cortar($palabra){
    $parte = explode(" ",$palabra);
    return $parte[0];
}


?>