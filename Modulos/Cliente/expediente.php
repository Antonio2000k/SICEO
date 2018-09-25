<?php //session_start();
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select cl.eid_cliente, cl.cnombre, cl.capellido, cl.eedad, cl.csexo,
                                    cl.ctelefonof, cl.cdireccion, ex.cid_expediente from expediente2 as ex 
                                    INNER JOIN clientes as cl on ex.eid_cliente = cl.eid_cliente
                                    WHERE ex.cid_expediente = '$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidCliente = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Redad =  $fila[3];
        $Rsexo = $fila[4];
        $Rtelefono = $fila[5];
        $Rdireccion = $fila[6];
        $RidExpediente = $fila[7];
    }

      $sexo=$_SESSION["sexoT"];
      $man='../assets/img/user01.png';
      $woman='../assets/img/userWoman.png';
      $user='user-picture';
      $class='img-responsive img-circle center-box';
      $style='max-width: 110px;';
      if(isset($_SESSION)){
        if($sexo=='masculino'){  
          //echo "<img src="../assets/img/user01.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">"; 
          echo "<img src=\"".$man."\" alt=\"".$user."\" class=\"".$class."\" >";
        }else{
          if($sexo=='femenino'){
            echo "<img src=\"".$woman."\" alt=\"".$user."\" class=\"".$class."\" >";
          }   
        }
      }
}else{
        $RidCliente = null;
        $Rnombre = null;
        $Rapellido =null;
        $Redad =  null;
        $Rsexo = null;
        $Rtelefono = null;
        $Rdireccion = null;
        $RidExpediente = null;
        
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../images/title.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Expediente </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script type="text/javascript">
      function Exam(id){
         window.open("../../reporteExamen.php?id="+id);
      }
      function NuevoExam(id){
         window.open("examen.php?id="+id, '_parent');
      }

      function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla) == -1 && !tecla_especial){
                NotificacionSoloLetras2('error',"<b>Error: </b>Solo se permiten letras");
                return false;
            }       
        }

        function vali(opcion) {
            
            
            if(opcion==='telefono'){
                var valor = document.getElementById('telefono').value;
                if (/^[0-9]{4}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('telefono').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Telefono</b>");
                }
            }
            if(opcion==='edad'){
                var valor = document.getElementById('edad').value;
                if (/^[0-9]{2}$/.test(valor)) {

                }else {
                    document.getElementById('edad').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Edad</b>");
                }
            }
                   
        }
        
        function limpia() {
            var val = document.getElementById("nombre").value;
            var tam = val.length;
            for(i = 0; i < tam; i++) {
                if(!isNaN(val[i]))
                    document.getElementById("nombre").value = '';
            }
        }
        
      function verificar(){
          var opc=true;
            if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" ||
            document.getElementById('telefono').value=="" || document.getElementById('edad').value=="" ||
            document.getElementById('direccion').value=="" ){
               swal('Error!','Complete los campos!','error');
                
                document.getElementById('bandera').value="";
                
                opc=false;
            }else{
                
                document.getElementById('bandera').value="modificar";

                //document.formCliente.submit();
               
                
                opc=true;
            }
          
          $(document).ready(function(){
          $("#formCliente").submit(function() {
              if (opc!=true) {    
                return false;
              } else 
                  return true;      
            });
        });
          
      }

    function limpiarIn(opcion){
        if(opcion=="limpiarM"){
            document.getElementById('bandera').value='cancelar';
        }else{
            $(document).ready(function(){
              $("#formCliente")[0].reset();
              $("#formCliente").submit(function() {
                  return false;   
                });
            });
        }
    }
        
    function alertaSweet(titulo,texto,tipo){
      swal({
            position:'center',
            text: texto,
            type: tipo,
            title: titulo,
            showConfirmButton: false,
            
          });
    }      
        
        function cancelar(){
        location.href=('listaCliente.php');
      }
        
    function NotificacionSoloLetras2(tipo,msg){
        notif({
          type:tipo,
          msg:msg ,
          position: "center",
          timeout: 3000,
          clickable: true
            
        });
    }
    
    

      
    </script>
  </head>

  <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col" >
                    <div class="left_col scroll-view" ">
                        
                        <div class="clearfix">
                        </div>

                        <?php
                        include "../../ComponentesForm/menu.php";
                        ?>
                        
                    </div>

         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                    <div class="item form-group" >
                      <?php
                        if(isset($_REQUEST["id"])){
                          include("../../Config/conexion.php");
                          
                          $sexo=$Rsexo;
                          $man='../../production/images/boy1.png';
                          $woman='../../production/images/Woman.png';
                          $nombre=$Rnombre;
                          $apellido=$Rapellido;
                          $style='max-width: 110px;';
                          
                             if($sexo=='M'){  
                              //echo "<img src="../assets/img/user01.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">"; 
                                echo "<div class=\"control-label col-md-6 col-sm-2 col-xs-12\"><h3 id=\"perfil\"  align=\"left\" style=\"color: white\">&nbsp&nbsp&nbsp&nbsp&nbsp<img src=\"".$man."\" width=\"35\" height=\"35\" > &nbsp $nombre $apellido </h3></div>
                                <div class=\"control-label col-md-6 col-sm-2 col-xs-12\"><h3 id=\"perfil\"  align=\"right\" style=\"color: white\">N° Expediente: $RidExpediente</h3></div>";
                             }else{
                                      
                               if($sexo=='F'){
                                echo "<div class=\"control-label col-md-6 col-sm-2 col-xs-12\"><h3 id=\"perfil\"  align=\"left\" style=\"color: white\"><img src=\"".$woman."\" width=\"35\" height=\"35\" >&nbsp $nombre $apellido </h3></div>
                                <div class=\"control-label col-md-6 col-sm-2 col-xs-12\"><h3 id=\"perfil\"  align=\"right\" style=\"color: white\">N° Expediente: $RidExpediente</h3></div>";
                                  
                               }   
                             }
                          
                        }       
                      ?>  
                                <!--  <h3 id="perfil"  align="center" style="color: white"><img width="35" height="35" src="../../production/images/boy1.png"><?php echo " &nbsp ".$Rnombre." ".$Rapellido; ?></h3> -->
                            </div>
                              
                          <div class="clearfix"></div>
                  </div>
                  <?php
                    include("../../Config/conexion.php");
                    $query_s= pg_query($conexion, "SELECT ex.cid_expediente, clientes.cnombre, clientes.capellido FROM expediente2 as ex INNER JOIN clientes ON ex.eid_cliente = clientes.eid_cliente  WHERE ex.cid_expediente = '$iddatos' ");
                                        
                    while($fila=pg_fetch_array($query_s)){
                  ?>
                        <div style="float: right;">
                          <button float-right class="btn btn-info btn-icon left-icon"  onClick="NuevoExam('<?php echo $fila[0]; ?>')"> <i class="fa fa-th-list"></i> <span>Nuevo Examen</span></button>
                        </div>
                  <?php
                    }
                  ?>
                  <br><br><br>
                  <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist" style="font-size: 15px;">
                        <li class=" active col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab" style="font-size: 2vw;">
                            EXPEDIENTE
                          </a>
                        </li>
                        
                        <li class="col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab" style="font-size: 2vw;">
                            LISTA DE EXAMENES
                          </a>
                        </li>
                        

                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        
                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="formCliente" name="formCliente" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidCliente;?>"/>
                            <input type="hidden" name="caccion" id="caccion" value="<?php echo $RidExpediente;?>"/>
                             <div class="row">
                                <!--Codigos-->
                                  <div class="ln_solid"></div>

                                <div class="item form-group">
                                   <label style="text-align: justify;" class="control-label col-md-1 col-sm-2 col-xs-12">Nombres*</label>
                                   <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" autocomplete="off" readonly="readonly" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   <label  style="text-align: justify;"class="control-label col-md-1 col-sm-2 col-xs-12">Apellidos*</label>
                                    <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" readonly="readonly" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" autocomplete="off" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                  <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                    <div class="col-sm-3">
                                      <label style="text-align: justify;" class="control-label col-md-3 col-sm-4 col-xs-12">Sexo*</label>
                                    </div>
                                       <div class="col-sm-3">
                                          <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M" checked="" <?php if ($Rsexo == "M") echo "checked"; ?>/>
                                       </div>
                                       <div class="col-sm-3">
                                           <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" <?php if ($Rsexo == "F") echo "checked"; ?> />
                                       </div>
                                  </div>


                                  <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="form-group">
                                            <label  class="control-label col-md-5 col-sm-2 col-xs-12">Edad*</label>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control has-feedback-left" id="edad" name="edad"    aria-describedby="inputSuccess2Status" style="padding-left: 55px;"  placeholder="Edad" value="<?php echo $Redad ?>" autocomplete="off" readonly="readonly">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>        
                                            </div>
                                        </div>
                                    </div>
                                 </div>

                                 <div class="ln_solid"></div>


                                  <div class="item form-group">
                                    
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Telefono de contacto*</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" data-inputmask="'mask': '9999-9999'" value="<?php echo $Rtelefono; ?>" autocomplete="off" onblur="vali('telefono');">
                                      <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <br><br><br><br>
                                    

                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Direcci&oacuten*</label>
                                            <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="tel" class="form-control has-feedback-left" id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>" autocomplete="off">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                  </div>

                                  
                                                
                                  <div class="ln_solid"></div>
                                                
                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                            <button class="btn btn-info btn-icon left-icon;" onClick="verificar();"> <i  class="fa fa-rotate-left"  name="btnModificar" id="btnModificar"></i> <span >Actualizar Información</span></button>
                                            <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return cancelar();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>   
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
                                
                                
                                <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>N-</th>
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Fecha</th>
                                      <th>Expediente</th>
                                    </tr>
                                  </thead>


                                  <tbody id="recargarExamen">
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT
                                          ex.cid_expediente,
                                          clientes.cnombre,
                                          clientes.capellido,
                                          examen.ffecha
                                          FROM
                                          expediente2 as ex
                                          INNER JOIN clientes ON ex.eid_cliente = clientes.eid_cliente
                                          INNER JOIN examen ON examen.cid_expediente = ex.cid_expediente
                                          WHERE ex.cid_expediente = '$iddatos' ");
                                        
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo date('d/m/Y', strtotime($fila[3])); ?></td>
                                      
                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon"  onClick="Exam('<?php echo $fila[0]; ?>')"> <i class="fa fa-th-list"></i> <span>Ver</span></button>
                                      
                                       <!-- <button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>-->

                                      </td>
                                    </tr>
                                    <?php
                                      }
                                        ?>
                                    
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
        
        <!-- /page content -->

        <!-- footer content -->
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
    
        <!--<script src="../../bootstrap/js/bootstrap.min.js"></script>  -->
        <script src="../../bootstrap/jquery.bootstrap.wizard.js"></script>
        <script src=".././/bootstrap/prettify.js"></script>
        <script>
        $(document).ready(function() {
            $('#rootwizard').bootstrapWizard();
          window.prettyPrint && prettyPrint()
        });
        </script>
	
  </body>
