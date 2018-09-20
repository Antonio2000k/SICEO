function actualiza(opcion) {
    //alert('entre');
    var cambio = document.getElementById('proveedor').value;
    var cambioNombre = document.getElementById('modelo').value;
    //alert(cambio);
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
            xmlhttp.open("GET", "agregarDetalle.php?opcion=" + opcion + "&modelo=" + id+ "&cantidad=" + cantidad, true);
            xmlhttp.send();
    }
    if (opcion == "quitar") {
        xmlhttp.open("GET", "agregarDetalle.php?opcion=" + opcion + "&id=" + id, true);
        xmlhttp.send();
    }
}
function verificar() {
            if (document.getElementById('cantidad').value == "" || document.getElementById('modelo').value == "0") {
                swal('Error!', 'Complete los campos!', 'error');
            }else{
                var id=document.getElementById('modelo').value;
                var cantidad=document.getElementById('cantidad').value;
                showUser(id,cantidad,"agregar");
            }
            $(document).ready(function () {
                $("#formCompra").submit(function () {
                    return false;
                });
            });
        }