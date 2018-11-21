function mostrarResultados(year,tipo){
    //alert('Entre');
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaYear.php',
                        data: 'year='+year+'&tipo='+tipo,
                        dataType: 'JSON',
                        success:function(response){
                            actualizaTabla("anual",tipo);
                           Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Egresos del '+year
                },
                subtitle: {
                    text: 'Ventas'
                },
                xAxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                },
                yAxis: {
                    title: {
                        text: 'Egresos ($)'
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
                    name: 'Compras',
                    data: response[0]
                },{
                    name: 'Compras Totales',
                    data: response[1]
                }]
            });
                        }
                    });
                    return false;
                }

function mostrarResultadosMes(year,mesNumero, mesNombre,tipo){
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
        text: 'Egresos Mensuales por el Mes '+mesNombre
    },
    subtitle: {
        text: 'Egresos'
    },
    xAxis: {
                    categories: response[2]
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
                    name: 'Egresos Netos',
                    data: response[0]
                }, {
            name: 'Egresos Totales',
            data: response[1]
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
function verMas(str, opcion,tipo,rango,tiempo) {
    alert("Opcion  "+opcion);
    alert('Rango '+rango);
    alert('Tipo '+tipo);
    alert('Tiempo '+tiempo);
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
        text: 'Egresos Mensuales por el Mes '+mesNombre
    },
    subtitle: {
        text: 'Egresos'
    },
    xAxis: {
                    categories: response[2]
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
        name: 'Egresos',
        data: response[indice]
    }]
});

}
});
return false;
}
