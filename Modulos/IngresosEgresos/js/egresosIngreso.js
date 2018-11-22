/* Variables
    tipo /// egreso o ingreso
    tipoFlujo /// neto, totales
*/

function mostrarResultados(year,tipo){
    //alert('Tipo  '+tipo);
    var mensaje;
    var subtitulo;
    if(tipo==='egreso'){
        mensaje='Egresos';
        subtitulo='Compras';
    }
    if(tipo==='ingreso'){
        mensaje='Ingresos';
        subtitulo='Ventas';
    }
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaYear.php',
                        data: 'year='+year+'&tipo='+tipo,
                        dataType: 'JSON',
                        success:function(response){
                            actualizaTabla("anual",tipo);
                            verificarContenido(response);
                           Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: mensaje+' del '+year
                },
                subtitle: {
                    text: subtitulo
                },
                xAxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                },
                yAxis: {
                    title: {
                        text: mensaje+' ($)'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: subtitulo+' Netas',
                    data: response[0]
                },{
                    name: subtitulo+' Totales',
                    data: response[1]
                }]
            });
                        }
                    });
                    return false;
    }

function mostrarResultadosTodos(year,tipo,tipoFlujo){
    var indice1;
    var indice2;
    if(tipoFlujo==="Netos"){
        //alert("entre a netos");
         indice1=0;
         indice2=2;
    }
    if(tipoFlujo==="Totales"){
         indice1=1;
         indice2=3;
    }
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaYear.php',
                        data: 'year='+year+'&tipo='+tipo,
                        dataType: 'JSON',
                        success:function(response){
                            verificarContenido(response);
                           // alert(response);
                           // alert(indice2);
                           // alert(indice1);
                           Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Egresos-Ingresos '+tipoFlujo+' del '+year
                },
                xAxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                },
                yAxis: {
                    title: {
                        text: 'Egresos-Ingresos($)'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Egresos '+tipoFlujo,
                    data: response[indice1]
                },{
                    name: 'Ingresos '+tipoFlujo,
                    data: response[indice2]
                }]
            });
                        }
                    });
                    return false;
    }

function mostrarResultadosMes(year,mesNumero, mesNombre,tipo){
    var mensaje;
    var subtitulo;
    if(tipo==='egreso'){
        mensaje='Egresos';
        subtitulo='Compras';
    }
    if(tipo==='ingreso'){
        mensaje='Ingresos';
        subtitulo='Ventas';
    }
    if(year===''){
        year=document.getElementById('year').value;
        mesNumero=document.getElementById('mes').value;
        var combo=document.getElementById('mes');
        mesNombre=combo.options[combo.selectedIndex].text;
    }
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaMes.php',
                        data: 'year='+year+'&mes='+mesNumero+'&tipo='+tipo,
                        dataType: 'JSON',
                        success:function(response){
                            verificarContenido(response);
                            actualizaTabla("mensual",tipo);
            var chart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: mensaje+' Mensuales por el Mes '+mesNombre
    },
    subtitle: {
        text: subtitulo
    },
    xAxis: {
                    categories: response[2]
                },
                yAxis: {
                    title: {
                        text: mensaje+' ($)'
                    }
                },
    plotOptions: {
        column: {
            depth: 25
        }
    },
     series: [{
                    name: subtitulo+' Netas',
                    data: response[0]
                }, {
            name: subtitulo+' Totales',
            data: response[1]
        }]
});
                          
            }
        });
        return false;
    }

function mostrarResultadosMesTodos(year,mesNumero, mesNombre,tipo,tipoFlujo){
    //alert('tipo  '+tipo);
    var indice1;
    var indice2;
    if(tipoFlujo==="Netos"){
        //alert("entre a netos");
         indice1=0;
         indice2=2;
    }
    if(tipoFlujo==="Totales"){
         indice1=1;
         indice2=3;
    }
    if(year===''){
        year=document.getElementById('year').value;
        mesNumero=document.getElementById('mes').value;
        var combo=document.getElementById('mes');
        mesNombre=combo.options[combo.selectedIndex].text;
    }
        $('.resultados').html('<div id="container"></div>');
        $.ajax({
            type: 'POST',
            url: 'ajax/consultaMes.php',
            data: 'year='+year+'&mes='+mesNumero+'&tipo='+tipo,
            dataType: 'JSON',
            success:function(response){
                verificarContenido(response);
                //alert(response[indice1]);
                //alert(response[indice2]);
            var chart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: 'Egresos-Ingresos Mensuales '+tipoFlujo+' para el Mes '+mesNombre
    },
    xAxis: {
                    categories: response[4]
                },
                yAxis: {
                    title: {
                        text: 'Egresos ($)'
                    }
                },
    plotOptions: {
        column: {
            depth: 25
        }
    },
     series: [{
                    name: 'Egresos '+tipoFlujo,
                    data: response[indice1]
                }, {
            name: 'Ingresos '+tipoFlujo,
            data: response[indice2]
        }]
});
                          
            }
        });
        return false;
    }

