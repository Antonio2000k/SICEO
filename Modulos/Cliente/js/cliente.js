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

      function Rep(){
        var fechaini = document.getElementById("rango3").value;
        var fechafini = document.getElementById("rango4").value;

        if(fechaini != "" && fechafini != ""){
          window.open("../../reporteCliente.php?fechaini="+fechaini+"&fechafini="+fechafini);
        }
      }

      function RepS(){
        var sexoM = document.getElementById("generoM").checked;
        var sexoF = document.getElementById("generoF").checked;

        if(sexoM){
          window.open("../../reporteCliente.php?sexo=M");
        } else if(sexoF){
          window.open("../../reporteCliente.php?sexo=F");
        }
      }

      function RepBoth(){
        var sexoM = document.getElementById("generoMM").checked;
        var sexoF = document.getElementById("generoFF").checked;
        var fechaini = document.getElementById("rango1").value;
        var fechafini = document.getElementById("rango2").value;

        if(sexoM){
          window.open("../../reporteCliente.php?fechaini="+fechaini+"&fechafini="+fechafini +"&sexo=M");
        } else if(sexoF){
          window.open("../../reporteCliente.php?fechaini="+fechaini+"&fechafini="+fechafini + "&sexo=F");
        }
      }
      function calcula(str){
        var cambio = document.getElementById('fecha').value;

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
          } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
            xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

              document.getElementById("edad").innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open("post",  "fecha.php?naci=" + cambio, true);
        xmlhttp.send();


      }

    function isvaliddate(day,month,year){
      var dteDate;

      month=month-1;
      dteDate=new Date(year,month,day);
     
      return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
    }

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


        var edad = (ahora_ano + 1900) - ano;
        
        if ( ahora_mes < mes )       {
          edad--;
        }

        if ((mes == ahora_mes) && (ahora_dia < dia)){
          edad--;
        }
        
        if (edad > 1900){
          edad -= 1900;
        }


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

        
        
