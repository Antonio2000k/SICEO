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
            if(opcion==='telefonoc'){
                var valor = document.getElementById('telefonoc').value;
                if (/^[6|7]{1}[0-9]{3}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('telefonoc').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Celular debe iniciar con 6 o 7");
                    document.getElementById('telefonoc').value = '';
                }
            }
            
            if(opcion==='tele'){
                var valor = document.getElementById('telefono').value;
                if (/^[2]{1}[0-9]{3}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('telefono').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Telefono</b>");
                    document.getElementById('telefono').value = '';
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
            if(document.getElementById('empresa').value=="" ||
            document.getElementById('telefono').value=="" ||
            document.getElementById('email').value=="" ||
            document.getElementById('direccion').value=="" ||
            document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" ||
            document.getElementById('telefonoc').value==""){
                alertaSweet('Error!','Complete los campos!','error');
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
          $("#formProveedor").submit(function() {
              if (opc!=true) {		
                return false;
              } else 
                  return true;			
            });
        });
          
      }

    function limpiarIn(opcion){
        if(opcion=="limpiarM"){
            document.getElementById('bandera').value='cancelar';
        }else{
            $(document).ready(function(){
              $("#formProveedor")[0].reset();
              $("#formProveedor").submit(function() {
                  return false;		
                });
            });
        }
    }
        
    function alertaSweet(titulo,texto,tipo){
			swal(titulo,texto,tipo);
    }

        
    function DarBaja(id,opcion,mensaje,conf){
        swal({
          title: 'Confirmación',
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
              document.formProveedor.submit();
            
          }
        })
    }
       
    function llamarPagina(id){
	   window.open("proveedor.php?id="+id, '_parent');
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
    

    function ajax(str){
          if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
              } else {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      }
                xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                  document.getElementById("imprimir2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("post", "recargaTblproveedorInac.php", true);
        xmlhttp.send();
    }


    
    function validarEmail(){
        var valor=document.getElementById('correo').value;
        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){           
        } else {
            paso=false;
            NotificacionSoloLetras2('error',"<b>Error: </b>Correo incorrecto");
            document.getElementById('correo').value='';
        }
    }

    function enviar(){
        var id = "id="+document.getElementById("id").value;
        var xhr = new XMLHttpRequest();
        alert (id);
        xhr.open("POST", "verifica.php");
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send(id);

        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                document.getElementById("imprimiraqui").innerHTML = xhr.responseText;
            }
        }
    }

    