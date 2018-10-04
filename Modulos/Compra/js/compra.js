function soloNumeros(e,opcion) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            if(opcion=="entero")
                letras = "1234567890";
            else
               letras = "1234567890."; 
            especiales = [8, 37, 39];
            tecla_especial = false;
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla) == -1 && !tecla_especial){
                Notificacion('error',"<b>Error: </b>Solo se permiten numeros");
                return false;
            }       
        }
function valiFecha(){
    //alert('entre');
var fecha = document.getElementById('fecha').value;
    alert("Fecha    "+fecha.substr(6, 9));
var yActual = parseInt(date.getFullYear());
var yDigitado=parseInt(fecha.substr(6, 9));
var date = new Date();

var mesActual = parseInt(date.getMonth() + 1);
var mesDigitado = parseInt(fecha.substr(3, 2));
var d = date.getDate();
var date2 = new Date();  
      
        alert("Actual   "+yActual);
        alert("Ingreado  "+yDigitado);
          if (mesActual<mesDigitado) {
              Notificacion('error', "<b>Error: </b>Mes mayor al actual");
              document.getElementById('fecha').value="";
          }
          if (mesActual>mesDigitado) {
              Notificacion('error', "<b>Error: </b>Mes menor al actual");
              document.getElementById('fecha').value="";
          }
          if (yActual<yDigitado) {
              Notificacion('error', "<b>Error: </b>Año mayor al actual");
              document.getElementById('fecha').value="";
          }
          if (yActual>yDigitado) {
              Notificacion('error', "<b>Error: </b>Año menor al actual");
              document.getElementById('fecha').value="";
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
function actualiza(opcion) {
    var cambio = document.getElementById('proveedor').value;
    var cambioNombre = document.getElementById('modelo').value;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (opcion === 'cambioNombre'){
                document.getElementById("nombresito").innerHTML = xmlhttp.responseText;
                $("#btnInfoProducto").attr('disabled', false);
            } 
            else if (opcion === 'cambioModelo') {
                $("#btnInfoProducto").attr('disabled', true);
                document.getElementById("modelo").innerHTML = xmlhttp.responseText;
                document.getElementById("nombre").value = "";
            }
        }
    }
    if (opcion === "cambioModelo") xmlhttp.open("post", "ajax/actualizaSelect.php?opcion=" + opcion + "&cambio=" + cambio, true);
    else xmlhttp.open("post", "ajax/actualizaSelect.php?opcion=" + opcion + "&cambio=" + cambioNombre, true);
    xmlhttp.send();
}
function showUser(id,cantidad,opcion) {
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mostrar").innerHTML = xmlhttp.responseText;
        }
    }
    if (opcion == "agregar") {
            xmlhttp.open("post", "ajax/agregarDetalle.php?opcion=" + opcion + "&modelo=" + id+ "&cantidad=" + cantidad, true);
            xmlhttp.send();
    }
    if(opcion==="modificar"){
        xmlhttp.open("post", "ajax/agregarDetalle.php?opcion=" + opcion + "&modelo=" + id+ "&cantidad=" + cantidad, true);
        xmlhttp.send();
    }
    if (opcion == "quitar") {
        xmlhttp.open("post", "ajax/agregarDetalle.php?opcion=" + opcion + "&quitar=" + id, true);
        xmlhttp.send();
    }
    if(opcion=="guardarTodo"){
        var vacio=document.getElementById("estaVacio").value;
        if(vacio==""){
            alertaDetener("Informacion","Debe ingresar un producto a la lista","warning");          
        }else{
            xmlhttp.open("post", "ajax/agregarDetalle.php?opcion=" + opcion+"&fecha="+formatStringToDate(document.getElementById("fecha").value), true);
            xmlhttp.send();
        }
    }
    if(opcion==="guardarTodoCredito"){
        var vacio=document.getElementById("estaVacio").value;
        if(vacio==""){
            alertaDetener("Informacion","Debe ingresar un producto a la lista","warning");          
        }else{
            var cuota=document.getElementById("cuotas").value;
            var periodo=document.getElementById("periodo").value;
            var abono=document.getElementById("abonoInicial").value;
            if(abono==="")
                abono="0";
            xmlhttp.open("post", "ajax/agregarDetalle.php?opcion=guardarTodoCredito" +"&fecha="+formatStringToDate(document.getElementById("fecha").value)+"&cuota="+cuota+"&periodo="+periodo+"&abono="+abono, true);
            xmlhttp.send();
        }
    }
}
function formatStringToDate(text) {
    var str=text.replace("/","-"); 
    return str.replace("/","-");    
}
function verificar(opcion) {
            if (document.getElementById('cantidad').value == "" || document.getElementById('modelo').value == "0") {
                swal('Error!', 'Complete los campos!', 'error');
            }
            else if(parseInt(document.getElementById("cantidad").value)==0){
                    swal('Informacion','Cantidad tiene que ser mayor a cero','warning');
                    }else{
                var id=document.getElementById('modelo').value;
                var cantidad=document.getElementById('cantidad').value;
                if(opcion==="modificar"){
                    //alert("ENviando Modificar")
                    showUser(id,cantidad,"modificar");
                    var quepaso=document.getElementById("quepaso").value;
                    if(quepaso=='1'){
                        $("#divModificar").hide();
                        $("#divAgregar").show();                        
                        document.getElementById("proveedor").disabled=false;
                        document.getElementById("modelo").disabled=false;
                        document.getElementById("BtnInfoProducto").disabled=true;
                    }
                }else
                    showUser(id,cantidad,"agregar");
            }            
             detener();
            
    }
