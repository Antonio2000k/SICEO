<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Encomiendas </title>

    <?php
      include ".../ComponentesForm/estilos.php";
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <div class="clearfix"></div>

           <?php
                include "../ComponentesForm/menu.php";
           ?>

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

    <?php
        include "ComponentesForm/scripts.php";
    ?>
	
  </body>
</html>
