<?php //session_start();

    include("../../Config/conexion.php");
    $iddatos = $_REQUEST["idd"];
   
    $query_s = pg_query($conexion, "select cl.eid_cliente, cl.cnombre, cl.capellido, cl.eedad, cl.csexo,
                                    cl.ctelefonof, cl.cdireccion, ex.eid_expediente from expediente as ex 
                                    INNER JOIN clientes as cl on ex.eid_cliente = cl.eid_cliente
                                    WHERE cl.eid_cliente = '$iddatos'");
    $nue=pg_num_rows($query_s);
    if($nue>0){
    while ($fila = pg_fetch_array($query_s)) {
        echo '<div  >';
		echo	'<h3  id="perfil" align="center" style="color: white"><img width="35" height="35" src="../../production/images/boy1.png">'.$fila[1].' '.$fila[2].'';
		echo	'</h3>';
		echo '</div>';
    }

}
?>