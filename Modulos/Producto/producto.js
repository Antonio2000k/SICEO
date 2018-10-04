function soloNumeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "1234567890.";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla) == -1 && !tecla_especial){
                NotificacionSoloLetras2('error',"<b>Error: </b>Solo se permiten numeros");
                return false;
            }       
        }      
function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                NotificacionSoloLetras2('error', "<b>Error: </b>Solo se permiten letras");
                return false;
            }
        }
function limpia() {
    var val = document.getElementById("nombre").value;
    var tam = val.length;
    for (i = 0; i < tam; i++) {
        if (!isNaN(val[i])) document.getElementById("nombre").value = '';
    }
}
function verificar(opcion) {
var opc = true;
var tipo=document.getElementById("tipo").value;
if(tipo==="1" || tipo==="0"){
    if (document.getElementById('modelo').value == "" || document.getElementById('precioCompra').value == "" || document.getElementById('precioVenta').value == "" || document.getElementById('nombre').value == "" || document.getElementById('color').value == "" || document.getElementById('proveedor').value == 0 || document.getElementById('marca').value == 0 || document.getElementById('garantia').value == 0 || document.getElementById("tipo").value==0) {
        swal('Error!', 'Complete los campos!', 'error');
        document.getElementById('bandera').value = "";
        opc = false;
    }else if(parseFloat(document.getElementById('precioCompra').value)>=parseFloat(document.getElementById('precioVenta').value)){
        swal('Error','El precio de venta debe ser mayor al precio de compra','warning');
        opc=false;
    }else {
        if (opcion === "guardar") {
            document.getElementById('bandera').value = "add";
        }
        else document.getElementById('bandera').value = "modificar";
        opc = true;
    }
}else if(tipo==="2"){
    if (document.getElementById('precioCompra').value == "" || document.getElementById('precioVenta').value == "" || document.getElementById('nombre').value == "" || document.getElementById('proveedor').value == 0 || document.getElementById('marca').value == 0 || document.getElementById("tipo").value==0) {
        swal('Error!', 'Complete los campos!', 'error');
        document.getElementById('bandera').value = "";
        opc = false;
    }else if(parseFloat(document.getElementById('precioCompra').value)>=parseFloat(document.getElementById('precioVenta').value)){
        swal('Error','El precio de venta debe ser mayor al precio de compra','warning');
        opc=false;
    }else {
        if (opcion === "guardar") {
            document.getElementById('bandera').value = "add";
        }
        else document.getElementById('bandera').value = "modificar";
        opc = true;
    }
}else if(tipo==="0"){
    detener();
}
if(opc)
    document.formProducto.submit();
else
    detener();
}       
function detener(){
        $("#formProducto").submit(function () {
             return false;
        });
}
function limpiarIn(opcion) {
    if (opcion == "limpiarM") {
        detener();
        DarBaja('0',"cancelarM","Desea cancelar la modificación","Si, lo deseo cancelar");
    }else {
        detener();
        DarBaja('0',"cancelar","Desea cancelar el proceso","Si, lo deseo cancelar");
    }
}
function alertaSweet(titulo, texto, tipo,opcion) {
            //alert(opcion);
            swal({
                title: titulo
                , text: texto
                , type: tipo
                , showCancelButton: false
                , confirmButtonColor: '#3085d6'
                , confirmButtonText: 'ok'
            }).then((result) => {
                if(opcion=='detener')
                    detener();
                    else
                        document.location.href='producto.php';                
            })
        }
function DarBaja(id, opcion, mensaje, conf) {
    swal({
        title: 'Confirmaci&oacuten'
        , text: mensaje
        , type: 'warning'
        , showCancelButton: true
        , confirmButtonColor: '#3085d6'
        , cancelButtonColor: '#d33'
        , cancelButtonText: 'Cancelar'
        , confirmButtonText: conf
    }).then((result) => {
        if (result.value) {
            if(opcion==="cancelarM")                        
                document.getElementById('bandera').value = 'cancelar';
            if(opcion!=="cancelar" && opcion!=="cancelarM"){
                if (opcion == 'baja') document.getElementById('bandera').value = "Dbajar";
                else document.getElementById('bandera').value = "Dactivar";
                document.getElementById('baccion').value = id;
                document.formProducto.submit();
            }else{
                document.location.href="producto.php";
            }
        }
    })
}
function llamarPagina(id) {
    window.open("producto.php?id=" + id, '_parent');
}
function NotificacionSoloLetras2(tipo, msg) {
    notif({
        type: tipo
        , msg: msg
        , position: "center"
        , timeout: 3000
        , clickable: true
    });
}
function ajax_act(str, opcion) {
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
    xmlhttp.open("post", "cargarModal.php?idd=" + opcion, true);
    xmlhttp.send();
}
function verificarCodigo(opcion) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cambiaso").innerHTML = xmlhttp.responseText;
            var paso = document.getElementById('baccionVer').value;
            if (paso == 0) {
                if(opcion=="codigo"){
                    alertaSweet("Error", "Codigo ya se encuentra registrado", "error","detener");
                document.getElementById('modelo').focus();
                document.getElementById('modelo').value = "";
                }else if(opcion=="nombre"){
                    alertaSweet("Error", "Nombre ya se encuentra registrado", "error","detener");
                document.getElementById('nombre').focus();
                document.getElementById('nombre').value = "";
                }else if(opcion=="marca"){
                    alertaSweet("Error", "Marca ya se encuentra registrada", "error","detener");
                document.getElementById('nombreM').focus();
                document.getElementById('nombreM').value = "";
                }
            }
        }
    }
        if (opcion === "codigo") var modelo = document.getElementById('modelo').value;
        else if (opcion === "nombre") var modelo = document.getElementById('nombre').value;
        else if (opcion==="marca") var modelo=document.getElementById('nombreM').value;
        xmlhttp.open("post", "existeCodigo.php?codigo=" + modelo + "&opcion=" + opcion, true);
        xmlhttp.send();
}       
function cambioBaccion(id) {
    document.getElementById('baccionVer').value = id;
}
function cambioTipoModelo(){
    var opcion=document.getElementById("tipo").value;
    ///alert("Entre    "+opcion);
    if(opcion==="2"){ 
        document.getElementById("modelo").disabled=true;
        document.getElementById("modelo").value="";
        document.getElementById("garantia").disabled=true;
        $("#garantia").val('0');
        $("#garantia").change();
    }else if(opcion==="1"){  //alert("Entre    "+opcion);
        document.getElementById("modelo").disabled=false;
        document.getElementById("garantia").disabled=false;
    }
}

        function verificarM(opcion) {
                if (document.getElementById('nombreM').value == "") {
                    swal('Error!', 'Complete los campos!', 'error');
                }else {
                    guardarNuevaMarca();
                }
        }

function guardarNuevaMarca(){
    $(document).ready(function() { 
    var options = { 
        target:        '#guardo',   // target element(s) to be updated with server response 
        //beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse, // post-submit callback 
        clearForm: true,        // clear all form fields after successful submit 
        resetForm: true        // reset the form after successful submit 
    }; 
    $('#formMarca').ajaxSubmit(options); 
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
        alertaSweet("Informacion","Producto agregado","info",''); 
    else if(responseText==="0")
        alertaSweet("Informacion","Producto no agregado","error",'detener'); 
}
 
