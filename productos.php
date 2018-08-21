<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | Productos </title>

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
                    <!--Aqui va inicio el contenido-->
                    <div class="right_col" role="main">
                        <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div>
                                    <img align="left" width="120" height="120" src="production/images/compra.png">
                                        <h1 align="center">
                                            PRODUCTOS
                                        </h1>
                                    </img>
                                </div>
                                <div align="center">
                                    <p>
                                        Bienvenido en esta sección aquí puede registrar productos en el sistema debe de llenar todos los campos obligatorios (*) para registrarlos exitosamente. En la pestaña de listado de productos se podran observar todos los productos registrados con sus existencias.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <div class="" data-example-id="togglable-tabs" role="tabpanel">
                                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                                <li class="active" role="presentation">
                                                    <a aria-expanded="true" data-toggle="tab" href="#tab_content1" id="home-tab" role="tab">
                                                        NUEVO PRODUCTO
                                                    </a>
                                                </li>
                                                <li class="" role="presentation">
                                                    <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                                                        LISTADO DE PRODUCTOS
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <!--Aqui inicia el primer registro-->
                                                            <div class="x_panel">
                                                                <div class="x_title" style="background: #2A3F54">
                                                                    <h2 style="text-indent: 400px; color: white">
                                                                        Datos de producto
                                                                    </h2>
                                                                    
                                                                    <div class="clearfix">
                                                                    </div>
                                                                </div>
                                                                <div class="x_content">
                                                                    <form class="form-horizontal form-label-left">
                                                                        <div class="row">
                                                                            <!--Codigos-->
                                                                            <div class="item form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                        Modelo*
                                                                                    </label>
                                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                        <input type="text" class="form-control has-feedback-left"  id="codigo" class="form-control col-md-7 col-xs-12" name="codigo" placeholder="Codigo">
                                                                                        <span class="fa fa-cog form-control-feedback left" aria-hidden="true"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                        Proveedor*
                                                                                    </label>
                                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                        <select class="form-control">
                                                                                            <option>Seleccione</option>
                                                                                            <option>Proveedor tipo A</option>
                                                                                            <option>Proveedor tipo B</option>
                                                                                            <option>Proveedor tipo C</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="item form-group">
                                                                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Nombre*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Nombre">
                                                                                    <span class="fa fa-toggle-right form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Marca*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <select class="form-control">
                                                                                        <option>Seleccione</option>
                                                                                        <option>Marca tipo A</option>
                                                                                        <option>Marca tipo B</option>
                                                                                        <option>Marca tipo C</option>
                                                                                    </select>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                                
                                                                            <div class="item form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Precio de Compra*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="number" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Precio de compra">
                                                                                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Precio de Venta*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="number" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Precio de venta">
                                                                                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                            <div class="item form-group">
                                                                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Color*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <input type="text" class="form-control has-feedback-left"  id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Color">
                                                                                    <span class="fa fa-tint form-control-feedback left" aria-hidden="true"></span>
                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                                    Garantia*
                                                                                </label>
                                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                    <select class="form-control">
                                                                                        <option>Seleccione</option>
                                                                                        <option>Garantia tipo A</option>
                                                                                        <option>Garantia tipo B</option>
                                                                                        <option>Garantia tipo C</option>
                                                                                    </select>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                            <div class="ln_solid">
                                                                            </div>

                                                                            <!--Fin Codigos-->
                                                                            
                                                                            
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
                                                            <!--Aqui finaliza el primer registro-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div aria-labelledby="profile-tab" class="tab-pane fade" id="tab_content2" role="tabpanel">
                                                    <!--Aqui va la tabla-->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_content">
                                                                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                                                  <thead>
                                                                    <tr>
                                                                      <th>#</th>
                                                                      <th>Modelo</th>
                                                                      <th>Color</th>
                                                                      <th>Precio Compra</th>
                                                                      <th>Precio Venta</th>
                                                                      <th>Existencia</th>
                                                                      <th>Ver Mas</th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    <tr>
                                                                      <th scope="row">1</th>
                                                                      <td>C17211</td>
                                                                      <td>Negro</td>
                                                                      <td>$102.20</td>
                                                                      <td>$152.20</td>
                                                                      <td>10</td>
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

