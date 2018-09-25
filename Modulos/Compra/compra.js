function soloNumeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "1234567890";
            especiales = [8, 37, 39, 46];
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
    if (opcion === "cambioModelo") xmlhttp.open("get", "actualizaSelect.php?opcion=" + opcion + "&cambio=" + cambio, true);
    else xmlhttp.open("get", "actualizaSelect.php?opcion=" + opcion + "&cambio=" + cambioNombre, true);
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
    if (opcion == "agregar" || opcion=="modificar") {
            xmlhttp.open("post", "agregarDetalle.php?opcion=" + opcion + "&modelo=" + id+ "&cantidad=" + cantidad, true);
            xmlhttp.send();
    }
    if (opcion == "quitar") {
        xmlhttp.open("post", "agregarDetalle.php?opcion=" + opcion + "&quitar=" + id, true);
        xmlhttp.send();
    }
    if(opcion=="guardarTodo"){
        var vacio=document.getElementById("estaVacio").value;
        if(vacio==""){
            alertaDetener("Informacion","Debe ingresar un producto a la lista","warning");          
        }else{
            xmlhttp.open("post", "agregarDetalle.php?opcion=" + opcion + "&quitar=" + id, true);
            xmlhttp.send();
        }
    }
}
function verificar(opcion) {
            if (document.getElementById('cantidad').value == "" || document.getElementById('modelo').value == "0") {
                swal('Error!', 'Complete los campos!', 'error');
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
            xmlhttp.open("get", "cargaModalProducto.php?idd=" + producto, true);
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

function guardar(){
    //alert('Entre a guardar');
    showUser("0",'0','guardarTodo');
    var quepaso=document.getElementById("quepaso").value;
    if(quepaso=="1"){
        alertaSweet("Exito","Compra guardada","info");
    }else{
        alertaSweet("Error","Compra no guardada","error");
    }
}
function verMas(str, opcion) {
    //alert('Entre');
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
            xmlhttp.open("post", "ajax/cargaModalDetalleCompra.php?idd=" + opcion, true);
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
                    
                    document.getElementById('proveedor').disabled=true;                 
                    $("#proveedor").val(proveedor);
                    $("#proveedor").change();
                    
                    var x = document.getElementById("modelo");
                    var option = document.createElement("option");
                    option.text = modelo;
                    x.add(option);
                    
                    $("#modelo").val(modelo);
                    //$("#modelo").change();
                    
                    //document.getElementById('modelo').disabled=true;
                    document.getElementById('cantidad').value=cantidad;
                    }
            })
    
}



