<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Encomiendas</title>

    <?php
      include "estilos.php";
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <div class="clearfix"></div>

           <?php
                include "menu.php";
           ?>

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div  >
                    <img src="production/images/encomienda.png" align="left" width="120" height="120"><h1 align="center">ENCOMIENDAS</h1> 
                </div>
                <p class="text-center">
                  Formulario que permite registrar encomiendas, en la segunda pestaña se muestran todas las encomiendas realizadas.
                </p>
            </div>
          </div>
          <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist" style="font-size: 15px;">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="fa fa-user"></span>    NUEVA ENCOMIENDA</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="fa fa-users"></span>     LISTA DE ENCOMIENDAS</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title" style="background: #2A3F54;"   >
                                    <h2 style="text-indent: 400px; color: white">Datos de la encomienda</h2>
                                    
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                    <form  class="form-horizontal form-label-left">
                                      <div class="row">
                                          <div class="col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Encomendero: <span class="required"></span>*</span></label>
                                                <div class="col-md-7 col-sm-6 col-xs-12">
                                                  <select class="form-control">
                                                    <option>Seleccione</option>
                                                    <option>Antonio</option>
                                                    <option>Alexander</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                    <button class="btn btn-primary btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Agregar</span></button>
                                                </div>
                                              </div>
                                            </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha: <span class="required"></span>*</span></label>
                                              <div class="col-md-8 col-sm-8 col-xs-12">
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
                                          
                                      </div>
                                      <div class="row">
                                            <div class="form-group">
                                              <label class="control-label col-md-2 col-sm-2 col-xs-12">
                                                Detalles*
                                            </label>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <input type="text" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12"  placeholder="Placas, motorista, telefono motorista">
                                                <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            </div>
                                      </div>
                                      <div class="row">
                                              <h2>Listado de examenes</h2>
                                            <div class="x_content">
                                              <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Nombre del CLiente</th>
                                                    <th>Modelo</th>
                                                    <th>Examen</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td><div class="checkbox" style="padding-left: 40px;"><label><input type="checkbox" class="flat" checked="checked"> Confirmar  </div>
                                                    </td>
                                                    <td>Francisco Antonio</td>
                                                    <td>Lacoste</td>
                                                    <td class="text-center"><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                                  </tr>
                                                  <tr>
                                                    <td><div class="checkbox" style="padding-left: 40px;"><label><input type="checkbox" class="flat" checked="checked"> Confirmar  </div></td>
                                                    <td>Elmer Antonio</td>
                                                    <td>Ray-ban</td>
                                                    <td class="text-center"><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                                  </tr>
                                                  
                                                  </tbody>
                                              </table>
                                              <br>

                                          <br>

                                            </div>
                                      </div>
                                      
                                      <div class="ln_solid"></div>

                                      
                                      <div class="row text-center">
                                          <div class="form-group">
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
                        </div>


                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>PRODUCTOS </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Fecha</th>
                                      <th>Encomendero</th>
                                      <th>Estado</th>
                                      <th>Reporte</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>02/09/2018</td>
                                      <td>Alexander Enmanuel</td>
                                      <td>Entregado</td>
                                      <td class="text-center"><a href="#" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>10/02/2018</td>
                                      <td>Miguel Angel</td>
                                      <td>Pendiente</td>
                                      <td class="text-center"><a href="#" class="btn btn-round btn-info"  >+</a></td>
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
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <?php
            include "footer.php";
          ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    </div>

    <?php
        include "scripts.php";
    ?>
  </body>
</html>