</html>
<?php
if(isset($_REQUEST["bandera"])){
$baccion=$_REQUEST["baccion"];
$caccion=$_REQUEST["caccion"];
$bandera=$_REQUEST["bandera"];
$nombre=($_REQUEST["nombre"]);
$apellido=($_REQUEST["apellido"]);
$telefono=($_REQUEST["telefono"]);
$edad=$_REQUEST["edad"];
$direccion=($_REQUEST["direccion"]);
$sexo=$_REQUEST["genero"];
include("../../Config/conexion.php");
  if($bandera=='modificar'){
      pg_query("BEGIN");
        
            $result=pg_query($conexion,"update clientes set  cnombre='$nombre', capellido='$apellido', eedad='$edad', csexo='$sexo', ctelefonof='$telefono' ,cdireccion='$direccion' where eid_cliente='$baccion'");    
              if(!$result){
                pg_query("rollback");
          echo "<script type='text/javascript'>";
          echo pg_result_error($conexion);
          echo "alertaSweet('Error','Datos no almacenados', 'error');";
          echo "document.getElementById('bandera').value='';";
            echo "document.getElementById('baccion').value='';";
            
          echo "</script>";
              }else{
                pg_query("commit");
                echo "<script type='text/javascript'>";
                 echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
                //echo "location.href=('expediente.php?id='+'".$caccion."');";
                  echo "setTimeout (function llamarPagina(){
                                      location.href=('expediente.php?id='+'".$caccion."');
                                    }, 2000);";
                echo "document.getElementById('bandera').value='';";
                echo "document.getElementById('baccion').value='';";
              
                echo "document.getElementById('caccion').value='';";
                
              echo "</script>";   

              
             }
        
  }
  if($bandera=="cancelar"){
                      echo "<script type='text/javascript'>";
                      echo "document.location.href='expediente.php';";
                      echo "</script>";
  }

     
}




