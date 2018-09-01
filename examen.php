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

   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
                       <img width="120" height="120" align="left" src="production/images/examen.png">
                           <h1 align="center">
                                           Examen
                            </h1>
                        </img>
                    </div>
                 <div align="center">
                  <p>
                      Bienvenido en esta sección aquí puede registrar los examenes en el sistema.
                  </p>
                  </div>
                </div>
            </div>
            <div align="right"> <a href="../SICEOElmer/pdf/reporteExamen.php" class="btn btn-success btn-info"  ><span class="fa fa-print"  >     Imprimir</span></a> </div>
            <br>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
        
                  <form  class="form-horizontal form-label-left">
                    
                   <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                         <div class="x_title">
                                          
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

                                    <div class="ln_solid"></div>
                                    <div class="tab-content">
                                       <div class="tab-pane" id="tab1">
                                          
                                          <div class="ln_solid"></div>
                                             <div class="x_panel">
                                                  <div class="x_content">
                                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th style=" text-align:center;" colspan="3">Antecedentes Medicos</th>
                                                      
                                                      
                                                    </tr>
                                                  </thead>


                                                  <tbody>
                                                    <tr>
                                                      <td width="2%">DM</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="50%"></td>
                                                      
                                                    </tr>
                                                     <tr>
                                                      <td width="2%">HA</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="50%"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">CyT</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="50%"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">TIROIDES</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="50%"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">OTROS</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="50%"></td>
                                                      
                                                    </tr>
                                                    
                                                    
                                                  </tbody>
                                                </table>
                                              </div>
                                                   
                                                 
                                            </div>
                                              
                                                
                                                <div class="x_panel">
                                                  <div class="x_content">
                                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th style=" text-align:center;" colspan="5">Antec y Dx Ocular</th>
                                                      
                                                      
                                                    </tr>
                                                  </thead>


                                                  <tbody>
                                                    <tr>
                                                      <td width="2%"></td>
                                                      <td colspan="2" width="2%">PERSO</td>
                                                      <td colspan="2" width="50%">FAMLILI</td>
                                                      
                                                    </tr>
                                                    
                                                     <tr>
                                                      <td width="2%">GLAUCOM</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="40%"></td>
                                                      <td width="3%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="40%"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">CATARATA</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                       <td width="40%"></td>
                                                      <td width="3%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="40%"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">DR</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                       <td width="40%"></td>
                                                      <td width="3%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td width="40%"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">OTRO</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td colspan="3" width="50%"></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="2%">OP DE</td>
                                                      <td width="2%"><div class="checkbox" style="text-align: center"><label><input type="checkbox" class="flat" checked="checked">  </div></td>
                                                      <td colspan="3" width="50%"></td>
                                                      
                                                    </tr>
                                                    
                                                    
                                                  </tbody>
                                                </table>
                                              </div>   
                                              </div>
                                          </div>
                                          <div class="tab-pane" id="tab2">
                                                          <table class="table table-bordered table-striped table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th style="text-align:center;">Esfera</th>
                                                                <th style="text-align:center;">Cilindro</th>
                                                                <th style="text-align:center;" class="numeric">Eje</th>
                                                                <th style="text-align:center;" class="numeric">Adiccion</th>
                                                                <th style="text-align:center;" class="numeric">Prisma</th>
                                                                <th style="text-align:center;" class="numeric">CB</th>
                                                                <th style="text-align:center;" class="numeric">AV LEJ</th>
                                                                <th style="text-align:center;" class="numeric">AV CE</th>
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
                                                                <th style="text-align:center;" class="numeric">AVscL</th>
                                                                <th  style="text-align:center;" class="numeric">AVscC</th>
                                                                <th style="text-align:center;">Esfera</th>
                                                                <th style="text-align:center;">Cilindro</th>
                                                                <th style="text-align:center;" class="numeric">Eje</th>
                                                                <th style="text-align:center;" class="numeric">Adiccion</th>
                                                                <th style="text-align:center;" class="numeric">Prisma</th>
                                                                <th style="text-align:center;" class="numeric">CB</th>
                                                                <th style="text-align:center;" class="numeric">AV LEJ</th>
                                                                <th style="text-align:center;" class="numeric">AV CE</th>
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
                                                                <th style="text-align:center;" colspan="5">Medidas</th>
                                                                <th style="text-align:center;">Examino</th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td style="width:50px; height:20px; text-align:center;" ></td>
                                                                <td style="width:100px; height:20px; text-align:center;">DNP</td>
                                                                <td style="width:100px; height:20px; text-align:center;">DIP</td>
                                                                <td style="width:100px; height:20px; text-align:center;">ALT PUPILAR</td>
                                                                <td style="width:100px; height:20px; text-align:center;">ALT DE OBLEA</td>
                                                                <td style="width:100px; height:20px; text-align:center;"></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50px; height:20px; text-align:center;">Ojo Derecho</td>
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
                                    <center>
                                       <div class="col-md-12 col-sm-6 col-xs-12 ">
                                            <button class="btn btn-success btn-icon left-icon;" > <i  class="fa fa-save"></i> <span >Guardar</span></button>
                                             <button class="btn btn-danger  btn-icon left-icon" > <i class="fa fa-close"></i> <span>Cancelar</span></button>

                                       </div>

                                   </center>

                                   
                              </div> 
                          </form>
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
