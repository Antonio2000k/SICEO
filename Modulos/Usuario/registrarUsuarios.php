<?php
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select *,TO_CHAR(empleados.ffecha_nac, 'dd/mm/yyyy') from empleados where cid_empleado='$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidEmpleado = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Rtelefono = $fila[3];
        $Rcelular = $fila[4];
        $Rdui = $fila[5];
        $Rsexo = $fila[6];
        $Rfecha = $fila[9];
        $Rdireccion = $fila[8];
    }
}else{
        $RidEmpleado = null;
        $Rnombre = null;
        $Rapellido = null;
        $Rtelefono = null;
        $Rcelular = null;
        $Rdui = null;
        $Rsexo = null;
        $Rfecha = date("d/m/Y");
        $Rdireccion = null;
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

    <title>SICEO | Usuarios </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script type="text/javascript">
        function alertaSweet(titulo,texto,tipo){
          swal(titulo,texto,tipo);
        }

      function validar(opcion) {
        var opc=true;

        if(document.getElementById('user').value=="" || document.getElementById('pass').value==""
          || document.getElementById('repass').value=="" || document.getElementById('idempleado').value=="Seleccionar"
          || document.getElementById('pregunta').value=="Seleccionar" || document.getElementById('respuesta').value==""
          || document.getElementById('privilegio').value=="Seleccionar")
        {
          swal('Error','Complete los campos','error');
          document.getElementById('bandera').value="";
          opc=false;
        }
        else {
          if(document.getElementById('repass').value==document.getElementById('pass').value) {
            if(opcion=="Guardar")
              document.getElementById('bandera').value="add";
            else
              document.getElementById('bandera').value="modif";

            opc=true;
          }
          else {
            swal('Error','Las contraseñas deben coincidir','error');
            opc=false;
          }
        }

        $(document).ready(function(){
          $("#frmUsuario").submit(function() {
              if (opc!=true) {    
                return false;
              } else 
                  return true;      
            });
        });
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
                                           Usuarios
                                        </h1>
                                </div>
                                <div align="center">
                                    <p>
                                        Bienvenido en esta sección aquí puede registrar usuarios en el sistema debe de llenar todos los campos obligatorios (*) para poder registrar un usuario en el sistema.
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
                            NUEVO USUARIO
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                            LISTA DE USUARIOS
                          </a>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: #2A3F54">
                           <h3 align="center" style=" color: white">Datos Usuario</h3>

                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="frmUsuario" name="frmUsuario" method="get">
                             <div class="row">
                                <!--Codigos-->
                                <input type="hidden" name="bandera" id="bandera">

                                <div class="item form-group">
                                   <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario (*)</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="text" class="form-control has-feedback-left"  id="user" class="form-control col-md-9 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="user" placeholder="Usuario" required="required" autocomplete="off" maxlength="15">
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                       </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="password" class="form-control has-feedback-left"  id="pass" class="form-control col-md-9 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pass" placeholder="Contraseña" required="required" >
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                   </div>

                                   <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Verificar Contraseña (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="password" class="form-control has-feedback-left"  id="repass" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="repass" placeholder="Repita la contraseña" required="required" autocomplete="off">
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                   </div>
                                </div>

                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Privilegios (*)</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                           <select class="form-control" id="privilegio" name="privilegio">
                                            <?php 
                                            include '../../Config/conexion.php';

                                            //$array=
                                            ?>
                                              <option value="Seleccionar">Seleccionar</option>
                                              <option value="1">Administrador</option>
                                              <option value="2">Empleado</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Empleado (*)</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                           <select class="form-control" id="idempleado" name="idempleado">

                                              <option value="">Seleccione Empleado</option>
                                            <?php
                                             include("../../Config/conexion.php");
                                             $query_s=pg_query($conexion,"select * from empleados ");

                                            while ($fila = pg_fetch_array($query_s)) {
                                              ?>
                                             <option value="<?php echo "$fila[0]"; ?>"><?php echo "$fila[1]" ;?></option>


                                              <?php


                                             } 
                                              
                                            ?>

                                              <option value="Seleccionar">Seleccionar</option>
                                              <option value="ABC01">fulano de tal</option>
                                              <option value="Emp 2">mengana</option>

                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                 </div>

                                 <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Pregunta (*)</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                           <select class="form-control" id="pregunta" name="pregunta">

                                            <option value="">Seleccione Pregunta</option>
                                            <?php
                                             include("../../Config/conexion.php");
                                             $query_s=pg_query($conexion,"select * from pregunta ");

                                            while ($fila = pg_fetch_array($query_s)) {
                                              ?>
                                             <option value="<?php echo "$fila[0]"; ?>"><?php echo "$fila[1]" ;?></option>


                                              <?php


                                             } 
                                              
                                            ?>
                                              

                                              <option value="Seleccionar">Seleccionar</option>
                                              <option value="xdxdxd">jakñdjaskñjdaksjdaslñk?</option>
                                              <option value="xfxgxg">kljsdklaklvcnskldjaskjdakl?</option>

                                           </select>
                                        </div>
                                     </div>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Respuesta (*)</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                         <input type="text" class="form-control has-feedback-left"  id="respuesta" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="respuesta" placeholder="Respuesta" required="required" >
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    </div>
                                  </div>
                                 </div>




                                  <div class="ln_solid"></div>

                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                          <div class="form-group">
                                            <button class="btn btn-success btn-icon left-icon;" style="padding-left: 70px; padding-right: 70px " onClick="validar('guardar');"> <i  class="fa fa-save"></i> <span >Guardar</span></button>

                                            <button class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px "> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                          </div>
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
                                <div class="x_title">
                                  <h2>USUARIOS </h2>

                                <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Usuario</th>
                                      <th>Empleado</th>
                                      <th>Privilegio</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Administrador</td>

                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Empleado</td>

                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Empleado</td>

                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Empleado</td>

                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>


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
          </div>
        </div>
        <!-- /page content -->

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
    </body>
</html>

<?php 

include "../../Config/conexion.php";

$bandera = $_REQUEST['bandera'];
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$repass = $_REQUEST['repass'];
$privilegio = $_REQUEST['privilegio'];
$idempleado = $_REQUEST['idempleado'];


if($bandera=="add") {
    $existe = false;
    $result = $conexion->query("INSERT INTO usuarios ('cusuarios','cpassword','cprivilegio','eid_pregunta','cid_empleado') VALUES (null,'$pass','$privilegio',$pregunta,'$idempleado')");

    if($result) {
        while ($fila = $result->fetch_object()) {
            echo "<script type='text/javascript'>";
            echo "mostrarMensaje('Datos correctos', 'success', 2500);";
            echo "</script>";
            $existe = true;

if(isset($_REQUEST["bandera"])) {
  $user=$_REQUEST["user"];
  $pass=$_REQUEST["pass"];
  $repass=($_REQUEST["repass"]);
  $privilegio=($_REQUEST["privilegio"]);
  $idempleado=($_REQUEST["idempleado"]);
  $pregunta=($_REQUEST["pregunta"]);
  $respuesta=$_REQUEST["respuesta"];
  include("../../Config/conexion.php");

  if($bandera=="add") {
      pg_query("BEGIN");

      $r=pg_query($conexion,"select * from usuarios");

        $result=pg_query($conexion,"insert into usuarios(cusuarios, cpassword, cid_empleado, eprivilegio) values('$user','$pass','$idempleado',$privilegio)");
          
        if(!$result){
          pg_query("rollback");
          echo "<script language='text/javascript'>";
          echo "alertaSweet('Error','Datos no almacenados', 'error');";
          echo "alert('No sirve');";
                  echo "document.getElementById('bandera').value='';";
          echo "</script>";
          }else{
            pg_query("commit");
            echo "<script language='javascript'>";
                      echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
                      echo "document.getElementById('bandera').value='';";
                      echo "</script>";
          }

        }
      }
?>