//Reporte de bitacora
      function RepBitacora(){
        var fechaini = document.getElementById("rango3").value;
        var fechafini = document.getElementById("rango4").value;

        if(fechaini != "" && fechafini != ""){
          window.open("../../Modulos/Bitacora/reporteBitacora.php?fechaini="+fechaini+"&fechafini="+fechafini);
          $("#rango3").val('');
          $("#rango4").val('');
        }
        
      }