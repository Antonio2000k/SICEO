<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>SICEO | Compras </title>
    <?php include "../../ComponentesForm/estilos.php";  ?>
    <link href="../Compra/css/propio.css" rel="stylesheet">    
    <link href="css/estiloModal.css" rel="stylesheet">
    <script src="js/egresosIngreso.js"></script>
</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
    <div class="left_col scroll-view"><?php include "../../ComponentesForm/menu.php";  ?></div>
    <!--Aqui va inicio el contenido-->
    <div class="right_col" role="main">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div>
                    <img align="left" src="../../production/images/compra.png" width="120" height="120"><h1 align="center">Compras</h1>
                </div>
                <div align="center">
                    <p>Formulario el cual servira para poder registrar las compras que se hacen al proveedor. La pestaña de listado de compras muestra todas las compras realizadas.</p>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_content">
        <div class="" data-example-id="togglable-tabs" role="tabpanel">
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="active" role="presentation">
                    <a aria-expanded="true" data-toggle="tab" href="ingresosEgresos.php" id="home-tab" role="tab">INGRESOS Y EGRESOS</a>
                </li>
                <li class="" role="presentation">
                    <a aria-expanded="true"  href="egresos.php" id="home-tab">EGRESOS</a>
                </li>
                <li class="" role="presentation">
                    <a aria-expanded="true"  href="ingresos.php" id="home-tab">INGRESOS</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)"><h2 style="text-indent: 400px; color: white">Ingresos-Egresos</h2>
                            <ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                        <div class="row">
                           <div class="col-md-9 col-sm-9 col-xs-12 text-center">
                           <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                           <select onChange="mostrarResultados(this.value,'ingreso');" class="SYear" style="width: 100%" id="year">
                                <?php
                                   $year=date("Y");
                                    for($i=2015;$i<=$year;$i++){
                                        if($i ==$year){
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        }else{
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                               </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                           <select onChange="mostrarResultadosMes('','','','ingreso');" class="SMes" style="width: 100%" id="mes">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            </div>
                            
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 text-right">
                                <button class="btn btn-default btn-icon left-icon pull-left" onclick="mostrarResultadosNetos('','','','ingreso','neto');"> <i class="fa fa-bar-chart"></i>Netos</button> 
                                <button class="btn btn-default btn-icon left-icon pull-left" onclick="mostrarResultadosNetos('','','','ingreso','totales');"> <i class="fa fa-bar-chart"></i>Totales</button> 
                            
                            </div>                         
                        </div>
                        <div class="row">
                             <div class="resultados"> <div id="container"></div></div>
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
    
        <!--- Modal Detalle Compra-->
        <div class="modal fade" id="modalDetalleCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h3 class="modal-title" id="exampleModalLabel">Detalle Compra</h3> </center>
                    </div>
                    <div class="modal-body" id="cargaDetalle"> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
        
    <footer><?php        include "../../ComponentesForm/footer.php";      ?> </footer>
</div>        
</div>
</div>
    <?php include "../../ComponentesForm/scripts.php";    ?>
    <script src="../../vendors//Highcharts-6.2.0/code/highcharts.js"></script>
    <script src="../../vendors//Highcharts-6.2.0/code/modules/exporting.js"></script>
    <script src="../../vendors//Highcharts-6.2.0/code/modules/export-data.js"></script>
    <script type="text/javascript">
     $(function () {
            $('.SYear').select2()
            $('.SMes').select2()
        });
var fecha = new Date();
var year = fecha.getFullYear();
$(document).ready(mostrarResultados(year,'ingreso'));  
</script>
</body>
</html>