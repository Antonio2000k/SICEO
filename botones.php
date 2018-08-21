<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Clientes </title>

    <?php
      include "estilos.php";
    ?>
  </head>

</></>


  <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        
                        <div class="clearfix">
                        </div>

                        <?php
                        include "menu.php";
                        ?>
                        
                    </div>

        <!-- page content -->
        <div class="right_col" role="main">

          
                    <div class="x_content">
                    <button type="button" class="btn btn-default">Default</button>

                    <button type="button" class="btn btn-primary">Primary</button>

                    <button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button>

                    <button type="button" class="btn btn-info">Info</button>

                    <button type="button" class="btn btn-warning">Warning</button>

                    <button type="button" class="btn btn-danger">Danger</button>

                    <button type="button" class="btn btn-dark">Dark</button>

                    <button type="button" class="btn btn-link">Link</button>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button class="btn btn-info btn-icon left-icon"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button class="btn btn-warning btn-icon left-icon"> <i class="fa fa-folder-open-o"></i> <span>Dar de Baja</span></button>
                  </div>

              <br>
              <br>
            </br>
              
              <div class="col-sm-4" style="margin-top: 100px;">
                                            <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-2 col-xs-12">Hora: <span class="required"></span>*</span></label>
                                                <div class='input-group date' id='myDatepicker3'>
                                                    <input type='text' class="form-control" />
                                                    <span class="input-group-addon">
                                                      <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
            </div>
            <div class="col-sm-6" style="margin-top: 100px;">
                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha: <span class="required"></span>*</span></label>
                                              <div class="col-md-5 col-sm-5 col-xs-12">
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
        <!-- /page content -->

        <footer>
            <?php
              include "footer.php";
             ?>
        </footer>
      </div>
                <!--Aqui va fin el contenido-->
     </div>
  </div>

        <?php
          include "scripts.php";
        ?>
    </body>
</html>