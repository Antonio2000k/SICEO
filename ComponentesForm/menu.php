<?php
session_start();
$t=$_SESSION["nivelUsuario"];
$idus=$_SESSION["idUsuario"];
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
  header("Location: ../../login.php");
  exit();
  }
  ?>
  <script type="text/javascript">
      function llamarpreguntas(id){
        window.open("../Seguridad/recuperarP.php?id="+id, '_parent');
      }      
  </script>
<!-- menu profile quick info -->
 <div class="profile clearfix">
            <div class="navbar nav_title" style="border: 0;">

              <a href="index.php" class="site_title"><p align="center"> <img  width="179" height="70" src="../../production/images/SiceoL.png" ></p></a>
            </div>
</div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>Menu Principal</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio </a></li>
                  <li><a><i class="fa fa-male"></i> Empleados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../../Modulos/Empleado/registrarEmpleado.php">Registrar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../../clientes.php">Registrar</a></li>
                      <li><a href="empleados.php">Listado de clientes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="productos.php">Registar</a></li>
                      <li><a href="empleados.php">Listado de productos</a></li>
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
                      <li><a href="empleados.php">Compras</a></li>
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
                      <li><a href="../../Modulos/Pregunta/pregunta.php">Registrar Preguntas</a></li>
                      <li><a href="../../Modulos/Usuario/registrarUsuarios.php">Registrar usuario</a></li>
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
                    <img src="../../production/images/user.png" alt=""><?php
                    list($nombre, $palabra2) = explode(' ', $_SESSION["nombreEmpleado"]) ; 
                    list($apellido, $palabra2) = explode(' ',$_SESSION["apellidoEmpleado"]); 
                   echo $nombre." ".$apellido;
                   ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a data-toggle="modal" href="#myModall" > Perfil</a></li>

                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="../../ComponentesForm/fin.php"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- Modal -->
          <div class="modal fade" id="myModall" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div>
                     <p><img align="left" height="35" width="35" src="../../production/images/cliente.png" style="margin-right:20px"><h4 class="modal-title">Informacion Personal</h4></img></p>
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
                  
                  <button type="button" class="btn btn-info" data-dismiss="modal" onclick="this.disabled = true; llamarpreguntas('<?php echo $idus ?>')"  ><i class="fa fa-lock"></i> Cambiar Contraseña</button>
                  <button type="button"  class="btn btn-info" data-dismiss="modal" ><i class="fa fa-plus"></i> Modificar </button>
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                </div>
              </div>
            </div>
          </div>
