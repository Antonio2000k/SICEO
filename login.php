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
    <style >
       html, body {
            margin: 0;
            padding: 0;
        }
        .main2 {
            background-image: url("production/images/lentes1.png");
            background-position: bottom;
            overflow: hidden;
            height: 100vh;

        }
    </style>
     <script language="javascript">
            function verificar(){
              if(document.getElementById('usuariox').value=="" || document.getElementById('clavex').value==""){
                alert('Campos vacios');
                  
                }else{
                  document.getElementById('bandera').value="add";
                      
                      document.frmSesion.submit();
                      alert('sigue');
                  }
                  
                  
            }
        </script>

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
   <link rel="stylesheet" href="vendors/sweetalert2-7.26.12/dist/sweetalert2.min
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

            <form class="cuadro" id="frmSesion" id="frmSesion" method="post">

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
              <div class="checkbox text-center">
                            <label>
                              <input style="color:#FFFFFF" type="checkbox" class="flat" checked="checked"> Recu&eacuterdame
                            </label>
              </div>
              <button type="button" class="btn btn-default submit"  onClick="verificar();" >Iniciar</button>
                
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
  </body>
</html>

<?php

if(isset($_REQUEST["bandera"])){
  echo "<script language='javascript'>";
    echo "alert('Error');";
    echo "</script>";
    $bandera=$_REQUEST["bandera"];
  $usuariox=$_REQUEST["usuariox"];
  $clavex=$_REQUEST["clavex"];
  //$us_en = password_hash($usuariox, PASSWORD_DEFAULT);
  $pas_en = password_hash($clavex, PASSWORD_DEFAULT);
  
  include("Config/conexion.php");
  
  if($bandera=="add"){
  pg_query("BEGIN");
  
  
   $query_s2= pg_query($conexion,"select * from usuarios where cusuarios=trim('$usuariox') and cpassword=trim('$pas_en') and cprivilegio=1 ");
  
  $rows = pg_num_rows($query_s2);
  
  
  if($rows==0){
  
      $query_s= pg_query($conexion,"select * from usuarios where cusuarios=trim('$usuariox') and password=trim('$clavex')");
    
    while($fila= pg_fetch_array($query_s)){
      
      
    
      
      $_SESSION["autenticado"]="yeah";
      echo "<script language='javascript'>";
      echo "location.href='docs/index.php';";
      echo "</script>"; 
      
      
            
      }
    
echo "<script language='javascript'>";
    echo "alert('Error');";
    echo "</script>";
    
    
  }else{
    
    echo "<script language='javascript'>";
    echo "alert('Error2');";
    echo "</script>";
    
  }
  
  }
}
?>