function detener(){
    $("#formCompra").submit(function () {
                return false;
            });
}
function lanzaModal(){
   detener();
        var producto=document.getElementById('modelo').value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargala").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("post", "ajax/cargaModalProducto.php?idd=" + producto, true);
            xmlhttp.send();
        }
function Eliminar(id) {
            swal({
                title: 'Confirmaci&oacuten'
                , text: 'Esta seguro de eliminar al producto de la lista'
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , cancelButtonText: 'Cancelar'
                , confirmButtonText: 'Si, eliminarlo'
            }).then((result) => {
                if (result.value) {
                    showUser(id,'','quitar');
                }
            })
        }
function alertaSweet(titulo, texto, tipo) {
            swal({
                title: titulo
                , text: texto
                , type: tipo
                , showCancelButton: false
                , confirmButtonColor: '#3085d6'
                , confirmButtonText: 'ok'
            }).then((result) => {
                    document.location.href='RegistraCompra.php';                
            })
        }
function alertaDetener(titulo, texto, tipo) {
            swal({
                title: titulo
                , text: texto
                , type: tipo
                , showCancelButton: false
                , confirmButtonColor: '#3085d6'
                , confirmButtonText: 'ok'
            }).then((result) => {
                    detener();               
            })
        }
function cancelar() {
            swal({
                title: 'Confirmaci&oacuten'
                , text: 'Desea cancelar la compra'
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , cancelButtonText: 'Cancelar'
                , confirmButtonText: 'Si, la deseo cancelar'
            }).then((result) => {
                if (result.value) {
                    document.location.href="RegistraCompra.php";
                }
            })
        }
function enviarCompra(opcion,mensaje){
    swal({
                title: 'Confirmaci&oacuten'
                , text: mensaje
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , cancelButtonText: 'Cancelar'
                , confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    if(opcion==="contado"){
                        showUser("0",'0','guardarTodo');                        
                    }else if(opcion==="credito"){
                        showUser("0","0",'guardarTodoCredito');
                    }                        
                    comprobacionGuardado();                        
                }
            })
         
}
function guardarContado(){
    var fecha=document.getElementById("fecha").value;
     if(fecha==""){
        alertaDetener("Informacion","Ingrese una fecha","warning");  
     }else{   
        enviarCompra("contado","Esta seguro de realizar la compra al contado");
     }
}
function guardar(){
    var vacio=document.getElementById("estaVacio").value;
    //alert("Vacio   "+vacio);
    if(vacio==""){
            alertaDetener("Informacion","Debe ingresar un producto a la lista","warning");  
    }else{
        $('#tipoCompra').modal('show');
    }
    
}
function guardarCredito(){
    var cuota=document.getElementById("cuotas").value;
    var periodo=document.getElementById("periodo").value;
    var abono=document.getElementById("abonoInicial").value;
    var fecha=document.getElementById("fecha").value;
    var vacio=document.getElementById("estaVacio").value;
    //alert("Abono   "+abono);
    //alert("Total   "+total);
    if(vacio==""){
            alertaDetener("Informacion","Debe ingresar un producto a la lista","warning");  
    }else{
         var total=document.getElementById("total").value;
        if(parseFloat(abono)>=parseFloat(total)){
       alertaDetener("Informacion","El abono supera el valor de la compra","warning"); 
        }else if(fecha==""){
            alertaDetener("Informacion","Ingrese una fecha","warning");  
         }else{   
            if(cuota==="" || periodo==="")
            alertaDetener("Error","Complete los campos",'error');
            else{
                enviarCompra("credito","Esta seguro de guardar la compra al credito");
            }
         }
        
    }
    
}
function comprobacionGuardado(){
    var quepaso=document.getElementById("quepaso").value;
        if(quepaso=="1"){
            alertaSweet("Exito","Compra guardada","info");
        }else{
            alertaSweet("Error","Compra no guardada","error");
        }
}
function verMas(str, opcion,tipo) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargaDetalle").innerHTML = xmlhttp.responseText;
                }
            }
            if(tipo==="contado")
                xmlhttp.open("post", "ajax/cargaModalDetalleCompra.php?idd=" + opcion+"&tipo="+tipo, true);
            else if(tipo==="credito")
                xmlhttp.open("post", "ajax/cargaModalDetalleCompra.php?idd=" + opcion+"&tipo="+tipo, true);
            xmlhttp.send();
        }
