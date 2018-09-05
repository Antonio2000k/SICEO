
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
                  if(document.getElementById('user').value=="" ){
                      swal('Error!','Complete los campos!','error');
                      document.getElementById('bandera').value="";
                      }else{  
                        document.getElementById('bandera').value="add";
                        document.frmVerUser.submit();
                        
                        }
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
                
              <button name="btnguardar" id="btnguardar"  class="btn btn-default submit"   onClick="verificar();"><a >Verificar</a>
              </button>
              <button   class="btn btn-default submit" ><a href="../../login.php">Cancelar</a>
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
            echo "<script language='javascript'>";
            echo "alert('$usuariO No existe');";
            echo "</script>";
        }else{
            include("../../Config/conexion.php");
            $query_s=pg_query($conexion,"SELECT * FROM usuarios WHERE cusuario=trim('$usuariO') ");
              
              while ($fila=pg_fetch_array($query_s)){      
                  $idusu=$fila[0]; 
                  echo "$idusu";         
              }
              ?>
                <script language='javascript'>
                    
                    llamarpreguntas('<?php echo $idusu; ?>');
                    
                    </script><?php
        }                 
      }
  }
?>

<?php
  /*if (isset($_REQUEST["bandera"])) {
    $bandera = $_REQUEST["bandera"];
    $baccion=$_REQUEST["baccion"];
    $respuesta = $_REQUEST["respuestas"];
    $usuariO=$_REQUEST["user"];

    include("../../Config/conexion.php");
    if ($bandera == "add") {
      
      pg_query("BEGIN");                          
      include("../../Config/conexion.php");
      $query_s = pg_query($conexion,"select
                    pre.idusuario,
                    pre.idpregunta,
                    pre.respuesta,
                    po.cpregunta
                    from pre_us pre
                    INNER JOIN pregunta po ON pre.idpregunta = po.eid_pregunta
                    WHERE
                    pre.idusuario = '$usuariO'");

          if(!$query_s)
          {
            echo "<script>alert('error');</script>";
            exit;
          }
           
          
            while ($row = pg_fetch_array($query_s)){
              if($respuesta==$row[2]){
              echo "<script type='text/javascript'>";
              echo "alert('Coinciden ');";
              echo "</script>";
                ?>
                <script language='javascript'>
                    
                    llamarPagina('<?php echo $row[0]; ?>');
                    
                    </script><?php
              
              }else{
                echo "<script type='text/javascript'>";
                echo "alert('NO coinciden ');";
                echo "</script>";
              }
            }
          
     /* while ($fila=pg_fetch_array($query_s)){

            if($respuesta!=$fila[2]){
              echo "<script type='text/javascript'> alert('$fila[2]')</script>";
           }else{
              echo "<script type=text/javascript'>";
              echo "alert('Hey...');";
              echo "</script>";
           }
        
      }                       
    }
  */
?>


