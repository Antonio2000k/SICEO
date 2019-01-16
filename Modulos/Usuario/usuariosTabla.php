<?php
  //Prueba de encriptar y desencriptar.
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
  //$iddatos=$_SESSION["idUsuario"];
  if($_SESSION['autenticado']!="yeah" || $t!=1){
    header("Location: ../../login.php");
    exit();
    }
  if(isset($_REQUEST["id"])){
      include("../../Config/conexion.php");
      $iddatos = $_REQUEST["id"];

      //Desencriptacion.
      $cadena_desencriptada = decrypt($iddatos,"fran2");

      $query_s = pg_query($conexion, "SELECT * FROM pbusuarios WHERE cid_usuario=$cadena_desencriptada");
      while ($fila = pg_fetch_array($query_s)) {
          $cid_usuario = $fila[0];
          $cusuario = $fila[1];
          $cpassword = $fila[2];
          $eprivilegio = $fila[3];
          $cid_empleado = $fila[4];
      }

      $existe=pg_query($conexion,"SELECT * FROM pcpre_us WHERE cid_usuario=$cid_usuario");
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
                    $query_s=pg_query($conexion,"SELECT * FROM paempleados WHERE bestado = true");

                   while ($fila = pg_fetch_array($query_s)) {
                     $query_usuario=pg_query($conexion, "SELECT * FROM pbusuarios WHERE cid_empleado='$fila[0]'");

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
                    $query_s=pg_query($conexion,"SELECT * FROM papregunta WHERE bestatico = true");

                   while ($fila = pg_fetch_array($query_s)) {
                     ?>
                    <option value="<?php echo "$fila[0]"; ?>"
                      <?php
                      if($id_pregunta==$fila[0]) {
                        echo "selected";
                      }
                      ?>
                      ><?php echo $fila[1];?></option>
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

                 $query_s=pg_query($conexion,"SELECT * FROM pcpre_us WHERE cid_usuario=$cid_usuario");
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

                   <button type="reset" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="ajax_act();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                 </div>
             </div>
           </center>
         </div>
     </div>
   </form>