function actualizaTabla(rango,tipo){
    var year=document.getElementById('year').value;
    var mes=document.getElementById('mes').value;
    //alert("tipo   "+tipo);
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargala").innerHTML = xmlhttp.responseText;
                    $('.tblDatos').DataTable();
                }
            }
            xmlhttp.open("post", "ajax/actualizarTablaDatos.php?tipo="+tipo+"&year="+year+"&mes="+mes+"&rango="+rango, true);
            xmlhttp.send();
        }

function RepIE(){
    var year=document.getElementById('year').value;
    
    window.open("../../reporteFlujoefectivo.php?tipo=egreso&year="+year+"&rango=anual&tipos=ingreso");
    
}
function verMas(str, opcion,tipo,rango,tiempo) {
    //alert("Opcion  "+opcion);
   // alert('Rango '+rango);
   // alert('Tipo '+tipo);
   // alert('Tiempo '+tiempo);
   var year=document.getElementById("year").value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargaDetalle").innerHTML = xmlhttp.responseText;
                    $('.tablaDetalle').DataTable();
                }
            }
            xmlhttp.open("post", "ajax/cargarDetalle.php?mes=" + opcion+"&tipo="+tipo+"&year="+year+"&rango="+rango+"&tiempo="+tiempo, true);
            xmlhttp.send();
}
function mostrarResultadosNetos(year,mesNumero, mesNombre,tipo,tipoFlujo){
   // alert("TipoFlujo "+tipoFlujo);
    var mensaje;
    var subtitulo;
    if(tipo==='egreso'){
        mensaje='Egresos';
        subtitulo='Compras';
    }
    if(tipo==='ingreso'){
        mensaje='Ingresos';
        subtitulo='Ventas';
    }
    var indice;
    if(year===''){
        year=document.getElementById('year').value;
        mesNumero=document.getElementById('mes').value;
        var combo=document.getElementById('mes');
        mesNombre=combo.options[combo.selectedIndex].text;
    }
    if(tipoFlujo==="neto")
        indice=0;
    else 
        indice=1;//Egresos Netos
        
$('.resultados').html('<div id="container"></div>');
$.ajax({
    type: 'POST',
    url: 'ajax/consultaMes.php',
    data: 'year='+year+'&mes='+mesNumero+"&tipo="+tipo+"&flujo="+tipoFlujo,
    dataType: 'JSON',
    success:function(response){
        verificarContenido(response);
var chart = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: mensaje+' Mensuales para el Mes '+mesNombre
    },
    subtitle: {
        text: subtitulo
    },
    xAxis: {
                    categories: response[2]
                },
                yAxis: {
                    title: {
                        text: mensaje+' ($)'
                    }
                },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
        name: subtitulo,
        data: response[indice]
    }]
});

}
});
return false;
}

function cambioTipoFlujo(tipoFlujo){
    var year=document.getElementById('year').value;
    var seleccion=document.getElementById('seleccion').value;
    //alert(seleccion);
    if(seleccion==='0')
        mostrarResultadosMesTodos('','', '','todo',tipoFlujo);
    if(seleccion==='1')
        mostrarResultadosTodos(year,'todo',tipoFlujo);
}

function verificarContenido(response){
    var existe=false;
    var tama=response.length;
    var tamaMini=response[0].length;
    if(tama!==12)
        tama--;
    //alert('Tama   '+tama);
    //alert('Tama Mini   '+tamaMini);
    var i;
    var k;
    for( i=0; i<tama ; i++){
        for( k=0; k<tamaMini ; k++){
            //alert("contenido "+response[i][k]);
            if(response[i][k]!==0)
                existe=true;
        }
    }
    
    if(existe===false)
        swal('Información', 'Sin datos', 'info');
    
}