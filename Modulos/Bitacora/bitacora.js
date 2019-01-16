//Reporte de bitacora
      function RepBitacora(){
        var fechaini = document.getElementById("rango5").value;
        var fechafini = document.getElementById("rango6").value;

        if(fechaini != "" && fechafini != ""){
          window.open("../../Modulos/Bitacora/reporteBitacora.php?fechaini="+fechaini+"&fechafini="+fechafini);
          $("#rango5").val('');
          $("#rango6").val('');
        }
        
      }