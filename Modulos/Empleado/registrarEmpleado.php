<?php
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "select *,TO_CHAR(empleados.ffecha_nac, 'dd/mm/yyyy') from empleados where cid_empleado='$iddatos'");
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
    <title>SICEO | Empleado </title>
    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script type="text/javascript">

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
                NotificacionSoloLetras2();
                return false;
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
            if(document.getElementById('nombre').value=="" ||
            document.getElementById('apellido').value=="" ||
            document.getElementById('telefono').value=="" ||
            document.getElementById('single_cal1').value=="" ||
            document.getElementById('dui').value=="" ||
            document.getElementById('celular').value=="" ||
            document.getElementById('direccion').value=="" ||
            (!document.getElementById('generoF').checked && !document.getElementById('generoM').checked)){
                swal('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc=false;
            }else{
                if(opcion==="guardar")
                document.getElementById('bandera').value="add";
                else
                document.getElementById('bandera').value="modificar";
                opc=true;
            }
          
          $(document).ready(function(){
          $("#formEmpleado").submit(function() {
              if (opc!=true) {		
                return false;
              } else 
                  return true;			
            });
        });
          
      }


        
    function alertaSweet(titulo,texto,tipo){
			swal(titulo,texto,tipo);
    }

        
    function DarBaja(id,opcion,mensaje,conf){
        swal({
          title: 'Confirmacion?',
          text: mensaje,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:'Cancelar',
          confirmButtonText: conf
        }).then((result) => {
          if (result.value) {
              if(opcion=='baja')
                document.getElementById('bandera').value="Dbajar";
              else
                  document.getElementById('bandera').value="Dactivar";
              document.getElementById('baccion').value=id;
              document.formEmpleado.submit();
            
          }
        })
    }
       
    function llamarPagina(id){
	   window.open("registrarEmpleado.php?id="+id, '_parent');
	}
        
        
    function NotificacionSoloLetras2(){
        notif({
            type:"error",
          msg: "<b>Error: </b>Solo se permiten letras",
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
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                 <div>
                     <img align="left" src="../../production/images/emplea.png" width="120" height="120">
                        <h1 align="center">
                           Empleados
                        </h1>
                     </img>
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
                            NUEVO EMPLEADO
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a aria-expanded="false" data-toggle="tab" href="#tab_content2" name="tab2" id="profile-tab" role="tab">
                            LISTA DE EMPLEADOS
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
                           <form class="form-horizontal form-label-left" id="formEmpleado" name="formEmpleado" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $RidEmpleado;?>"/>
                             <div class="row">
                                <!--Codigos-->
                                  <div class="ln_solid"></div>
                                <div class="item form-group">
                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Nombres*</label>
                                   <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" placeholder="Nombres" value="<?php echo $Rnombre; ?>" onkeypress="return soloLetras(event)" onblur="limpia()" autocomplete="off">
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>
                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Apellidos*</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos" value="<?php echo $Rapellido; ?>" onkeypress="return soloLetras(event)" onblur="limpia()" autocomplete="off">
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-3 col-xs-12 form-group has-feedback" style="padding-left: 80px;">
                                       <div class="col-sm-2">
                                           <label>Sexo*</label>
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
                                            <label class="control-label col-md-5 col-sm-2 col-xs-12">Fecha de Nacimiento*</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="xdisplay_inputx form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left" id="single_cal1" name="fecha" aria-describedby="inputSuccess2Status" style="padding-left: 55px;" data-inputmask="'mask': '99/99/9999'" value="<?php $Rfecha ?>" autocomplete="off">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" style="padding-left:0px; margin-left: -10px;"></span>
                                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">DUI*</label>
                                    <div class="col-md-3 col-sm-10 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="dui" class="form-control col-md-7 col-xs-12" name="dui" placeholder="DUI" data-inputmask="'mask': '99999999-9'" value="<?php echo $Rdui; ?>" autocomplete="off">
                                       <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Telefono*</label>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" data-inputmask="'mask': '2999-9999'" value="<?php echo $Rtelefono; ?>" autocomplete="off">
                                      <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Celular*</label>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="telc" class="form-control has-feedback-left"  id="celular" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="celular" placeholder="Celular" data-inputmask="'mask': '9999-9999'" value="<?php echo $Rcelular; ?>" autocomplete="off">
                                       <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Direccion*</label>
                                    <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="tel" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" value="<?php echo $Rdireccion; ?>"  autocomplete="off">
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
                                                    <?php
                                                }else{
                                                    ?>
                                                    <button class="btn btn-info btn-icon left-icon;" onClick="verificar('modificar');"> <i  class="fa fa-save"  name="btnModificar" id="btnModificar"></i> <span >Modificar</span></button>
                                                    <?php
                                                }
                                           ?>
                                           <button class="btn btn-danger  btn-icon left-icon" > <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
                                <div class="x_title">
                                  <h2 >EMPLEADOS </h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered" id="tblEmpleados">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Telefono</th>
                                      <th>Sexo</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "select * from empleados order by cnombre");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>
                                      <td> <?php echo $fila[6]; ?> </td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      <?php if($fila[9]=='t'){ ?>
                                      <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al empleado '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!')"> <i class="fa fa-folder-open-o"></i> <span>Dar de Baja</span></button>
                                      <?php }if($fila[9]=='f'){?>
                                        <button class="btn btn-success btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','alta','Esta seguro de querer activar al empleado '+' <?php echo $fila[1]; ?>','Si, Activar!')"> <i class="fa fa-folder-open-o"></i> <span>Activar</span></button> 
                                      <?php }?>
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
$celular=($_REQUEST["celular"]);
$fecha=$_REQUEST["fecha"];
$dui=($_REQUEST["dui"]);
$direccion=($_REQUEST["direccion"]);
$sexo=$_REQUEST["genero"];
$correo="Ella no te ama";
include("../../Config/conexion.php");
if($bandera=="add"){
    pg_query("BEGIN");

    $r=pg_query($conexion,"select * from empleados");
    $numero = pg_num_rows($r);
    $codigo=generar($nombre,$apellido).$numero;
    echo $codigo;
      $result=pg_query($conexion,"insert into empleados(cid_empleado,cnombre, capellido, ctelefonof, ccelular, cdui, csexo,ffecha_nac,cdireccion,bestado,ccorreo) values('$codigo','$nombre','$apellido','$telefono','$celular','$dui','$sexo','$fecha','$direccion','1','$correo')");
        
      if(!$result){
				pg_query("rollback");
				echo "<script language='javascript'>";
				echo "alertaSweet('Error','Datos no almacenados', 'error');";
                echo "document.getElementById('bandera').value='';";
				echo "</script>";
				}else{
					pg_query("commit");
					echo "<script language='javascript'>";
                    echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
                    echo "document.getElementById('bandera').value='';";
                    echo "</script>";
				}
  }
