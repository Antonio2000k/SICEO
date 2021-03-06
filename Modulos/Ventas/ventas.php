<?php

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>SICEO | Ventas </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>

    <link rel="stylesheet" href="../Encomiendas/css/radio.css">

    <script type="text/javascript">
    //Variables globales.
    var filas=document.getElementById("datatable-ventas");
    var id;

    function mostrarOrdenCompra() {
      window.open("../../ordenc.php?id="+document.getElementById("id_reporteOrden").value);
    }

    function reporteExamen(expediente, id_examen) {
      window.open("../../reporteExamen.php?id="+expediente+"&idexam="+id_examen);
    }

    function ajax_act(str) {
      if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
      }
      else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("tab_content2").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("post", "ventasTabla.php", true);
      xmlhttp.send();
    }

    function ajax_clientes() {
      if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
      }
      else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("listaCliente").innerHTML = xmlhttp.responseText;
          }
      }

      xmlhttp.open("post", "listaClientes.php", true);
      xmlhttp.send();
    }

    function ajax_productos(opcion, fila) {
      if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
      }
      else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("listaProducto"+fila).innerHTML = xmlhttp.responseText;
          }
      }

      xmlhttp.open("post", "listaProductos.php?opcion="+opcion, true);
      xmlhttp.send();
    }

    function abonarCuenta(total, id) {
      if(parseFloat(total)>0) {
        $("#myAbonoActualizado").modal({backdrop: 'static', keyboard: false});
        //Paso de parametros.
        $('#total_abono_actualizar').text("Total $"+parseFloat(total).toFixed(2));
        $('#diferencia_abono_actualizar').text("Restante $"+parseFloat(total).toFixed(2));
        $('#total_abono_actualizar').val(parseFloat(total).toFixed(2));
        document.getElementById('id_ordenCompra').value=id;
      }
      else {
        swal('Informacion', 'El cliente ya no tiene pagos pendientes', 'info');
      }
    }

    function obtenerPrecioRestante(obj, id) {
      var total=document.getElementById("total_abono"+id).value;
      var diferencia=document.getElementById("diferencia_abono"+id);

      if(obj!="" && total!="") {
        if(total>=obj) {
          obj=parseFloat(obj).toFixed(2);
          total=parseFloat(total).toFixed(2);
          diferencia.innerText="Restante $"+(total-obj).toFixed(2);
        }
        else {
          obj=parseFloat(obj).toFixed(2);
          total=parseFloat(total).toFixed(2);
          diferencia.innerText="Restante $"+(total-obj).toFixed(2);
        }
      }
      else {
        diferencia.innerText="Restante $"+total;
      }
    }

    function obtenerDatosCliente(obj) {
      if(obj!="") {
        $.post("buscar.php",{
          "texto":obj,"opcion":1},function(respuesta) {
            if(respuesta!="") {
              document.getElementById('nombre_cliente').style.borderColor="#21df2c";
              document.getElementById('nombre_clienteID').value=respuesta;
              document.getElementById('addFila').disabled=false;

              $.post("buscar.php",{
                "texto":respuesta,"opcion":4},function(expediente) {
                  document.getElementById("expediente_ID").value = expediente;
              });

            }
            else {
              document.getElementById('nombre_cliente').style.borderColor="#C70039";
              document.getElementById('nombre_clienteID').value="";
              document.getElementById('addFila').disabled=true;
            }
        });
      }
    }

    function obtenerExamenCliente(obj) {
      var examen = document.getElementsByName("id_examenes[]");
      var fila_examen = document.getElementsByName("fila_examen[]");

      examen[document.getElementById("fila_id_cliente").value].value = obj;
      fila_examen[document.getElementById("fila_id_cliente").value].value = document.getElementById("fila_id_cliente").value;

      document.getElementById("exito_examen").value = "true";
    }

    function agregarExamen() {
      if(document.getElementById("exito_examen").value) {
        //Para cambiar el color del boton.
        var examen = document.getElementsByName("examen_cliente[]");
        examen[document.getElementById("fila_id_cliente").value].style.backgroundColor="#26B99A";
        examen[document.getElementById("fila_id_cliente").value].style.borderColor="#26B99A";
        examen[document.getElementById("fila_id_cliente").value].value = "si";

        $("#myObtenerExamen").modal("hide");

        //Deja vacios los campos que se usaron.
        document.getElementById("exito_examen").value = "";
        document.getElementById("fila_id_cliente").value = "";
      }
      else {
        swal('Informacion', "Seleccione un examen", 'info');
      }
    }

    function verificarExamen(fila) {
      var i = fila.parentNode.parentNode.rowIndex;
      var productos = document.getElementsByName("productos[]");
      var examen = document.getElementsByName("examen_cliente[]");

      //Para el examen.
      var fila_examen = document.getElementsByName("fila_examen[]");
      var examen_cliente = document.getElementsByName("id_examenes[]");

      var mensaje = "";
      var titulo = "";
      var tipo = "";

      if(examen[i-1].value=="si" && examen_cliente[i-1].value!="vacio" && fila_examen[i-1].value!="vacio") {
        mensaje = "No podrás deshacer este paso.";
        titulo = "¿Desea remover el examen seleccionado?";
        tipo = "warning";
      }
      else {
        mensaje = "Si no cuenta con uno, se procedera a registrar.";
        titulo = "¿Cuenta con un examen ya hecho para este tipo de lente?";
        tipo = "info";
      }

      swal({
        title: titulo,
        text: mensaje,
        type: tipo,
        showCancelButton: true,
        confirmButtonColor: "#5CBDD9",
        cancelButtonColor: "#D9534F",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true
      }).then(function(isConfirm) {
        if(isConfirm.value) {
          if(tipo == "info") {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("datatable-examen-cliente").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("post", "Modals/obtenerExamen.php?idCliente="+ document.getElementById("nombre_clienteID").value+"&modelo="+productos[i-1].value, true);
            xmlhttp.send();
            //Para darle la fila...
            $("#fila_id_cliente").val((i-1));

            $("#nombre_cliente_modal").text("Cliente: "+document.getElementById("nombre_cliente").value);
            $('#myObtenerExamen').modal({backdrop: 'static', keyboard: false});
          }
          else {
            fila_examen[i-1].value = "vacio";
            examen_cliente[i-1].value = "vacio";
            examen[i-1].value = "";

            //Para regresar al color original.
            examen[i-1].style.backgroundColor="#D9534F";
            examen[i-1].style.borderColor="#D9534F";
          }
        }
        else {
          window.open("../Cliente/expediente.php?id="+document.getElementById("expediente_ID").value);
          document.getElementById("expediente_ID").value = "";
        }
      })
    }

    function registrarExamen() {
      swal('Hecho', 'Examen registrado', 'success');
      $('#myRegistrarExamen').modal('hide');
    }

    function obtenerSubTotal(value, fila) {
      var i = fila.parentNode.parentNode.rowIndex;
      var precio = document.getElementsByName("precio[]");
      var sub_total_valores = document.getElementsByName("sub_total[]");
      var descuentos = document.getElementsByName("descuento_cliente[]");
      var servicio = document.getElementsByName("servicios[]");
      var precioU = "";
      var boton = document.getElementsByName('existe_descuento[]');
      var sub_totalFinal=document.getElementsByName('sub_totalFinal[]');
      var cantidadFinal=document.getElementsByName('cantidadFinal[]');

      var sub_total=sub_total_valores[i-1];

      if(value=="cambio") {
        sub_total.value=0.00;
      }

      if(value.charAt(0)!=0) {
        $.post("buscar.php",{
          "texto":value,"opcion":3},function(respuesta) {
            //Lo muestra.
            if(i!=0) {
              if(!isNaN(respuesta) && respuesta!="" && respuesta.charAt(0)!=0) {
                if(servicio[i-1].value=="examen") {
                  precioU="10";
                }
                else {
                  precioU=precio[i-1].value;
                }

                var valor=(parseFloat(respuesta)*parseFloat(precioU));

                if(!isNaN(valor)) {
                  sub_total.value=valor.toFixed(2);
                  sub_total.innerText="$"+valor.toFixed(2);
                  descuentos[i-1].disabled=false;
                  sub_totalFinal[i-1].value=valor.toFixed(2);
                  cantidadFinal[i-1].value=respuesta;
                }
              }
              else {
                sub_total.innerText="$0.00";
                sub_total.value=0.00;
                descuentos[i-1].disabled=true;
                sub_totalFinal[i-1].value=valor.toFixed(2);
              }

              sumarValores();
            }
        });
      }
      else if(value.charAt(0)==0) {
        // var sub_total_valores = document.getElementsByName("sub_total[]");
        // var descuentos = document.getElementsByName("descuento_cliente[]");
        // var sub_totalFinal=document.getElementsByName('sub_totalFinal[]');

        sub_total_valores[i-1].value=0.00;
        sub_total_valores[i-1].innerText="$0.00";
        descuentos[i-1].disabled=true;

        if(value!="" && value.charAt(0)==0) {
          sub_totalFinal[i-1].value=valor.toFixed(2);
        }
        else {
          sub_totalFinal[i-1].value=0.00;
        }

        sumarValores();
      }
    }

    function modalCliente() {
      $("#myCliente").modal();
    }

    function obtenerDatosProducto(obj, fila) {
      var i = fila.parentNode.parentNode.rowIndex;
      //alert("fila: "+i);

      //Obtengo los valores.
      var precio = document.getElementsByName("precio[]");
      var cantidad = document.getElementsByName("cantidad[]");
      var examen = document.getElementsByName("examen_cliente[]");

      var producto_aux = document.getElementsByName("productoFinal[]");

      $.post("buscar.php",{
        "texto":obj,"opcion":2},function(respuesta) {
          var producto=document.getElementsByName("productos[]");
          if(respuesta!="" && !isNaN(respuesta)) {
            precio[i-1].innerText="$"+parseFloat(respuesta).toFixed(2);
            precio[i-1].value=parseFloat(respuesta).toFixed(2);
            cantidad[i-1].disabled=false;

            var servicio = document.getElementsByName("servicios[]");
            if(servicio[i-1].value=="Lente") {
              examen[i-1].disabled=false;
            }
            else {
              examen[i-1].disabled=true;
            }

            producto_aux[i-1].value = obj;
          }
          else {
            cantidad[i-1].disabled=true;
            examen[i-1].disabled=true;
          }
      });
    }

    function alertaSweet(titulo,texto,tipo){
      swal(titulo,texto,tipo);
    }

    function eliminarProducto(fila) {
      swal({
        title: "¿Seguro quiere eliminar esta fila?",
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
          var i = fila.parentNode.parentNode.rowIndex;
          //alert("Fila: "+i);

          var total_pago=document.getElementById("total_pago").value;
          total_pago = parseFloat(total_pago).toFixed(2);
          var sub_total=document.getElementsByName("sub_total[]");
          var sub_total_borrado=sub_total[i-1].value;
          sub_total_borrado = parseFloat(sub_total_borrado).toFixed(2);
          //alert("Total: "+total_pago+", sub-total: "+sub_total_borrado);

          //Si los campos son nulos o incorrectos, no hace proceso de decremento, pero si borra.
          if(!isNaN(total_pago) && !isNaN(sub_total_borrado)) {
            var total=total_pago-sub_total_borrado;
            document.getElementById("total_pago").value=total;
            if(document.getElementById("total_pago").value==0) {
              document.getElementById("total_pago").innerText="Total $0.00";
            }
            else {
              document.getElementById("total_pago").innerText="Total $"+document.getElementById("total_pago").value;
            }
          }

          document.getElementById("datatable-ventas").deleteRow(i);
        }
      })
    }

    function limpiarAbono() {
      $('#myAbono').modal('hide');
      document.getElementById('abono').value="";
    }

    function reporteAbono(id) {
      if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
      }
      else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("datatable-abono-cuentas").innerHTML = xmlhttp.responseText;
          }
      }
      document.getElementById("id_reporteOrden").value=id;
      xmlhttp.open("post", "Modals/reporteAbono.php?id_comprac=" + id, true);
      xmlhttp.send();
      $('#myReporteAbonos').modal();
    }

    function descuentoProducto(fila) {
      var i = fila.parentNode.parentNode.rowIndex;
      var boton = document.getElementsByName('existe_descuento[]');
      var sub_totales = document.getElementsByName('sub_total[]');
      var cantidad = document.getElementsByName('cantidad[]');

      var descuento = document.getElementsByName('descuento_cliente[]');

      if(boton[i-1].value!="") {
        swal({
          title: "¿Seguro quiere eliminar el descuento del "+boton[i-1].value+"% aplicado?",
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
          if (isConfirm.value!=true) {
            var ganancia=1-(parseFloat(boton[i-1].value)/100);
            var sub_total=parseFloat(sub_totales[i-1].value);//1 - el descuento aplicado al producto.
            var nuevo_valor = sub_total/ganancia;
            var sub_totalFinal=document.getElementsByName('sub_totalFinal[]');

            sub_totales[i-1].value=nuevo_valor.toFixed(2);
            sub_totales[i-1].innerText="$"+nuevo_valor.toFixed(2);
            descuento[i-1].style.backgroundColor="#5CBDD9";
            descuento[i-1].style.borderColor="#5CBDD9";
            cantidad[i-1].disabled=false;
            boton[i-1].value="";
            sub_totalFinal[i-1].value=nuevo_valor.toFixed(2);
            sumarValores();
            swal('Información', 'Se elimino el descuento', 'info');
          }
        })
      }
      else {
        $("#myDescuento").modal();
        document.getElementById('index_descuento').value=i;
      }
    }

    function cambiarEstado(obj) {
      var valorSeleccionado = obj.options[obj.selectedIndex].value;
      var i = obj.parentNode.parentNode.rowIndex;

      //Se obtienen los campos a usar.
      var producto = document.getElementsByName("productos[]");
      var cantidad = document.getElementsByName("cantidad[]");
      var sub_total = document.getElementsByName("sub_total[]");
      var precio = document.getElementsByName("precio[]");
      var cantidadFinal = document.getElementsByName("cantidadFinal[]");
      var examen = document.getElementsByName("examen_cliente[]");

      if(valorSeleccionado=="Lente" || valorSeleccionado=="Accesorio") {
        cantidad[i-1].value="";
        cantidadFinal[i-1].value="";
        cantidad[i-1].disabled=true;
        producto[i-1].disabled=false;
        precio[i-1].innerText="$0.00";
        precio[i-1].value=0.00;

        examen[i-1].disabled=true;

        //Para remover los item anteriores.
        producto[i-1].value="";
        ajax_productos(valorSeleccionado,i);
      }
      if(valorSeleccionado=="Examen") {
        cantidad[i-1].value="";
        cantidad[i-1].disabled=false;
        producto[i-1].disabled=true;
        producto[i-1].value="";
        precio[i-1].value=10.00;
        precio[i-1].innerText="$10";

        examen[i-1].disabled=true;

        //Para remover los item anteriores.
        producto[i-1].value="";
        ajax_productos("",i);
      }
      else if(valorSeleccionado=="seleccione") {
        producto[i-1].disabled=true;
        producto[i-1].value="";
        sub_total[i-1].innerText="$0.00";
        cantidad[i-1].disabled=true;
        cantidad[i-1].value="";
        precio[i-1].innerText="$0.00";
        precio[i-1].value=0.00;

        examen[i-1].disabled=true;

        //Para remover los item anteriores.
        producto[i-1].value="";
        ajax_productos("",i);
      }

      obtenerSubTotal("cambio", obj);
      sumarValores();
    }

    function agregarFila() {
      var table=document.getElementById("datatable-ventas");
      var table_len=(table.rows.length);

      if(table_len==0) {
        table_len=(table.rows.length);
      }

      var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>"+
      "<input type='hidden' name='existe_descuento[]' value=''>"+
      "<input type='hidden' name='id_examenes[]' value='vacio'>"+
      "<input type='hidden' name='fila_examen[]' value='vacio'>"+
      "<input type='hidden' name='sub_totalFinal[]' value=''>"+
      "<input type='hidden' name='cantidadFinal[]' value=''>"+
      "<input type='hidden' name='productoFinal[]' value='nada'>"+
      "<td>"+
      "<select class='form-control' name='servicios[]' onchange='cambiarEstado(this);'>"+
        "<option value='seleccione'>Seleccione</option>"+
        "<option value='Examen'>Examen</option>"+
        "<option value='Lente'>Lentes</option>"+
        "<option value='Accesorio'>Accesorios</option>"+
      "</select>"+
      "</td>"+
      "<td>"+
      "<input type='text' class='form-control' placeholder='Lentes de sol, etc' disabled='disabled' name='productos[]' autocomplete='off' list='listaProducto"+table_len+"' oninput='obtenerDatosProducto(this.value, this);'>"+
      "<datalist id='listaProducto"+table_len+"'>"+
          "<?php
            include('../../Config/conexion.php');

            $query_s=pg_query($conexion,"SELECT * FROM pbproductos");
            $cont = pg_num_rows($query_s);

            while($fila=pg_fetch_array($query_s)) {
              echo "<option value='$fila[0]'>$fila[1] - $fila[0]</option>";
            }
            if($cont==0) {
              echo "<option value=''>No hay registros</option>";
            }
          ?>"+
      "</datalist>"+
      "</td>"+
      "<td>"+
      "<input type='text' class='form-control' placeholder='Cantidad' name='cantidad[]' onkeypress='return validarNumeros(event);' disabled='disabled'  oninput='obtenerSubTotal(this.value, this);' autocomplete='off'>"+
      "</td>"+
      "<td class='text-center'><label class='control-label' value='0.00' name='precio[]'>$0.00</label></td>"+
      "<td class='text-center'><label class='control-label' value='0.00' name='sub_total[]'>$0.00</label></td>"+
      "<td class='text-center'>"+
      "<button type='button' class='btn btn-warning btn-icon left-icon' onclick='eliminarProducto(this)'><i class='fa fa-trash'></i> </button>"+
      "<button name='descuento_cliente[]' type='button' class='btn btn-info btn-icon left-icon' onclick='descuentoProducto(this)' disabled='disabled'><i class='fa fa-money'></i> </button>"+
      "<button name='examen_cliente[]' type='button' class='btn btn-danger btn-icon left-icon' onclick='verificarExamen(this)' disabled='disabled'><i class='fa fa-book'></i> </button>"+
      "</td>"+
      "</tr>";
    }

    function registrarCliente() {
      var nombre = document.getElementById('name').value;
      var apellido = document.getElementById('lastname').value;
      var telefono = document.getElementById('telefono').value;
      var celular = document.getElementById('telefonoc').value;
      var direcion = document.getElementById('direccion').value;
      var sexo = document.getElementById('gender').value;
      var fecha = document.getElementById('single_cal4').value;

      if(nombre!="" || apellido!="" || telefono!="" || celular!="" || direcion!="" || fecha!="" || fecha!=null) {
        $.post("buscar.php",{
          "texto":nombre,"apellido":apellido,"telefono":telefono,"celular":celular,"direccion":direcion,"sexo":sexo,"fecha":fecha,"opcion":5},function(respuesta) {
            if(respuesta!="") {
              alert(respuesta);
              $("#myCliente").modal("hide");
              swal('Hecho', 'Cliente registrado exitosamente', 'success');
              ajax_clientes();
            }
            else {
              swal('Error', 'Hubo un error al registrar al cliente', 'error');
            }
        });

      }
      else {
        swal('Error', 'Los campos no deben estar vacios', 'error');
      }
    }

    function Notificacion(tipo,msg){
        notif({
          type:tipo,
          msg:msg ,
          position: "center",
          timeout: 3000,
          clickable: true
        });
    }

    function validarNombre(e) {
      var key = e.keyCode || e.which;
      var tecla = String.fromCharCode(key).toLowerCase();
      var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      var especiales = [8, 37, 39, 46];
      var tecla_especial = false;

      for(var i = 0; i < letras.length; i++) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
      if(letras.indexOf(tecla) == -1 && !tecla_especial){
          Notificacion('error',"<b>Error: </b>Solo se permiten letras");
          return false;
      }
    }

    function validarNumerosVenta(e, id) {
      var key = e.keyCode || e.which;
      var tecla = String.fromCharCode(key).toLowerCase();
      var numeros = "0123456789";
      var especiales = [8, 37, 39, 46];
      var tecla_especial = false;

      var abono = document.getElementById("abono"+id).value;
      var cantidad = "";

      if(key!=8) {
        cantidad = (abono+tecla);
      }
      else {
        cantidad = abono.substring(0, (abono.length-1));
      }

      for(var i = 0; i < numeros.length; i++) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }

      var mayor=false;
      if(key!=190) {
        mayor=parseFloat(cantidad)>parseFloat(document.getElementById("total_abono"+id).value);

        if(numeros.indexOf(tecla) == -1 && !tecla_especial || mayor) {
          Notificacion('error',"<b>Error: </b>La cantidad abonada debe ser menor o igual al total");
          return false;
        }
      }
    }

    function validarNumeros(e) {
      var key = e.keyCode || e.which;
      var tecla = String.fromCharCode(key).toLowerCase();
      var numeros = "0123456789";
      var especiales = [8, 37, 39, 46];
      var tecla_especial = false;

      for(var i = 0; i < numeros.length; i++) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
      if(numeros.indexOf(tecla) == -1 && !tecla_especial || tecla==".") {
        Notificacion('error',"<b>Error: </b>Solo se permiten numeros mayores a 0");
        return false;
      }
    }

    function sumarValores() {
      var total=0.00;
      //var filas=document.getElementById("datatable-ventas").rows.length;
      var sub_total_valores = document.getElementsByName("sub_total[]");

      for (var i = 0; i < sub_total_valores.length; i++) {
        if(!isNaN(sub_total_valores[i].value)) {
          total+=parseFloat(sub_total_valores[i].value);
        }
      }

      if(total==0) {
        document.getElementById('total_pago').innerText="Total $0.00";
      }
      else {
        document.getElementById('total_pago').innerText="Total $"+total.toFixed(2);
      }
      document.getElementById('total_pago').value=total.toFixed(2);
      document.getElementById('total_pago').style.fontWeight='bold';
      document.getElementById('total_final').value=total.toFixed(2);
    }

    aplicarDescuento = function() {
      var valor=document.getElementById('porcentaje_descuento').value;
      var cantidad=document.getElementsByName('cantidad[]');

      if(valor!="Seleccione") {
        var index=document.getElementById('index_descuento').value;
        valor=parseFloat(document.getElementById('porcentaje_descuento').value);

        if(index!='') {
          var sub_totales=document.getElementsByName('sub_total[]');
          var sub_totalFinal=document.getElementsByName('sub_totalFinal[]');

          var nuevo_valor=0.00;
          nuevo_valor=parseFloat(sub_totales[index-1].value)-(parseFloat(sub_totales[index-1].value)*(parseFloat(valor)/100));

          if(!isNaN(nuevo_valor)) {
            var existe = document.getElementsByName('existe_descuento[]');

            if(existe[index-1].value=="") {
              sub_totales[index-1].value=nuevo_valor.toFixed(2);
              sub_totales[index-1].innerText="$"+nuevo_valor.toFixed(2);
              document.getElementById('porcentaje_descuento').selectedIndex=0;

              var boton = document.getElementsByName('descuento_cliente[]');
              boton[index-1].style.backgroundColor="#D9534F";
              boton[index-1].style.borderColor="#D9534F";
              cantidad[index-1].disabled=true;
              existe[index-1].value=valor;
              sub_totalFinal[index-1].value=nuevo_valor.toFixed(2);
              swal('Hecho', 'Descuento aplicado', 'success');
              sumarValores();
            }
          }
          else {
            swal('Error', 'Ocurrio un error al aplicar un descuento', 'error');
          }
        }
        else {
          swal('Error', 'Ocurrio un error al aplicar un descuento', 'error');
        }
      }
      else {
        swal('Error', 'Debe ingresar el % de descuento', 'error');
      }
    };

    function verificarCamposCliente() {
      if(document.getElementById('name').value!="" || document.getElementById('lastname').value!="" ||
      document.getElementById('telefono').value!="" || document.getElementById('telefonoc').value!="" ||
      document.getElementById('direccion').value!="") {
        swal({
          title: "¿Seguro que desea cancelar el registro?",
          text: "Se perderan los datos ingresados.",
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
          if (isConfirm.value!=true) {
            $('#myCliente').modal('hide');
          }
        })
      }
      else {
        $('#myCliente').modal('hide');
      }
    }

    function pedirAbono() {
      if(validarRegistro()) {
        $("#myAbono").modal({backdrop: 'static', keyboard: false});
        //Paso de parametros.
        $('#total_abono').text("Total $"+document.getElementById('total_pago').value);
        $('#diferencia_abono').text("Restante $"+document.getElementById('total_pago').value);
        $('#total_abono').val(document.getElementById('total_pago').value);
      }
      else {
        swal('Error', 'Los campos no deben estar vacios', 'error');
      }

      // $(document).ready(function(){
      //   $("#frmVenta").submit(function() {
      //       return false;
      //     });
      // });
    }

    function registrarVenta(id, opcion) {
      var opc=false;

      if(document.getElementById("abono"+id).value=="" || document.getElementById("abono"+id).value=="0") {
        swal('Error', 'Los campos no deben estar vacios', 'error');
        opc=false;
      }
      else {
        opc=true;
        if(opcion=="vender") {
          document.getElementById('bandera').value="vender";
        }
        else if(opcion=="abonar") {
          document.getElementById('bandera').value="abonar";
          document.getElementById('abono_final_actualizar').value=document.getElementById('abono_actualizar').value;
        }
      }

      $(document).ready(function(){
        $("#frmVenta").submit(function() {
            if(opc && document.getElementById('bandera').value!="") {
              return true;
            }
            else {
              return false;
            }
          });
      });
    }

    function validarRegistro() {
      var opc=false;
      var servicos=document.getElementsByName('servicios[]');
      var productos=document.getElementsByName('productos[]');
      var cantidad=document.getElementsByName('cantidad[]');
      var precio=document.getElementsByName('precio[]');
      var sub_total=document.getElementsByName('sub_total[]');
      var examen_cliente=document.getElementsByName('examen_cliente[]');

      var table=document.getElementById("datatable-ventas");
      var table_len=table.rows.length-1;

      var vacios=true;
      var campos_llenos=0;

      for (var i = 0; i < table_len; i++) {
        if(servicos[i].value=="seleccione" || cantidad[i].value=="" ||
          precio[i].value===undefined || precio[i].value=="0.00" || sub_total[i].value===undefined ||
          sub_total[i].value=="0.00") {
          vacios=true;
          break;
        }
        else if((servicos[i].value=="Lente" || servicos[i].value=="Accesorio") && productos[i].value=="") {
          vacios=true;
          break;
        }
        else if((servicos[i].value=="Lente" && examen_cliente[i].value=="") || (servicos[i].value=="Lente" && examen_cliente[i].value===undefined)) {
          //Notificacion('error',"<b>Error: </b>Debe tener un examen antes de vender un lente");
          vacios=true;
          break;
        }
        else {
          vacios=false;
        }
      }

      // alert("Hay campos vacios: "+vacios);
      // alert(document.getElementById('nombre_cliente').value);

      if(document.getElementById('nombre_cliente').value=="" || vacios) {
        return false;
      }
      else {
        return true;
      }
    }
    </script>

  </head>

  <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="clearfix"></div>

                        <?php
                        include "../../ComponentesForm/menu.php";
                        ?>

                    </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div>
                                    <img align="left" src="../../production/images/ventas.png" width="128" height="128">
                                        <h1 align="center">
                                           Ventas
                                        </h1>
                                </div>
                                <div align="center">
                                    <p>
                                        Bienvenido, en esta sección aquí puede registrar o ver las ventas realizadas en el sistema.
                                    </p>
                                    <p>
                                      <b>Debe de llenar todos los campos obligatorios (*) para poder registrar una venta en el sistema.</b>
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
                            NUEVA VENTA
                          </a>
                        </li>
                        <li class="" role="presentation">
                          <a aria-expanded="false" data-toggle="tab" href="#tab_content2" id="profile-tab" role="tab">
                            LISTA DE VENTAS
                          </a>
                        </li>
                    </ul>
                  <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                           <h3 align="center" style=" color: white">Datos de Venta</h3>
                           <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <form class="form-horizontal form-label-left" id="frmVenta" name="frmVenta" method="post">
                            <div class="row">
                              <!--Codigos-->
                              <input type="hidden" id="exito_examen">
                              <input type="hidden" id="bandera" name="bandera" value="">
                              <input type="hidden" id="total_final" name="total_final" value="">
                              <input type="hidden" id="nombre_clienteID" name="nombre_clienteID" value="">
                              <input type="hidden" id="abono_final_actualizar" name="abono_final_actualizar" value="">
                              <input type="hidden" id="id_ordenCompra" name="id_ordenCompra" value="">
                              <input type="hidden" id="id_reporteOrden">
                              <input type="hidden" id="expediente_ID">
                              <!--fin codigos-->

                              <div class="item form-group">
                                <label class="control-label col-sm-1 col-md-2 col-xs-12">Cliente (*) </label>
                                <div class="col-sm-8 col-md-7 col-xs-12">
                                  <input style="font-size:medium" type="text" class="form-control has-feedback-left text-center" id="nombre_cliente" data-validate-length-range="6" data-validate-words="2" name="nombre_cliente" placeholder="Nombre del cliente" autocomplete="off" onkeypress="return validarNombre(event);" autocomplete="off" list="listaCliente" oninput="obtenerDatosCliente(this.value);">
                                  <datalist id="listaCliente">
                                    <?php
                                    include("../../Config/conexion.php");
                                    $query_s = pg_query($conexion,"SELECT * FROM paclientes");
                                    $cont = pg_num_rows($query_s);

                                    while($fila=pg_fetch_array($query_s)) {
                                      echo " <option value='$fila[1] $fila[2]'>";
                                      //echo "<option value='$fila[0]'>$fila[1] $fila[2]</option>";
                                    }

                                    if($cont==0) {
                                      echo " <option value=''>No hay registros</option>";
                                    }
                                    ?>
                                  </datalist>
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <!--../Cliente/registrarCliente.php?nuevo_cliente=si-->
                                <a href="../Cliente/registrarCliente.php" class="col-sm-3 col-md-3 col-xs-12"><h4><b>¿Es cliente nuevo?</b></h4></a>
                              </div>

                              <!--Inicio boton-->
                              <div class="item form-group text-center">
                                <button type="button" id="addFila" class="btn btn-info btn-icon left-icon " onclick="agregarFila()" disabled> <i class="fa fa-plus"></i> <span>Agregar Fila</span></button>
                                <h4 class="label label-default pull-right" id="total_pago"><b>Total $0.00</b></h4>
                              </div>
                              <br>
                              <!--Fin boton-->

                              <!--Aqui va la tabla de la venta-->
                              <div class="item form-group">
                                <table id="datatable-ventas" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th width="15%">Servicio (*)</th>
                                      <th width="25%">Producto</th>
                                      <th width="15%">Cantidad (*)</th>
                                      <th width="15%">Precio Unitario</th>
                                      <th width="15%">Sub-Total</th>
                                      <th width="15%">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody id="recargarVentas">
                                  </tbody>
                                </table>

                                <div class="item form-group">
                                  <center>
                                    <div class="col-md-12 col-sm-6 col-xs-12 ">
                                      <div class="form-group">
                                        <button type="button" class="btn btn-success btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="pedirAbono()"> <i  class="fa fa-save"></i> <span >Realizar venta</span></button>
                                        <button type="button" class="btn btn-danger  btn-icon left-icon" style="padding-left: 70px; padding-right: 70px " onclick="limpiarDatos()"> <i class="fa fa-close"></i> <span>Cancelar</span></button>
                                      </div>
                                    </div>
                                  </center>
                                </div>
                              </div>
                              <!--Aqui termina la tabla-->
                            </div>

                            <?php include 'Modals/ventasModals.php'; ?>
                              <!--Aqui finaliza-->
                          </form>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>VENTAS </h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Cod</th>
                                  <th>Fecha</th>
                                  <th>Cliente</th>
                                  <th>Total de la venta</th>
                                  <th>Saldo pendiente</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $query_s= pg_query($conexion, "SELECT * FROM pbordenc order by eid_compra asc");
                                while ($fila=pg_fetch_array($query_s)) {
                                ?>
                                <tr>
                                  <?php $newDate = date("d/m/Y", strtotime($fila[1])); ?>
                                  <td><?php echo $fila[0]; ?></td>
                                  <td><?php echo $newDate ?></td>
                                  <td>
                                    <?php
                                      $query_cliente=pg_query($conexion, "SELECT * FROM paclientes WHERE eid_cliente='$fila[4]'");

                                      while ($result=pg_fetch_array($query_cliente)) {
                                        echo $result[1]." ".$result[2];
                                      }
                                    ?>
                                  </td>
                                  <td>$<?php echo $fila[2]; ?></td>
                                  <?php
                                    $restante=0.00;
                                    $id_abono;
                                    $abonado=0;
                                    $query=pg_query($conexion,"SELECT * FROM pcnotab WHERE eid_ordenc=$fila[0]");

                                    while($result=pg_fetch_array($query)) {
                                      $abonado+=$result[1];
                                    }

                                    if($query) {
                                      $restante=round($fila[2], 2)-round($abonado, 2);
                                    }
                                  ?>
                                  <td>$<?php echo round($restante, 2); ?></td>
                                  <td class="text-center">
                                    <?php
                                    if(round($restante, 2)==0) {
                                      ?>
                                      <button class="btn btn-danger btn-icon left-icon" onclick="abonarCuenta(<?php echo round($restante, 2) ?>, <?php echo $fila[0] ?>)"> <i class="fa fa-money"></i> <span></span></button>
                                      <?php
                                    }
                                    else {
                                      ?>
                                      <button class="btn btn-success btn-icon left-icon" onclick="abonarCuenta(<?php echo round($restante, 2) ?>, <?php echo $fila[0] ?>)"> <i class="fa fa-money"></i> <span></span></button>
                                      <?php
                                    }
                                    ?>
                                    <button class="btn btn-warning btn-icon left-icon" onclick="reporteAbono(<?php echo $fila[0]; ?>)"
                                      <?php
                                        if(round($restante, 2)!=0) {
                                          echo "disabled";
                                        }
                                      ?>
                                    > <i class="fa fa-book"></i> <span></span></button>
                                  <?php } ?>
                                  </td>
                                </tr>
                              </tbody>
                            </table>

                            <?php include 'Modals/listaVentasModals.php'; ?>

                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Inicio modal ayuda-->
                    <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <div style="float: right; color: red">
                               <button style="color: red" type="button"  data-dismiss="modal" aria-label="Close">
                                 <span style="color: red" aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="x_title" style="background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
                               <h5 align="center" style=" color: white">ASISTENCIA REGISTRO Y ABONO DE VENTAS</h5>
                               <div class="clearfix"></div>
                             </div>
                         </div>
                         <div class="modal-body modal-md">
                           <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel" >
                             <!-- Wrapper for slides -->
                             <div class="carousel-inner">
                               <div class="item active">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda1.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Hacemos clic o escribimos el nombre del cliente en el campo. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda2.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Si no esta registrado, dar clic en nuevo cliente. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda3.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Se habilitara el boton agregar fila, al dar clic nos agregara una fila en la tabla. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda4.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> En servicios apareceran 3 opciones a elegir. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda5.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Si escogemos examen, nos deshabilitara campo productos. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda6.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> En la opcion lentes, solicitara un producto a escoger. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda7.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Se ingresa la cantidad y se multiplica por el precio. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda8.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> En la opcion accesorios, solicitara un producto a escoger. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda9.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Se ingresa la cantidad y se multiplica por el precio. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda10.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Con el siguiente boton, podemos borrar la fila. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda11.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Con el siguiente boton, podemos aplicar un porcentaje de descuento. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda12.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Si ya se encuentra con descuento,cambia de color y aparecera la opcion de eliminarlo. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda13.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Para los lentes, hay un boton el cual permite escoger el examen que se usara para ese lente. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda14.png" alt="...">
                                 <div class="carousel-caption">
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda15.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Cuando ya esta lista la venta se procedera a solicitar el abono que se hara. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda16.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> En el listado de ventas, podemos abonar las cuentas pendientes en color verde. </p>
                                 </div>
                               </div>

                               <div class="item ">
                                 <img class="img-responsive" src="../Ayuda/Ventas/ayuda17.png" alt="...">
                                 <div class="carousel-caption">
                                   <p style="color:black;font-size:medium"> Este boton sirve para ver el reporte de la venta. </p>
                                 </div>
                               </div>

                             </div>

                             <!-- Controls -->
                             <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                               <span class="glyphicon glyphicon-chevron-left"></span>
                             </a>
                             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                             </a>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <!--Fin modal ayuda-->
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
              include "../../ComponentesForm/footer.php";
             ?>
        </footer>
      </div>
                <!--Aqui va fin el contenido-->
     </div>
  </div>

        <?php
          include "../../ComponentesForm/scripts.php";
        ?>
    </body>
