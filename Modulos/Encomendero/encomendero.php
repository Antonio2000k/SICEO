<?php
if(isset($_REQUEST["id"])){
  include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select * from encomendero where eid_encomendero=$iddatos");
     while ($fila = pg_fetch_array($query_s)) {
        $Rid_encomendero = $fila[0];
        $Rnombre = $fila[1];
        $Rapellido = $fila[2];
        
        $Rtelefonof = $fila[3];
        $Rcelular = $fila[4];
        
      }
}else{
  $Rid_encomendero = null;
        $Rnombre =  null;
        $Rapellido =  null;
        
        $Rtelefonof =  null;
        $Rcelular =  null;
        
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Registrar Encomendero </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script src="encomendero.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <div class="clearfix"></div>

           <?php
                include "../../ComponentesForm/menu.php";
           ?>

        <!-- page content -->
      <div class="right_col" role="main">
        <div class="">  
          <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                 <div>
                     <img align="left" src="../../production/images/man.png">
                        <h1 align="center">
                         Registrar Encomendero
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <p>
                        Bienvenido en esta sección aquí puede registrar proveedores en el sistema debe de llenar todos los campos obligatorios (*) para poder registrar un proveedor. La segunda pestaña muestra todos los proveedores registrados que estan activos y la tercera pestaña todos los proveedores que estan inactivos.
                      </p>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist" >
                        <li role="presentation" class="active col-md-3 col-sm-3 col-xs-3"><a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">NUEVO ENCOMENDERO</a>
                        </li>
                        <li class="col-md-4 col-sm-3 col-xs-3" role="presentation" class="">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" href="listenco.php"  id="profile-tab"  aria-expanded="false">LISTA DE ENCOMENDEROS ACTIVOS</a>
                        </li>
                        <li class="col-md-4 col-sm-3 col-xs-3" role="presentation" class="">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" href="listencoi.php"  id="profile-tab"  aria-expanded="false">LISTA DE ENCOMENDEROS INACTIVOS</a>
                        </li>
                  </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_content">
                            <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                              <h3 align="center" style=" color: white">Datos Encomendero
                            </h3>
                               <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                  <form class="form-horizontal form-label-left" id="formEncomendero" name="formEncomendero" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $Rid_encomendero;?>"/>
                            <div id="validaso"><input type="hidden" id="baccionVer" value="1" /> </div>
                                    <div class="row">
                                      
                                      <div class="item form-group">
                                        <h2>Datos de Encomendero</h2>
                                      </div>
                                      <div class="ln_solid"></div>

                                      <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-1 col-xs-12">Nombre*</label>
                                        <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                              <input type="tel" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="nombre" placeholder="Nombre de Encomendero" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" autocomplete="off">
                                              <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        Apellidos*
                                                                                    </label>
                                            <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos del Encomendero" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" autocomplete="off">
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            
                                            </div>

                                        <label class="control-label col-md-1 col-sm-2 col-xs-12">Telefono*</label>
                                        <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                          <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-3 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" data-inputmask="'mask': '2999-9999'" value="<?php echo $Rtelefonof; ?>" autocomplete="off" onblur="vali('tele');">
                                          <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">Celular*</label>
                                        <div class="col-md-5 col-sm-4 col-xs-12 form-group has-feedback">
                                          <input type="tel" class="form-control has-feedback-left"  id="telefonoc" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefonoc" placeholder="Celular" data-inputmask="'mask': '9999-9999'" value="<?php echo $Rcelular; ?>" autocomplete="off" onblur="vali('celular');">
                                          <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        </div >      
                                       
                                        
                                         <div class="ln_solid"></div>
                                         

                                    </div>
                                    <div class="form-group">
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
              </div> 
    
        <!-- footer content -->
        <footer>
          <?php
            include "../../ComponentesForm/footer.php";
          ?>
        </footer>
        </div>
        <!-- /footer content -->
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
$celular=($_REQUEST["telefonoc"]);
include("../../Config/conexion.php");

    
    if($bandera=="add"){
    pg_query("BEGIN");
    $r=pg_query($conexion,"select count(*) from encomendero");
    while ($fila = pg_fetch_array($r)) {
            $ida=$fila[0];                                 
            $ida++ ;
        } 
      
          $result=pg_query($conexion,"insert into encomendero(eid_encomendero, cnombre, capellido, ctelefonof, ccelular, bestado) values('$ida','$nombre','$apellido','$telefono','$celular','1')");
          if(!$result){
                    pg_query("rollback");
                    mensajeInformacion('Error','Datos no almacenados','error');
                    }else{
                        pg_query("commit");
                        

                        echo "<script type='text/javascript'>";
                        echo "alertaSweet('Informacion','Datos Almacenados','success');";

                    echo "setTimeout (function llamarPagina(){
                                      location.href=('encomendero.php');
                                    }, 2000);";
                    echo "</script>";
                    }
    }
  }
  
  if($bandera=='modificar'){
    pg_query("BEGIN");
          $result=pg_query($conexion,"update encomendero set  cnombre='$nombre', capellido='$apellido', ctelefonof='$telefono', ccelular='$celular' where eid_encomendero='$baccion'");    
            if(!$result){
        pg_query("rollback");
        mensajeInformacion('Error','Datos no almacenados','error');
        }else{
          pg_query("commit");
                    echo "<script type='text/javascript'>";
                    echo "alertaSweet('Informacion','Datos actualizados!','success');";

                    echo "setTimeout (function llamarPagina(){
                                      location.href=('encomendero.php');
                                    }, 2000);";
                    echo "</script>";
        }
      }

if($bandera=="cancelar"){
                    echo "<script type='text/javascript'>";
                    echo "document.location.href='encomendero.php';";
                    echo "</script>";
}
if($bandera=="Dbajar" || $bandera=='Dactivar'){
    if($bandera=="Dbajar")
        $estado=0;
    else
        $estado=1;
     pg_query("BEGIN");
    $result=pg_query($conexion,"update encomendero set bestado='$estado' where eid_encomendero='$baccion'");      
      if(!$result){
        pg_query("rollback");
        mensajeInformacion('Informacion','Datos no almacenados','success');
        }else{
          pg_query("commit");
                echo "<script type='text/javascript'>";
                    echo "alertaSweet('Informacion','Datos actualizados !','success');";

                    echo "setTimeout (function llamarPagina(){
                                      location.href=('encomendero.php');
                                    }, 2000);";
                      echo "</script>";
        }

     
}



function mensajeInformacion($titulo,$mensaje,$tipo){
            echo "<script language='javascript'>";
            echo "alertaSweet('".$titulo."','".$mensaje."', '".$tipo."');";
            
           // echo "ajax_act('');";
            echo "</script>";
    
}

?>