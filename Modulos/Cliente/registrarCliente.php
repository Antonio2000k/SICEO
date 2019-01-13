<?php session_start();
$t=$_SESSION["nivelUsuario"];
$idAccess = $_SESSION["idUsuario"];
$nomusAccess =$_SESSION["nombrUsuario"];
$nomAccess = $_SESSION["nombreEmpleado"];
$apeAccess = $_SESSION["apellidoEmpleado"];

if($_SESSION['autenticado']!="yeah" || $t!=1  ){
  header("Location: ../../index.php");
  exit();
  }
?>
<?php
//Recuperar informacion del cliente para modificar cliente
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from clientes where eid_cliente='$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidCliente = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Rfecha =  $fila[3];
        $Rsexo = $fila[4];
        $Rtelefono = $fila[5];
        $Rdireccion = $fila[6];
        
    }
}else{
        $RidCliente = null;
        $Rnombre = null;
        $Rapellido =null;
        $Redad =  null;
        $Rsexo = null;
        $Rtelefono = null;
        $Rdireccion = null;
        
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

    <title>SICEO | Registrar Cliente </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script src="js/cliente.js"></script>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                 <div >
                     <img  align="left" src="../../production/images/emplea.png" width="120" height="120">
                        <h1 class="col-xs-12 col-sm-8 col-md-10" align="center">
                          Registrar Cliente
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <h4 style="font-size: medium;" class="col-xs-12 col-sm-8 col-md-10 " >
                        Bienvenido en esta sección puede registrar clientes en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente. En la pestaña <b>LISTA DE CLIENTES</b> se muestran todos los clientes registrados.
                        
                      </h4>
                  </div>
                  
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                       <li  class="active col-md-5 col-sm-5 col-xs-5" role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab" >
                             REGISTRAR CLIENTE 
                          </a>
                        </li>
                        <li class="col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="false"  href="listaCliente.php" id="profile-tab" >
                            LISTA DE CLIENTES
                          </a>
                        </li>
                    </ul>
                    <!-- Formulario para registar cliente -->
                 <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                           <h3 align="center" style=" color: white">Datos Personales</h3>
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="formCliente" name="formCliente" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidCliente;?>"/>
                            
                             <div class="row">
                                
                                  <div class="ln_solid"></div>

                                <div class="item form-group">
                                   <label class="control-label col-md-1 col-sm-2 col-xs-12">Nombres*</label>
                                   <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" onblur="vali('nombre');" autocomplete="off" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   <label class="control-label col-md-1 col-sm-2 col-xs-12">Apellidos*</label>
                                    <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" onblur="vali('apellido');" autocomplete="off" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                  <label class="control-label col-md-1 col-sm-2 col-xs-12">Sexo*</label>
                                  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                      <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M" checked="" <?php if ($Rsexo == "M") echo "checked"; ?>/>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-4">
                                      <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" <?php if ($Rsexo == "F") echo "checked"; ?> />
                                    </div>
                                  </div>

                                  <div class="col-md-7 col-sm-4 col-xs-12 form-group ">
                                            
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de Nacimiento*</label>
                                            <div class="form-group">
                                                <div class="col-md-4 col-xs-12 col-sm-4" id='myDatepicker3'>
                                                    <input type='text' class="form-control has-feedback-left col-md-2 col-sm-4 col-xs-12"  id="fecha" name="fecha"    data-inputmask="'mask': '99/99/9999'"  autocomplete="off" onblur="vali('fecha'); calcularEdad();" />
                                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-xs-12 form-group">
                                                 <input type="text" class="form-control has-feedback-left" id="edad" class="form-control col-md-5 col-sm-4 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="edad" placeholder="Edad"/>
                                                 <span class="fa fa-user form-control-feedback left" aria-hidden="true"/></span>
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

                                    <br><br><br>
                                    

                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Direcci&oacuten*</label>
                                            <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>" autocomplete="off" onblur="vali('direccion');">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                  </div>

                                  
                                                
                                  <div class="ln_solid"></div>
                                                
                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                          <?php
                                                if(!isset($iddatos)){
                                                    ?>
                                                    <button class="btn btn-success btn-icon left-icon;" onClick="verificar('guardar');"> <i  class="fa fa-save"  name="btnGuardar" id="btnGuardar"></i> <span >Guardar</span></button>
                                                    <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return limpiarIn('limpiar');"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <button class="btn btn-info btn-icon left-icon;" onClick="verificar('modificar');"> <i  class="fa fa-save"  name="btnModificar" id="btnModificar"></i> <span >Modificar</span></button>
                                                    <button class="btn btn-danger  btn-icon left-icon" onclick="cancelar();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                                    <?php
                                                }
                                           ?>
                                      </div>
                                    </center>
                                  </div> 
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                                <div class="x_title">
                                  <h2>PACIENTES </h2>
                                     
                                <div class="clearfix"></div>
                                </div>
                                
                                <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Edad</th>
                                      <th>Telefono</th>
                                      <th>Expediente</th>
                                    </tr>
                                  </thead>


                                  <tbody id="imprimir">
                                    <?php
                                     /*     include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT
                                              clientes.eid_cliente,
                                              clientes.cnombre,
                                              clientes.capellido,
                                              clientes.eedad,
                                              clientes.csexo,
                                              clientes.ctelefonof,
                                              clientes.cdireccion,
                                              expediente.eid_expediente
                                              FROM
                                              clientes
                                              INNER JOIN expediente ON clientes.eid_cliente = expediente.eid_cliente
                                               order by cnombre");
                                        
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>*/
                                 //   <tr>
                                //      <td><?php echo $fila[0]; ?></td>
                                  //    <td><?php echo $fila[1]; ?></td>
                                    //  <td><?php echo $fila[2]; ?></td>
                                   //   <td><?php echo $fila[3]; ?></td>
                                   //   <td> <?php echo $fila[5]; ?> </td>
                                      
                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon"  onClick="Expediente('<?php //echo $fila[7]; ?>')"> <i class="fa fa-th-list"></i> <span>Ver</span></button>
                                      
                                        <button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php //echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>-->

                               <!--       </td>
                                    </tr>
                                   <?php
                                     // }
                                        ?>
                                    
                                  </tbody>
                                </table>
                                    </div>
                                   </div>
                                 </div>
                                </div>-->
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
        <!--modal-->  
     <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div style="float: right; color: red">
                <button style="color: red" type="button"  data-dismiss="modal" aria-label="Close">
                  <span style="color: red" aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                <h5 align="center" style=" color: white">ASISTENCIA REGISTRO DE CLIENTES</h5>
                <div class="clearfix"></div>
              </div>
          </div>
          <div class="modal-body modal-md"> 
            <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel" >

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img class="img-responsive" src="../Ayuda/Clientes/registroCliente.png" alt="...">
                  <div class="carousel-caption">
                    <p style="color:black";> Hacemos clic en el boton Agregar Producto </p>
                  </div>
                </div>
                
                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/ayuda2.png" alt="...">
                  <div class="carousel-caption">
                    <p style="color:black";> Hacemos clic en el boton Agregar Producto </p>
                  </div>
                </div>
                
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div> 
        </div>
      </div>
    </div>
        
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
if(isset($_REQUEST["bandera"])){
$baccion=$_REQUEST["baccion"];
$bandera=$_REQUEST["bandera"];
$nombre=($_REQUEST["nombre"]);
$apellido=($_REQUEST["apellido"]);
$telefono=($_REQUEST["telefono"]);
$direccion=($_REQUEST["direccion"]);
$sexo=$_REQUEST["genero"];

$fecha = $_REQUEST["fecha"];
$edad = substr($_REQUEST["edad"],0,2);

include("../../Config/conexion.php");
//Guardar datos del cliente
if($bandera=="add"){
    pg_query("BEGIN");
    $r=pg_query($conexion,"select * from clientes");
    $numero = pg_num_rows($r);
    $codigo=generar($nombre,$apellido).$numero;
    
    $expediente = getExpediente($nombre, $apellido);
    $fechaR = date('d/m/Y');
            
          $result=pg_query($conexion,"INSERT INTO  clientes (eid_cliente,cnombre, capellido,eedad, csexo, ctelefonof,cdireccion,ffecha,ffechar) VALUES ('$codigo','$nombre','$apellido','$edad','$sexo','$telefono','$direccion', to_date('$fecha', 'mm/dd/yyyy'), to_date('$fechaR', 'dd/mm/yyyy'))");
          $res= pg_query($conexion,"INSERT INTO expediente2 (cid_expediente, eid_cliente) VALUES ('" . $expediente . "', '$codigo')");
          

         //Comprobar que los datos estan correctos
          if(!$result || !$res){
                    pg_query("rollback");
                    echo "<script type='text/javascript'>";
                    echo pg_result_error($conexion);
                    echo "alertaSweet('Error','Datos no almacenados', 'error');";
                    echo "ajax_act('');";
                    echo "document.getElementById('bandera').value='';";
                     echo "document.getElementById('baccion').value='';";
                    echo "</script>";
          }else{
            //Guardar datos
            $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from bitacora ");
            $accion = 'El usuario ' . $nomusAccess. ' Registro al Cliente '. $nombre .' '.$apellido;
            while ($filas = pg_fetch_array($query_ide)) {
                $ida=$filas[0];                                 
                $ida++ ;
            } 
            ini_set('date.timezone', 'America/El_Salvador');
            
            $hora = date("Y/m/d ") . date("h:i:s a");
            $consult = pg_query($conexion, "INSERT INTO bitacora (eid_bitacora, cid_usuario, accion, ffecha) VALUES ($ida, $idAccess, '".$accion."' , '$hora' )");

            if(!$consult ){
                    pg_query("rollback");
                    echo "<script type='text/javascript'>";
                    echo pg_result_error($conexion);
                    echo "alert('Error');";
                    echo "</script>";
            }else{
                  pg_query("commit");
                  echo "<script type='text/javascript'>";
                  echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
                  echo "ajax_act('');";
                  echo "setTimeout (function llamarPagina(){
                                          location.href=('expediente.php?id='+'".$expediente."');
                                       }, 2000);";
                  echo "document.getElementById('bandera').value='';";
                  echo "document.getElementById('baccion').value='';";
                  echo "</script>";
            }
                
                
        
          }  
    
  }

  if($bandera=="cancelar"){
                      echo "<script type='text/javascript'>";
                      echo "document.location.href='registrarCliente.php';";
                      echo "</script>";
  }

     
}

//Generar en numero de expediente
function getExpediente($nombre, $apellido){
  include("../../Config/conexion.php");
  $expediente = date("Y");
  $expediente .= "-";
  $expediente .= strtoupper(substr($nombre,0,1));
  $expediente .= strtoupper(substr($apellido,0,1));
  $expediente .= "-";
    
  $resulta = pg_query($conexion,"SELECT substring(cid_expediente from 9 for 3) as expediente from expediente2 where substring(cid_expediente from 1 for 8)='$expediente' order by cid_expediente desc LIMIT 1");

  if($resulta){
    while ($fila = pg_fetch_array($resulta)) {
      $ultimo = $fila['expediente'];
    }
    $ultimo++;
    if($ultimo>99){
      $expediente .= $ultimo;
    }else if($ultimo >9){
      $expediente .= "0" . $ultimo;
    } else{
      $expediente .= "00" . $ultimo;
    }
  }
    return $expediente;
}

//Generar el codigo para la llave principal
function generar($nombree,$apellidos){
    $str=trim($nombree).trim($apellidos);
    $cad="";
    for($i=0; strlen($cad)<2; $i++){
      $cad.=substr($str,rand(0,strlen($str)-1),1);
    }
    return strtoupper($cad);
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