if($bandera=='modificar'){
    pg_query("BEGIN");

      $result=pg_query($conexion,"update empleados set  cnombre='$nombre', capellido='$apellido', ctelefonof='$telefono', ccelular='$celular', cdui='$dui', csexo='$sexo',ffecha_nac='$fecha',cdireccion='$direccion', bestado='1',ccorreo='$correo' where cid_empleado='$baccion'");    
      if(!$result){
				pg_query("rollback");
				echo "<script language='javascript'>";
				echo "alertaSweet('Error','Datos no almacenados', 'error');";
				echo "</script>";
				}else{
					pg_query("commit");
          ?>
					<script language='javascript'>
                    setInterval(alertaSweet('Informacion','Datos Almacenados', 'success'),500000);
                    document.location.href='registrarEmpleado.php';
                    </script>
        <?php
				}
}
if($bandera=="Dbajar" || $bandera=='Dactivar'){
    if($bandera=="Dbajar")
        $estado=0;
    else
        $estado=1;
     pg_query("BEGIN");
      $result=pg_query($conexion,"update empleados set bestado='$estado' where cid_empleado='$baccion'");      
      if(!$result){
				pg_query("rollback");
				echo "<script language='javascript'>";
				echo "alertaSweet('Error','Datos no almacenados', 'error');";
				echo "</script>";
				}else{
					pg_query("commit");
          ?>
					<script language='javascript'>
                    alertaSweet('Informacion','Datos Almacenados', 'success');
                    </script>
        <?php
				}
}
     
}


function generar($nombree,$apellidos){
		$str=trim($nombree).trim($apellidos);
		$cad="";
		for($i=0; strlen($cad)<2; $i++){
			$cad.=substr($str,rand(0,strlen($str)-1),1);
		}
		return strtoupper($cad);
	}
?>

?>

