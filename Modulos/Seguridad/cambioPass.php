
<?php
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from usuarios WHERE cusuarios = '$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
       $RidUsuario = $fila[0];
       $RPass = $fila[2];

    }
}else{
        $RidUsuario = null;
        $RPass = null;
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cambio de Contraseña | </title>
    <style >
       html, body {
            margin: 0;
            padding: 0;
        }
        .main2 {
            background-image: url("../../production/images/lentes1.png");
            background-position: bottom;
            overflow: hidden;
            height: 100vh;

        }

    </style>
    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <!--<link href="build/css/estiloLogin.css" rel="stylesheet"/>-->
    <script type="text/javascript">

        function verificar(){
                  if(document.getElementById('pass').value=="" || document.getElementById('cpass').value==""){
                      alert('Campos vacios');
                      document.getElementById('bandera').value="";
                      }else{
                            document.getElementById('bandera').value="modificar";
                            document.frmCambio.submit();
                        }
      }

    </script>
  </head>

  <body class="main2" >
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <h1 class="text-center"><img src="../../production/images/SiceoL.png" height="120" width="319"></h1>
          <section class="login_content">
            <form class="cuadro" id="frmCambio" method="post" name="frmCambio"  >

              <input type="hidden" name="bandera" id="bandera"/>
              <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidUsuario;?>"/>

              <h1 style="color:#FFFFFF">Cambio</h1>
              
              <div>
                  <input type="password" class="form-control" placeholder="Nueva contraseña"  id="pass" name="pass"  />
                
                  
                  <input type="password" class="form-control" placeholder="Repita Contraseña" id="cpass" name="cpass"  />
                  

                  <div>
                        <button class="btn btn-default submit" name="btnCambiar"  onClick="verificar();"> </i>Cambiar</button>
                        
                        <button class="btn btn-default submit" type="reset" > 
                          <a style="color:#000000" name="btnCancelar" >Cancelar</a>
                        </button>

                  </div>
            </br>
              
                
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
  if (isset($_REQUEST["bandera"])) {
    $bandera = $_REQUEST["bandera"];
    $baccion=$_REQUEST["baccion"];
    $pass = $_REQUEST["pass"];
    $cpass=$_REQUEST["cpass"];

    include("../../Config/conexion.php");
    
    if($bandera=='modificar'){
        pg_query("BEGIN");
        $result=pg_query($conexion,"update usuarios set cpassword ='$pass' where cusuarios ='$baccion'");      
        
        if(!$result){
          pg_query("rollback");
          echo "<script language='javascript'>";
          echo "alert('Error');";
          echo "document.getElementById('bandera').value='';";
          echo "</script>";
        }else{
          if($pass!=$cpass){
              echo "<script language='javascript'>";
              echo "alert('Respuestas NO coinciden');";
              echo "document.getElementById('bandera').value='';";
              echo "</script>";
          }else{
            pg_query("commit");
          ?>
          <script language='javascript'>
              alert('Datos Cambiados');
              document.location.href='../../login.php';
          </script>
          <?php
          }
          
        }
    }                          
  }
  
?>



