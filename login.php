<?php session_start();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio de Sesion | </title>
     <!-- Bootstrap -->
 <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

   <!-- SwettAlert2-->
   <link rel="stylesheet" href="vendors/sweetalert2-7.26.12/archivitos/sweetalert2.min.css">
   
   <!-- -->
   <link rel="stylesheet" href="vendors/notifit-2-master/dist/notifit.min.css">
    <style >
       html, body {
            margin: 0;
            padding: 0;
        }
        .main2 {
            background: url("production/images/lentes1.png") no-repeat center center fixed;   
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }
    </style>
     <script language="javascript">
            function verificar(opcion){
              var opc=true;
              if(document.getElementById('usuariox').value=="" || document.getElementById('clavex').value==""){
                swal('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc=false;
                }else{
                  if(opcion==="guardar")
                    document.getElementById('bandera').value="add";
                    opc = true;
                } 

                   $(document).ready(function(){
                    $("#frmSesion").submit(function() {
                        if (opc!=true) {    
                          return false;
                        } else 
                            return true;      
                      });
                  });
            }

           

             function alertaSweet(titulo,texto,tipo){
              swal(titulo,texto,tipo);
            } 

           
      </script>
    
   
    <?php
      include "ComponentesForm/estilos.php";
    ?>
    <!--<link href="build/css/estiloLogin.css" rel="stylesheet"/>-->
  </head>

  <body class="main2" >
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <h1 class="text-center"><img width="319" height="120" src="production/images/SiceoL.png "></h1>
          <section class="login_content">

            <form class="cuadro" id="frmSesion" id="frmSesion" method="post" >

              <input type="hidden" name="bandera" id="bandera"/>
              <input type="hidden" name="baccion" id="baccion" />

              <h1 style="color:#FFFFFF">Inicio de Sesi&oacuten</h1>
              <div>
                <input type="text" name="usuariox" id="usuariox" class="form-control" placeholder="Usuario"  autocomplete="off" />
              </div>
              <div>
                <input type="password" name="clavex" id="clavex" class="form-control" placeholder="Clave" autocomplete="off"  />
              </div>
              <div>
              <!--<div class="checkbox text-center">
                            <label>
                              <input style="color:#FFFFFF" type="checkbox" class="flat" checked="checked"> Recu&eacuterdame
                            </label>
              </div> -->
              
              <button  class="btn btn-default submit"  onClick="verificar('guardar');" >Iniciar</button>
                
                <a style="color:#FFFFFF" class="reset_pass" href="Modulos/Seguridad/recuperar.php">Has perdido la contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <p style="color:#FFFFFF; " >©2018 Todos los Derechos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
      </div>
      <!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons ->
    <script src="/vendors/skycons/skycons.js"></script>
    Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot pluins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date-es-ES.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    <!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="vendors/sweetalert2-7.26.12/archivitos/sweetalert2.min.js"></script>


    
    
    <!-- PNotify3 -->
    <script src="vendors/notifit-2-master/dist/notifit.min.js"></script>

</script>
  </body>
</html>

<?php
if (isset($_REQUEST["bandera"])) {
    $bandera=$_REQUEST["bandera"];
    $usuariO=$_REQUEST["usuariox"];
   // $usuariox=base64_encode($usuariox);
    $clavE=$_REQUEST["clavex"];
    //$clavE=base64_encode($clavE);
  
  include("Config/conexion.php");

  if($bandera=="add"){
  pg_query("BEGIN");
  
  
   $query_s2= pg_query($conexion,"select * from pbusuarios where cusuario=trim('$usuariO') and cpassword=trim('$clavE')  ");
  
  $rows = pg_num_rows($query_s2);
  
  
  if($rows!=0){
  
      $query_s= pg_query($conexion,"select 
          us.cid_usuario,
          us.cusuario,
          us.eprivilegio,
          em.cnombre,
          em.capellido,
          em.cdui,
          em.ctelefonof,
          em.ccelular,
          em.ccorreo,
          em.cdireccion,
          em.csexo,
          em.cid_empleado
          from pbusuarios as us
          inner join paempleados as em on us.cid_empleado = em.cid_empleado where cusuario=trim('$usuariO') and cpassword=trim('$clavE')  ");
    


    while($fila= pg_fetch_array($query_s)){
      $idAccess = $_SESSION["idUsuario"]=$fila[0];
      $nomusAccess =$_SESSION["nombrUsuario"]=$fila[1];
      $_SESSION["nivelUsuario"]=$fila[2];
      $nomAccess = $_SESSION["nombreEmpleado"]=$fila[3];
      $apeAccess = $_SESSION["apellidoEmpleado"]=$fila[4];
      $_SESSION["duiEmpleado"]=$fila[5];
      $_SESSION["telEmpleado"]=$fila[6];
      $_SESSION["celEmpleado"]=$fila[7];
      $_SESSION["correoEmpleado"]=$fila[8];
      $_SESSION["dirEmpleado"]=$fila[9];
      $_SESSION["sexEmpleado"]=$fila[10];
      $idEmpAccess = $_SESSION["cid_empleado"]=$fila[11];

     // $usAc =$_SESSION["idUsuario"];
          if($fila[2] == 1){
            
            $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
            $accion = 'El usuario ' . $nomusAccess. ' inició sesión';
            while ($filas = pg_fetch_array($query_ide)) {
                $ida=$filas[0];                                 
                $ida++ ;
            } 
            ini_set('date.timezone', 'America/El_Salvador');
            $fechaA= date("d/m/Y");
                            $hora = date("Y/m/d ") . date("h:i:s a");
                            $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$nomusAccess')");

            if(!$consult ){
                    pg_query("rollback");
                    echo "<script type='text/javascript'>";
                    echo pg_result_error($conexion);
                    echo "alert('Error');";
                    echo "</script>";
            }else{
                  pg_query("commit");
                  echo "<script type='text/javascript'>";
                  echo "alert('Datos Almacenados');";
                  $_SESSION["autenticado"]="yeah";
                  
                  echo "location.href='index.php';";
                  
                  echo "</script>";
            }
            
          }
          if($fila[2] == 2){
              
              $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
            $accion = 'El usuario ' . $nomusAccess. ' inició sesión';
            while ($filas = pg_fetch_array($query_ide)) {
                $ida=$filas[0];                                 
                $ida++ ;
            } 
            ini_set('date.timezone', 'America/El_Salvador');
            $fechaA= date("d/m/Y");
                            $hora = date("Y/m/d ") . date("h:i:s a");
                            $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$nomusAccess')");
            if(!$consult ){
                    pg_query("rollback");
                    echo "<script type='text/javascript'>";
                    echo pg_result_error($conexion);
                    echo "alert('Error');";
                    echo "</script>";
            }else{
                  pg_query("commit");
                  echo "<script type='text/javascript'>";
                  echo "alert('Datos Almacenados');";
                  $_SESSION["autenticado"]="yeah";
                  echo "location.href='index2.php';";
                  echo "</script>"; 
            }
            
          }
          
      
      
            
      }
    
  }else{
    
    echo "<script type='text/javascript'>";
    echo "swal('Error!','Usuario o contraseña Incorrectos!','error');";
    echo "</script>"; 
    
  }
  
  }
}
?>


