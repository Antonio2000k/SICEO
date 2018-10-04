<?php //session_start();
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from clientes where eid_cliente='$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidCliente = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Redad =  $fila[3];
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

    <title>SICEO | Clientes </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script type="text/javascript">
      function Expediente(id){
     window.open("expediente.php?id="+id, '_parent');
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
                if (/^[2|6|7]{1}[0-9]{3}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('telefono').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>telefono debe iniciar con 2, 6 o 7");
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
        
      function verificar(opcion){
          var opc=true;
            if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" ||
            document.getElementById('telefono').value=="" || document.getElementById('single_cal1').value=="" ||
            document.getElementById('direccion').value=="" ){
                swal('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc=false;
            }else{
                if(opcion==="guardar")
                document.getElementById('bandera').value="add";
                setTimeout(document.formCliente.submit(),2000);
                else
                document.getElementById('bandera').value="modificar";
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

      function calculateAge(birthday) {
            var birthday_arr = birthday.split("/");
            var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
            var ageDifMs = Date.now() - birthday_date.getTime();
            var ageDate = new Date(ageDifMs);
            return Math.abs(ageDate.getUTCFullYear() - 1970);
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
      swal(titulo,texto,tipo);
    }

        
    
       
    function llamarPagina(id){
     window.open("registrarCliente.php?id="+id, '_parent');
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
    
    function ajax_act(str){
      if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
          } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
            xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              document.getElementById("imprimir").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("post", "recargaTblClientes.php", true);
    xmlhttp.send();
      }
    </script>
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
                           Clientes
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <p class="col-xs-12 col-sm-8 col-md-10 " >
                        Bienvenido en esta sección puede registrar clientes en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente. En la pestaña de lista de clientes se muestran todos los clientes registrados.
                      </p>
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
                             NUEVO CLIENTE 
                          </a>
                        </li>
                        <li class="col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true"  href="listaCliente.php" id="profile-tab" >
                            LISTA DE CLIENTES
                          </a>
                        </li>
                    </ul>
                 <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: #2A3F54">
                           <h3 align="center" style=" color: white">Datos Personales</h3>
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="formCliente" name="formCliente" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidCliente;?>"/>
                             <div class="row">
                                <!--Codigos-->
                                  <div class="ln_solid"></div>

                                <div class="item form-group">
                                   <label class="control-label col-md-1 col-sm-2 col-xs-12">Nombres*</label>
                                   <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" autocomplete="off" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   <label class="control-label col-md-1 col-sm-2 col-xs-12">Apellidos*</label>
                                    <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" autocomplete="off" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                  <label class="control-label col-md-1 col-sm-2 col-xs-12">Sexo*</label>
                                  <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
                                    <div class="col-md-6 col-xs-12 col-sm-4">
                                      <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M" checked="" <?php if ($Rsexo == "M") echo "checked"; ?>/>
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-4">
                                      <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" <?php if ($Rsexo == "F") echo "checked"; ?> />
                                    </div>
                                  </div>


                                  
                                        <div class="item form-group">
                                          <div class="col-md-9 col-sm-5 col-xs-12">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12">Fecha de Nacimiento*</label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="xdisplay_inputx form-group has-feedback">
                                                            <input type="text" onclick="calculateAge('document.getElementById('fecha').value');" class="form-control has-feedback-left" id="single_cal1" name="fecha" aria-describedby="inputSuccess2Status" style="padding-left: 55px;" data-inputmask="'mask': '99/99/9999'"  autocomplete="off">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" style="padding-left:0px; margin-left: -10px;"></span>
                                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-2 col-sm-4 col-xs-12 form-group">
                                               <input type="text" class="form-control has-feedback-left" id="edad" class="form-control col-md-2 col-sm-4 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="edad" placeholder="Edad"  onkeypress="return soloLetras(event)"  >
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

                                    <br><br><br>
                                    

                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Direcci&oacuten*</label>
                                            <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>" autocomplete="off">
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
                                                    <button class="btn btn-danger  btn-icon left-icon" id="limpiar" onclick="return limpiarIn('limpiarM');"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
$nombre=$_REQUEST["nombre"];
$apellido=$_REQUEST["apellido"];
$telefono=$_REQUEST["telefono"];
$edad=$_REQUEST["edad"];
$direccion=$_REQUEST["direccion"];
$sexo=$_REQUEST["genero"];

$fecha = $_REQUEST["fecha"];
  function busca_edad($fecha_nacimiento){
  $dia=date("d");
  $mes=date("m");
  $ano=date("Y");


  $dianaz=date("d",strtotime($fecha_nacimiento));
  $mesnaz=date("m",strtotime($fecha_nacimiento));
  $anonaz=date("Y",strtotime($fecha_nacimiento));


  //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

  if (($mesnaz == $mes) && ($dianaz > $dia)) {
  $ano=($ano-1); }

  //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

  if ($mesnaz > $mes) {
  $ano=($ano-1);}

   //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

  $edad=($ano-$anonaz);


  return $edad;


  }

  $edad = busca_edad($fecha);
  
include("../../Config/conexion.php");
if($bandera=="add"){
    pg_query("BEGIN");
    $r=pg_query($conexion,"select * from clientes");
    $numero = pg_num_rows($r);
    $codigo=generar($nombre,$apellido).$numero;
    $expediente = getExpediente($nombre, $apellido);

    
    
          $result=pg_query($conexion,"INSERT INTO  clientes (eid_cliente,cnombre, capellido,eedad, csexo, ctelefonof,cdireccion,ffecha) VALUES ('$codigo','$nombre','$apellido','$edad','$sexo','$telefono','$direccion','$fecha')");
          $res= pg_query($conexion,"INSERT INTO expediente2 (cid_expediente, eid_cliente) VALUES ('" . $expediente . "', '$codigo')");

          

         
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
                pg_query("commit");
                echo "<script type='text/javascript'>";
                echo "alertaSweet('Informacion','Datos Almacenados $expediente', 'success');";
                echo "ajax_act('');";
                echo "document.getElementById('bandera').value='';";
                echo "document.getElementById('baccion').value='';";
                echo "</script>";
          }

          
       
    
  }

  if($bandera=="cancelar"){
                      echo "<script type='text/javascript'>";
                      echo "document.location.href='consulta.php';";
                      echo "</script>";
  }

     
}

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
      $ultimo = $fila->expediente;
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

function generar($nombree,$apellidos){
    $str=trim($nombree).trim($apellidos);
    $cad="";
    for($i=0; strlen($cad)<2; $i++){
      $cad.=substr($str,rand(0,strlen($str)-1),1);
    }
    return strtoupper($cad);
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

