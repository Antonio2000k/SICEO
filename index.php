<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$iddatos=$_SESSION["idUsuario"];
$us =$_SESSION["nombrUsuario"]; 
$nombreE =  $_SESSION["nombreEmpleado"];
$apellidoE = $_SESSION["apellidoEmpleado"];
$dui  =   $_SESSION["duiEmpleado"];
$tel  =   $_SESSION["telEmpleado"];
$cel  =   $_SESSION["celEmpleado"];
$correo  =   $_SESSION["correoEmpleado"];
$dir   =   $_SESSION["dirEmpleado"];
$sex   =   $_SESSION["sexEmpleado"];
if($_SESSION['autenticado']!="yeah" || $t!=1){
  header("Location: login.php");
  exit();
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

    <title>SICEO</title>

     <!-- Bootstrap -->
 <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    

   <!-- SwettAlert2-->
   <link rel="stylesheet" href="vendors/sweetalert2-7.26.12/archivitos/sweetalert2.min.css">
   
   <!-- -->
   <link rel="stylesheet" href="../../vendors/notifit-2-master/dist/notifit.min.css">

   <script type="text/javascript">
      function llamarpreguntas(id){
        window.open("Modulos/Seguridad/recuperarP.php?id="+id, '_parent');
      }      
  </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <div class="clearfix"></div>

           <!-- menu profile quick info -->
 <div class="profile clearfix">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><p align="center"> <img  width="179" height="70" src="images/SiceoL.png" ></p></a>
            </div>
</div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>Menu Principal</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i><span> Inicio </span></a></li>
                  <li><a><i class="fa fa-male"></i> Empleados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Modulos/Empleado/registrarEmpleado.php">Registrar Empleado</a></li>
                      <li><a href="Modulos/Empleado/listaEmpleado.php">Lista de Empleados</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Modulos/Cliente/registrarCliente.php">Registrar</a></li>
                      <li><a href="Modulos/Cliente/listaCliente.php">Listado de clientes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Modulos/Producto/producto.php">Registar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-line-chart"></i> Servicios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ventas.php">Venta</a></li>
                      <li><a href="examen.php">Examen</a></li>
                      <li><a href="ventas.php">Reparaciones</a></li>
                      <li><a href="empleados.php">Control de garantias</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-cart"></i> Suministros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="proveedor.php">Proveedores</a></li>
                      <li><a href="Modulos/Compra/RegistraCompra.php">Compras</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-automobile"></i> Encomiendas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="registrarEncomienda.php">Registrar</a></li>
                      <li><a href="empleados.php">Listado de encomiendas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-key"></i>Seguridad <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="Modulos/Pregunta/pregunta.php">Registrar Preguntas</a></li>
                      <li><a href="Modulos/Usuario/registrarUsuarios.php">Registrar usuario</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="production/images/user.png" alt=""><?php
                    list($nombre, $palabra2) = explode(' ', $_SESSION["nombreEmpleado"]) ; 
                    list($apellido, $palabra2) = explode(' ',$_SESSION["apellidoEmpleado"]); 
                   echo $nombre." ".$apellido;
                   ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a data-toggle="modal" href="#myModall" > Perfil</a></li>

                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="ComponentesForm/fin.php"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title" style="background: #2A3F54;"  >
                  <h2 style="text-indent: 450px; color: white">Accesos</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <br>
                <div class="row top_tiles">
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12">
                      </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count" style="font-size: 30px;">Clientes</div>
                  <p>Mostrar el listado de clientes.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-line-chart"></i></div>
                  <div class="count" style="font-size: 30px;">Ingresos</div>
                  <p>Grafica de ingresos mensuales.</p>
                </div>
              </div>
            </div>
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-list-alt"></i></div>
                      <div class="count" style="font-size: 30px;">Productos</div>
                      <p>Listado de existecia de productos</p>
                    </div>
                  </div>
                  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-pie-chart"></i></div>
                      <div class="count"  style="font-size: 30px;">Compras</div>
                      <p>Grafica de compras mensuales</p>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                  
                </div>
              </div>
            </div>
          </div>


        </div>
        
        </div>
        <!-- /page content -->
        <!-- Modal -->
          <div class="modal fade" id="myModall" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div>
                     <p><img align="left" height="35" width="35" src="production/images/cliente.png" style="margin-right:20px"><h4 class="modal-title">Informacion Personal</h4></img></p>
                  </div>
                  
                </div>
                <div class="modal-body">
                  
                              </br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nombre" value="<?php echo $nombreE; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" value="<?php echo $apellidoE; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">duiEmpleado</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="dui" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dui" value="<?php echo $dui; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">telEmpleado</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="telefono" value="<?php echo $tel; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">celEmpleado</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="celular" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="celular" value="<?php echo $cel; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">correoEmpleado</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="correo" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="correo" value="<?php echo $correo; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">dirEmpleado</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="direccion" value="<?php echo $dir; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                   <div class="item form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">sexEmpleado</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left"  id="pregunta_usuario" class="form-control col-md-6 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pregunta_usuario" value="<?php echo $sex; ?>" autocomplete="off" maxlength="60" disabled><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <br><br><br><br><br>
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-info" data-dismiss="modal" onclick="this.disabled = true; llamarpreguntas('<?php echo $iddatos ?>')"  ><i class="fa fa-lock"></i> Cambiar Contraseña</button>
                  <button type="button"  class="btn btn-info" data-dismiss="modal" ><i class="fa fa-plus"></i> Modificar </button>
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            SICEO. Derechos Reservados <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot pluins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date-es-ES.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    <!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="vendors/sweetalert2-7.26.12/dist/sweetalert2.min.js"></script>


    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Initialize datetimepicker -->
    <script>
      $('#myDatepicker').datetimepicker();
      
      $('#myDatepicker2').datetimepicker({
          format: 'MM.DD.YYYY'
      });
      
      $('#myDatepicker3').datetimepicker({
          format: 'hh:mm A'
      });
      
      $('#myDatepicker4').datetimepicker({
          ignoreReadonly: true,
          allowInputToggle: true
      });

      $('#datetimepicker6').datetimepicker();
      
      $('#datetimepicker7').datetimepicker({
          useCurrent: false
      });
      
      $("#datetimepicker6").on("dp.change", function(e) {
          $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
      });
      
      $("#datetimepicker7").on("dp.change", function(e) {
          $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
      });
    </script>
	
  </body>
</html>
