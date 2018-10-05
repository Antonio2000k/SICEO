function Expediente(id){
     window.open("expediente.php?id="+id, '_parent');
  }
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

            if(e){

            }      
        }



        function vali(opcion) {
            
            
            if(opcion==='telefono'){
                var valor = document.getElementById('telefono').value;
                if (/^[2|6|7]{1}[0-9]{3}\-[0-9]{4}$/.test(valor)) {
                  
                }else if(valor==""){
                  document.getElementById('telefono').focus();
                  NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Telefono</b>");
                }else{
                    document.getElementById('telefono').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Telefono debe iniciar con 2, 6 o 7");
                }
                
            }
            if(opcion==='edad'){
                var valor = document.getElementById('edad').value;
                if (/^[0-9]{2}$/.test(valor)) {

                }else {
                    document.getElementById('edad').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Edad</b>");
                }
            }

            if(opcion==='nombre'){
                var valor = document.getElementById('nombre').value;
                if (valor!="") {

                }else {
                    document.getElementById('nombre').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Nombres</b>");
                }
            }

            if(opcion==='apellido'){
                var valor = document.getElementById('apellido').value;
                if (valor!="") {

                }else {
                    document.getElementById('apellido').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Apellidos</b>");
                }
            }

            if(opcion==='direccion'){
                var valor = document.getElementById('direccion').value;
                if (valor!="") {

                }else {
                    document.getElementById('direccion').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Direccion</b>");
                }
            }

            if(opcion == 'fecha'){

              
              var date = new Date();
              var y = date.getFullYear()-80; 
              var date2 = new Date();
              var y2 = date2.getFullYear()-1;
              
              var fecha=document.getElementById('fecha').value;
              
                  if (fecha.substr(6,9) >= y && fecha.substr(6,9) <= y2) {

                  }else{
                    //document.getElementById('fecha').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>La fecha de nacimiento esta fuera del rango permitido");
                    document.getElementById('fecha').value="";
                    
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
            if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" ||
            document.getElementById('telefono').value=="" || document.getElementById('fecha').value=="" ||
            document.getElementById('direccion').value=="" ){
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
          $("#formCliente").submit(function() {
              if (opc!=true) {    
                return false;
              } else 
                  return true;      
            });
        });
          
      }

      function cancelar() {
            swal({
                title: 'Confirmaci&oacuten'
                , text: 'Desea cancelar el registro'
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , cancelButtonText: 'Cancelar'
                , confirmButtonText: 'Si, lo deseo cancelar'
            }).then((result) => {
                if (result.value) {
                    document.location.href="registrarCliente.php";
                }
            })
        }

 
  
    
  
  
        
    function alertaSweet(titulo,texto,tipo){
      swal({
            position:'center',
            text: texto,
            type: tipo,
            title: titulo,
            showConfirmButton: false,

          });
    }

    function showHint(str) {
      if (str.length == 0) { 
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("POST", "fecha.php?q=" + str, true);
          xmlhttp.send();
      }
  }    
    
       
    function llamarPagina(id){
     window.open("registrarCliente.php?id="+id, '_parent');
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
    
    function ajax_act(str){
      if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
          } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
            xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              document.getElementById("imprimir").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("post", "recargaTblClientes.php", true);
    xmlhttp.send();
      }