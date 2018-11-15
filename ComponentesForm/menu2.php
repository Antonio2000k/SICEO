<?php
session_start();
$t=$_SESSION["nivelUsuario"];

if($_SESSION['autenticado2']!="yeah2" || $t!=2){
  header("Location: ../../login.php");
  exit();
  }
?>
<script type="text/javascript" class="init">
  function Salir(){
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.confirm("<center>ATENCI&Oacute;N!</center>",
    "<center><img src='../../images/warning.png' width='150' height='150'></center>"+
    "<center><h1>Desea cerrar la sesión?</h1></center>", function(){ alertify.success('Ok')
        document.location.href="../../ComponentesForm/fin.php";
        }, function(){
          alertify.error('No ha cerrado la sesión').dismissOthers()}).set('labels', {ok:'si', cancel:'no'});;
    }

  function ayuda(){
        $(document).ready(function () {
      $("#ayuda").modal();
        });
    }
  </script>
<!-- menu profile quick info -->
 <div class="profile clearfix">
            <div class="navbar nav_title" style="border: 0;">

              <a href="index.php" class="site_title">
                <p align="center">
                  <img  width="179" height="70" src="../../production/images/SiceoL.png" >
                </p>
              </a>
            </div>
</div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>Menu Principal</h3>
                <ul class="nav side-menu">
                  <li><a href="../../index.php"><i class="fa fa-home"></i> Inicio </a></li>
                  <li><a><i class="fa fa-male"></i> Empleados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../../Modulos/Empleado/registrarEmpleado.php">Registrar Empleado</a></li>
                      <li><a href="../../Modulos/Empleado/listaEmpleado.php">Lista de Empleados</a></li>
                      <li><a href="../../Modulos/Empleado/listaEmpleadoi.php">Empleados de Baja</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../../Modulos/Cliente/registrarCliente.php">Registrar Cliente</a></li>
                      <li><a href="../../Modulos/Cliente/listaCliente.php">Listado de clientes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../../Modulos/Producto/producto.php">Registar Producto</a></li>
                      <li><a href="../../Modulos/Producto/listaProducto.php">Lista de Producto</a></li>
                      <li><a href="../../Modulos/Producto/listaProductoi.php">Producto de Baja</a></li>
                      <li><a href="../../Modulos/Producto/stock.php">Stock</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-line-chart"></i> Servicios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../../Modulos/Ventas/ventas.php">Registrar Venta</a></li>
                      <li><a href="../../Modulos/Ventas/listaVentas.php">Lista de Ventas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-cart"></i> Suministros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Proveedores<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="../../Modulos/Proveedor/proveedor.php">Registrar Proveedor</a>
                            </li>
                            <li class="sub_menu"><a href="../../Modulos/Proveedor/proveedora.php">Lista de Proveedores</a>
                            </li>
                            <li class="sub_menu"><a href="../../Modulos/Proveedor/proveedori.php">Proveedores de Baja</a>
                            </li>
                          </ul>
                      </li>
                      <li><a>Compras<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="../../Modulos/Compra/RegistraCompra.php">Registrar Compras</a>
                            </li>
                            <li class="sub_menu"><a href="../../Modulos/Compra/Comprac.php">Compras al contado</a>
                            </li>
                            <li class="sub_menu"><a href="../../Modulos/Compra/Compracd.php">Compras al credito</a>
                            </li>
                          </ul>
                      </li>
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
                <li class="" >
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <h7 style="color: black; font-size: 13px;"><img src="../../production/images/user.png" alt="">
                    <?php
                    list($nombre, $palabra2) = explode(' ', $_SESSION["nombreEmpleado"]) ;
                    list($apellido, $palabra2) = explode(' ',$_SESSION["apellidoEmpleado"]);
                    echo $nombre." ".$apellido;
                   ?>
                    <span class=" fa fa-angle-down"></span></h7>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a data-toggle="modal" href="#myModall" > Perfil</a></li>

                    <li onClick="ayuda()" data-placement="bottom"><a >Ayuda</a></li>
                    <li onClick="Salir()" data-placement="bottom"><a ><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
