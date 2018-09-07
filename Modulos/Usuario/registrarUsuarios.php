<?php
session_start();
$t=$_SESSION["nivelUsuario"];
//$iddatos=$_SESSION["idUsuario"];
if($_SESSION['autenticado']!="yeah" || $t!=1){
  header("Location: ../../login.php");
  exit();
  }
  date_default_timezone_set('America/El_Salvador');
?>
<?php
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from usuarios where cid_usuario=$iddatos");
    while ($fila = pg_fetch_array($query_s)) {
        $cid_usuario = $fila[0];
        $cusuario = $fila[1];
        $cpassword = $fila[2];
        $eprivilegio = $fila[3];
        $cid_empleado = $fila[4];
    }
}else{
        $cid_usuario = null;
        $cusuario = null;
        $cpassword = null;
        $eprivilegio = null;
        $cid_empleado = null;
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

      function ajax_act(str){
        if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
            } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
              xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.getElementById("recargarUsuarios").innerHTML = xmlhttp.responseText;
          }
      }
      xmlhttp.open("post", "usuariosTabla.php", true);
      xmlhttp.send();
        }

        function personalizar(obj) {
          var valorSeleccionado = obj.options[obj.selectedIndex].value;

          if(valorSeleccionado=="personalizada") {
            //alertaSweet('Informacion','Digite su pregunta', 'info');
            $("#myModal").modal()
          }
          else {
            var elemento = document.getElementById('pre_personalizada');
            elemento.style.display = 'none';
          }
        }

        function colocarPregunta() {
          var elemento = document.getElementById('pre_personalizada');
          elemento.style.display = 'block';

        }

        function alertaSweet(titulo,texto,tipo){
          swal(titulo,texto,tipo);
        }

        function agregarPregunta() {
          if(document.getElementById('pregunta_usuario').value!="") {
            document.querySelector('#pre_personalizada').innerText = 'Pregunta ingresada';
            document.getElementById('pre_personalizada').style.color = "#26B99A";
            document.getElementById('pre_personalizada').style.display = 'block';
            document.getElementById('pre_personalizada').style.fontWeight='bold';
            //swal('Informacion','Pregunta agregada','success');
          }
          else {
            swal('Error','Debe ingresar una pregunta','error');
          }
        }

      function validar(opcion) {
        var opc=true;

        if(document.getElementById('user').value=="" || document.getElementById('pass').value==""
          || document.getElementById('repass').value=="" || document.getElementById('idempleado').value=="Seleccionar"
          || document.getElementById('pregunta').value=="Seleccionar" || document.getElementById('respuesta').value==""
          || document.getElementById('privilegio').value=="Seleccionar")
        {
          swal('Error','Verifique que la información este completa y correcta','error');
          opc=false;
        }
        else {
          //Verifica que si es personalizada y si contiene algo el campo
          if(document.getElementById('pregunta').value!="Seleccionar" || document.getElementById('pregunta_usuario').value!="")
          {
            if(document.getElementById('pregunta').value=="personalizada" && document.getElementById('pregunta_usuario').value!="") {
              document.getElementById('pregunta').value=="";
              opc=true;
            }
            else if(document.getElementById('pregunta').value!="Seleccionar" && document.getElementById('pregunta').value!="personalizada") {
              document.getElementById('pregunta_usuario').value=="";
              opc=true;
            }
            if(document.getElementById('pregunta_usuario').value=="" && document.getElementById('pregunta').value=="personalizada") {
              opc=false;
            }

            if(opcion=="Guardar")
              document.getElementById('bandera').value="add";
            else
              document.getElementById('bandera').value="modif";

          }
          else {
            swal('Error','No ingreso su pregunta','error');
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
                           <form class="form-horizontal form-label-left" id="frmUsuario" name="frmUsuario" method="post">
                             <div class="row">
                                <!--Codigos-->
                                <input type="hidden" name="bandera" id="bandera">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo "$cid_usuario"?>">

                                <div class="item form-group">
                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario (*)</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="text" class="form-control has-feedback-left"  id="user" class="form-control col-md-9 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="user" placeholder="Usuario" required="required" autocomplete="off" maxlength="20" value="<?php echo "$cusuario"?>">
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                       </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="password" class="form-control has-feedback-left"  id="pass" class="form-control col-md-9 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pass" placeholder="Contraseña" required="required" autocomplete="off">
                                         <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Verificar Contraseña (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="password" class="form-control has-feedback-left"  id="repass" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="repass" placeholder="Repita la contraseña" required="required" autocomplete="off">
                                         <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                   </div>
                                </div>

                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" id="comparacionUser" style="display: none">El usuario ya existe</label>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12" id="comparacionPass" style="display: none">Las contraseñas no coinciden</label>
                                  </div>
                                </div>

                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Privilegios (*)</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select class="form-control" id="privilegio" name="privilegio">
                                              <option value="Seleccionar">Seleccionar</option>
                                              <option value="1">Administrador</option>
                                              <option value="2">Empleado</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Empleado (*)</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select class="form-control" id="idempleado" name="idempleado">

                                              <option value="Seleccionar">Seleccione Empleado</option>
                                            <?php
                                             include("../../Config/conexion.php");
                                             $query_s=pg_query($conexion,"select * from empleados ");

                                            while ($fila = pg_fetch_array($query_s)) {
                                              ?>
                                             <option value="<?php echo "$fila[0]"; ?>"><?php echo "$fila[1]" ;?></option>
                                              <?php


                                             } 
                                              
                                            ?>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                 </div>

                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pregunta (*)</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select class="form-control" id="pregunta" name="pregunta" onchange="personalizar(this);">

                                            <option value="Seleccionar">Seleccione Pregunta</option>
                                            <?php
                                             include("../../Config/conexion.php");
                                             $query_s=pg_query($conexion,"select * from pregunta ");

                                            while ($fila = pg_fetch_array($query_s)) {
                                              ?>
                                             <option value="<?php echo "$fila[0]"; ?>"><?php echo "$fila[1]" ;?></option>


                                              <?php


                                             } 
                                              
                                            ?>
                                            <option value="personalizada">Pregunta personalizada</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Respuesta (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">

                                        <?php
                                        $crespuesta=null;

                                        if(isset($_REQUEST['id'])) {
                                          include "../../Config/conexion.php";

                                          $query_s=pg_query($conexion,"SELECT * FROM pre_us WHERE cid_usuario=$cid_usuario");
                                          while ($fila = pg_fetch_array($query_s)) {
                                            $crespuesta = $fila[3];
                                          }
                                        }
                                        else
                                          $crespuesta=null;
                                        ?>
                                         <input type="text" class="form-control has-feedback-left"  id="respuesta" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="respuesta" placeholder="Respuesta" required="required" autocomplete="off" maxlength="50" value="<?php echo "$crespuesta"; ?>">
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <h4 class="control-label col-md-12 col-sm-12 col-xs-12" id="pre_personalizada" style="display: none; color: #d9534f; text-align: center"><b>No ingreso ninguna pregunta</b></h4>
                                  </div>
                                </div>


                                  <div class="ln_solid"></div>

                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                          <div class="form-group">
                                            <?php
                                            if(isset($_REQUEST["id"]))
                                              $estado="Modificar";
                                            else
                                              $estado="Guardar";
                                            ?>
                                            <button class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="validar(<?php echo "'$estado'"; ?>)"> <i  class="fa fa-save"></i> <span >
                                              <?php
                                                if(isset($_REQUEST["id"])) {
                                                  ?>
                                                    Modificar
                                                  <?php 
                                              }
                                                else {
                                                  ?>
                                                  Guardar
                                                  <?php
                                                }
                                               ?>
                                              
                                            </span></button>

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
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody id="recargarUsuarios">
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT * FROM usuarios order by cid_usuario asc");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                      <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[4]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>

                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon" onclick="location='registrarUsuarios.php?id=<?php echo $fila[0]; ?>'"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      <?php } ?>
                                      </td>
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

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              Modal content
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ingrese una pregunta</h4>
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
                  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="colocarPregunta()"><i class="fa fa-close"></i> Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- fin del modal-->

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

if(isset($_REQUEST['bandera'])) {
  $bandera = $_REQUEST['bandera'];
  $user=$_REQUEST['user'];
  $pass=$_REQUEST['pass'];
  $repass=($_REQUEST['repass']);
  $privilegio=($_REQUEST['privilegio']);
  $idempleado=($_REQUEST['idempleado']);
  $pregunta="";



  if(isset($_REQUEST['pregunta']) && $_REQUEST['pregunta']!="") {
    $pregunta=($_REQUEST['pregunta']);
  }
  else if(isset($_REQUEST['pregunta_usuario']) && $_REQUEST['pregunta_usuario']!="") {
    $pregunta=($_REQUEST['pregunta_usuario']);
  }

  $respuesta=$_REQUEST['respuesta'];

  include("../../Config/conexion.php");
  $existe=pg_query($conexion,"SELECT * FROM usuarios WHERE cusuario='$user'");

  $aux=false;

  while($fila=pg_fetch_array($existe)) {
    $aux=true;
  }

  if(!$aux) {
    if($pass==$repass) {
      $pass= base64_encode($pass);
      if($bandera=="add") {
        pg_query("BEGIN");
        /*Create procedure insert
        $user;
        $pass;
        $privilegio;
        $idempleado;
        $pregunta;
        $respuesta
          @IdVeterinaria int,
          @Nom_Veterinaria varchar (20),
          @Direccion varchar (20),
          @IdMasota int,
          @Nom_Mascota varchar (10)
          As
          Begin
          Insert into Veterinaria (IdVeterinaria, Nom_Veterinaria, Direccion)
          Values (@IdVeterinaria, @Nom_Veterinaria, @Direccion)
          Insert into Mascota (IdMascota,IdVeterinaria, Nom_Mascota)
          Values (@IdMascota,@IdVeterinaria, @Nom_Mascota)
          End*/
          $result=pg_query($conexion,"INSERT INTO usuarios (cusuario, cpassword, eprivilegio, cid_empleado) VALUES ('$user','$pass',$privilegio,'$idempleado') ");
          //$result=pg_query($conexion,"INSERT INTO pre_us (id_pregunta, cid_usuario, respuesta) VALUES ('$user','$pass',$privilegio,'$respuesta') ");
            
        if(!$result){
          pg_query("rollback");
          echo "<script type='text/javascript'>";
          echo pg_result_error($conexion);
          echo "alertaSweet('Error','Datos no almacenados', 'error');";
          echo "document.getElementById('bandera').value='';";
          echo "ajax_act('');";
          echo "</script>";
        }
        else{
          pg_query("commit");
          echo "<script type='text/javascript'>";
          echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
          echo "document.getElementById('bandera').value='';";
          echo "ajax_act('');";
          echo "</script>";
        }
      }

      if($bandera=="modif") {
        pg_query("BEGIN");
        $id=$_REQUEST["id_usuario"];
        $result=pg_query($conexion,"UPDATE usuarios SET cusuario='$user', cpassword='$pass', eprivilegio=$privilegio, cid_empleado='$idempleado' WHERE cid_usuario=$id");
            
        if(!$result){
          pg_query("rollback");
          echo "<script type='text/javascript'>";
          echo "alertaSweet('Error','Datos no modificados', 'error');";
          echo "document.getElementById('bandera').value='';";
          echo "ajax_act('');";
          echo "</script>";
        }
        else{
          pg_query("commit");
          echo "<script type='text/javascript'>";
          echo "alertaSweet('Informacion','Datos modificados', 'success');";
          echo "document.getElementById('bandera').value='';";
          echo "ajax_act('');";
          echo "</script>";
        }
      }
    }
    else {
      pg_query("rollback");
      echo "<script type='text/javascript'>";
      echo "alertaSweet('Error','Las contraseñas deben coincidir', 'error');";
      echo "document.getElementById('bandera').value='';";
      echo "ajax_act('');";
      echo "</script>";
    }
  }
  else {
    pg_query("rollback");
    echo "<script type='text/javascript'>";
    echo "alertaSweet('Error','No pueden haber dos usuarios iguales', 'error');";
    echo "document.getElementById('bandera').value='';";
    echo "ajax_act('');";
    echo "</script>";
  }
}
?>