function mostrarResultados(year){
                    $('.resultados').html('<div id="container"></div>');
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/consultaYear.php',
                        data: 'year='+year+'&tipo=egreso',
                        dataType: 'JSON',
                        success:function(response){
                            //alert(response);
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
            xmlhttp.open("post", "ajax/actualizarTablaDatos.php", true);
            xmlhttp.send();
        }

