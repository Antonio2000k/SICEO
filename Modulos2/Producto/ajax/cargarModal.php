    <?php
                include '../../../Config/conexion.php';
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
                   <?php
                      $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT pbproductos.ccolor, pbproductos.cmodelo FROM pbproductos where pbproductos.cmodelo='".$cambio."'");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                          echo '<label class="text-center"><strong>Color:  </strong><i>'.$fila[0].'</></label>';
                        }
                        }
                      ?>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th></th>
                            <th style="padding-left:40px;"><b><i class="fa fa-male"></i>   Proveedor</b></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT paproveedor.cnombre, paproveedor.capellido, paproveedor.cempresa, paproveedor.ctelefonof,
                        paproveedor.cdireccion, pamarca.cnombre FROM pbproductos as productos 
                        INNER JOIN paproveedor  ON productos.eid_proveedor = paproveedor.eid_proveedor  INNER JOIN pamarca ON productos.eid_marca = pamarca.eid_marca  where productos.cmodelo='".$cambio."'");
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
                            <th style="padding-left:40px;"><b><i class="fa fa-shield"></i>    Marca</b></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT paproveedor.cnombre, paproveedor.capellido, paproveedor.cempresa, paproveedor.ctelefonof,
                        paproveedor.cdireccion, pamarca.cnombre FROM pbproductos as productos INNER JOIN paproveedor ON productos.eid_proveedor = paproveedor.eid_proveedor INNER JOIN pamarca ON productos.eid_marca = pamarca.eid_marca where productos.cmodelo='".$cambio."'");
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
                      <thead>
                        <tr>
                          <th></th>
                            <th style="padding-left:40px;"><b><i class="fa fa-info-circle"></i>    Garantia</b></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $cambio=$_REQUEST["idd"];
                        pg_query("BEGIN");
                        $resultado=pg_query($conexion, "SELECT garantia.etiempo, garantia.cdenominacion, pbproductos.cnombre, pbproductos.cmodelo FROM pagarantia as garantia INNER JOIN pbproductos ON pbproductos.eid_garantia = garantia.eid_garantia where pbproductos.cmodelo='".$cambio."'");
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                    echo '<tr>';
                                    echo '<th><b>Tipo: </b></th>';
                                    echo '<th><i>'.$fila[1].'</i></th>';
                                    echo '</tr>';echo '<tr>';
                                    echo '<th><b>Duraci&oacuten: </b></th>';
                                    echo '<th><i>'.$fila[0].' Meses</i></th>';
                                    echo '</tr>';
                            }
                        }
                      ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
