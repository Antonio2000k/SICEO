<?php session_start();
if(isset($_REQUEST["id"])){
    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["id"];
    $query_s = pg_query($conexion, "SELECT * from clientes where eid_cliente='$iddatos' order by cnombre");
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

    <title>SICEO | Lista de Clientes </title>

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
                        <h1 class="col-xs-12 col-sm-8 col-md-10"  align="center">
                          Lista de Clientes
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <h4 style="font-size: medium;" class="col-xs-12 col-sm-8 col-md-10 " >
                        Bienvenido en esta seccion podra ver el listado de todos los clientes registrados en SICEO.<br>
                        En la pestaña <b>REGISTRAR CLIENTE</b> podra añadir más clientes al Sistema.
                      </h4>
                  </div>
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                       <li class="col-md-5 col-sm-5 col-xs-5" role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true"  href="registrarCliente.php" id="home-tab"  >
                             REGISTRAR CLIENTE
                          </a>
                        </li>
                        <li class="active col-md-5 col-sm-5 col-xs-5"  role="presentation">
                          <a class="col-md-12 col-sm-12 col-xs-12" style="text-align: center" aria-expanded="true" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                            LISTA DE CLIENTES
                          </a>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                 
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                              <div class="x_title">
                                <h2>CLIENTES </h2>
                                
                                <div class="form-group" style="float: right;">
                                  <div class="btn-group" >
                                    
                                    <button float-right class="btn btn-info btn-icon left-icon dropdown-toggle"  data-toggle="dropdown" >
                                      <i class="fa fa-th-list"></i>
                                      <span style="color: white">Reportes</span>
                                    </button>
                                    <ul class="dropdown-menu " role="menu">
                                      <li><a href="#" data-toggle="modal" data-target="#impresion"> FECHA</a></li>
                                      <li><a href="#" data-toggle="modal" data-target="#sexo"> SEXO</a></li>
                                      <li><a href="#" data-toggle="modal" data-target="#edad"> EDAD</a></li>
                                    </ul>
                                  </div> 
                                  
                                          
                                </div>
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
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "SELECT clientes.eid_cliente, clientes.cnombre, clientes.capellido, clientes.eedad, clientes.csexo, clientes.ctelefonof, clientes.cdireccion, ex.cid_expediente
                                              FROM clientes
                                              INNER JOIN expediente2 as ex ON clientes.eid_cliente = ex.eid_cliente
                                               order by clientes.cnombre");

                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[7]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php if($fila[3]==1){
                                                  echo $fila[3]  ." "."año";
                                                }else{
                                                  echo $fila[3]  ." "."años";
                                                } ?></td>
                                      <td> <?php echo $fila[5]; ?> </td>

                                      <td class="text-center">
                                        <button class="btn btn-info btn-icon left-icon"  onClick="Expediente('<?php echo $fila[7]; ?>')"> <i class="fa fa-plus-square"></i> <span></span></button>

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
                <h5 align="center" style=" color: white">ASISTENCIA LISTADO DE CLIENTES</h5>
                <div class="clearfix"></div>
              </div>
          </div>
          <div class="modal-body modal-md">
            <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel" >

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img class="img-responsive" src="../Ayuda/Clientes/listaCliente.png" alt="...">
                  <div class="carousel-caption">
                    <p style="color:black";> Hacemos clic en el boton Agregar Producto </p>
                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/ayuda.png" alt="...">
                  <div class="carousel-caption">
                    <p style="color:black";> Hacemos clic en el boton Agregar Producto </p>
                  </div>

                </div>

                <div class="item ">
                  <img class="img-responsive" src="../Ayuda/Clientes/ayudaextraP.png" alt="...">
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

      <!--- Modal Impresion -->

        <div class="modal fade" id="impresion" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Selección de parametros a imprimir</h3> </center>
              </div>
              <div class="modal-body">
                <div class="item form-group" > 
                  <button type="button" class="btn btn-info " id="daterange-btn" style="float: right;">
                    <i class="fa fa-calendar"></i> Rango
                    <i class="fa fa-caret-down"></i>
                  </button>
                  
                  <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha Inicio*</label>
                  <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" name="rango3" id="rango3"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Fecha Inico"  autocomplete="off" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  
                        
                </div>
                <br><br>
                <div class="item form-group"> 

                  <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha Final*</label>
                  <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" name="rango4" id="rango4" class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Fecha Inico"  autocomplete="off" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                        
                </div>
                              
               <br><br><br>
              </div>
              
                <div class="modal-footer">
                  <button class="btn btn-info btn-icon left-icon pull-left" id="imp" data-dismiss="modal" onclick="Rep()"> <i class="fa fa-print"></i> Imprimir</button>
                  
                  <button type="button" class="btn btn-round btn-warning pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
          </div>
        </div>


        <div class="modal fade" id="sexo" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Selección de parametros a imprimir</h3> </center>
              </div>
            <!--  <button class="btn btn-info btn-icon left-icon " id="imp" onclick="cambioDiv('sexo')"> <i class="fa fa-print"></i> Sexo</button> 
                <button class="btn btn-info btn-icon left-icon " id="imp" onclick="cambioDiv('fecha')"> <i class="fa fa-print"></i> Fecha</button> -->
              <div class="modal-body" >
                <br>
                <div class="item form-group" > 
                  <label class="control-label col-md-1 col-sm-2 col-xs-12">Sexo*</label>
                  <div class="col-md-10 col-sm-4 col-xs-12 form-group has-feedback">
                    <div class="col-md-4 col-xs-12 col-sm-4">
                      <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M"/>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-4">
                      <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" />
                    </div>
                  </div>
                </div>
                              
                            
                                
                 <br>
              </div>
              
                <div class="modal-footer">
                  <button class="btn btn-info btn-icon left-icon pull-left" id="imp" data-dismiss="modal" onclick="RepS()"> <i class="fa fa-print"></i> Imprimir</button>
                  
                  <button type="button" class="btn btn-round btn-warning pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
          </div>
        </div>

        

        <div class="modal fade" id="edad" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Selección de parametros a imprimir</h3> </center>
              </div>
              <br>
                <center>
                  <button class="btn btn-info btn-icon left-icon " id="e1" onclick="mostrarFormulario('edadE');"> <i class="fa fa-print"></i> Edad Especifica</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e2" onclick="mostrarFormulario('edadMe');"> <i class="fa fa-print"></i> Menor a</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e3" onclick="mostrarFormulario('edadMa');"> <i class="fa fa-print"></i> Mayor a</button> 
                  <button class="btn btn-info btn-icon left-icon " id="e4" onclick="mostrarFormulario('edadR');"> <i class="fa fa-print"></i> Rango de edad</button> 
                </center>
                <br>
                <div id="cambio">
                  <div class="modal-body">
                    <div class="item form-group" id="divE" hidden > 
                      <label class="control-label col-md-3 col-sm-2 col-xs-12">Edad*</label>
                      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" name="edadEs" id="edadEs" class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Edad"  autocomplete="off" >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br><br>
                      
                    </div>

                    <div class="item form-group" id="divEme" hidden> 
                      <label class="control-label col-md-3 col-sm-2 col-xs-12">Menor a*</label>
                      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" name="edadMe" id="edadMe"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Menor a"  autocomplete="off" >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br><br>
                    </div>

                    <div class="item form-group" id="divEma" hidden> 
                      <label class="control-label col-md-3 col-sm-2 col-xs-12">Mayor a*</label>
                      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" name="edadMa" id="edadMa"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Mayor a"  autocomplete="off" >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br><br>
                    </div>

                    <div class="item form-group" id="divER" hidden > 
                      <label class="control-label col-md-3 col-sm-2 col-xs-12">Limite Inferior*</label>
                      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback" >
                        <input type="text" name="edadR1" id="edadR1"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Limite Inferior"  autocomplete="off" >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br><br><br>
                      <label class="control-label col-md-3 col-sm-2 col-xs-12">Limite Superior*</label>
                      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback" >
                        <input type="text" name="edadR2" id="edadR2"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Limite superior"  autocomplete="off" >
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br><br>
                    </div>
                    
                  </div>
                  
                  <div class="modal-footer">
                    
                      <button class='btn btn-info btn-icon left-icon pull-left' id='impri' data-dismiss='modal' onclick='RepEdad()' > <i class='fa fa-print'></i> Imprimir</button>
                    
                    
                    <button type="button" class="btn btn-round btn-warning pull-right" onclick='limpiarFormulario()' data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal -->
     </div>
  </div>

        <?php
          include "../../ComponentesForm/scripts.php";
        ?>
    </body>
</html>
