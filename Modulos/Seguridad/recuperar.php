
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
          if(document.getElementById('user').value=="" ){
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
      
      function llamarpreguntas(id){
        window.open("recuperarP.php?id="+id, '_parent');
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
                <input type="text" class="form-control" placeholder="Usuario"  id="user" name="user"  autofocus autocomplete="off" />
                
              <button name="btnguardar" id="btnguardar"  class="btn btn-default submit"   onClick="verificar('guardar');">Verificar
              </button>
              <button type="button"  class="btn btn-default submit" onclick=" location.href='../../login.php' " >Cancelar
              </button>

              </div>
            </br>
              
              <div>
               
             
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
      $usuariO=$_REQUEST["user"];                  
      $idusu;

      include("../../Config/conexion.php");
      if ($bandera == "add") {
      pg_query("BEGIN");

      include("../../Config/conexion.php");
      $query_s=pg_query($conexion,"SELECT * FROM usuarios WHERE cusuario=trim('$usuariO')");
      
      while ($fila=pg_fetch_array($query_s)){          
        $existe=$fila[1];
        //echo "$existe";
      }

        if($existe==null){
            echo "<script type='text/javascript'>";
            echo "swal('Error!','Usuario NO existe!','error');";
            echo "</script>";
        }else{
            include("../../Config/conexion.php");
            $query_s=pg_query($conexion,"SELECT * FROM usuarios WHERE cusuario=trim('$usuariO') ");
              
              while ($fila=pg_fetch_array($query_s)){      
                  $idusu=$fila[0];         
              }
              echo "<script type='text/javascript'>";
              echo "llamarpreguntas('".$idusu."');";
              echo "</script>";              
                    
        }                 
      }
  }
?>
