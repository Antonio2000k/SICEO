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
            var val = document.getElementById("nombreP").value;
            var tam = val.length;
            for (i = 0; i < tam; i++) {
                if (!isNaN(val[i])) document.getElementById("nombreP").value = '';
            }
        }

        function verificarP(opcion) {
            //alert("Entre");
            var opc = true;
            var tipo=document.getElementById("tipo").value;
            if(tipo==="1" || tipo==="0"){
                if (document.getElementById('modeloP').value == "" || document.getElementById('precioCompra').value == "" || document.getElementById('precioVenta').value == "" || document.getElementById('nombreP').value == "" || document.getElementById('color').value == "" || document.getElementById('proveedorP').value == 0 || document.getElementById('marca').value == 0 || document.getElementById('garantia').value == 0 || document.getElementById("tipo").value==0) {
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
                    opc = true;
                }
            }else if(tipo==="2"){
                if (document.getElementById('precioCompra').value == "" || document.getElementById('precioVenta').value == "" || document.getElementById('nombreP').value == "" || document.getElementById('proveedorP').value == 0 || document.getElementById('marca').value == 0 || document.getElementById("tipo").value==0) {
                    swal('Error!', 'Complete los campos!', 'error');
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
                detenerP();
            }
            if(opc)
                document.formProductoP.submit();
            else
                detenerP();
        }

        
        function detenerP(){
                $("#formProductoP").submit(function () {
                     return false;
                });
        }

        function alertaSweetP(titulo, texto, tipo,opcion) {
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
                    detenerP();
                    else
                        document.location.href='producto.php';                
            })
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

        function verificarCodigo(opcion) {
            //alert(opcion);
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
                            alertaSweetP("Error", "Codigo ya se encuentra registrado", "error","detener");
                        document.getElementById('modelo').focus();
                        document.getElementById('modelo').value = "";
                        }else if(opcion=="nombre"){
                            alertaSweetP("Error", "Nombre ya se encuentra registrado", "error","detener");
                        document.getElementById('nombreP').focus();
                        document.getElementById('nombreP').value = "";
                        }
                    }
                }
            }
            if(opcion==="codigo")
                var modelo = document.getElementById('modeloP').value;
            else if(opcion==="nombre")
                var modelo = document.getElementById('nombreP').value;
            xmlhttp.open("post", "existeCodigo.php?codigo=" +modelo+"&opcion="+opcion, true);
            xmlhttp.send();
        }       
        

        function cambioBaccion(id) {
            document.getElementById('baccionVer').value = id;
        }

function cambioTipoModelo(){
    var opcion=document.getElementById("tipo").value;
    ///alert("Entre    "+opcion);
    if(opcion==="2"){ 
        document.getElementById("modeloP").disabled=true;
        document.getElementById("modeloP").value="";
        document.getElementById("garantia").disabled=true;
        $("#garantia").val('0');
        $("#garantia").change();
    }else if(opcion==="1"){  //alert("Entre    "+opcion);
        document.getElementById("modeloP").disabled=false;
        document.getElementById("garantia").disabled=false;
    }
}



        
