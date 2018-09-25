<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>
        SICEO | Compras
    </title>
    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
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
                <!--Aqui va inicio el contenido-->
                <div class="right_col" role="main">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div>
                                <img align="left" src="../../production/images/compra.png" width="120" height="120">
                                <h1 align="center">
                                    Compras
                                </h1>
                                </img>
                            </div>
                            <div align="center">
                                <p>
                                    Formulario el cual servira para poder registrar las compras que se hacen al proveedor. La pestaña de listado de compras muestra todas las compras realizadas.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="" data-example-id="togglable-tabs" role="tabpanel">
                                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                            <li class="active" role="presentation">
                                                <a aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab">
                                                    REGISTRAR COMPRA
                                                </a>
                                            </li>
                                            <li class="" role="presentation">
                                                <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                                                    LISTADO DE COMPRAS
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <!--Aqui inicia el primer registro-->
                                                        <div class="x_panel">
                                                            <div class="x_title" style="background: #2A3F54">
                                                                <h2 style="text-indent: 400px; color: white">
                                                                    Datos del producto
                                                                </h2>
                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li>
                                                                        <a class="collapse-link">
                                                                            <i class="fa fa-chevron-up">
                                                                            </i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix">
                                                                </div>
                                                            </div>
                                                            <div class="x_content">
                                                                <form class="form-horizontal form-label-left">
                                                                    <div class="row">
                                                                        <!--Codigos-->
                                                                        <div class="item form-group">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Modelo*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="text" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Modelo">
                                                                                    <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Nombre*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="text" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Nombre">
                                                                                    <span class="fa  fa-toggle-right form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item form-group">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Cantidad*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="number" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Cantidad">
                                                                                    <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="item form-group" align="center">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <button class="btn btn-primary source"><i class="fa fa-plus"></i> Agregar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-3">

                                                                        </div>

                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha*</label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <div class="control-group">
                                                                                    <div class="controls" style="padding-left: 15px;">
                                                                                        <div class="xdisplay_inputx form-group has-feedback">
                                                                                            <input type="text" class="form-control has-feedback-left" id="single_cal1" aria-describedby="inputSuccess2Status" style="padding-left: 55px;">
                                                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" style="padding-left:0px; margin-left: -10px;"></span>
                                                                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Fin Codigos-->
                                                                    <!--Inicio Primer bloque-->
                                                                    <div class="row">
                                                                        <div class="item form-group">
                                                                        <div class="row">
                                                                            <h2>Listado de lentes listos para enviar</h2>
                                                                            <div class="x_content">
                                                                                <table id="datatable" class="table table-striped table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Modelo</th>
                                                                                            <th>Cantidad</th>
                                                                                            <th>Nombre</th>
                                                                                            <th>Acciones</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Persol 649</td>
                                                                                            <td>40</td>
                                                                                            <td>Lentes de sol Carly</td>
                                                                                            <td class="text-center"> <button class="btn btn-danger  btn-icon left-icon"> <i class="fa fa-close"></i> <span>Cancelar</span></button><button class="btn btn-info btn-icon left-icon"> <i class="fa fa-edit"></i> <span>Modificar</span></button></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                                                            <button class="btn btn-success btn-icon left-icon"> <i class="fa fa-save"></i> <span>Guardar</span></button>
                                                                            <button class="btn btn-danger  btn-icon left-icon"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    </form>
                                                            </div>      
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div aria-labelledby="profile-tab" class="tab-pane fade" id="tab_content2" role="tabpanel">
                                            <!--Aqui va la tabla-->
                                            <div class="item form-group">
                                                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Fecha de Compra</th>
                                                            <th>Cantidad de Productos Adquiridos</th>
                                                            <th>Total</th>
                                                            <th>Reporte</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>10/02/2018</td>
                                                            <td>17</td>
                                                            <td>$102.20</td>
                                                            <td><a href="#"><i class="fa fa-bar-chart"></i></a></td>
                                                        </tr>
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
