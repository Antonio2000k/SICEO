<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Expediente </title>

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

         <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div>
                                    <img align="left" src="production/images/cliente.png">
                                        <h1 align="center">
                                           Clientes
                                        </h1>
                                    </img>
                                </div>
                                <div align="center">
                                    <p>
                                        Bienvenido en esta sección se muestra la información del paciente que ha seleccionado, podrá actualizar el expediente así como también eliminarlo si lo desea. Además podrá registrar recetas e imprimirlas.istrar un paciente en el sistema.
                                    </p>
                                </div>
                            </div>
                        </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul id="myTab" class="nav nav-tabs bar_tabs " role="tablist" style="font-size: 15px;">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="fa fa-user"></span>    EXPEDIENTE</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="fa fa-users"></span>     ACTUALIZAR EXPEDIENTE</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="fa fa-users"></span>     EXAMENES</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="fa fa-users"></span>     FACTURACION</a>
                        </li>

                      </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: #2A3F54">
                           <h2 style="text-indent: 400px; color: white">Datos Personales</h2>
                              
                               <div class="clearfix"></div>
                        </div>
                         <div class="x_content">
                           <form class="form-horizontal form-label-left">
                             <div class="row">
                                <!--Codigos-->

                                <div class="item form-group">
                                  <h1 class="text-center"><img src="production/images/boy1.png"></h1>
                                </div>
                                
                                <div class="ln_solid" ></div><div class="ln_solid"></div>

                                <div class="item form-group">
                                  <h2 class="text-left">@Cliente</h2>
                                </div>
                                
                                <div class="ln_solid" ></div><div class="ln_solid"></div>

                                <div class="item form-group">
                                          <label class="control-label col-md-2 col-sm-3 col-xs-12">Nombres</label>
                                          <div class="col-md-4 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>

                                          <label class="control-label col-md-1 col-sm-3 col-xs-12">Apellidos</label>
                                          <div class="col-md-4 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>
                                        
                                      </div>

                                

                                <div class="item form-group">
                                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Sexo</label>
                                          <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>

                                          <label class="control-label col-md-2 col-sm-3 col-xs-12">Fecha</label>
                                          <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>

                                      </div>

                                 

                                   <div class="item form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Telefono</label>
                                          <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>

                                          <label class="control-label col-md-2 col-sm-3 col-xs-12">Celular</label>
                                          <div class="col-md-3 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>
                                      </div>

                                 

                                  <div class="item form-group">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Direccion</label>
                                          <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="">
                                          </div>
                                        
                                      </div>
                                                
                                  <div class="ln_solid"></div><div class="ln_solid"></div>
                                                
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
                                
                              <form class="form-horizontal form-label-left">
                                 <div class="row">
                                    <!--Codigos-->
                                    <div class="item form-group">
                                       <label class="control-label col-md-1 col-sm-3 col-xs-12">Nombres</label>
                                       <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                         <input type="text" class="form-control has-feedback-left"  id="name" class="form-control col-md-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombres" required="required" >
                                         <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                       </div>

                                       <label class="control-label col-md-1 col-sm-3 col-xs-12">Apellidos</label>
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                           <input type="text" class="form-control has-feedback-left"  id="lastname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lastname" placeholder="Apellidos" required="required" >
                                           <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <div class="ln_solid" ></div><div class="ln_solid"></div>

                                    <div class="item form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                         <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Sexo</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                               <select class="form-control">
                                                  <option>Seleccionar</option>
                                                  <option>Masculino</option>
                                                  <option>Femenino</option>
                                               </select>
                                            </div>
                                         </div>
                                      </div>


                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                         <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Fecha</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                                     </div>

                                     <div class="ln_solid"></div><div class="ln_solid"></div>

                                      <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Telefono</label>
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                          <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" required="required" >
                                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Celular</label>
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                           <input type="telc" class="form-control has-feedback-left"  id="telefonoc" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefonoc" placeholder="Celular" required="required" >
                                           <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                      </div>

                                      <div class="ln_solid"></div><div class="ln_solid"></div>

                                      <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Direccion</label>
                                        <div class="col-md-11 col-sm-6 col-xs-12 form-group has-feedback">
                                           <input type="tel" class="form-control has-feedback-left"  id="direccion" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="direccion" placeholder="Direccion" required="required" >
                                           <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                      </div>
                                                    
                                      <div class="ln_solid"></div><div class="ln_solid"></div>
                                                    
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
                                <div role="tabpanel" class="tab-pane fade " id="tab_content3" aria-labelledby="examen-tab">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <div class="x_panel">
                                          <div class="x_title">
                                          <div class="clearfix"></div>
                                          </div>
                                          
                                        <form class="form-horizontal form-label-left">
                                           <div class="row">
                                                <section id="wizard">
                                                  <div id="rootwizard">
                                                    <div class="navbar">
                                                      <div class="navbar-inner">
                                                        <div class="container">
                                                    <ul>
                                                        <li><a href="#tab1" data-toggle="tab">Antecedentes Medicos</a></li>
                                                        <li><a href="#tab2" data-toggle="tab">Lensometria</a></li>
                                                        <li><a href="#tab3" data-toggle="tab">Refraccion final </a></li>
                                                        <li><a href="#tab4" data-toggle="tab">Medidas</a></li>
                                                        
                                                    </ul>
                                                     </div>
                                                      </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="tab1">
                                                          <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th colspan="3">Antecedentes medicos</th>
                                                                <th colspan="5">Antc y Dx Ocular</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3"></th>
                                                                <th ></th>
                                                                <th colspan="2">Persoal</th>
                                                                <th colspan="2">Familiar</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>DM</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td style="text-align: center;">Glaucoma</td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                          <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Esfera</th>
                                                                <th>Cilindro</th>
                                                                <th class="numeric">Eje</th>
                                                                <th class="numeric">Adiccion</th>
                                                                <th class="numeric">Prisma</th>
                                                                <th class="numeric">CB</th>
                                                                <th class="numeric">AV LEJ</th>
                                                                <th class="numeric">AV CE</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Ojo Derecho</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <div style="text-align: center;">
                                                          <label ">Diseño y tiempo de uso</label>
                                                          <br>
                                                          <textarea style="width: 800px; height: 102px;" name="comment"></textarea>
                                                        </div>
                                                        </div>
                                                      <div class="tab-pane" id="tab3">
                                                        <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="numeric">AVscL</th>
                                                                <th class="numeric">AVscC</th>
                                                                <th>Esfera</th>
                                                                <th>Cilindro</th>
                                                                <th class="numeric">Eje</th>
                                                                <th class="numeric">Adiccion</th>
                                                                <th class="numeric">Prisma</th>
                                                                <th class="numeric">CB</th>
                                                                <th class="numeric">AV LEJ</th>
                                                                <th class="numeric">AV CE</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Ojo Derecho</td>
                                                                <td><input type="text" class="form-control" name="avscl[]"></td>
                                                                <td><input type="text" class="form-control" name="avscc[]"></td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="avscl[]"></td>
                                                                <td><input type="text" class="form-control" name="avscc[]"></td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td><input type="text" class="form-control" name="cil[]"></td>
                                                                <td><input type="text" class="form-control" name="eje[]"></td>
                                                                <td><input type="text" class="form-control" name="adiccion[]"></td>
                                                                <td><input type="text" class="form-control" name="prima[]"></td>
                                                                <td><input type="text" class="form-control" name="cb[]"></td>
                                                                <td><input type="text" class="form-control" name="av lej[]"></td>
                                                                <td><input type="text" class="form-control" name="av ce[]"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <div style="text-align: center;">
                                                          <label ">Diseño</label>
                                                          <br>
                                                          <textarea  style="width: 800px; height: 102px;"name="comment"></textarea>
                                                        </div>
                                                        </div>
                                                      <div class="tab-pane" id="tab4">
                                                        <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr align="center"">
                                                                <th  colspan="5">Medidas</th>
                                                                <th>Examino</th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td style="width:50px; height:20px;"></td>
                                                                <td style="width:100px; height:20px;">DNP</td>
                                                                <td style="width:100px; height:20px;">DIP</td>
                                                                <td style="width:100px; height:20px;">ALT PUPILAR</td>
                                                                <td style="width:100px; height:20px;">ALT DE OBLEA</td>
                                                                <td></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Derecho</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                <td rowspan="2"><input cols="40" rows="5" style="width:100px; height:100px;" type="text" class="form-control" name="cil[]" /></td>
                                                                <td rowspan="2"><input cols="40" rows="5" style="width:100px; height:100px;" type="text" class="form-control" name="eje[]"></td>
                                                                <td rowspan="2"><input cols="40" rows="5" style="width:100px; height:100px;" type="text"  class="form-control" name="adiccion[]"></td>
                                                                <td rowspan="4"><input cols="40" rows="5" style="width:400px; height:100px;" type="text" class="form-control" name="prima[]"></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Ojo Izquierdo</td>
                                                                <td><input type="text" class="form-control" name="esf[]"></td>
                                                                
                                                                
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <div style="text-align: center;">
                                                          <label ">Observacion</label>
                                                          <br>
                                                          <textarea style="width: 800px; height: 102px;" rows="5" cols="100" name="comment"></textarea>
                                                        </div>
                                                        </div>
                                                      
                                                      <ul class="pager wizard">
                                                        <li class="previous first" style="display:none;"><a href="#">Primera</a></li>
                                                        <li class="previous"><a >Anterior</a></li>
                                                        <li class="next last" style="display:none;"><a href="#">Ultima</a></li>
                                                          <li class="next"><a >Siguiente</a></li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </section>
                                            
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                                 <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="factura-tab">
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
    <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/jquery.bootstrap.wizard.js"></script>
        <script src="bootstrap/prettify.js"></script>
        <script>
        $(document).ready(function() {
            $('#rootwizard').bootstrapWizard();
          window.prettyPrint && prettyPrint()
        });
        </script>
	
  </body>
</html>
