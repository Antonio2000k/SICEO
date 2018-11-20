function mostrarResultados(year){
    //alert('Entre');
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaYear.php',
                        data: 'year='+year+'&tipo=egreso',
                        dataType: 'JSON',
                        success:function(response){
                            //alert(response);
                            actualizaTabla();
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

function mostrarResultadosMes(year,mesNumero, mesNombre){
   // alert('Entre');
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
                        data: 'year='+year+'&mes='+mesNumero+'&tipo=egreso',
                        dataType: 'JSON',
                        success:function(response){
                            alert(response);
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

function consultaPorYear(){
    alert("entrar");
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargala").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("post", "ajax/consultaYear.php?year=2018", true);
            xmlhttp.send();
        }
function consultaPorMes(mes){
    //lert("entrar");
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargala").innerHTML = xmlhttp.responseText;                     
                }
            }
            xmlhttp.open("post", "ajax/consultaMes.php?year=2018&mes="+mes, true);
            xmlhttp.send();
        }

function actualizaTabla(){
    //alert(conjunto);
    //alert('Entre');
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
            xmlhttp.open("post", "ajax/actualizarTablaDatos.php?tipo=egreso"+"&year="+document.getElementById('year').value, true);
            xmlhttp.send();
        }
function verMas(str, opcion,tipo) {
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
            xmlhttp.open("post", "ajax/cargarDetalle.php?mes=" + opcion+"&tipo="+tipo+"&year="+document.getElementById("year").value, true);
            xmlhttp.send();
}
function mostrarResultadosNetos(year,mesNumero, mesNombre,tipo,tipoFlujo){
    alert('Entre');
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
        indice=2;//Egresos Netos
        
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
                    categories: response[1]
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
