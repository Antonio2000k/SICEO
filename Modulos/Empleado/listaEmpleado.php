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
                       <li class="" role="presentation">
                          <a aria-expanded="false" href="registrarEmpleado.php"  id="profile-tab">
                            REGISTRAR EMPLEADO
                          </a>
                        </li>
                        <li class="active" role="presentation">
                          <a  aria-expanded="true" data-toggle="tab" href="#tab_content2" id="home-tab" role="tab"  >
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
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                                <div class="x_title">
                                  <h2 >EMPLEADOS </h2>
                                  <div class="form-group" style="float: right;">
                                    <div class="btn-group" >
                                        <button float-right class="btn btn-info btn-icon left-icon "  onclick="RepEmp('activo')">
                                          <i class="fa fa-th-list"></i>
                                          <span style="color: white">Reporte</span>
                                        </button>
                                    </div>  
                                  </div>
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
                                      <th>Correo</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                          include("../../Config/conexion.php");
                                          $query_s= pg_query($conexion, "select * from empleados where bestado='t' order by cnombre");
                                          while($fila=pg_fetch_array($query_s)){
                                      ?>
                                    <tr>
                                      <td><?php echo $fila[0]; ?></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td><?php echo $fila[2]; ?></td>
                                      <td><?php echo $fila[3]; ?></td>
                                      <td> <?php echo $fila[10]; ?> </td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"  onClick="llamarPagina('<?php echo $fila[0]; ?>')"> <i class="fa fa-edit"></i></button>
                                      <button class="btn btn-warning btn-icon left-icon" onclick="DarBaja('<?php echo $fila[0]; ?>','0','Esta seguro de querer dar de baja al empleado '+' <?php echo $fila[1]; ?>','Si, Dar de Baja!')"> <i class="fa fa-arrow-circle-down"></i></button>
                                      
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
