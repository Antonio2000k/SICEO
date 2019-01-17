//Mostrar examen
function Exam(id,idex){
         window.open("../../reporteExamen.php?id="+id+"&idexam="+idex);
      }
      //Abrir ventana para hacer un examen
      function NuevoExam(id){
         window.open("examen.php?id="+id, '_parent');
      }

      //Validar solo letrar
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

        //validar datos
        function vali(opcion) {


            if(opcion==='telefono'){
                var valor = document.getElementById('telefono').value;
                if (/^[0-9]{4}\-[0-9]{4}$/.test(valor)) {

                }else {
                    document.getElementById('telefono').focus();
                    NotificacionSoloLetras2('error', "<b>Error: </b>Complete el campo <b>Telefono</b>");
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

        }

        //Limpiar campos
        function limpia() {
            var val = document.getElementById("nombre").value;
            var tam = val.length;
            for(i = 0; i < tam; i++) {
                if(!isNaN(val[i]))
                    document.getElementById("nombre").value = '';
            }
        }


        //verificar datos campos
      function verificar(){
          var opc=true;
            if(document.getElementById('nombre').value=="" || document.getElementById('apellido').value=="" ||
            document.getElementById('telefono').value=="" || document.getElementById('edad').value=="" ||
            document.getElementById('direccion').value=="" ){
               swal('Error!','Complete los campos!','error');

                document.getElementById('bandera').value="";

                opc=false;
            }else{

                document.getElementById('bandera').value="modificar";

                setTimeout(document.formCliente.submit(),2000);
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

      //limpiar formulario
    function limpiarIn(opcion){
        if(opcion=="limpiarM"){
            document.getElementById('bandera').value='cancelar';
        }else{
            $(document).ready(function(){
              $("#formCliente")[0].reset();
              $("#formCliente").submit(function() {
                  return false;
                });
            });
        }
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

        function cancelar(){
        location.href=('listaCliente.php');
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

    function Notificacion(tipo,msg){
        notif({
          type:tipo,
          msg:msg ,
          position: "center",
          timeout: 3000,
          clickable: true
            
        });
    }
    //Validar solo numeros
    function soloNumeros(e,opcion) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            if(opcion=="entero")
                letras = "1234567890";
            else
               letras = "1234567890.-"; 
            especiales = [8, 37, 39, 189];
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

    //validar todos los campos para guardar 
    function guardar(){

          var opc=true;
          if(document.getElementById('examino').value==""
           || document.getElementById('avsclred').value=="" || document.getElementById('avsclrei').value==""
            || document.getElementById('avsccred').value=="" || document.getElementById('avsclrei').value==""
            || document.getElementById('esfred').value=="" || document.getElementById('esfrei').value==""
            || document.getElementById('cilred').value=="" || document.getElementById('cilrei').value==""
            || document.getElementById('ejered').value=="" || document.getElementById('ejerei').value==""
            || document.getElementById('adiccionred').value=="" || document.getElementById('adiccionrei').value==""
            || document.getElementById('prismared').value=="" || document.getElementById('prismarei').value==""
            || document.getElementById('cbred').value=="" || document.getElementById('cbrei').value==""
            || document.getElementById('avlejred').value=="" || document.getElementById('avlejrei').value==""
            || document.getElementById('avcered').value=="" || document.getElementById('avcerei').value==""){

                alertaSweet('Error!','Complete los campos!','error');
                document.getElementById('bandera').value="";
                opc=false;
            }else{

                document.getElementById('bandera2').value="add";
                setTimeout(document.formExam.submit(),2000);
                opc=true;
            }

          $(document).ready(function(){
          $("#formExam").submit(function() {
              if (opc!=true) {
                return false;
              } else
                  return true;
            });
        });

      }