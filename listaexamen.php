<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Lista de Examenes </title>

    <?php
      include "estilos.php";
    ?>

   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
                        include "menu.php";
                        ?>
                        
                    </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                 <div>
                     <img width="120" height="120" align="left" src="production/images/examen.png">
                        <h1 align="center">
                          Lista de Examenes
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <p>
                        Bienvenido en esta sección se muestra el listado general de los examenes realizados. 
                      </p>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                       <div class="x_panel">         
                           <div class="x_content">
                              <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha</th>
                                        <td class="text-center">Diagnostico</td>
                                        
                                  </tr>
                                </thead>


                                <tbody>
                                  <tr>
                                     <td>Alexander Enmanuel</td>
                                     <td>Orellana Corvera</td>
                                     <td>23/02/2018</td>
                                     <td class="text-center"><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                        
                                   </tr>
                                      <tr>
                                        <td>Miguel Angel </td>
                                        <td>Rivas Handal</td>
                                        <td>23/05/2019</td>
                                        <td class="text-center"> <button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                      </tr>
                                      <tr>
                                        <td>Elmer Antonio </td>
                                        <td>Mejia Rivas</td>
                                        <td>20/01/2020</td>
                                        <td class="text-center"><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
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


