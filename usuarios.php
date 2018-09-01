<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Usuarios </title>

    <?php
      include "estilos.php";
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
                        include "menu.php";
                        ?>
                        
                    </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div>
                                    <img align="left" src="production/images/cliente.png">
                                        <h1 align="center">
                                           Usuarios
                                        </h1>
                                    </img>
                                </div>
                                <div align="center">
                                    <p>
                                        Bienvenido en esta sección aquí puede registrar pacientes en el sistema debe de llenar todos los campos obligatorios (*) para poder registrar un paciente en el sistema.
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
                            NUEVO USUARIO
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                            LISTA DE USUARIOS
                          </a>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: #2A3F54">
                           <h3 align="center" style=" color: white">Datos Usuario</h3>
                              
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left">
                             <div class="row">
                                <!--Codigos-->


                                <div class="item form-group">
                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Usuario</label>
                                   <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="text" class="form-control has-feedback-left"  id="name" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Usuario" required="required" >
                                     <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   </div>

                                   <label class="control-label col-md-1 col-sm-3 col-xs-12">Contraseña</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="Contraseña" required="required" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">Verificar Contraseña</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="Ingrese de nuevo la contraseña" required="required" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Privilegios</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                           <select class="form-control">
                                              <option>Seleccionar</option>
                                              <option>Administrador</option>
                                              <option>Empleado</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Empleado</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                           <select class="form-control">
                                              <option>Seleccionar</option>
                                              <option>fulano de tal</option>
                                              <option>mengana</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>                                  
                                 </div>

                                 <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Pregunta</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                           <select class="form-control">
                                              <option>Seleccionar</option>
                                              <option>jakñdjaskñjdaksjdaslñk?</option>
                                              <option>kljsdklaklvcnskldjaskjdakl?</option>
                                           </select>
                                        </div>
                                     </div>
                                  </div>
                                   
                                       <label class="control-label col-md-1 col-sm-3 col-xs-12">Respuesta</label>
                                    <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                       <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="Respuesta" required="required" >
                                       <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>                             
                                 </div>
                                

                                  
                                                
                                  <div class="ln_solid"></div>
                                                
                                  <div class="item form-group">
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                          <button class="btn btn-success btn-icon left-icon;" style="padding-left: 70px; padding-right: 70px "> <i  class="fa fa-save"></i> <span >Guardar</span></button>
                                           <button class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px "> <i class="fa fa-close"></i> <span>Cancelar</span></button>
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
                                      <th>Usuario</th>
                                      <th>Empleado</th>
                                      <th>Privilegio</th>
                                    </tr>
                                  </thead>


                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Administrador</td>
                                      
                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>1</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Empleado</td>
                                      
                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>1</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Empleado</td>
                                      
                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
                                    </tr>
                                    <tr>
                                      <td>1</td>
                                      <td>uiuidss</td>
                                      <td>kjkdajk</td>
                                      <td>Empleado</td>
                                      
                                      <td class="text-center"><a href="expediente.php" class="btn btn-round btn-info"  >+</a></td>
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