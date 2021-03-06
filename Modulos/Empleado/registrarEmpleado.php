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

if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select *,TO_CHAR(paempleados.ffecha_nac, 'dd/mm/yyyy') from paempleados  where cid_empleado='$iddatos'");
    while ($fila = pg_fetch_array($query_s)) {
        $RidEmpleado = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        $Rtelefono = $fila[3];
        $Rcelular = $fila[4];
        $Rdui = $fila[5];
        $Rsexo = $fila[6];
        $Rfecha = $fila[9];
        $Rdireccion = $fila[8];
        $Rcorreo=$fila[10];
    }
}else{
        $RidEmpleado = null;
        $Rnombre = null;
        $Rapellido = null;
        $Rtelefono = null;
        $Rcelular = null;
        $Rdui = null;
        $Rsexo = null;
        $Rfecha = date("d/m/Y");
        $Rdireccion = null;
        $Rcorreo=null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SICEO | Empleado </title>
<?php
  include "../../ComponentesForm/estilos.php";
?>
<script src="js/empleado.js"></script>
</head>
<body class="nav-md">
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
    <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                 <div>
                     <img align="left" src="../../production/images/emplea.png" width="120" height="120"><h1 align="center">Empleados</h1></img>
                  </div>
                  <div align="center">
                      <p>
                        Bienvenido en esta sección puede registrar empleados en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente.En la pestaña de listado de empleados se mostraran todos los empleados registrados en el sistema.
                      </p>
                  </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="" data-example-id="togglable-tabs" role="tabpanel">
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                       <li class="active" role="presentation">
                          <a aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab">
                            REGISTRAR EMPLEADO
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a   aria-expanded="false" href="listaEmpleado.php"  id="profile-tab" >
                            LISTA DE EMPLEADOS
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a aria-expanded="false" href="listaEmpleadoi.php" n id="profile-tab" >
                            EMPLEADOS DADOS DE BAJA
                          </a>
                        </li>
                  </ul>
                <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                           <h3 align="center" style=" color: white">Datos Personales</h3>
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left" id="formEmpleado" name="formEmpleado" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidEmpleado;?>"/>
                            <div id="cambiaso"><input type="hidden" id="baccionVer" value="1" /> </div>
                             
                                  <div class="ln_solid"></div>
                                  <div class="row">
                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Nombres*</label>
                                   <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event);" autocomplete="off">
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>
                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Apellidos*</label>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" autocomplete="off">
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">DUI*</label>
                                    <div class="col-md-3 col-sm-10 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="dui" class="form-control col-md-7 col-xs-12" name="dui" placeholder="DUI" data-inputmask="'mask': '99999999-9'" value="<?php echo $Rdui; ?>" autocomplete="off" onblur="vali('dui');">
                                       <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
                                    </div>  
                                    </div>
                                    
                                    <div class="row">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Sexo*</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12 form-group" style="padding-top:5px; padding-right:0px; margin-right:0px;">
                                       <div class="col-sm-6">
                                          <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M" checked="" <?php if ($Rsexo == "M") echo "checked"; ?>/>
                                       </div>
                                       <div class="col-sm-6">
                                           <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" <?php if ($Rsexo == "F") echo "checked"; ?> />
                                       </div>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Teléfono*</label>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" data-inputmask="'mask': '2999-9999'" value="<?php echo $Rtelefono; ?>" autocomplete="off" onblur="vali('telefono');">
                                      <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Celular*</label>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="telc" class="form-control has-feedback-left"  id="celular" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="celular" placeholder="Celular" data-inputmask="'mask': '9999-9999'" value="<?php echo $Rcelular; ?>" autocomplete="off" onblur="vali('celular');">
                                       <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Fecha de Nacimiento*</label>
                                    <div class="col-md-3 col-sm-10 col-xs-12 form-group has-feedback">
                                        <div class='input-group date' id='myDatepicker2'>
                                            <input type='text' class="form-control has-feedback-left col-md-4 col-sm-4 col-xs-12"  id="fecha" name="fecha"    data-inputmask="'mask': '99/99/9999'" onclick="showHint(this.value)" onkeyup="showHint(this.value)" onchange="showHint(this.value)" autocomplete="off" onblur="valiFecha();"/>
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Correo Electrónico*</label>
                                    <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                        <input type="telc" class="form-control has-feedback-left" id="correo" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="correo" placeholder="Correo Electrónico" value="<?php echo $Rcorreo; ?>" autocomplete="off" onblur="validarEmail();">
                                        <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    </div>
                                    
                                    <div class="row">                                
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Dirección*</label>
                                    <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="tel" class="form-control has-feedback-left" id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>" autocomplete="off">
                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                    </div>
                                  
                                            
                                        
                              <div class="ln_solid"></div>
                              <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 " >
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
                            </form>
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
    
