<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$iddatos=$_SESSION["idUsuario"];
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

    <title>SICEO | Pregunta </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script type="text/javascript">
       function verificar() {
                if (document.getElementById('pre').value == "" ) {

                    alert("Campos sin llenar");
                    document.getElementById('bandera').value = "";
                } else {
                	
                    document.getElementById('bandera').value = "add";

                    document.frmPregunta.submit();
                    alert("entra");

                }
            }
    </script>

  </head>

  <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="clearfix">
                        </div>

                        <?php
                        include "../../ComponentesForm/menu.php";
                        ?>

                    </div>



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                  <div>
                      <img align="left" src="../../production/images/cliente.png">
                        <h1 align="center">
                          Pregunta de Seguridad
                        </h1>
                      </img>
                  </div>
                                
                  <div align="center">
                      <p>
                        Bienvenido en esta sección aquí puede registrar la pregunta de seguridad en el sistema, debe de llenar el campo obligatorio (*) de manera correcta y sin equivocarse para poder registrar un usuario.
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
                            PREGUNTA
                          </a>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: #2A3F54">
                           <h3 align="center" style=" color: white">Pregunta de Seguridad</h3>

                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="frmPregunta" name="frmPregunta" >
                           	 <input type="hidden" name="bandera" id="bandera"/>
                             <div class="row">
                                <!--Codigos-->
                               

                                <div class="item form-group">
                                   <label class="control-label col-md-3 col-sm-6 col-xs-12">Pregunta de seguridad:</label>
                                   <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="pre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pre" placeholder="Pregunta" required="required" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   
                                 </div>



                                  <div class="ln_solid"></div>

                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                          <button class="btn btn-success btn-icon left-icon;" style="padding-left: 70px; padding-right: 70px " onclick="verificar()"> <i  class="fa fa-save"></i> <span >Guardar</span></button>
                                           <button class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px "> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                      </div>
                                    </center>
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
  </div>
</div>

                                  </tbody>
                                </table>
                              

                      
        <!-- /page content -->

        <footer>
            <?php
              include "../../ComponentesForm/footer.php";
             ?>
        </footer>
        <?php
          include "../../ComponentesForm/scripts.php";
        ?>

    </body>
</html>

<?php
  if (isset($_REQUEST["bandera"])) {
    $bandera = $_REQUEST["bandera"];
    $pregunta = $_REQUEST["pre"];

    include("../../Config/conexion.php");
    if ($bandera == "add") {
        pg_query("BEGIN");
                                
        include("../../Config/conexion.php");
        $query_s=pg_query($conexion,"select count(*) from pregunta ");

        while ($fila = pg_fetch_array($query_s)) {
            $ida=$fila[0];                                 
            $ida++ ;
        } 
        
        $result = pg_query($conexion, "insert into pregunta(eid_pregunta, cpregunta) values($ida, trim('$pregunta'))");

        if (!$result) {
            pg_query("rollback");
                                    
        } else {
            pg_query("commit");
                                    
        }
    }
  }
?>