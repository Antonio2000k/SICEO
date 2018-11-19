function mostrarResultados(year){
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaYear.php',
                        data: 'year='+year+"&tipo=ingreso",
                        dataType: 'JSON',
                        success:function(response){
                            //alert(response);
                           Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Ingresos del '+year
                },
                subtitle: {
                    text: 'Ventas'
                },
                xAxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                },
                yAxis: {
                    title: {
                        text: 'Ingresos ($)'
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
                    name: 'Ingresos Netos',
                    data: response[0]
                },{
                    name: 'Ingresos Totales',
                    data: response[1]
                }]
            });
                        }
                    });
                    return false;
                }

function mostrarResultadosMes(year,mesNumero, mesNombre){
    //alert('Entre');
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
                        data: 'year='+year+'&mes='+mesNumero+"&tipo=ingreso",
                        dataType: 'JSON',
                        success:function(response){
                            //alert(response);
                            Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Egresos Mensuales por el Mes '+mesNombre
                },
                subtitle: {
                    text: 'Ventas'
                },
                xAxis: {
                    categories: response[1]
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
                    data: response[2]
                }, {
            name: 'London',
            data: response[0]
        }]
            });
                        }
                    });
                    return false;
                }
function mostrarResultadosNetos(year,mesNumero, mesNombre){
    //alert('Entre');
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
                        data: 'year='+year+'&mes='+mesNumero+"&tipo=ingreso",
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
        text: 'Chart rotation demo'
    },
    subtitle: {
        text: 'Test options by dragging the sliders below'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
        data: response[2]
    }]
});

}
});
return false;
}







