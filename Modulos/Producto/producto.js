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
            if (document.getElementById('modelo').value == "" || document.getElementById('precioCompra').value == "" || document.getElementById('precioVenta').value == "" || document.getElementById('nombre').value == "" || document.getElementById('color').value == "" || document.getElementById('proveedor').value == 0 || document.getElementById('marca').value == 0 || document.getElementById('garantia').value == 0) {
                swal('Error!', 'Complete los campos!', 'error');
                document.getElementById('bandera').value = "";
                opc = false;
            }
            else {
                if (opcion === "guardar") {
                    document.getElementById('bandera').value = "add";
                }
                else document.getElementById('bandera').value = "modificar";
                opc = true;
            }
            $(document).ready(function () {
                $("#formProducto").submit(function () {
                    if (opc != true) {
                        return false;
                    }
                    else return true;
                });
            });
        }

        function limpiarIn(opcion) {
            if (opcion == "limpiarM") {
                document.getElementById('bandera').value = 'cancelar';
            }
            else {
                $(document).ready(function () {
                    $("#formProducto")[0].reset();
                    $("#formProducto").submit(function () {
                        return false;
                    });
                });
            }
        }

        function alertaSweet(titulo, texto, tipo) {
            swal(titulo, texto, tipo);
        }

        function DarBaja(id, opcion, mensaje, conf) {
            //alert("Entree");
            //alert(" ID  "+id+"   Opcion  "+opcion);
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
                    if (opcion == 'baja') document.getElementById('bandera').value = "Dbajar";
                    else document.getElementById('bandera').value = "Dactivar";
                    document.getElementById('baccion').value = id;
                    document.formProducto.submit();
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

        function recargaTabla() {
            //alert("Entre    Opcion "+opcion);
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("imprimirTablaActivados").innerHTML = xmlhttp.responseText;
                    recargaTablaBaja();
                }
            }
            xmlhttp.open("post", "recargaTablaProducto.php", true);
            xmlhttp.send();
        }

        function recargaTablaBaja() {
            //alert("Entre    Opcion "+opcion);
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("imprimirTablaDesactivados").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("post", "recargaTablaProductoBaja.php", true);
            xmlhttp.send();
        }

        function verificarCodigo() {
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
                        alertaSweet("Error", "Codigo ya se encuentra registrado", "error");
                        document.getElementById('modelo').focus();
                        document.getElementById('modelo').value = "";
                    }
                }
            }

            var modelo = document.getElementById('modelo').value;
            xmlhttp.open("post", "existeCodigo.php?codigo=" + modelo, true);
            xmlhttp.send();
        }
        
        function validarEmail() {
            var valor = document.getElementById('correo').value;
            if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)) {}
            else {
                paso = false;
                NotificacionSoloLetras2('error', "<b>Error: </b>Correo incorrecto");
                document.getElementById('correo').value = '';
            }
        }

        function cambioBaccion(id) {
            document.getElementById('baccionVer').value = id;
        }


        
