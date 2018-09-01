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
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>SICEO</span></a>
            </div>

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
