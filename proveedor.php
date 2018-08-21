<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Proveedores </title>

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
          <div class="">  
          <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                 <div>
                     <img align="left" src="production/images/man.png">
                        <h1 align="center">
                           Proveedores
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <p>
                        Bienvenido en esta sección aquí puede registrar pacientes en el sistema debe de llenar todos los campos obligatorios (*) para poder registrar un proveedor en el sistema. La segunda pestaña muestra todos los proveedores registrados.
                      </p>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist" style="font-size: 15px;">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="fa fa-user"></span>    NUEVO PROVEEDOR</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="fa fa-users"></span>     LISTA DE PROVEEDORES</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_content">
                            <div class="x_title" style="background: #2A3F54">
                              <h3 align="center" style=" color: white">Datos</h3>
                               <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                  <form  class="form-horizontal form-label-left">
                                    <div class="row">
                                      
                                      <div class="item form-group">
                                        <h2>Datos de empresa</h2>
                                      </div>
                                      <div class="ln_solid"></div>

                                      <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        Empresa*
                                                                                    </label>
                                        <div class="col-md-5 col-sm-6 col-xs-6 form-group has-feedback">
                                              <input type="tel" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="empresa" placeholder="Nombre de la Empresa" required="required" >
                                              <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        Telefono*
                                                                                    </label>
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono de la Empresa(9999-9999)" required="required" >
                                              <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        E-mail*
                                                                                    </label>
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="tel" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="email" placeholder="E-Mail" required="required" >
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                      </div>
                                        <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        Direccion*:
                                                                                    </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="tel" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion de la Empresa" required="required" >
                                              <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        </div>
                                         <div class="ln_solid"></div>
                                         
                                         <div class="item form-group">
                                            <h2>Datos de proveedor</h2>
                                          </div>
                                          <div class="ln_solid"></div>

                                        <div class="item form-group">
                                          <label class="control-label col-md-1 col-sm-3 col-xs-2">
                                                                                        Nombres*
                                                                                    </label>
                                          <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="text" class="form-control has-feedback-left"  id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre del Proveedor" required="required" >
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        Apellidos*
                                                                                    </label>
                                            <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="Apellidos del Proveedor" required="required" >
                                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            
                                            </div>
                                            
                                      </div>
                                     

                                      <div class="item form-group">
                                        
                                        <label class="control-label col-md-1 col-sm-12 col-xs-2">
                                                                                        Telefono*
                                                                                    </label>
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                              <input type="telc" class="form-control has-feedback-left"  id="telefonoc" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefonoc" placeholder="Telefono del Proveedor(9999-9999)" required="required" >
                                              <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                      </div>
                                      
                                      <div class="item form-group">
                                        
                                        
                                        
                                      </div>
                                      <div class="ln_solid"></div>

                                    </div>
                                    <div class="form-group">
                                      <center>
                                        <div class="col-md-12 col-sm-6 col-xs-12 ">
                                              <button class="btn btn-success btn-icon left-icon" > <i class="fa fa-save"></i> <span>Guardar</span></button>
                                              <button class="btn btn-danger  btn-icon left-icon" > <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                        </div>
                                      </center>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_content">
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Nombre</th>
                                      <th>Apellidos</th>
                                      <th>Telefono</th>
                                      <th>Empresa</th>
                                      <th>Ver</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Alexander Enmanuel</td>
                                      <td>Orellana Corvera</td>
                                      <td>2345 - 8965</td>
                                      <td> Clinica vista buena</td>
                                      <td><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>

                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Miguel Angel </td>
                                      <td>Rivas Handal</td>
                                      <td>2345 - 8965</td>
                                      <td> Clinica La concepcion</td>
                                      <td><button type="button" class="btn btn-success"><i class="fa fa-th-list"></i> <span>Ver</span></button></td>
                                      
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
</div>

    <?php
        include "scripts.php";
    ?>
	
  </body>
</html>

