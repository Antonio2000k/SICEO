<?php
if(isset($_REQUEST["user"])){
    include("Config/conexion.php");
    $iddatos = $_REQUEST["user"];
    $query_s = pg_query($conexion, "select * from usuarios where cusuarios='$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidUsuario = $fila[0];
        
    }
}else{
        $RidUsuario = null;
        
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

    <title>Recuperación de Contraseña | </title>
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
    <?php
      include "ComponentesForm/estilos.php";
    ?>
    <!--<link href="build/css/estiloLogin.css" rel="stylesheet"/>-->
    <script type="text/javascript">
        
      function verificar(){
                  if(document.getElementById('user').value=="" ){
                      alet('Error!','Complete los campos!','error');
                      
                      document.getElementById('bandera').value="";
                      }else{
                        
                            //document.getElementById('bandera').value="add";
                            document.frmVerUser.submit();
                            alert("Entro");
                        }
      }
      function verificar2(){
                  if(document.getElementById('respuestas').value=="" ){
                      alet('Error!','Complete los campos!','error');
                      
                      document.getElementById('bandera').value="";
                      }else{
                        
                            document.getElementById('bandera').value="add";
                            document.frmVerUser.submit();
                            alert("Entro");
                        }
      }
      function llamarPagina(user){
  window.open("recuperar.php?user="+user, '_parent');
        
        
    </script>
  </head>

  <body class="main2" >
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <h1 class="text-center"><img src="production/images/SiceoL.png" height="120" width="319"></h1>
          <section class="login_content">

            <form class="cuadro" id="frmVerUser" name="frmVerUser">

              <input type="hidden" name="bandera" id="bandera"/>
              <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidUsuario;?>"/>

              <h1 style="color:#FFFFFF">Recuperación</h1>
              
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required="" id="user" name="user" />
                
              <button class="btn btn-default submit" onClick="verificar();"> 
                <a style="color:#000000" name="btnVerificar" id="btnVerificar" >Verificar</a>
              </button>

              </div>
            </br>
              <div>
                
                <?php
                  include("Config/conexion.php");
                  $usuario = $_REQUEST["user"];
                  $query_s = pg_query($conexion,"select
                    pre.idusuario,
                    pre.idpregunta,
                    po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE
                    pre.idusuario = '$usuario'");
                $rows = pg_num_rows($query_s);
                if($rows==0){
                  echo "<script language='javascript'>";
                  echo "alert('error');";
                  echo "</script>";
                }else{
                      $query_s2 = pg_query($conexion,"select
                          pre.idusuario,
                          pre.idpregunta,
                          po.cpregunta
                          from pre_us pre
                          INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                          WHERE
                          pre.idusuario = '$usuario'");
                    while ($fila = pg_fetch_array($query_s2)) {
                      
                      ?>
                      <fieldset>
                        
                        <input type="text" class="form-control" placeholder="Pregunta de Seguridad" value="<?php echo $fila[2]; ?>" disabled />
                      </fieldset>
                      <div>
                        <input type="password" class="form-control" placeholder="Respuesta" id="respuestas" name="respuestas" />
                      </div>

                      <div>
                        <button class="btn btn-default submit" onClick="verificar2();"> 
                          <a style="color:#000000" name="btnVerificar2" id="btnVerificar2" >Iniciar</a>
                        </button>
                        <button class="btn btn-default submit" > 
                          <a style="color:#000000" name="btnVerificar2" id="btnVerificar2" href="login.php">Cancelar</a>
                        </button>
                      </div>
                    <?php
                      } 
                    }
                ?>
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
    $respuesta = strtoupper($_REQUEST["respuestas"]);
    $usuario=$_REQUEST["user"];

    include("config/conexion.php");
    if ($bandera == "add") {
      pg_query("BEGIN");                          
      
      include("config/conexion.php");
      $query_s = pg_query($conexion,"select
                    pre.idusuario,
                    pre.idpregunta,
                    pre.respuesta,
                    po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE
                    pre.idusuario = '$usuario'");
      while ($fila=pg_fetch_array($query_s)){
            if($respuesta!=$fila[2]){
                echo "<script language='javascript'>";
              echo "alert('ERROR');";
              echo "</script>";
           }else{
              echo "<script language='javascript'>";
              echo "alert('Hey...');";
              
              echo "</script>";
           }
        
      }                       
    }
  }
?>