</html>
<?php
//$_GET
if ($_POST) {
  //Variables.
  //Para la orden de compra.
  $idEmpleado = $_SESSION["cid_empleado"];
  $cliente = $_POST['nombre_clienteID'];
  $total_final = $_POST['total_final'];
  ini_set('date.timezone','America/El_Salvador');
  $total_venta=0;
  $contAux=0;
  $fecha = date("d-m-Y");

  //Para el detalle de la nota de abono.
  $servicioValores = $_POST['servicios'];
  $productoValores = $_POST['productos'];
  $cantidadValores = $_POST['cantidadFinal'];
  $sub_totalValores = $_POST['sub_totalFinal'];
  $id_detalle_examen = $_POST['id_examenes'];
  $fila_detalle_examen = $_POST['fila_examen'];
  $productoFinal = $_POST["productoFinal"];

  //Impresion de arrays.
  // echo "Servicios:";
  // echo "<br>";
  // print_r($servicioValores);
  // echo "<br>";
  // echo "Producto final:";
  // echo "<br>";
  // print_r($productoFinal);
  // echo "<br>";
  // echo "Cantidad:";
  // echo "<br>";
  // print_r($cantidadValores);
  // echo "<br>";
  // echo "Sub-total:";
  // echo "<br>";
  // print_r($sub_totalValores);
  // echo "<br>";
  // echo "ID examen:";
  // echo "<br>";
  // print_r($id_detalle_examen);
  // echo "<br>";
  // echo "Fila examen:";
  // echo "<br>";
  // print_r($fila_detalle_examen);

  //Para la nota de abono.
  $abono = $_POST['abono'];
  $opcion = $_POST['bandera'];

  if($opcion=="vender") {
    pg_query("BEGIN");

    //cantidad a recorrer.
    $longitud = count($sub_totalValores);

    //Insersion de la orden de compra.
    $resultado=pg_query($conexion,"SELECT MAX(pbordenc.eid_compra) FROM pbordenc");
    $contado=0;
    while ($fila = pg_fetch_array($resultado)) {
      $contado=$fila[0];
    }
    $contado++;

    $query_compra=pg_query($conexion, "INSERT INTO pbordenc (eid_compra, ffecha, rtotal, cid_empleado, ccliente) VALUES ($contado, '$fecha', $total_final, '$idEmpleado', '$cliente') RETURNING eid_compra");
    $id_compra=pg_fetch_array($query_compra);

    //En la insercion de la orden de compra.
    // if(!$query_compra) {
    //   echo "Error orden compra";
    // }

    //Insersion de la nota de abono.
    $resultado=pg_query($conexion,"SELECT MAX(pcnotab.eid_nota) FROM pcnotab");
    $contado=0;
    while ($fila = pg_fetch_array($resultado)) {
      $contado=$fila[0];
    }
    $contado++;

    $query_nota_abono=pg_query($conexion, "INSERT INTO pcnotab (eid_nota, rsaldo, ffecha_pago, cid_empleado, eid_ordenc) VALUES ($contado, $abono, '$fecha', '$idEmpleado', $id_compra[0]) RETURNING eid_nota");
    $id_nota_abono=pg_fetch_array($query_nota_abono);

    //En la insercion de la nota de abono.
    //echo pg_last_error($conexion);
    // if(!$query_nota_abono) {
    //   echo "Error nota abono";
    // }

    //Esto es del detalle nota de abono.
    $productoAux="";
    //Si es cero, no hubo ningun error si es mayor es que una fallo.
    $inserto_detalle=0;
    $inserto_examen=0;

    for ($i=0; $i < $longitud; $i++) {
      //Para el id.
      $resultado=pg_query($conexion,"SELECT MAX(pddetalle_notab.eid_detallenotab) FROM pddetalle_notab");
      $contado=0;
      while ($fila = pg_fetch_array($resultado)) {
        $contado=$fila[0];
      }
      $contado++;

      if($servicioValores[$i]=="Examen") {
        $productoAux = "";
      }
      else {
        $productoAux = $productoFinal[$i];
      }

      if($fila_detalle_examen[$i]=="vacio") {
        //Esto significa que se escogio un examen o un accesorio y no fue necesario un id de examen.
        $id_examen = -1;
      }
      else {
        $id_examen = $id_detalle_examen[$i];
      }

      $query_detalle_nota=pg_query($conexion, "INSERT INTO pddetalle_notab (eid_detallenotab, eid_nota, cmodelo, ecantidad, cservicio, eid_detalle_examen) VALUES ($contado, $id_nota_abono[0], '$productoAux', $cantidadValores[$i], '$servicioValores[$i]', $id_examen)");

      //Muestra error.
      if(!$query_detalle_nota) {
        $inserto_detalle++;
        //echo "Error detalle";
      }

      if($servicioValores[$i]=="Lente") {
        //Para registrar el detalle del examen.
        //Contador...
        $resultado=pg_query($conexion,"SELECT MAX(pddetalle_examen.eid_detalle_examen) FROM pddetalle_examen");
        $contado=0;
        while ($fila = pg_fetch_array($resultado)) {
          $contado=$fila[0];
        }
        $contado++;

        $query_detalle_examen = pg_query($conexion, "INSERT INTO pddetalle_examen (eid_detalle_examen, cid_cliente, eid_examen, cmodelo, bestado) VALUES ($contado, '$cliente', $id_examen,'$productoAux', false)");

        if(!$query_detalle_examen) {
          $inserto_examen++;
        }
      }
    }

    if($query_compra && $query_nota_abono && $inserto_detalle==0 && $inserto_examen==0) {
      pg_query("COMMIT");
      echo "<script type='text/javascript'>";
      echo "swal('Hecho','Se realizo la venta con exito','success');";
      echo "ajax_act('');";
      echo "window.open('../../notab.php?id=$id_nota_abono[0]');";
      echo "</script>";
    }
    else {
      pg_query("ROLLBACK");
      echo "<script type='text/javascript'>";
      echo "swal('Error','Hubo un error al realizar la venta','error');";
      echo "</script>";
    }
  }
  else if($opcion=="abonar") {
    $abono = $_POST['abono_final_actualizar'];
    $id_ordenc=$_POST['id_ordenCompra'];

    pg_query("BEGIN");

    //Insersion de la nota de abono.
    $resultado=pg_query($conexion,"SELECT MAX(pcnotab.eid_nota) FROM pcnotab");
    $contado=0;
    while ($fila = pg_fetch_array($resultado)) {
      $contado=$fila[0];
    }
    $contado++;

    $id_compra;

    $query=pg_query($conexion,"SELECT * FROM pbordenc WHERE eid_compra=$id_ordenc");
    $total = 0;

    while($fila=pg_fetch_array($query)) {
      $id_compra=$fila[0];
      $total = $fila[2];
    }

    //Para verificar si aun hay que pagar.
    $query_abono=pg_query($conexion,"SELECT * FROM pcnotab WHERE eid_ordenc=$id_ordenc");
    $saldo = 0;

    while($fila=pg_fetch_array($query_abono)) {
      $saldo=$saldo+floatval($fila[1]);
    }

    $query_nota_abono = null;

    if($saldo<$total) {
      $query_nota_abono=pg_query($conexion, "INSERT INTO pcnotab (eid_nota, rsaldo, ffecha_pago, cid_empleado, eid_ordenc) VALUES ($contado, $abono, '$fecha', '$idEmpleado', $id_compra) RETURNING eid_nota");
      $id_nota_abono=pg_fetch_array($query_nota_abono);
    }

    //echo pg_last_error($conexion);
    if($query_nota_abono) {
      pg_query("COMMIT");
      echo "<script type='text/javascript'>";
      echo "swal('Hecho','Se realizo el abono con exito','success');";
      echo "ajax_act('');";
      echo "window.open('../../notab.php?id=$id_nota_abono[0]');";
      echo "</script>";
    }
    else {
      pg_query("ROLLBACK");
      echo "<script type='text/javascript'>";
      echo "swal('Error','Hubo un error al realizar el pago','error');";
      echo "</script>";
    }
  }
}
?>
