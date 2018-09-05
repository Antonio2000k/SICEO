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
        
        function valiCelular(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "67";
            cambio=document.getElementById('celular').value;
            if(letras.indexOf(tecla) == -1 && cambio.length<2){
                document.getElementById('celular').value='';
                NotificacionSoloLetras2('error',"<b>Error: </b>Solo se puede iniciar con 6-7");
                return false;
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
            document.getElementById('single_cal1').value=="" ||
            document.getElementById('dui').value=="" || document.getElementById('correo').value=="" ||
            document.getElementById('celular').value=="" ||
            document.getElementById('direccion').value=="" ||
            (!document.getElementById('generoF').checked && !document.getElementById('generoM').checked)){
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


        
    function alertaSweet(titulo,texto,tipo){
			swal(titulo,texto,tipo);
    }

        
    function DarBaja(id,opcion,mensaje,conf){
        swal({
          title: 'Confirmacion?',
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
	   window.open("registrarEmpleado.php%id="+id, '_parent');
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
    xmlhttp.open("post", "recargaTblEmpleados.php", true);
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

  //Limpia todos los campos del formulario
        $(document).ready(function() {
          $('#limpiar').click(function() {
            $('input[type="text"]').val('');
          });
        });
    