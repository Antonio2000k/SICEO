<?php
  function encrypt($string, $key) {
     $result = '';
     for($i=0; $i<strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key))-1, 1);
        $char = chr(ord($char)+ord($keychar));
        $result.=$char;
     }
     return base64_encode($result);
  }

  function decrypt($string, $key) {
     $result = '';
     $string = base64_decode($string);
     for($i=0; $i<strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key))-1, 1);
        $char = chr(ord($char)-ord($keychar));
        $result.=$char;
     }
     return $result;
  }

      include("../../Config/conexion.php");
      $query_s= pg_query($conexion, "SELECT * FROM usuarios order by cid_usuario asc");
      while($fila=pg_fetch_array($query_s)){

        $empleado = "";
        $privilegio = "";

        $query_emp= pg_query($conexion, "SELECT * FROM empleados where cid_empleado='$fila[4]'");

        while($fila_emp=pg_fetch_array($query_emp)) {
          $empleado = $fila_emp[1]." ".$fila_emp[2];
        }

        if($fila[3]==1) {
          $privilegio = "Administrador";
        }
        else {
          $privilegio = "Empleado";
        }
  ?>
  <tr>
  <td><?php echo $fila[1]; ?></td>
  <td><?php echo $empleado; ?></td>
  <td><?php echo $privilegio; ?></td>

  <td class="text-center">
    <?php
    //Encriptacion
    $cadena_encriptada = encrypt($fila[0],"fran2");
    ?>
    <button class="btn btn-info btn-icon left-icon" onclick="location='registrarUsuarios.php?id=<?php echo $cadena_encriptada; ?>'"> <i class="fa fa-edit"></i> <span>Modificar</span></button>
  <?php } ?>
  </td>
</tr>
