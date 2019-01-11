<?php
include '../../Config/conexion.php';
$cantidad = 0;

function obtenerValorSQL($consulta, $opcion, $id) {
  if($consulta != null) {
    while($fila_new = pg_fetch_array($consulta)) {

      switch ($opcion) {
        case "cliente":
          return "$fila_new[1]"." "."$fila_new[2]";
          break;

        case "id":
          return $fila_new[0];
          break;

        case "modelo":
          return "$fila_new[0]"." (".$fila_new[1].")";
          break;

        default:
        return "";
          break;
      }
    }
  }
}

//error_reporting(0);
session_start();
$t=$_SESSION["nivelUsuario"];
//$iddatos=$_SESSION["idUsuario"];
if($_SESSION['autenticado']!="yeah" || $t!=1){
  header("Location: ../../login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
      html, body {
        height: 100%;
        width: 100%;
        margin: 0;
      }

      input[type="checkbox"] {
        cursor: pointer;
      }
    </style>
    <link rel="stylesheet" href="css/radio.css">

    <script src="../Encomendero/encomendero.js"></script>

    <title>SICEO | Encomiendas</title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>

    <script type="text/javascript">
      registrarEncomendero = function() {
        $.post("agregar.php",{
          "nombre":document.getElementById("nombre").value, "apellido":document.getElementById("apellido").value, "telefono":document.getElementById("telefono").value, "celular":document.getElementById("telefonoc").value},function(respuesta) {
            if(respuesta) {
              $("#myEncomendero").modal('hide');
              ajax_act('');
            }
        });
      };

      modalEncomendero = function() {
        $("#myEncomendero").modal();
      };

      cancelar = function() {
        var id=document.getElementById('idCheckbox').value;
        document.getElementById('examen'+id).checked=0;
        document.getElementById('idCheckbox').value="";
        document.getElementById("id_fila").value="";
      };

      verEstado = function(valor, fila) {
        document.getElementById("id_estado").value = fila;
        $('#myEstado').modal();
        if(valor==true) {
          $("#estado_encomienda").text("RECIBIDA");
          document.getElementById("estado_encomienda").style.color = "green";
          document.getElementById("estado").checked=1;
          document.getElementById("estado").disabled="disabled";
          document.getElementById("guardar_estado").disabled="disabled";
        }
        else {
          $("#estado_encomienda").val("PENDIENTE");
          document.getElementById("estado_encomienda").style.color = "red";
        }
      };

      cambiarEstado = function() {
        if(document.getElementById('estado').checked) {
          alert(document.getElementById("id_estado").value);
          //$id_estado
          $.post("buscar.php",{
            "id":document.getElementById("id_estado").value},function(respuesta) {
              alert(respuesta);
              if(respuesta!="") {
                document.getElementById("id_estado").value="";
                swal('Hecho', 'Encomienda actualizada con exito', 'success');
                $("#myEstado").modal('toggle');
              }
              else {
                swal('Error', 'Hubo un error al actualizar el estado', 'error');
                $("#myEstado").modal('toggle');
              }
          });
        }
        else {
          swal('Error', 'Debe seleccionar que fue recibida la encomienda', 'error');
        }
      };

      alertaSweet = function(titulo,texto,tipo){
        swal(titulo,texto,tipo);
      };

      ajax_act = function(str) {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("myTabContent").innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("post", "encomiendasAjax.php", true);
        xmlhttp.send();
      };

      cerrarEncomendero = function () {
        $("#myEncomendero").modal('toggle');
      };

    </script>

    <script type="text/javascript">
      var filaLentes = new Array();
      var idsLentes = new Array();
      var materialLentes = new Array();
      var tipoLentes = new Array();

      obtenerDatosEncomendero = function(obj) {
        if(obj!="") {
          $.post("buscar.php",{
            "texto":obj},function(respuesta) {
              if(respuesta!="") {
                document.getElementById('nombre_encomendero').style.borderColor="#21df2c";
                document.getElementById('nombre_encomendero').value=obj;
                document.getElementById("idEncomendero").value = respuesta;
              }
              else {
                document.getElementById('nombre_encomendero').style.borderColor="#C70039";
                document.getElementById('nombre_encomendero').value="";
                document.getElementById("idEncomendero").value = "";
              }
          });
        }
      };

      verExamen = function(id, idex) {
        window.open("../../reporteExamen.php?id="+id+"&idexam="+idex);
      };

      caracteristicasAro = function(objForm) {
        var tipo = "";
        var material = "";

        for (x = 0; x < objForm.tipo_lente.length; x++) {
          if (objForm.tipo_lente[x].checked) {
            tipo = objForm.tipo_lente[x].value;
            break;
          }
        }

        for (x = 0; x < objForm.material_lente.length; x++) {
          if (objForm.material_lente[x].checked) {
            material = objForm.material_lente[x].value;
            break;
          }
        }

        var existeOtro =  false;

        if((tipo=="otro" && document.getElementById("otro_tipo_lente").value=="") || (material=="otro" && document.getElementById("otro_material_lente").value=="")) {
          existeOtro = true;
        }

        if(tipo!="" && material!="" && !existeOtro) {
          var fila = document.getElementById('idCheckbox').value;
          document.getElementById('idCheckbox').value = "";

          var id_fila = document.getElementById("id_fila").value;
          document.getElementById("id_fila").value="";

          for (x = 0; x < objForm.tipo_lente.length; x++) {
            objForm.tipo_lente[x].checked=0;
          }

          for (x = 0; x < objForm.material_lente.length; x++) {
            objForm.material_lente[x].checked=0;
          }

          if(tipo=="otro") {
            tipo = document.getElementById("otro_tipo_lente").value;
          }
          if(material=="otro") {
            material = document.getElementById("otro_material_lente").value;
          }

          if(document.getElementById("hayCambioLentes").value=="si") {
            materialLentes[document.getElementById("idCambioLentes").value] = material;
            tipoLentes[document.getElementById("idCambioLentes").value] = tipo;
            swal("Informacion", "Se actualizo las especificaciones del lente", "info");
            document.getElementById("hayCambioLentes").value="";
          }
          else {
            filaLentes.push(fila);
            materialLentes.push(material);
            tipoLentes.push(tipo);
            idsLentes.push(id_fila);

            //Agregar a los inputs escondidos.
            var filas = document.getElementsByName('fila_lentes_final[]');
            var materiales = document.getElementsByName('material_lentes_final[]');
            var tipos = document.getElementsByName('tipo_lentes_final[]');

            filas[fila-1].value = fila;
            materiales[fila-1].value = material;
            tipos[fila-1].value = tipo;

            swal("Hecho", "Se agregaron las especificaciones del lente", "success");
          }

          $('#myLentes').modal('toggle');
          $("#especificaciones"+fila).prop("disabled", false);
        }
        else {
          swal("Error", "Debe seleccionar un tipo y material", "error");
        }
      };

      registrarEncomienda = function() {
        var opc = false;

        if(document.getElementById("idEncomendero").value=="" || document.getElementById("detalle").value=="" || filaLentes.length==0) {
          if(document.getElementById("idEncomendero").value=="" || document.getElementById("detalle").value=="") {
            swal("Error", "Debe completar los campos obligatorios", "error");
          }
          else if(filaLentes.length==0) {
            swal("Error", "Debe seleccionar algun examen", "error");
          }

          opc = false;
        }
        else {
          opc = true;
          document.getElementById("bandera").value = "si";

          var ids = document.getElementsByName('ids_lentes_final[]');
          var modelo = document.getElementsByName('modelo_lentes_aux[]');
          var cliente = document.getElementsByName('cliente_lentes_aux[]');

          var modelo_new = document.getElementsByName('modelo_lentes_final[]');
          var cliente_new = document.getElementsByName('cliente_lentes_final[]');

          for (var i = 0; i < idsLentes.length; i++) {
            ids[i].value = idsLentes[i]; //Para los id, no fila.
          }

          var cont = 0;

          for (var i = 0; i < filaLentes.length; i++) {
            for (var j = 0; j < modelo.length; j++) {
              if((filaLentes[i]-1)==j) {
                modelo_new[i].value = modelo[j].value;
              }
            }
          }

          cont = 0;
          for (var i = 0; i < filaLentes.length; i++) {
            for (var j = 0; j < cliente.length; j++) {
              if((filaLentes[i]-1)==j) {
                cliente_new[i].value = cliente[j].value;
              }
            }
          }
        }

        if(opc) {
          document.getElementById("frmEncomiendas").submit();
        }
      };

      cambiar = function(posicion) {
        //Parametros de lente
        var fila = document.getElementById('filaLenteModal').value-1;

        for (x = 0; x < frmEncomiendas.tipo_lente.length; x++) {
          if (frmEncomiendas.tipo_lente[x].value==tipoLentes[fila]) {
            frmEncomiendas.tipo_lente[x].checked=1;
          }
        }
        for (x = 0; x < frmEncomiendas.material_lente.length; x++) {
          if (frmEncomiendas.material_lente[x].value==materialLentes[fila]) {
            frmEncomiendas.material_lente[x].checked=1;
          }
        }

        $('#myLentes').modal({backdrop: 'static', keyboard: false});
        document.getElementById("hayCambioLentes").value="si";
        document.getElementById("idCambioLentes").value=fila;
      };

      especificaciones = function(r) {
        var fila = r.parentNode.parentNode.rowIndex;

        for (var i = 0; i < filaLentes.length; i++) {
          if(filaLentes[i]==fila) {
            $('#myEspecificaciones').modal();
            $('#material_lente_carac').text("Material del lente: "+materialLentes[i]);
            $('#tipo_lente_carac').text("Tipo de lente: "+tipoLentes[i]);
            $("#filaLenteModal").val(fila);
          }
        }
      };

      verReporteEncomienda = function() {
        alert("Aqui va el reporte");
      };

      mostrarListado = function() {
        document.getElementById("datatable-listado").innerHTML = "";

        var table=document.getElementById("datatable-listado");

        var table_len=table.rows.length;
        var row;

        //Encabezado...
        row = table.insertRow(table_len).outerHTML = "<tr>"+
        "<th>#</th>"+
        "<th>Material del lente</th>"+
        "<th>Tipo de lente</th>"+
        "</tr>";

        table_len=table.rows.length;

        while((table_len-1)<filaLentes.length) {
          row = table.insertRow(table_len).outerHTML = "<tr>"+
          "<td>"+
          ""+table_len+""+
          "</td>"+
          "<td>"+
          ""+materialLentes[table_len-1]+""+
          "</td>"+
          "<td>"+
          ""+tipoLentes[table_len-1]+""+
          "</td>"+
          "</tr>";

          table_len++;
        }

        $('#myListadoLentes').modal();
      };

      checkado = function(r, id) {
        var fila = r.parentNode.parentNode.rowIndex;

        if(document.getElementById("examen"+fila).checked) {
          $('#myLentes').modal({backdrop: 'static', keyboard: false});
          document.getElementById('idCheckbox').value=fila;
          document.getElementById('id_fila').value=id;
        }
        else {
          swal({
            title: "¿Seguro quiere eliminar esta encomienda?",
            text: "No podrás deshacer este paso.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5CBDD9",
            cancelButtonColor: "#D9534F",
            confirmButtonText: "No",
            cancelButtonText: "Si",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
          }).then(function(isConfirm) {
            if(isConfirm.value!=true) {
              //Codigo de confimacion.
              swal("Informacion", "Encomienda eliminada", "info");
              document.getElementById('idCheckbox').value="";
              document.getElementById("id_fila").value="";
              $("#especificaciones"+fila).prop("disabled", true);

              filaLentes.splice(fila-1,1);
              materialLentes.splice(fila-1,1);
              tipoLentes.splice(fila-1,1);
              idsLentes.splice(fila-1,1);

              //Eliminar de los inputs escondidos.
              var filas = document.getElementsByName('fila_lentes_final[]');
              var materiales = document.getElementsByName('material_lentes_final[]');
              var tipos = document.getElementsByName('tipo_lentes_final[]');

              filas[fila-1].value = "";
              materiales[fila-1].value = "";
              tipos[fila-1].value = "";
            }
            else {
              document.getElementById("examen"+fila).checked=1;
            }
          })
        }
      };

      activarOtro = function(opcion, checkado) {
        if(opcion==1) {
          if(checkado=="si") {
            $("#otro_material_lente").prop("disabled", false);
          }
          else {
            $("#otro_material_lente").prop("disabled", true);
            document.getElementById("otro_material_lente").value="";
          }
        }
        else {
          if(checkado=="si") {
            $("#otro_tipo_lente").prop("disabled", false);
          }
          else {
            $("#otro_tipo_lente").prop("disabled", true);
            document.getElementById("otro_tipo_lente").value="";
          }
        }
      };
    </script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <?php
              include "../../ComponentesForm/menu.php";
            ?>

            <div class="right_col" role="main">
              <div class="">
                <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                    <div>
                                        <img align="left" src="../../production/images/encomienda.png" width="128" height="128">
                                            <h1 align="center">
                                               Encomiendas
                                            </h1>
                                    </div>
                                    <div align="center">
                                        <p>
                                            Bienvenido, en esta sección aquí puede registrar o ver las encomiendas realizadas en el sistema.
                                        </p>
                                        <p>
                                          <b>Debe de llenar todos los campos obligatorios (*) para poder registrar una encomienda en el sistema.</b>
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
                                NUEVA ENCOMIENDA
                              </a>
                            </li>
                            <li class="" role="presentation">
                              <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                                LISTA DE ENCOMIENDAS
                              </a>
                            </li>
                        </ul>
                      <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                          <div class="x_content">
                            <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                               <h3 align="center" style=" color: white">Datos de Encomienda</h3>
                               <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <form class="form-horizontal form-label-left" id="frmEncomiendas" name="frmEncomiendas" method="post">
                                <div class="row">
                                  <!--Codigos-->
                                  <input type="hidden" id="bandera" name="bandera" value="">
                                  <input type="hidden" id="idCheckbox" name="idCheckbox" value="">
                                  <input type="hidden" id="id_fila" value="">
                                  <input type="hidden" id="idEncomendero" name="idEncomendero" value="">
                                  <!--fin codigos-->

                                  <div class="item form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-xs-12">Encomendero (*) </label>
                                    <div class="col-sm-7 col-md-7 col-xs-12">
                                      <input type="text" class="form-control text-center" id="nombre_encomendero" style="font-size:medium" list="listaEncomenderos" oninput="obtenerDatosEncomendero(this.value);" placeholder="Nombre del encomendero" autocomplete="off">
                                      <datalist id="listaEncomenderos">
                                        <?php
                                        $consulta = pg_query($conexion, "SELECT * FROM encomendero WHERE bestado = true");
                                        $cont = pg_num_rows($consulta);

                                        while ($fila = pg_fetch_array($consulta)) {
                                          ?>
                                          <option value="<?php echo $fila[1]." ".$fila[2] ?>"><?php echo $fila[1]." ".$fila[2] ?></option>
                                          <?php
                                        }

                                        if($cont==0) {
                                          echo " <option value=''>No hay registros</option>";
                                        }
                                        ?>
                                      </datalist>
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

                                    </div>

                                    <a href="#registrar" onclick="modalEncomendero();" class="col-sm-3 col-md-3 col-xs-12"><h4><b>¿Desea registrar alguno?</b></h4></a>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-xs-12">Detalles (*) </label>
                                    <div class="col-sm-10 col-md-10 col-xs-12">
                                      <textarea class="form-control" id="detalle" name="detalle" placeholder="El vehiculo es de color verde, el numero del motorista es 7777-7777, seran llevado a tal laboratorio, etc."></textarea>
                                    </div>
                                  </div>

                                  <!--Inicio boton-->
                                  <br>
                                  <div class="form-group col-sm-12 col-md-12 col-xs-12">
                                    <div class="text-center">
                                      <h4 class="label label-default pull-center" id="total_pago"><b>Resultado de examenes</b></h4>
                                    </div>
                                    <div class="text-right">
                                      <button type="button" class="btn btn-round btn-primary" onclick="mostrarListado()">Ver encomiendas</button>
                                    </div>
                                  </div>
                                  <br>
                                  <!--Fin boton-->

                                  <!--Aqui va la tabla de la encomienda-->
                                  <div class="item form-group">
                                    <table class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th width="10%">Seleccionar</th>
                                          <th width="40%">Nombre del Cliente</th>
                                          <th width="25%">Modelo de los lentes</th>
                                          <th width="15%" colspan="2">Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id="recargarListaPrincipal">
                                        <?php
                                        $cliente = "";
                                        $modelo = "";
                                        $cont = 1;

                                        $result = pg_query($conexion, "SELECT * FROM detalle_examen WHERE bestado = false ");

                                        //Es para todos los examenes.
                                        while($fila = pg_fetch_array($result)) {
                                            $consulta = pg_query($conexion, "SELECT * FROM clientes WHERE eid_cliente='$fila[1]'");
                                            $cliente = obtenerValorSQL($consulta, "cliente", "");

                                            $consulta = pg_query($conexion, "SELECT * FROM productos WHERE cmodelo='$fila[3]'");
                                            $modelo = obtenerValorSQL($consulta, "modelo", "");

                                            $result_examen = pg_query($conexion, "SELECT * FROM examen WHERE eid_examen=$fila[2]");
                                            $examen;
                                            $id;
                                            while ($fila_examen = pg_fetch_array($result_examen)) {
                                              $id = $fila_examen[0];
                                              $examen = $fila_examen[9];
                                            }
                                          ?>

                                          <tr>
                                            <!--Para las tablas dinamicas.-->
                                            <input type="hidden" name="ids_lentes_final[]">
                                            <input type="hidden" name="fila_lentes_final[]">
                                            <input type="hidden" name="material_lentes_final[]">
                                            <input type="hidden" name="tipo_lentes_final[]">
                                            <input type="hidden" name="modelo_lentes_aux[]" value="<?php echo $fila[3] ?>">
                                            <input type="hidden" name="cliente_lentes_aux[]" value="<?php echo $fila[1] ?>">
                                            <input type="hidden" name="modelo_lentes_final[]">
                                            <input type="hidden" name="cliente_lentes_final[]">

                                            <td class="text-center">
                                              <!-- <div class="checkbox">
                                                <label>
                                                 <input type="checkbox" id="<?php echo "examen".$cont ?>">
                                                 <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                 </label>
                                              </div> -->

                                              <input type="checkbox" class="form-check-input" onclick="checkado(this, <?php echo $fila[0] ?>);" id="<?php echo "examen".$cont ?>">
                                            </td>

                                            <td><?php echo $cliente ?></td>

                                            <td><?php echo $modelo ?></td>
                                            <td class="text-center">
                                              <button type="button" class="btn btn-warning" onclick="verExamen('<?php echo $examen; ?>', '<?php echo $id; ?>')"><i class="fa fa-book"></i></button>
                                              <button id="<?php echo "especificaciones".$cont ?>" type="button" class="btn btn-info" onclick="especificaciones(this);" disabled><i class="fa fa-th-list"></i></button>
                                            </td>
                                          </tr>
                                          <?php
                                          $cont++;
                                        }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>

                                    <div class="item form-group">
                                      <center>
                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                          <div class="form-group">
                                            <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="registrarEncomienda();"> <i  class="fa fa-save"></i> <span >Guardar</span></button>
                                            <button type="reset" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px "> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                          </div>
                                        </div>
                                      </center>
                                    </div>

                                  <!--Aqui termina la tabla-->
                                </div>
                                <!--Inicio modal-->
                                <div class="modal fade" id="myLentes" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Detalle del aro</h4>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="hayCambioLentes" value="">
                                        <input type="hidden" id="idCambioLentes" value="">

                                        <div class="item form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div style="text-align: center">
                                              <div class="form-group" style="text-align: center">
                                                <table class="table table-striped table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th colspan="2" style="text-align: center">Material</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="material_lente" name="material_lente" type="radio" value="CR 39" onclick="activarOtro(1, 'no')">
                                                      </td>
                                                      <td>CR 39</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="material_lente" name="material_lente" type="radio" value="PLOY" onclick="activarOtro(1, 'no')">
                                                      </td>
                                                      <td>PLOY</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="material_lente" name="material_lente" type="radio" value="VIDRIO" onclick="activarOtro(1, 'no')">
                                                      </td>
                                                      <td>VIDRIO</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="material_lente" name="material_lente" type="radio" value="HI INDEX" onclick="activarOtro(1, 'no')">
                                                      </td>
                                                      <td>HI INDEX</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="material_lente" name="material_lente" type="radio" value="HI LITE" onclick="activarOtro(1, 'no')">
                                                      </td>
                                                      <td>HI LITE</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="material_lente" name="material_lente" type="radio" value="otro" onclick="activarOtro(1, 'si')">
                                                      </td>
                                                      <td>
                                                        <input type="text" class="form-control" id="otro_material_lente" class="form-control col-md-9 col-xs-12" placeholder="Otro (especifique)" disabled>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div style="text-align: center">
                                              <div class="form-group" style="text-align: center">
                                                <table class="table table-striped table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th colspan="2" style="text-align: center">Tipo</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="VISION SENCILLA" onclick="activarOtro(2, 'no')">
                                                      </td>
                                                      <td>VISION SENCILLA</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="FLAP TOP" onclick="activarOtro(2, 'no')">
                                                      </td>
                                                      <td>FLAP TOP</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="PROGRESIVO" onclick="activarOtro(2, 'no')">
                                                      </td>
                                                      <td>PROGRESIVO</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="KRIP-TOP" onclick="activarOtro(2, 'no')">
                                                      </td>
                                                      <td>KRIP-TOP</td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">
                                                        <input class="medium" id="tipo_lente" name="tipo_lente" type="radio" value="otro" onclick="activarOtro(2, 'si')">
                                                      </td>
                                                      <td>
                                                        <input type="text" class="form-control" id="otro_tipo_lente" class="form-control col-md-9 col-xs-12" placeholder="Otro (especifique)" disabled>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <center>
                                          <button type="button" class="btn btn-success" onclick="caracteristicasAro(this.form)"><i class="fa fa-save"></i> Guardar</button>
                                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelar()"><i class="fa fa-close"></i> Cancelar</button>
                                        </center>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal fade" id="myEspecificaciones" role="dialog">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Detalle del aro</h4>
                                      </div>
                                      <div class="modal-body">
                                        <input type="hidden" id="filaLenteModal">
                                        <div class="item form-group">
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div style="text-align: center">
                                              <div class="form-group">
                                                <label class="control-label" id="material_lente_carac" style="font-size: medium">Material: ....</label>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label" id="tipo_lente_carac" style="font-size: medium">Tipo: ....</label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <center>
                                          <button type="button" class="btn btn-info" data-dismiss="modal" onclick="cambiar()"><i class="fa fa-refresh"></i> Hacer cambios</button>
                                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cancelar()"><i class="fa fa-close"></i> Cancelar</button>
                                        </center>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal fade" id="myListadoLentes" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Listado de lentes por enviar</h4>
                                      </div>
                                      <div class="modal-body">
                                        <table id="datatable-listado" class="table table-striped table-bordered">
                                          <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Material del lente</th>
                                              <th>Tipo de lente</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                          </tbody>
                                        </table>
                                      </div>
                                      <div class="modal-footer">
                                        <center>
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                                        </center>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal fade" id="myEncomendero" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Registrar Encomendero</h4>
                                      </div>
                                      <div class="modal-body">
                                        <?php include 'encomendero.php'; ?>
                                      </div>
                                      <div class="modal-footer">
                                        <center>
                                          <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="registrarEncomendero();"> <i  class="fa fa-save"></i> <span >Guardar</span></button>

                                          <button type="button" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="cerrarEncomendero();"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                        </center>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!--Fin modal-->
                                <!--Aqui finaliza-->
                              </form>
                            </div>
                          </div>
                        </div>

                        <!--3 pestaña-->
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>ENCOMIENDAS </h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Cod</th>
                                      <th>Fecha de envio</th>
                                      <th>Fecha de recibido</th>
                                      <th>Encomendero</th>
                                      <th>Estado</th>
                                      <th>Reporte</th>
                                    </tr>
                                  </thead>
                                  <tbody id="recargarListaEncomiendas">
                                    <?php
                                    $consulta = pg_query($conexion, "SELECT * FROM encomienda");

                                    while($fila = pg_fetch_array($consulta)) {
                                      $consulta_encomendero = pg_query($conexion, "SELECT * FROM encomendero");
                                      $encomendero = "";

                                      while ($fila_encomendero = pg_fetch_array($consulta_encomendero)) {
                                        $encomendero = $fila_encomendero[1]." ".$fila_encomendero[2];
                                      }
                                      ?>
                                      <tr>
                                        <td><?php echo $fila[0] ?></td>
                                        <td><?php echo $fila[1] ?></td>
                                        <td>
                                          <?php
                                            if($fila[5]) {
                                              echo $fila[5];
                                            }
                                            else {
                                              echo "Sin fecha";
                                            }
                                          ?>
                                        </td>
                                        <td><?php echo $encomendero ?></td>
                                        <td class="text-center">
                                          <button type="button" class="btn btn-success"  onclick="verEstado('<?php echo $fila[2] ?>', <?php echo $fila[0] ?>);"><i class="fa fa-info"></i> <span></span></button>
                                        </td>
                                        <td class="text-center">
                                          <button type="button" class="btn btn-warning" onclick="verReporteEncomienda()"><i class="fa fa-book"></i> <span></span></button>
                                        </td>
                                      </tr>
                                      <?php
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!--Inicio modal-->
                        <div class="modal fade" id="myEstado" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Estado de la encomienda</h4>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" id="id_estado" value="">
                                <div class="item form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <div class="form-group" style="text-align: center">
                                      <label style="font-size:medium; color: red" class="control-label col-md-12 col-sm-12 col-xs-12" id="estado_encomienda">PENDIENTE</label>
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                      <br>
                                      <label style="font-size:medium" class="control-label col-md-6 col-sm-6 col-xs-12">Actualizar estado</label>
                                      <input type="radio" class="flat col-md-6 col-sm-6 col-xs-12" id="estado" value="true" /> <label>RECIBIDA</label>
                                    </div>
                                    <!-- <br>
                                    <br> -->
                                  </div>
                                </div>
                                <!-- <br>
                                <br>
                                <br>
                                <br> -->
                              </div>
                              <div class="modal-footer">
                                <center>
                                  <button type="button" class="btn btn-success" onclick="cambiarEstado()" id="guardar_estado"><i class="fa fa-save"></i> Guardar</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                                </center>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--Fin modal-->
                        <!--fin 3 pestaña-->

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
            include "../../ComponentesForm/footer.php";
          ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    </div>

    <?php
        include "../../ComponentesForm/scripts.php";
    ?>
  </body>
</html>
<?php
if(isset($_REQUEST["bandera"])) {
  //Para el detalle de la encomienda.
  $filaValores = $_REQUEST['fila_lentes_final'];
  $materialValores = $_REQUEST['material_lentes_final'];
  $tipoValores = $_REQUEST['tipo_lentes_final'];
  $modelo_lentes = $_REQUEST['modelo_lentes_aux'];
  $cliente_lentes = $_REQUEST['cliente_lentes_aux'];
  $id_lentes = $_REQUEST["ids_lentes_final"];

  //Quitando valores vacios.
  $filaValores = array_filter($filaValores);
  $materialValores = array_filter($materialValores);
  $tipoValores = array_filter($tipoValores);
  $modelo_lentes = array_filter($modelo_lentes);
  $cliente_lentes = array_filter($cliente_lentes);
  $id_lentes = array_filter($id_lentes);

  //Para la encomienda.
  $id_encomendero = $_REQUEST['idEncomendero'];
  $detalle_encomienda = $_REQUEST['detalle'];
  ini_set('date.timezone','America/El_Salvador');
  $fecha_envio = date("d-m-Y");

  $longitud = count($filaValores);
  $cont = 0;

  pg_query("BEGIN");

  //Insersion de la encomienda.
  $resultado = pg_query($conexion,"SELECT MAX(encomienda.eid_encomienda) FROM encomienda");
  $contado = 0;
  while ($fila = pg_fetch_array($resultado)) {
    $contado = $fila[0];
  }
  $contado++;

  $query_encomienda = pg_query($conexion, "INSERT INTO encomienda (eid_encomienda, ffecha_envio, bestado, eid_encomendero, cdetalle, ffecha_recibido) VALUES ($contado, '$fecha_envio', false, $id_encomendero, '$detalle_encomienda', null) RETURNING eid_encomienda");
  $id_encomienda = pg_fetch_array($query_encomienda);

  $error_detalle= false;

  for ($i=0; $i < $longitud; $i++) {
    if($filaValores[$i] != "") {
      //Insersion del detalle de la encomienda.
      $resultado = pg_query($conexion,"SELECT MAX(detalle_encomienda.eid_detalle_encomienda) FROM detalle_encomienda");
      $contado = 0;
      while ($fila = pg_fetch_array($resultado)) {
        $contado = $fila[0];
      }
      $contado++;

      $query_detalle_encomienda = pg_query($conexion, "INSERT INTO detalle_encomienda (eid_detalle_encomienda, eid_encomienda, cmodelo, cid_cliente, cmaterial, ctipo) VALUES ($contado, $id_encomienda[0], '$modelo_lentes[$i]', '$cliente_lentes[$i]', '$materialValores[$i]', '$tipoValores[$i]')");

      //Muestra error.
      if(!$query_detalle_encomienda) {
        $error_detalle = true;
        $i = $longitud;
        break;
        //echo pg_last_error($conexion);
      }

      $query_detalle = pg_query($conexion, "UPDATE detalle_examen SET bestado = true WHERE eid_detalle_examen = $id_lentes[$i]");
    }
  }

  if($query_encomienda && !$error_detalle && $query_detalle) {
    pg_query("COMMIT");
    echo "<script type='text/javascript'>";
    echo "swal('Hecho', 'Se registro la encomienda exitosamente', 'success');";
    echo "ajax_act('');";
    echo "</script>";
  }
  else {
    pg_query("ROLLBACK");
    echo "<script type='text/javascript'>";
    echo "swal('Error', 'No se pudo completar el registro', 'error');";
    echo "</script>";

    echo pg_last_error($conexion);
  }
}
?>
