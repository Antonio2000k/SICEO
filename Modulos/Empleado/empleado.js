        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla) == -1 && !tecla_especial){
                NotificacionSoloLetras2('error',"<b>Error: </b>Solo se permiten letras");
                return false;
            }       
        }
        
        function vali(opcion) {
            if(opcion==='celular'){
                var valor = document.getElementById('celular').value;
                if (/^[6|7]{1}[0-9]{3}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('celular').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Celular debe iniciar con 6 o 7");
                    document.getElementById('celular').value = '';
                }
            }
            if(opcion==='dui'){
                var valor = document.getElementById('dui').value;
                if (/^[0-9]{8}\-[0-9]{1}$/.test(valor)) {
                    verificarCodigo('dui');
                }else {
                    document.getElementById('dui').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Dui</b>");
                }
            }
            if(opcion==='telefono'){
                var valor = document.getElementById('telefono').value;
                if (/^[0-9]{4}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('telefono').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Telefono</b>");
                }
            }
                   
        }
        
        function limpia() {
            var val = document.getElementById("nombre").value;
            var tam = val.length;
            for(i = 0; i < tam; i++) {
                if(!isNaN(val[i]))
                    document.getElementById("nombre").value = '';
            }
        }
        
      function verificar(opcion){
          var opc=true;
            if(document.getElementById('nombre').value=="" ||
            document.getElementById('apellido').value=="" ||
            document.getElementById('telefono').value=="" ||
            document.getElementById('fecha').value=="" ||
            document.getElementById('dui').value=="" || document.getElementById('correo').value=="" ||
            document.getElementById('celular').value=="" ||
            document.getElementById('direccion').value==""){
                swal('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc=false;
            }else{
                if(opcion==="guardar")
                document.getElementById('bandera').value="add";
                else
                document.getElementById('bandera').value="modificar";
                opc=true;
            }
          
          $(document).ready(function(){
          $("#formEmpleado").submit(function() {
              if (opc!=true) {		
                return false;
              } else 
                  return true;			
            });
        });
          
      }

    function limpiarIn(opcion){
        detener();
        swal({
          title: 'Confirmaci&oacuten',
          text: 'Desea cancelar el proceso actual',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:'Cancelar',
          confirmButtonText: 'Si, lo deseo cancelar'
        }).then((result) => {
          if (result.value) {
            limpiaF(opcion);
          }
        })
        
    }
function detener(){
        $("#formEmpleado").submit(function () {
             return false;
        });
}
function limpiaF(opcion){
    //alert("Opcion   "+opcion);
    if(opcion=="limpiarM"){
            document.location.href='registrarEmpleado.php';
    }else if(opcion==="limpiar"){
        $(document).ready(function(){
          $("#formEmpleado")[0].reset();
        });
    }
}
    function alertaSweet(titulo,texto,tipo){
			swal({
          title: 'Confirmaci&oacuten',
          text: texto,
          type: tipo,
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.value) {
              document.location.href='registrarEmpleado.php';            
          }
        })
    }

        
    function DarBaja(id,opcion,mensaje,conf){
        swal({
          title: 'Confirmaci&oacuten',
          text: mensaje,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText:'Cancelar',
          confirmButtonText: conf
        }).then((result) => {
          if (result.value) {
              if(opcion=='baja')
                document.getElementById('bandera').value="Dbajar";
              else
                  document.getElementById('bandera').value="Dactivar";
              document.getElementById('baccion').value=id;
              document.formEmpleado.submit();
            
          }
        })
    }
       
    function llamarPagina(id){
	   window.open("registrarEmpleado.php?id="+id, '_parent');
	}
        
        
    function NotificacionSoloLetras2(tipo,msg){
        notif({
          type:tipo,
          msg:msg ,
          position: "center",
          timeout: 3000,
          clickable: true
            
        });
    }
    
    function validarEmail(){
        var valor=document.getElementById('correo').value;
        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){       verificarCodigo('correo');    
        } else {
            paso=false;
            NotificacionSoloLetras2('error',"<b>Error: </b>Correo incorrecto");
            document.getElementById('correo').value='';
        }
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
            //alert("Paso   "+paso);
            if (paso == 0) {
                if(opcion=="dui"){
                    swal("Error", "Dui ya se encuentra registrado", "error");
                document.getElementById('dui').focus();
                document.getElementById('dui').value = "";
                }else if(opcion=="correo"){
                    swal("Error", "Correo ya se encuentra registrado", "error");
                document.getElementById('correo').focus();
                document.getElementById('correo').value = "";
                }
            }
        }
    }
    if(opcion==="dui")
        var modelo = document.getElementById('dui').value;
    else if(opcion==="correo")
        var modelo = document.getElementById('correo').value;
    xmlhttp.open("post", "ajax/existeDui.php?codigo=" +modelo+"&opcion="+opcion, true);
    xmlhttp.send();
}

    