<footer>
<?php
include "../../ComponentesForm/footer.php";
?>
</footer>
</div>
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
$celular=($_REQUEST["celular"]);
$fecha=$_REQUEST["fecha"];
$dui=($_REQUEST["dui"]);
$direccion=($_REQUEST["direccion"]);
$sexo=$_REQUEST["genero"];
$correo=$_REQUEST["correo"];
$fechaN=date_format($fecha,"Y/m/d");

    
include("../../Config/conexion.php");
if($bandera=="add"){
    pg_query("BEGIN");
    $r=pg_query($conexion,"select * from paempleados");
    $numero = pg_num_rows($r);
    $codigo=generar($nombre,$apellido).$numero;
    
    if(validaCorreo($correo,$baccion,$dui)){
        mensajeInformacion('Error','Correo o Dui ya se encuentra registrado','error');
    }else{
        $consulta="INSERT INTO paempleados(cid_empleado, cnombre, capellido, ctelefonof, ccelular, cdui, csexo, ffecha_nac, cdireccion, bestado, ccorreo) values('$codigo','$nombre','$apellido','$telefono','$celular','$dui','$sexo',to_date('$fecha', 'dd/mm/yyyy'),'$direccion','1','$correo')";

          $result=pg_query($conexion,$consulta);
          if(!$result){
                    pg_query("rollback");
                    mensajeInformacion('Error','Datos no almacenados','error');
                    }else{
                       $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                        $accion = 'El usuario ' . $nomusAccess. ' Registró al Empleado '. $nombre .' '.$apellido;
                        while ($filas = pg_fetch_array($query_ide)) {
                            $ida=$filas[0];                                 
                            $ida++ ;
                        } 
                        ini_set('date.timezone', 'America/El_Salvador');
                        $fechaA= date("d/m/Y");
                        $hora = date("Y/m/d ") . date("h:i:s a");
                        $consu="INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$codigo')";
                        $consult = pg_query($conexion, $consu);

                        if(!$consult ){
                                pg_query("rollback");
                                echo "<script type='text/javascript'>";
                                echo pg_result_error($conexion);
                                echo "alert('Error');";
                                echo "</script>";
                        }else{
                              pg_query("commit");
                              mensajeInformacion('Informacion','Datos almacenados','info');
                              clearstatcache(); 
                        }
                        
                    }
    }
  }
if($bandera=='modificar'){
    pg_query("BEGIN");
      if(validaCorreo($correo,$baccion,$dui)){
          mensajeInformacion('Error','Correo o Dui ya se encuentra registrado','error');
      }else{
          $result=pg_query($conexion,"update paempleados set  cnombre='$nombre', capellido='$apellido', ctelefonof='$telefono', ccelular='$celular', cdui='$dui', csexo='$sexo',ffecha_nac='$fecha',cdireccion='$direccion',ccorreo='$correo' where cid_empleado='$baccion'");    
            if(!$result){
				pg_query("rollback");
				mensajeInformacion('Error','Datos no almacenados','error');
				}else{
          
					          $query_ide=pg_query($conexion,"select MAx(eid_bitacora) from pcbitacora ");
                        $accion = 'El usuario ' . $nomusAccess. ' Modificó al Empleado '. $nombre .' '.$apellido;
                        while ($filas = pg_fetch_array($query_ide)) {
                            $ida=$filas[0];                                 
                            $ida++ ;
                        } 
                        ini_set('date.timezone', 'America/El_Salvador');
                        $fechaA= date("d/m/Y");
                        $hora = date("Y/m/d ") . date("h:i:s a");
                        $consult = pg_query($conexion, "INSERT INTO pcbitacora (eid_bitacora, cid_usuario, accion, ffecha, ffechaingreso, idmod) VALUES ($ida, $idAccess, '".$accion."' , '$hora' , '$fechaA', '$baccion')");

                        if(!$consult ){
                                pg_query("rollback");
                                echo "<script type='text/javascript'>";
                                echo pg_result_error($conexion);
                                echo "alert('Error');";
                                echo "</script>";
                        }else{
                             pg_query("commit");
                              mensajeInformacion('Informacion','Datos almacenados','info');
                        }
				}
      }
}   
}


function generar($nombree,$apellidos){
		$str=str_replace(' ','',trim($nombree).trim($apellidos));
		$cad="";
		for($i=0; strlen($cad)<2; $i++){
			$cad.=substr($str,rand(0,strlen($str)-1),1);
		}
		return strtoupper($cad);
	}
  function validaCorreo($correo,$baccion,$dui){
    $valor=0;
    include("../../Config/conexion.php");
    $query_s= pg_query($conexion, "select * from paempleados order by cnombre");
        while($fila=pg_fetch_array($query_s)){
            if(strcmp($fila[10],$correo)===0 || strcmp($fila[5],$dui)===0){
                $valor=1;
            }
            if(strcmp($fila[0],$baccion)===0){
                $valor=0;
            }
        }
    return $valor;
}


function mensajeInformacion($titulo,$mensaje,$tipo){
            echo "<script language='javascript'>";
            echo "alertaSweet('".$titulo."','".$mensaje."', '".$tipo."');";
            //echo "alert('".$mensaje."');";
            echo "</script>";
    
}

?>


