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

    <title>SICEO | Lista de Encomenderos</title>

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
                          Lista de Encomenderos
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
                        <li role="presentation" class="col-md-3 col-sm-3 col-xs-3">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" href="encomendero.php" id="home-tab"  aria-expanded="false">NUEVO ENCOMENDERO</a>
                        </li>
                        <li class="active col-md-4 col-sm-3 col-xs-3" role="presentation" class=""><a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">LISTA DE ENCOMENDEROS ACTIVOS</a>
                        </li>
                         <li class="col-md-4 col-sm-3 col-xs-3" role="presentation" class="">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" href="proveedori.php"  id="profile-tab"  aria-expanded="false">LISTA DE ENCOMENDEROS INACTIVOS</a>
                        </li>
                  </ul>
                      <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade " id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_content">
                            <div class="x_title" style="background: #2A3F54">
                              <h3 align="center" style=" color: white">Datos Proveedor
                            </h3>
                               <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                  <form class="form-horizontal form-label-left" id="formProveedor" name="formProveedor" method="post">
                            <input type="hidden" name="bandera" id="bandera"/>
                            <input type="hidden" name="baccion" id="baccion" value="<?php echo $Rid_proveedor;?>"/>
                                    
                                    
                                  </form>
                              </div>
                          </div>
                        </div> 
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Nombre</th>
                                      <th>Apellidos</th>
                                      <th>Telefono</th>
                                      <th>Celular</th>
                                      <th>Ver</th>
                                    </tr>
                                  </thead>
                                  <tbody id="imp">
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "select * from encomendero where bestado='t'  order  by cnombre");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>
                                      <td> <?php echo $fila[4]; ?> </td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      <?php if($fila[5]=='t'){ ?>
                                      <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al encomendero '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!')"> <i class="fa fa-folder-open-o"></i> <span>Dar de Baja</span></button>
                                      <?php }if($fila[5]=='f'){?>
                                        <button class="btn btn-success btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','alta','Esta seguro de querer activar al encomendero '+' <?php echo $fila[1]; ?>','Si, Activar!')"> <i class="fa fa-folder-open-o"></i> <span>Activar</span></button> 
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
                    <!--   <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Nombre</th>
                                      <th>Apellidos</th>
                                      <th>Telefono</th>
                                      <th>Empresa</th>
                                      <th>Ver</th>
                                    </tr>
                                  </thead>
                                  <tbody >
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "select * from proveedor where bestado='f'  order  by cnombre");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[4]; ?></td>
                                      <td> <?php echo $fila[3]; ?> </td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                                      <?php if($fila[7]=='t'){ ?>
                                      <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','baja','Esta seguro de querer dar de baja al proveedor '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!')"> <i class="fa fa-folder-open-o"></i> <span>Dar de Baja</span></button>
                                      <?php }if($fila[7]=='f'){?>
                                        <button class="btn btn-success btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','alta','Esta seguro de querer activar al proveedor '+' <?php echo $fila[1]; ?>','Si, Activar!')"> <i class="fa fa-folder-open-o"></i> <span>Activar</span></button> 
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
                        </div>-->
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
$celular=($_REQUEST["celular"]);
include("../../Config/conexion.php");
if($bandera=="add"){
    pg_query("BEGIN");
    $r=pg_query($conexion,"select count(*) from encomendero");
    while ($fila = pg_fetch_array($r)) {
            $ida=$fila[0];                                 
            $ida++ ;
        } 
      
          $result=pg_query($conexion,"insert into encomendero(eid_encomendero,cnombre, capellido, ctelefonof, ccelular, bestado) values('$ida','$nombre','$apellido','$telefono','$telefonoc','1')");
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
        mensajeInformacion('Error','Datos no almacenados','error');
        }else{
          pg_query("commit");
                echo "<script type='text/javascript'>";
                    echo "alertaSweet('Succes!','Datos actualizados !','success');";

                    echo "setTimeout (function llamarPagina(){
                                      location.href=('encomendero.php');
                                    }, 2000);";
                      echo "</script>";
        }
}
     


/*function validaCorreo($email,$baccion){
    $valor=0;
    include("../../Config/conexion.php");
    $query_s= pg_query($conexion, "select * from proveedor order by cnombre");
        while($fila=pg_fetch_array($query_s)){
            if(strcmp($fila[5],$email)===0 ){
                $valor=1;
            }
            if(strcmp($fila[0],$baccion)===0){
                $valor=0;
            }
        }
    return $valor;
}*/



?>