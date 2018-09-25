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
                    </meta>
                </meta>
            </meta>
        </meta>
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
                        <div class="">
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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
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
                                                    
                                                        <!--Aqui inicia el primer registro-->
                                                        <div class="x_content">
                                                            <div class="x_title" style="background: #2A3F54">
                                                                <h3 align="center" style=" color: white"> Datos del producto</h3>
                                                                
                                                                <div class="clearfix"></div>
                                                            </div>
                                                                <div class="x_content">
                                                                    <form class="form-horizontal form-label-left">
                                                                        <div class="row">
                                                                            <!--Codigos-->
                                                                             <div class="ln_solid"></div>
                                                                            <div class="item form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                        Modelo*
                                                                                    </label>
                                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                        <input type="text" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12"  placeholder="Modelo">
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
                                                                                        <input type="number" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12"  placeholder="Cantidad">
                                                                                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha*</label>
                                                                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                      <div class="control-group">
                                                                                      <div class="controls" style="padding-left: 15px;">
                                                                                        <div class="xdisplay_inputx form-group has-feedback" >
                                                                                          <input type="text" class="form-control has-feedback-left" id="single_cal1" aria-describedby="inputSuccess2Status" style="padding-left: 55px;">
                                                                                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" style="padding-left:0px; margin-left: -10px;"></span>
                                                                                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                                                        </div>
                                                                                      </div>
                                                                                    </div>
                                                                                </div>
                                                                              </div>
                                                                                
                                                                            </div>
                                                                            <div class="item form-group" align="center">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <button class="btn btn-primary source"><i class="fa fa-plus"></i> Agregar</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                  
                                                                                </div>
                                                                              
                                                                                <div class="ln_solid"></div>
                                                                            </div>
                                                                            
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                     <!--Fin Codigos-->
                     <!--Inicio Primer bloque-->
                     <div role="tabpane2" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                               <div class="x_title" style="background: #2A3F54">
                                    <h3 align="center" style=" color: white"> Compras</h3> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="item form-group">
                                    
                                        
                                        <div class="x_content">
                                        
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Proveedor</th>
                                                        <th>Total</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>12/09/2016</th>
                                                        <th>Carly</th>
                                                        <th>$150.00</th>
                                                        <td class="text-center"> 
                                                            <button class="btn btn-danger  btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ver Detalle</span></button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!--Aqui finaliza el primer registro-->
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