<?php

//Metodo para encriptar.
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

error_reporting(0);
session_start();
$t=$_SESSION["nivelUsuario"];
if($_SESSION['autenticado']!="yeah" || $t!=1){
  header("Location: ../../login.php");
  exit();
  }
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];

    //Desencriptacion.
    $cadena_desencriptada = decrypt($iddatos,"fran2");

    //Se obtiene el usuario para cuando se va a modificar.
    $query_s = pg_query($conexion, "SELECT * FROM usuarios WHERE cid_usuario=$cadena_desencriptada");
    while ($fila = pg_fetch_array($query_s)) {
        //Se obtienen los valores de la base de datos.
        $cid_usuario = $fila[0];
        $cusuario = $fila[1];
        $cpassword = $fila[2];
        $eprivilegio = $fila[3];
        $cid_empleado = $fila[4];
    }

    $existe=pg_query($conexion,"SELECT * FROM pre_us WHERE cid_usuario=$cid_usuario");
    while ($fila = pg_fetch_array($existe)) {
      $id_pregunta = $fila[1];
    }

}else{
        $cid_usuario = null;
        $cusuario = null;
        $cpassword = null;
        $eprivilegio = null;
        $cid_empleado = null;
        $id_pregunta = null;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
      //Metodo para verificar si un usuario existe el campo toma un color verde, sino el campo sera color rojo.
      function existeUsuario(obj) {
        $.post("user.php",{
          "texto":obj},function(respuesta) {
            if(respuesta=="no") {
              document.getElementById('user').style.borderColor="#21df2c";
            }
            else {
              document.getElementById('user').style.borderColor="#C70039";
            }
        });
      }

      //Metodo que permite comprobar si las contraseñas cumple con los requisitos.
      function comprobarPass(pass) {
        var numeros = "0123456789";
        var letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";

        var existe_letras=0;
        var existe_numeros=0;

        //Se recorre cada uno de los caracteres de la primer contraseña para verificar si contiene numeros y letras.
        for (var i = 0; i < pass.length; i++) {
          if(letras.indexOf(pass.charAt(i)) != -1) {
            existe_letras++;
          }
          if(numeros.indexOf(pass.charAt(i)) != -1) {
            existe_numeros++;
          }
        }

        //Si no existe alguna letra o numero entra al if.
        if(existe_letras==0 || existe_numeros==0) {
          //Si la contraseña es mayor a 0, se deshabilita el campo verificar contraseña y se pone en color rojo, ya que no es valido.
          if(pass.length>0) {
            document.getElementById('pass').style.borderColor="#C70039";
            $("#repass").prop("disabled", true);
          }
          //Se coloca en color rojo solo si es igual a 0.
          else {
            document.getElementById('pass').style.borderColor="#C70039";
          }
        }
        //Si existe algun numero o letra entra aqui.
        else {
          //Si la contraseña es menor a 5 caracteres se colocara en color rojo y se deshabilitara el campo.
          if(pass.length<5) {
            document.getElementById('pass').style.borderColor="#C70039";
            $("#repass").prop("disabled", true);
          }
          //Si la contraseña es mayor a 5 pero menor o igual a 8 caracteres se colocara en color amarillo y se habilitara el campo.
          else if(pass.length>=5 && pass.length<=8) {
            document.getElementById('pass').style.borderColor="#FFB037";
            $("#repass").prop("disabled", false);
          }
          //Si la contraseña es mayor a 5 pero menor o igual a 8 caracteres se colocara en color amarillo y se habilitara el campo.
          else if(pass.length>8 && pass.length<=15) {
            document.getElementById('pass').style.borderColor="#21df2c";
            $("#repass").prop("disabled", false);
          }
        }
      }

      //Esta funcion sirve para cuando el usuario digita su contraseña de nuevo, si cumple con los requisitos de el tamaño de la contraseña se mostrara en diversos colores.
      function comprobarRePass(pass) {
        var coinciden=document.getElementById('pass_coincide');
        if(pass==document.getElementById('pass').value) {
          coinciden.value="si";
          if(pass.length>=5 && pass.length<=8) {
            document.getElementById('repass').style.borderColor="#FFB037";
          }
          else if(pass.length>8 && pass.length<=15) {
            document.getElementById('repass').style.borderColor="#21df2c";
          }
        }
        else {
          coinciden.value="no";
          document.getElementById('repass').style.borderColor="#C70039";
        }
      }

      //Sirve para dejar los campos vacios.
      function limpiarCampos() {
        document.getElementById('user').disabled=enabled;
        document.getElementById('pass').value="";
        document.getElementById('repass').value="";
        document.getElementById('pregunta').disabled=enabled;
        document.getElementById('idempelado').disabled=enabled;
        document.getElementById('respuesta').disabled=enabled;
      }

      //Funcion que recarga un porcion de la pantalla.
      function ajax_act(){
        <?php
          if(isset($_REQUEST["id"])) {
            ?>
              location.href = 'usuarios.php';
            <?php
          }
          else {
            ?>
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
            <?php
          }
        ?>
      }

        //Funcion que sirve para poder ingresar una pregunta personalizada.
        function personalizar(obj) {
          var valorSeleccionado = obj.options[obj.selectedIndex].value;

          if(valorSeleccionado=="personalizada") {
            $("#myModal").modal({backdrop: 'static', keyboard: false});
          }
          else {
            var elemento = document.getElementById('pre_personalizada');
            pre_personalizada.style.fontWeight='bold';
            pre_personalizada.innerText = '';
            var pregunta_usuario = document.getElementById('pregunta_usuario');
            pregunta_usuario.value="";
          }
        }

        //Funcion que sirve cuando se cancela la pregunta personalizada, muestra un mensaje de alerta.
        function colocarPregunta() {
          var pregunta_usuario = document.getElementById('pregunta_usuario');
          var pre_personalizada = document.getElementById('pre_personalizada');
          pregunta_usuario.value="";
          pre_personalizada.style.fontWeight='bold';
          pre_personalizada.innerText = "No ingreso ninguna pregunta";
        }

        //Mensajes de alerta.
        function alertaSweet(titulo,texto,tipo){
          swal(titulo,texto,tipo);
        }

        //Funcion que sirve para asignarle la pregunta personalizada para que esta pueda ser guardada.
        function agregarPregunta() {
          var pregunta_usuario = document.getElementById('pregunta_usuario');
          var pre_personalizada = document.getElementById('pre_personalizada');
          var pregunta = document.getElementById('pregunta_hidden');

          if(pregunta_usuario.value!="") {
            pre_personalizada.innerText = 'Pregunta ingresada';
            pre_personalizada.style.color = "#26B99A";
            pre_personalizada.style.fontWeight='bold';
            //esto deberia transferir los valores
            pre_personalizada.value=pregunta_usuario.value;
            pregunta.value=pregunta_usuario.value;
          }
          else {
            pregunta_usuario.value="";
            pre_personalizada.style.fontWeight='bold';
            pre_personalizada.innerText = "No ingreso ninguna pregunta";
            swal('Error','Debe ingresar una pregunta','error');
          }
        }

        //Funcion que redirecciona a la misma pagina, para recargarla.
        function redireccionar(titulo, texto, tipo) {
          swal({
            title: titulo,
            text: texto,
            type: tipo,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          }).then(function(isConfirm) {
            if(isConfirm.value) {
              location.href='usuarios.php';
            }
          })
        }

      //Funcion que sirve para validar el registro antes que sea ingresado.
      function validar(opcion) {
        var opc=false;
        var campos_vacios=document.getElementById('user').value=="" || document.getElementById('pass').value==""
          || document.getElementById('repass').value=="" || document.getElementById('idempleado').value=="Seleccionar"
          || document.getElementById('pregunta').value=="Seleccionar" || document.getElementById('respuesta').value==""
          || document.getElementById('privilegio').value=="Seleccionar";

        var campos_especiales=document.getElementById('pass_coincide').value=="si";

        if(campos_vacios && campos_especiales)
        {
          swal('Error','Verifique los campos y que la informacion sea la correcta','error');
          opc=false;
        }
        else {
          //Verifica que si es personalizada y si contiene algo el campo
          if(document.getElementById('pregunta').value!="Seleccionar" || document.getElementById('pregunta_usuario').value!="")
          {
            if(document.getElementById('pregunta').value=="personalizada" && document.getElementById('pregunta_usuario').value!="") {
              document.getElementById('pregunta').value=document.getElementById('pregunta_usuario').value;
              opc=true;
            }
            else if(document.getElementById('pregunta').value!="Seleccionar" && document.getElementById('pregunta').value!="personalizada" && document.getElementById('pregunta').value!="") {
              opc=true;
            }
            if(document.getElementById('pregunta_usuario').value=="" && document.getElementById('pregunta').value=="personalizada") {
              opc=false;
            }

            if(opcion=='Guardar') {
              document.getElementById('bandera').value="add";
            }
            else {
              document.getElementById('bandera').value="modif";
            }
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
                                        Bienvenido, en esta sección aquí puede registrar, modificar o ver los usuarios en el sistema.
                                    </p>
                                    <p>
                                      <b>Debe de llenar todos los campos obligatorios (*) para poder
                                        <?php
                                        if(isset($cid_usuario) || $cid_usuario!=null) {
                                          echo "modificar el usuario";
                                        }
                                        else {
                                          echo "registrar un usuario";
                                        }
                                        ?>
                                         en el sistema.</b>
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
                            <?php
                            if(isset($cid_usuario) || $cid_usuario!=null) {
                              echo "MODIFICAR USUARIO";
                            }
                            else {
                              echo "NUEVO USUARIO";
                            }
                            ?>
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
                        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                           <h3 align="center" style=" color: white">Datos Usuario</h3>
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content" id="recargarUsuarios">
                           <form class="form-horizontal form-label-left" id="frmUsuario" name="frmUsuario" method="post">
                             <div class="row">
                                <!--Codigos-->
                                <input type="hidden" name="bandera" id="bandera">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo "$cid_usuario"?>">
                                <input type="hidden" name="pregunta_hidden" id="pregunta_hidden">

                                <div class="item form-group">
                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario
                                       <?php
                                       //Para solo los campos que si lo requiere.
                                       if(isset($cid_usuario) || $cid_usuario!=null) {
                                         echo "";
                                       }
                                       else {
                                         echo "(*)";
                                       }
                                       ?>
                                     </label>
                                       <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="text" class="form-control has-feedback-left" id="user" class="form-control col-md-9 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="user" placeholder="Usuario" autocomplete="off" maxlength="20" value="<?php echo "$cusuario"?>" oninput="existeUsuario(this.value);"
                                         <?php
                                         //Para colocar habilitado o no.
                                         if(isset($cid_usuario) || $cid_usuario!=null) {
                                           echo "disabled='disabled'";
                                         }
                                          ?>
                                          >
                                          <p></p>
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                       </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="password" class="form-control has-feedback-left"  id="pass" class="form-control col-md-9 col-xs-12" data-validate-length-range="6" data-validate-words="2" maxlength="15" name="pass" placeholder="Contraseña" autocomplete="off" oninput="comprobarPass(this.value);">
                                         <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Verificar Contraseña (*)</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                         <input type="password" class="form-control has-feedback-left"  id="repass" class="form-control col-md-7 col-xs-12" maxlength="15" data-validate-words="2" name="repass" placeholder="Repita la contraseña" autocomplete="off" disabled="disabled" oninput="comprobarRePass(this.value);">
                                         <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                      </div>
                                   </div>
                                </div>

                                <div class="text-center">
                                    <small id="passwordHelpBlock" class="form-text text-muted">La contraseña debe ser entre 5-15 caracteres y contener letras y números</small>
                                </div>
                                <br>

                                <!-- Validar si el usuario y contraseña son correctos -->

                                <input type="hidden" name="pass_coincide" id="pass_coincide" value="no">

                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Privilegios
                                          <?php
                                          //Para solo los campos que si lo requiere.
                                          if(isset($cid_usuario) || $cid_usuario!=null) {
                                            echo "";
                                          }
                                          else {
                                            echo "(*)";
                                          }
                                          ?>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select class="form-control" id="privilegio" name="privilegio"
                                           <?php
                                           //Para colocar habilitado o no.
                                           if(isset($eprivilegio) || $eprivilegio!=null) {
                                             echo "disabled='disabled'";
                                           }
                                            ?>
                                           >
                                              <option value="Seleccionar">Seleccionar</option>
                                              <?php
                                              //$query = pg_query($conexion, "SELECT * FROM usuarios WHERE eprivilegio = 1");
                                              //$contar = pg_num_rows($query);

                                                //if($contar<2 || isset($eprivilegio)) {
                                                  ?>

                                                  <?php
                                                //}
                                              ?>
                                              <option value="1"
                                              <?php
                                              if(isset($eprivilegio) || $eprivilegio==1) {
                                                echo "selected";
                                              }
                                              ?>
                                              >Administrador</option>
                                              
                                              <option value="2"
                                              <?php
                                              if(isset($eprivilegio) || $eprivilegio==2) {
                                                echo "selected";
                                              }
                                              ?>
                                              >Empleado</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Empleado
                                          <?php
                                          //Para solo los campos que si lo requiere.
                                          if(isset($cid_usuario) || $cid_usuario!=null) {
                                            echo "";
                                          }
                                          else {
                                            echo "(*)";
                                          }
                                          ?>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select class="form-control" id="idempleado" name="idempleado"
                                           <?php
                                           //Para colocar habilitado o no.
                                           if(isset($cid_empleado) || $cid_empleado!=null) {
                                             echo "disabled='disabled'";
                                           }
                                            ?>
                                           >

                                            <option value="Seleccionar">Seleccione Empleado</option>
                                            <?php
                                             include("../../Config/conexion.php");
                                             $query_s=pg_query($conexion,"SELECT * FROM empleados WHERE bestado = true");

                                            while ($fila = pg_fetch_array($query_s)) {
                                              $query_usuario=pg_query($conexion, "SELECT * FROM usuarios WHERE cid_empleado='$fila[0]'");

                                              //pg_num_rows($query_usuario)==0
                                              if($cid_empleado!=null) {
                                                ?>
                                                <option value="<?php echo "$fila[0]"; ?>"
                                                  <?php
                                                  if($cid_empleado==$fila[0]) {
                                                    echo "selected";
                                                  }
                                                  ?>
                                                  >
                                                  <!-- Esto es para agregar el nombre del empleado, el anterior para el codigo-->
                                                  <?php echo $fila[1]." ".$fila[2] ;?>
                                                </option>
                                                <?php
                                              }
                                              else {
                                                if(pg_num_rows($query_usuario)==0) {
                                                  ?>
                                                  <option value="<?php echo "$fila[0]"; ?>">
                                                    <!-- Esto es para agregar el nombre del empleado, el anterior para el codigo-->
                                                    <?php echo $fila[1]." ".$fila[2] ;?>
                                                  </option>
                                                  <?php
                                                }
                                              }
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pregunta
                                          <?php
                                          //Para solo los campos que si lo requiere.
                                          if(isset($cid_usuario) || $cid_usuario!=null) {
                                            echo "";
                                          }
                                          else {
                                            echo "(*)";
                                          }
                                          ?>
                                        </label>

                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                           <select class="form-control" id="pregunta" name="pregunta" onchange="personalizar(this);"
                                           <?php
                                           //Para solo los campos que si lo requiere.
                                           if(isset($cid_usuario) || $cid_usuario!=null) {
                                             echo "disabled='disabled'";
                                           }
                                           else {
                                             echo "(*)";
                                           }
                                           ?>
                                           >

                                            <option value="Seleccionar">Seleccione Pregunta</option>
                                            <?php
                                             include("../../Config/conexion.php");
                                             $query_s=pg_query($conexion,"SELECT * FROM pregunta");

                                            while ($fila = pg_fetch_array($query_s)) {
                                              if($id_pregunta==$fila[0]) {
                                                ?>
                                                <option value="<?php echo "$fila[0]"; ?>"
                                                  <?php echo "selected"; ?>>
                                                  <?php echo $fila[1];?>
                                                </option>
                                                <?php
                                              }
                                              else if($fila[2]==t) {
                                                ?>
                                                <option value="<?php echo "$fila[0]"; ?>">
                                                  <?php echo $fila[1];?>
                                                </option>
                                                <?php
                                              }
                                             }
                                            ?>
                                            <option value="personalizada">Pregunta personalizada</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Respuesta
                                        <?php
                                        //Para solo los campos que si lo requiere.
                                        if(isset($cid_usuario) || $cid_usuario!=null) {
                                          echo "";
                                        }
                                        else {
                                          echo "(*)";
                                        }
                                        ?>
                                      </label>
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
                                         <input type="text" class="form-control has-feedback-left"  id="respuesta" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="respuesta" placeholder="Respuesta" autocomplete="off" maxlength="50" value="<?php echo "$crespuesta"; ?>"
                                         <?php
                                         //Para solo los campos que si lo requiere.
                                         if(isset($cid_usuario) || $cid_usuario!=null) {
                                           echo "disabled='disabled'";
                                         }
                                         else {
                                           echo "(*)";
                                         }
                                         ?>
                                         >
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <h4 class="control-label col-md-12 col-sm-12 col-xs-12" id="pre_personalizada" style="color: #d9534f; text-align: center"></h4>
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
                                            <button class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="validar(<?php echo "'$estado'"; ?>)">
                                              <i
                                              <?php
                                                if(!isset($_REQUEST["id"])) {
                                                  echo "class='fa fa-save'";
                                                }
                                                else {
                                                  echo "class='fa fa-edit'";
                                                }
                                              ?>
                                              ></i> <span >
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

                                            <button type="reset" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="ajax_act();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
                                      <th>Usuario</th>
                                      <th>Empleado</th>
                                      <th>Privilegio</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT * FROM usuarios order by cid_usuario asc");
                                          while($fila=pg_fetch_array($query_s)){

                                            $empleado = "";
                                            $privilegio = "";

                                            $query_emp= pg_query($conexion, "SELECT * FROM empleados where cid_empleado='$fila[4]'");

                                            while($fila_emp=pg_fetch_array($query_emp)) {
                                              $empleado = $fila_emp[1]." ".$fila_emp[2];
                                            }

                                            if($fila[3]==1) {
                                              $privilegio = "Administrador";
                                            }
                                            else {
                                              $privilegio = "Empleado";
                                            }
                                      ?>
                                      <tr>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $empleado; ?></td>
                                      <td><?php echo $privilegio; ?></td>

                                      <td class="text-center">
                                        <?php
                                        //Encriptacion
                                        $cadena_encriptada = encrypt($fila[0],"fran2");
                                        ?>
                                        <button class="btn btn-info btn-icon left-icon" onclick="location='usuarios.php?id=<?php echo $cadena_encriptada; ?>'"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
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
                            <input type="text" class="form-control has-feedback-left"  id="pregunta_usuario" class="form-control col-md-6 col-xs-12" name="pregunta_usuario" placeholder="Pregunta" autocomplete="off" maxlength="60"><span class="fa fa-user form-control-feedback left"></span>
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
  $pregunta=($_REQUEST['pregunta_hidden']);
  $respuesta=$_REQUEST['respuesta'];
  $id_pregunta_definida = $_REQUEST['pregunta'];

  // if(isset($_REQUEST['pregunta']) && $_REQUEST['pregunta']!="") {
  //   echo "<script type='text/javascript'>";
  //   echo "alert('Entra pregunta normal');";
  //   echo "</script>";
  //   $pregunta=($_REQUEST['pregunta']);
  // }
  // else if(isset($_REQUEST['pregunta_usuario']) && $_REQUEST['pregunta_usuario']!="") {
  //   echo "<script type='text/javascript'>";
  //   echo "alert('Entra pregunta personalizada');";
  //   echo "</script>";
  //   $pregunta=($_REQUEST['pregunta_usuario']);
  // }

  include("../../Config/conexion.php");
  $existe=pg_query($conexion,"SELECT * FROM usuarios WHERE cusuario='$user'");
  $aux_existe=false;

  while($fila=pg_fetch_array($existe)) {
    $aux_existe=true;
  }

  if(!$aux_existe && strlen($pass)>=5 && strlen($repass)>=5) {
    if($pass==$repass) {
      if($bandera=="add") {
        pg_query("BEGIN");
        $result=pg_query($conexion,"INSERT INTO usuarios (cusuario, cpassword, eprivilegio, cid_empleado) VALUES ('$user','$pass',$privilegio,'$idempleado') RETURNING cid_usuario");
        $id_usuario=pg_fetch_array($result);

        $result_pregunta = null;
        $id_pregunta = null;
        $result_pre_usuario = null;
        $registro_pregunta = false;

        if(isset($_REQUEST['pregunta_hidden'])) {
          $resultado=pg_query($conexion,"select MAX(pregunta.eid_pregunta) from pregunta");
          $contado=0;
          while ($fila = pg_fetch_array($resultado)) {
            $contado=$fila[0];
          }
          $contado++;

          $result_pregunta=pg_query($conexion,"INSERT INTO pregunta (eid_pregunta, cpregunta, bestatico) VALUES ($contado, '$pregunta', false) RETURNING eid_pregunta");
          $id_pregunta=pg_fetch_array($result_pregunta);

          if($result_pregunta) {
            $registro_pregunta = true;
          }

          //Para la pregunta de usuario.
          $resultado=pg_query($conexion,"select MAX(pre_us.id_preus) from pre_us");
          $contado=0;
          while ($fila = pg_fetch_array($resultado)) {
            $contado=$fila[0];
          }
          $contado++;

          $result_pre_usuario=pg_query($conexion,"INSERT INTO pre_us (id_preus, idpregunta, cid_usuario, respuesta) VALUES ($contado, $id_pregunta[0],$id_usuario[0],'$respuesta')");
        }
        else {
          $id_pregunta = $id_pregunta_definida;

          $result_pre_usuario=pg_query($conexion,"INSERT INTO pre_us (id_preus, idpregunta, cid_usuario, respuesta) VALUES ($contado, $id_pregunta,$id_usuario[0],'$respuesta')");

          $registro_pregunta = true;
        }

        if(!$result || !$registro_pregunta || !$result_pre_usuario) {
          pg_query("rollback");
          echo "<script type='text/javascript'>";
          echo "alertaSweet('Error','Datos no almacenados', 'error');";
          echo "document.getElementById('bandera').value='';";
          echo "</script>";
        }
        else{
          pg_query("commit");
          echo "<script type='text/javascript'>";
          // echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
          echo "redireccionar('Informacion','Datos Almacenados', 'success');";
          echo "document.getElementById('bandera').value='';";
          // echo "ajax_act('');";
          echo "</script>";
        }
      }

      if($bandera=="modif") {
        pg_query("BEGIN");
        $id=$_REQUEST["id_usuario"];
        $result=pg_query($conexion,"UPDATE usuarios SET cpassword='$pass' WHERE cid_usuario=$id");

        if(!$result){
          pg_query("rollback");
          echo "<script type='text/javascript'>";
          echo "alertaSweet('Error','Datos no modificados', 'error');";
          echo "document.getElementById('bandera').value='';";
          echo "</script>";
        }
        else{
          pg_query("commit");
          echo "<script type='text/javascript'>";
          // echo "alertaSweet('Informacion','Datos modificados', 'success');";
          echo "document.getElementById('bandera').value='';";
          // echo "ajax_act('');";
          echo "redireccionar('Informacion','Datos modificados', 'success');";
          echo "</script>";
        }
      }
    }
    else {
      pg_query("rollback");
      echo "<script type='text/javascript'>";
      echo "alertaSweet('Error','Las contraseñas deben coincidir', 'error');";
      echo "document.getElementById('bandera').value='';";
      echo "</script>";
    }
  }
  else {
    $rango1 = strlen($pass);
    $rango2 = strlen($repass);

    if($aux_existe) {
      echo "<script type='text/javascript'>";
      echo "alertaSweet('Error','No pueden haber dos usuarios iguales.', 'error');";
      echo "document.getElementById('bandera').value='';";
      echo "</script>";
    }
    else if($rango1<5 || $rango2<5) {
      echo "<script type='text/javascript'>";
      echo "alertaSweet('Error','La contraseña debe tener un minimo de 5 caracteres o numeros.', 'error');";
      echo "document.getElementById('bandera').value='';";
      echo "</script>";
    }
  }
}
?>