function validaCliente($baccion){
    $valor=0;
    include("../../Config/conexion.php");
    $query_s= pg_query($conexion, "select * from cliente order by cnombre");
        while($fila=pg_fetch_array($query_s)){
            if(strcmp($fila[0],$baccion)===0){
                $valor=0;
            }
        }
    return $valor;
}


function mensajeInformacion($titulo,$mensaje,$tipo){
            echo "<script language='javascript'>";
            echo "alertaSweet('".$titulo."','".$mensaje."', '".$tipo."');";
            echo "document.getElementById('bandera').value='';";
            echo "document.getElementById('baccion').value='';";
            echo "ajax_act('');";
            echo "</script>";
    
}

?>


<!--<div role="tabpanel" class="tab-pane fade " id="tab_content3" aria-labelledby="examen-tab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <div class="x_panel">
                                        <br>
                                          <div class="x_title">
                                                <div class="clearfix"></div>
                                          </div>
                                          
                                        <form class="form-horizontal form-label-left">
                                           <div class="row">
                                                <section id="wizard">
                                                  <div id="rootwizard">
                                                    <div class="navbar">
                                                      <div class="navbar-inner">
                                                        <div class="container">
                                                    <ul>
                                                        <li><a href="#tab1" data-toggle="tab">Antecedentes Medicos</a></li>
                                                        <li><a href="#tab2" data-toggle="tab">Lensometria</a></li>
                                                        <li><a href="#tab3" data-toggle="tab">Refraccion final </a></li>
                                                        <li><a href="#tab4" data-toggle="tab">Medidas</a></li>
                                                        
                                                    </ul>
                                                     </div>
                                                      </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="tab1">
                                                          <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="3">Antecedentes medicos</th>
                                                                <th colspan="5">Antc y Dx Ocular</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3"></th>
                                                                <th ></th>
                                                                <th colspan="2">Persoal</th>
                                                                <th colspan="2">Familiar</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>DM</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td style="text-align: center;">Glaucoma</td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                          <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Esfera</th>
                                                                <th>Cilindro</th>
                                                                <th class="numeric">Eje</th>
                                                                <th class="numeric">Adiccion</th>
                                                                <th class="numeric">Prisma</th>
                                                                <th class="numeric">CB</th>
                                                                <th class="numeric">AV LEJ</th>
                                                                <th class="numeric">AV CE</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Ojo Derecho</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <div style="text-align: center;">
                                                          <label ">Diseño y tiempo de uso</label>
                                                          <br>
                                                          <textarea style="width: 800px; height: 102px;" name="comment"></textarea>
                                                        </div>
                                                        </div>
                                                      <div class="tab-pane" id="tab3">
                                                        <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="numeric">AVscL</th>
                                                                <th class="numeric">AVscC</th>
                                                                <th>Esfera</th>
                                                                <th>Cilindro</th>
                                                                <th class="numeric">Eje</th>
                                                                <th class="numeric">Adiccion</th>
                                                                <th class="numeric">Prisma</th>
                                                                <th class="numeric">CB</th>
                                                                <th class="numeric">AV LEJ</th>
                                                                <th class="numeric">AV CE</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Ojo Derecho</td>
                                                                <td><input type="text" class="form-control" name="avscl[]"></td>
                                                                <td><input type="text" class="form-control" name="avscc[]"></td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="avscl[]"></td>
                                                                <td><input type="text" class="form-control" name="avscc[]"></td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <div style="text-align: center;">
                                                          <label ">Diseño</label>
                                                          <br>
                                                          <textarea  style="width: 800px; height: 102px;"name="comment"></textarea>
                                                        </div>
                                                        </div>
                                                      <div class="tab-pane" id="tab4">
                                                        <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr align="center"">
                                                                <th  colspan="5">Medidas</th>
                                                                <th>Examino</th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td style="width:50px; height:20px;"></td>
                                                                <td style="width:100px; height:20px;">DNP</td>
                                                                <td style="width:100px; height:20px;">DIP</td>
                                                                <td style="width:100px; height:20px;">ALT PUPILAR</td>
                                                                <td style="width:100px; height:20px;">ALT DE OBLEA</td>
                                                                <td></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Derecho</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td rowspan="2"><input cols="40" rows="5" style="width:100px; height:100px;" type="text" class="form-control" name="cil[]" /></td>
                                                                <td rowspan="2"><input cols="40" rows="5" style="width:100px; height:100px;" type="text" class="form-control" name="eje[]"></td>
                                                                <td rowspan="2"><input cols="40" rows="5" style="width:100px; height:100px;" type="text"  class="form-control" name="adiccion[]"></td>
                                                                <td rowspan="4"><input cols="40" rows="5" style="width:400px; height:100px;" type="text" class="form-control" name="prima[]"></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                
                                                                
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <div style="text-align: center;">
                                                          <label ">Observacion</label>
                                                          <br>
                                                          <textarea style="width: 800px; height: 102px;" rows="5" cols="100" name="comment"></textarea>
                                                        </div>
                                                        </div>
                                                      
                                                      <ul class="pager wizard">
                                                        <li class="previous first" style="display:none;"><a href="#">Primera</a></li>
                                                        <li class="previous"><a >Anterior</a></li>
                                                        <li class="next last" style="display:none;"><a href="#">Ultima</a></li>
                                                          <li class="next"><a >Siguiente</a></li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </section>
                                            
                                          </div>
                                        </form>

                                      </div>
                                      <br><br><br>
                                    </div>
                                </div>-->