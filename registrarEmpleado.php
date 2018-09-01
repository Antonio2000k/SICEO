<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Empleado </title>

    <?php
      include "ComponentesForm/estilos.php";
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
                        include "ComponentesForm/menu.php";
                        ?>
                        
                    </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                 <div>
                     <img align="left" src="production/images/emplea.png" width="120" height="120">
                        <h1 align="center">
                           Empleados
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <p>
                        Bienvenido en esta sección aquí puede registrar empleados en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente.En la pestaña de listado de empleados se mostraran todos los empleados registrados en el sistema.
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
                            NUEVO EMPLEADO
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                            LISTA DE EMPLEADOS
                          </a>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: #2A3F54">
                           <h3 align="center" style=" color: white">Datos Personales</h3>
                              
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left">
                             <div class="row">
                                <!--Codigos-->
                                  <div class="ln_solid"></div>

                                <div class="item form-group">
                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Nombres *</label>
                                   <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="name" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombres" required="required" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Apellidos *</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="Apellidos" required="required" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">

                                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <div class="col-sm-3">
                                      <label>Sexo *</label>
                                    </div>
                                              
                                                <p>
                                                  Masculino:
                                                  <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required />         Femenino:
                                                  <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                                                </p>
                                  </div>


                                  <div class="col-md-5 col-sm-5 col-xs-12">
                                     <div class="form-group">
                                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Fecha de Nacimiento *</label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                           <div class="control-group">
                                              <div class="controls">
                                                 <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="fechan" aria-describedby="inputSuccess2Status4">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                      </div>
                                   </div>

                                   <div class="col-sm-4">
                                          <label class="control-label col-md-1 col-sm-3 col-xs-12">DUI *</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="DUI" required="required" >
                                       <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
                                    </div>


                                   </div>

                                 </div>

                                 <div class="ln_solid"></div>


                                  <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Telefono *</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" required="required" >
                                      <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Celular *</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="telc" class="form-control has-feedback-left"  id="telefonoc" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefonoc" placeholder="Celular" required="required" >
                                       <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Direccion *</label>
                                    <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="tel" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" required="required" >
                                       <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>

                                  
                                                
                                  <div class="ln_solid"></div>
                                                
                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                          <button class="btn btn-success btn-icon left-icon;" > <i  class="fa fa-save"></i> <span >Guardar</span></button>
                                           <button class="btn btn-danger  btn-icon left-icon" > <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                      </div>
                                    </center>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                                <div class="x_title">
                                  <h2>PACIENTES </h2>
                                     
                                <div class="clearfix"></div>
                                </div>
                                
                                <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Telefono</th>
                                      <th>Sexo</th>
                                      <th>Expediente</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Alexander Enmanuel</td>
                                      <td>Orellana Corvera</td>
                                      <td>2345 - 8965</td>
                                      <td> M </td>
                                      <td><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"> <i class="fa fa-edit"></i> <span>Modificar</span></button></td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Miguel Angel </td>
                                      <td>Rivas Handal</td>
                                      <td>2345 - 8965</td>
                                      <td> M </td>
                                      <td><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                      <td class="text-center"><button class="btn btn-info btn-icon left-icon"> <i class="fa fa-edit"></i> <span>Modificar</span></button></td>

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
                </div>
              </div>
            </div>
        
        <!-- /page content -->

        <footer>
            <?php
              include "ComponentesForm/footer.php";
             ?>
        </footer>
      </div>
                <!--Aqui va fin el contenido-->
     </div>
  </div>

        <?php
          include "ComponentesForm/scripts.php";
        ?>
    </body>
</html>