function modificarLista(cantidad,modelo,proveedor){
    swal({
                title: 'Confirmaci&oacuten'
                , text: 'Desea modificar el producto'
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , cancelButtonText: 'Cancelar'
                , confirmButtonText: 'Si, lo deseo modificar'
            }).then((result) => {
                if (result.value) {
                    $("#divAgregar").hide();
                    $("#divModificar").show();
                    $("#btnInfoProducto").disabled=false;
                    document.getElementById('proveedor').disabled=true;                                        
                    $("#proveedor").val(proveedor);
                    $("#proveedor").change();                    
                   $('#modelo').append($('<option>',
                     {
                        value: modelo,
                        text : modelo 
                    }));             
                    
                    $("#modelo").val(modelo);
                    $("#modelo").change();
                    
                    document.getElementById('modelo').disabled=true;
                    document.getElementById('cantidad').value=cantidad;
                    }
            })
    
}
function nuevoAjax2(){
            var xmlhttp=false;
            try {
                xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                try {
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                } catch(E) { xmlhttp=false;
                           }
            } if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp=new XMLHttpRequest();
            }
            return xmlhttp;
          }
function modificarPreciosProducto(){
              var precioVenta=document.getElementById('precioVenta').value;
              var precioCompra=document.getElementById('precioCompra').value;
              var modelo=document.getElementById("modelo").value;              
              if(precioCompra=="" || precioVenta==""){
                  alertaDetener("Error","Complete los campos",'error');
              }else if(parseInt(precioCompra)==0 || parseInt(precioVenta)==0){
                  alertaDetener("informacion","Los precios deben ser mayores a cero",'warning');
              }else if(parseInt(precioCompra)>parseInt(precioVenta)){
                      alertaDetener("informacion","El precio de venta debe ser mayor al precio de compra",'warning'); 
                       }else{
                  $('#editarProducto').modal('hide');              
                  var ajax2=nuevoAjax2();
                  ajax2.open("post", "ajax/editarProducto.php", true);
                  ajax2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  ajax2.send("precioCompra="+precioCompra+"&precioVenta="+precioVenta+"&modelo="+modelo);
                  ajax2.onreadystatechange=function() {
                      if (ajax2.readyState==4) {
                          if(ajax2.status==200) {
                              var respuesta=ajax2.responseXML;
                          }else{
                              alert("Estado: " + ajax2.status + "\nMotivo: " + ajax2.statusText);
                          }
                      }
                  }
                swal( 'Exito!', 'Proceso Completado!', 'success' );
              }
              
          }
function cargarC(){   
    //document.getElementById("btnguardarcredito").style.display = "block";  
    $("#cargarCredito").show();
}
function aparecer(){
    $("#divModificarProducto").show();    
}
function guardarNuevoProducto(){
    $(document).ready(function() { 
    var options = { 
        target:        '#guardo',   // target element(s) to be updated with server response 
        //beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse, // post-submit callback  
        clearForm: true,        // clear all form fields after successful submit 
        resetForm: true        // reset the form after successful submit 
    }; 
    $('#formProductoM').ajaxForm(options); 
});
} 
function showRequest(formData, jqForm, options) { 
    var queryString = $.param(formData);  
    alert('About to submit: \n\n' + queryString); 
    return true; 
} 
function showResponse(responseText, statusText, xhr, $form)  {  
    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + '\n\nThe output div should have already been updated with the responseText.'); 
    if(responseText==="1")
        alertaDetener("Informacion","Producto agregado","info"); 
    else if(responseText==="0")
        alertaDetener("Informacion","Producto no agregado","error"); 
}




