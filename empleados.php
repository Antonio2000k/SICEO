<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | </title>

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

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Datos Personales</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form  class="form-horizontal form-label-left">
                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Cliente: </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>Antonio</option>
                                    <option>ALexander</option>
                                  </select>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <button class="btn btn-info btn-icon left-icon" style="padding-left: 30px;"> <i class="fa fa-group"></i> <span>Agregar</span></button>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nombre: <span class="required">*</span>                         </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                        </div>
                        
                    </div>
                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                              <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha: <span class="required"></span>*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="control-group">
                                  <div class="controls">
                                    <div class="xdisplay_inputx form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status" style="padding-left: 55px;">
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
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nombre: <span class="required">*</span>                         </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12 has-feedback-left"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                </div>
                              </div>
                        </div>
                   </div>
                    
                    
                    
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-success btn-icon left-icon" style="padding-left: 30px;"> <i class="fa fa-save"></i> <span>Guardar</span></button>
                            <button class="btn btn-danger  btn-icon left-icon" style="padding-left: 30px;"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                      </div>
                    </div>

                  </form>
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

    <?php
        include "scripts.php";
    ?>
	
  </body>
</html>
