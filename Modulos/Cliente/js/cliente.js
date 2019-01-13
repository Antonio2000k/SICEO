//Abrir expediente
function Expediente(id){
     window.open("expediente.php?id="+id, '_parent');
  }
  //Validar utilizacion de solo letrar
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


        //Validar campos
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
        
        //Limpiar el formulario
        function limpia() {
            var val = document.getElementById("nombre").value;
            var tam = val.length;
            for(i = 0; i < tam; i++) {
                if(!isNaN(val[i]))
                    document.getElementById("nombre").value = '';
            }
        }
        
      //Verificar que todos los campos esten completos
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

      //Cancelar operaciones
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

 
  
    
  
  
      //Sweet Alert  
    function alertaSweet(titulo,texto,tipo){
      swal({
            position:'center',
            text: texto,
            type: tipo,
            title: titulo,
            showConfirmButton: false,

          });
    } 
    
       
    function llamarPagina(id){
     window.open("registrarCliente.php?id="+id, '_parent');
  }
        
    //Notify
    function NotificacionSoloLetras2(tipo,msg){
        notif({
          type:tipo,
          msg:msg ,
          position: "center",
          timeout: 3000,
          clickable: true
            
        });
    }
    
    //Ajax para recargar tabla
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

    //Reporte de cliente por fechas
      function Rep(){
        var fechaini = document.getElementById("rango3").value;
        var fechafini = document.getElementById("rango4").value;

        if(fechaini != "" && fechafini != ""){
          window.open("../../reporteVentas.php?fechaini="+fechaini+"&fechafini="+fechafini+"&tipo=notab");
          $("#rango3").val('');
          $("#rango4").val('');
        }
        
      }

    //Reporte de cliente por sexo
      function RepS(){
        var sexoM = document.getElementById("generoM").checked;
        var sexoF = document.getElementById("generoF").checked;

        if(sexoM){
          $('#sexo').modal('show');
          window.open("../../reporteCliente.php?sexo=M");
          
        } else if(sexoF){
          $('#sexo').modal('show');
          window.open("../../reporteCliente.php?sexo=F");
          
        }


      }

      //Reporte de cliente por edad
      function RepEdad(){
        var edadE = document.getElementById("edadEs").value;
        var edadMe = document.getElementById("edadMe").value;
        var edadMa = document.getElementById("edadMa").value;
        var edadMeR = document.getElementById("edadR1").value;
        var edadMaR = document.getElementById("edadR2").value;

        if(edadE!=""){
          window.open("../../reporteCliente.php?edad="+edadE);
          limpiarFormulario();
        } else if(edadMe!=""){
          window.open("../../reporteCliente.php?edadMe="+edadMe);
          limpiarFormulario();
        }else if(edadMa!=""){
          window.open("../../reporteCliente.php?edadMa="+edadMa);
          limpiarFormulario();
        }else if(edadMeR!="" && edadMaR!=""){
          window.open("../../reporteCliente.php?edadMe="+edadMeR + "&edadMa="+edadMaR);
          limpiarFormulario();
        }



      }

      
      //Validar fecha
    function isvaliddate(day,month,year){
      var dteDate;

      month=month-1;
      dteDate=new Date(year,month,day);
     
      return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
    }
    //Darle formato a la fecha
    function validate_fecha(fecha){
      var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");

      if(fecha.search(patron)==0){
        var values=fecha.split("/");
        
        if(isvaliddate(values[0],values[1],values[2])){
          return true;
        }
      }
        return false;
    }
    //Calcular fecha
    function calcularEdad(){
      var fecha=document.getElementById("fecha").value;
      if(validate_fecha(fecha)==true){
        var values=fecha.split("/");

        var dia = values[0];

        var mes = values[1];

        var ano = values[2];


        var fecha_hoy = new Date();

        var ahora_ano = fecha_hoy.getYear();

        var ahora_mes = fecha_hoy.getMonth()+1;

        var ahora_dia = fecha_hoy.getDate();

        var edad = (ahora_ano +1900) - ano;

        
        if ( ahora_mes < mes )       {
          edad--;
        }

        if ((mes == ahora_mes) && (ahora_dia < dia)){
          edad--;
        }
        if (edad>1900) {edad -=1900;}
        
        


        var meses=0;
        
        if(ahora_mes>mes)
           meses=ahora_mes-mes;
        if(ahora_mes<mes)
           meses=12-(mes-ahora_mes);
        if(ahora_mes==mes && dia>ahora_dia)
           meses=11;

        var dias=0;
        
        if(ahora_dia>dia)
           dias=ahora_dia-dia;
        if(ahora_dia<dia){
           ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
           dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
        }
        if(edad==1){
          document.getElementById('edad').value = edad + " año";
        }else{
          document.getElementById('edad').value = edad + " años";
        }
      }
    }

    //Ajax para mostrar modal
    function cambioDiv(opcion) {
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          document.getElementById("cambio").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("POST", "modal.php?cambio=" + opcion, true);
      xmlhttp.send();
  }   

//Hacer cambios en div de reporte
  function mostrarFormulario(opcion){
    if(opcion==="edadE"){
        $("#divE").show();
        $("#divEme").hide();
        document.getElementById("edadMe").value = "";
        $("#divEma").hide();
        document.getElementById("edadMa").value = "";
        $("#divER").hide();
        document.getElementById("edadR1").value = "";
        document.getElementById("edadR2").value = "";
    }
    if(opcion==="edadMe"){
        $("#divE").hide();
        document.getElementById("edadEs").value = "";
        $("#divEme").show();
        $("#divEma").hide();
        document.getElementById("edadMa").value = "";
        $("#divER").hide();
        document.getElementById("edadR1").value = "";
        document.getElementById("edadR2").value = "";
    }
    if(opcion==="edadMa"){
        $("#divE").hide();
        document.getElementById("edadEs").value = "";
        $("#divEme").hide();
        document.getElementById("edadMe").value = "";
        $("#divEma").show();
        $("#divER").hide();
        document.getElementById("edadR1").value = "";
        document.getElementById("edadR2").value = "";
    }
    if(opcion==="edadR"){
        $("#divE").hide();
        document.getElementById("edadEs").value = "";
        $("#divEme").hide();
        document.getElementById("edadMe").value = "";
        $("#divEma").hide();
        document.getElementById("edadMa").value = "";
        $("#divER").show();
    }
    
  }
  //Limpiar Div
  function limpiarFormulario(){
    $("#divE").hide();
    document.getElementById("edadEs").value = "";
    $("#divEme").hide();
    document.getElementById("edadMe").value = "";
    $("#divEma").hide();
    document.getElementById("edadMa").value = "";
    $("#divER").hide();
    document.getElementById("edadR1").value = "";
    document.getElementById("edadR2").value = "";
  }