    <?php
                include '../../Config/conexion.php';
   ?>
    <style>
        th{
            font-weight: normal;
        }
        p{
            padding: 0px;
            margin: 0px;
        }
    </style>
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th></th>
                            <th style="padding-left:100px;"><b><i class="fa fa-male"></i>   Proveedor</b></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT proveedor.cnombre, proveedor.capellido, proveedor.cempresa, proveedor.ctelefonof,
                        proveedor.cdireccion, marca.cnombre FROM productos INNER JOIN proveedor ON productos.eid_proveedor = proveedor.eid_proveedor INNER JOIN marca ON productos.eid_marca = marca.eid_marca where productos.cmodelo='".$cambio."'");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                    echo '<tr>';
                                    echo '<th><b>Representante: </b></th>';
                                    echo '<th><i>'.$fila[0].' '.$fila[1].'</i></th>';
                                    echo '</tr>';

                                    echo '<tr>';
                                    echo '<th><b>Empresa: </b></th>';
                                    echo '<th><i>'.$fila[2].'</i><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefono: </b><i>'.$fila[3].'</i></th>';
                                    echo '</tr>';

                                    echo '<tr>';
                                    echo '<th><b>Direccion: </b></th>';
                                    echo '<th><i>'.$fila[4].'</i></th>';
                                    echo '</tr>';
                            }
                        }
                      ?>

                      </tbody>
                      <thead>
                        <tr>
                          <th></th>
                            <th style="padding-left:100px;"><b><i class="fa fa-close"></i>    Marca</b></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT proveedor.cnombre, proveedor.capellido, proveedor.cempresa, proveedor.ctelefonof,
                        proveedor.cdireccion, marca.cnombre FROM productos INNER JOIN proveedor ON productos.eid_proveedor = proveedor.eid_proveedor INNER JOIN marca ON productos.eid_marca = marca.eid_marca where productos.cmodelo='".$cambio."'");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                    echo '<tr>';
                                    echo '<th><b>Nombre: </b></th>';
                                    echo '<th><i>'.$fila[5].'</i></th>';
                                    echo '</tr>';
                            }
                        }
                      ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
