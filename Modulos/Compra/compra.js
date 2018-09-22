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
            if (opcion === 'cambioNombre') document.getElementById("nombresito").innerHTML = xmlhttp.responseText;
            else if (opcion === 'cambioModelo') {
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
    if (opcion == "agregar") {
            xmlhttp.open("post", "agregarDetalle.php?opcion=" + opcion + "&modelo=" + id+ "&cantidad=" + cantidad, true);
            xmlhttp.send();
    }
    if (opcion == "quitar") {
        //alert('Entreee   Opcion   '+id);
        xmlhttp.open("post", "agregarDetalle.php?opcion=" + opcion + "&quitar=" + id, true);
        xmlhttp.send();
    }
}
function verificar() {
    var opcion=false;
            if (document.getElementById('cantidad').value == "" || document.getElementById('modelo').value == "0") {
                swal('Error!', 'Complete los campos!', 'error');
            }else{
                var id=document.getElementById('modelo').value;
                var cantidad=document.getElementById('cantidad').value;
                showUser(id,cantidad,"agregar");
                document.formCompra.submit();
            }            
            detener(opcion);
        }

function detener(opcion){
    $(document).ready(function () {
                $("#formCompra").submit(function () {
                    return opcion;
                });
            });
}
function lanzaModal(){
    var opcion=false;
    detener(opcion);
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
                    document.formCompra.submit();
                }
            })
        }
