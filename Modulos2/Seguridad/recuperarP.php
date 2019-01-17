<?php
if(isset($_REQUEST["user"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["user"];
    $query_s = pg_query($conexion, "select
                    pre.cid_usuario,
                    pre.idpregunta,
                    pre.respuesta,
                    po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE pre.cid_usuario = '$iddatos'");
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

    <title>Recuperación de Contraseña | </title>
    <style >
       html, body {
            margin: 0;
            padding: 0;
        }
        .main2 {
            background: url("../../production/images/lentes1.png") no-repeat center center fixed;   
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }

    </style>
    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <!--<link href="build/css/estiloLogin.css" rel="stylesheet"/>-->
    <script type="text/javascript">

        function verificar(opcion){
          var opc=true;
          if(document.getElementById('respuestas').value==""){
                swal('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc = false;
          }else{  
              if(opcion==="guardar"){
              document.getElementById('bandera').value="add";
              opc = true;
            }
          }

          $(document).ready(function(){
            $("#frmVerUser").submit(function() {
              if (opc!=true) {    
                  return false;
              } else 
                return true;      
            });
          });
      }

    
      
      
      function llamarPagina(id){
  window.open("cambioPass.php?id="+id, '_parent');
  }

  function alertaSweet(titulo,texto,tipo){
        swal(titulo,texto,tipo);
      } 
        
        
    </script>
  </head>

  <body class="main2" >
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <h1 class="text-center"><img src="../../production/images/SiceoL.png" height="120" width="319"></h1>
          <section class="login_content">
            <form class="cuadro" id="frmVerUser" method="post" name="frmVerUser"  >

              <input type="hidden" name="bandera" id="bandera"/>
              <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidUsuario;?>"/>

              <h1 style="color:#FFFFFF">Recuperación</h1>

              <div>
               
                <?php
                  include("../../Config/conexion.php");
                  $usuario = $_REQUEST["id"];
                  $query_s = pg_query($conexion,"SELECT pre.cid_usuario, pre.idpregunta, po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE pre.cid_usuario = '$usuario'");
                  $row = pg_num_rows($query_s);
                  
               if($row=!0){
                      $query_s2 = pg_query($conexion,"SELECT pre.cid_usuario, pre.idpregunta, 
                    po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE pre.cid_usuario = '$usuario'");
                    while ($fila = pg_fetch_array($query_s2)) {
                      ?>
                      <fieldset>
                        
                        <input type="text" class="form-control" placeholder="Pregunta de Seguridad" value="<?php echo $fila[2]; ?>" disabled />
                      </fieldset>
                      <div>
                        <input type="text" class="form-control" placeholder="Respuesta" id="respuestas" name="respuestas"  />
                      </div>

                      <div>
                        <button class="btn btn-default submit"  onClick="verificar('guardar');" > </i>Confirmar </button>
                        
                        <button type="button" class="btn btn-default submit"  name="btnVerificar2" onclick=" location.href='../../login.php'; " > 
                          Cancelar
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

      <?php
          include "../../ComponentesForm/scripts.php";
        ?>
  </body>
</html>


<?php
  if (isset($_REQUEST["bandera"])) {
    $bandera = $_REQUEST["bandera"];
    $baccion=$_REQUEST["baccion"];
    $respuesta = $_REQUEST["respuestas"];
    $usuariO=$_REQUEST["id"];

    include("../../Config/conexion.php");
    if ($bandera == "add") {
      
      pg_query("BEGIN");                          
      include("../../Config/conexion.php");
      $query_s = pg_query($conexion,"select
                    pre.cid_usuario,
                    pre.idpregunta,
                    pre.respuesta,
                    po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE
                    pre.cid_usuario = '$usuariO'");

          if(!$query_s){
            echo "<script>alert('error');</script>";
            exit;
          }else{
            while ($row = pg_fetch_array($query_s)){
              if($respuesta==$row[2]){
              
                ?>
                <script language='javascript'>
                    
                    llamarPagina('<?php echo $row[0]; ?>');
                    
                </script><?php
              
              }else{
                echo "<script type='text/javascript'>";
                echo "swal('Error!','Respuesta incorrecta!','error');";
                echo "</script>";
              }
            }
         } 
      }                       
    }
  
?>
