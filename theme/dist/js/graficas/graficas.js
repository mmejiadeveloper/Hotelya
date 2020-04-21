
function cambiar_fecha_grafica() {

    var anio_sel = $("#anio_sel").val();
    var mes_sel = $("#mes_sel").val();

    cargar_grafica_barras(anio_sel, mes_sel);
    cargar_grafica_lineas(anio_sel, mes_sel);
    cargar_grafica_barras_suma_pago_reservas(anio_sel, mes_sel);
    cargar_meses(anio_sel);

    // cargar_grafica_barras_huespedes(anio_sel,mes_sel);
    // cargar_grafica_lineas_huespedes(anio_sel,mes_sel);
    // cargar_grafica_barras_suma_pago_huespedes(anio_sel,mes_sel);
}



function cargar_grafica_barras(anio, mes) {

    var options = {
        chart: {
            renderTo: 'div_grafica_barras',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros en el Mes'
        },
        subtitle: {
            text: 'EsteHotel'
        },
        xAxis: {
            categories: [],
            title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'CANTIDAD DE RESERVAS POR  DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'reservas',
            data: []

        }]
    }

    $("#div_grafica_barras").html($("#cargador_empresa").html());

    var url = "grafica_registros/" + anio + "/" + mes + "";


    $.get(url, function (resul) {
        var datos = jQuery.parseJSON(resul);
        var totaldias = datos.totaldias;
        var registrosdia = datos.registrosdia;
        var i = 0;
        for (i = 1; i <= totaldias; i++) {

            options.series[0].data.push(registrosdia[i]);
            options.xAxis.categories.push(i);


        }


        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);

    })


}



function cargar_grafica_lineas(anio, mes) {

    var options = {
        chart: {
            renderTo: 'div_grafica_lineas',

        },
        title: {
            text: 'Numero de Reservas en el Mes',
            x: -20 //center
        },
        subtitle: {
            text: 'EsteHotel',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'CANTIDAD RESERVAS POR DIA'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' reserva'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'reservas',
            data: []
        }]
    }

    $("#div_grafica_lineas").html($("#cargador_empresa").html());
    var url = "grafica_registros/" + anio + "/" + mes + "";
    $.get(url, function (resul) {
        var datos = jQuery.parseJSON(resul);
        var totaldias = datos.totaldias;
        var registrosdia = datos.registrosdia;
        var i = 0;
        for (i = 1; i <= totaldias; i++) {

            options.series[0].data.push(registrosdia[i]);
            options.xAxis.categories.push(i);


        }
        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);

    })


}

/**
 * grafica para la suma por dias de las reservas
 */

function cargar_grafica_barras_suma_pago_reservas(anio, mes) {

    var options = {
        chart: {
            renderTo: 'div_grafica_barras_suma_pago_reservas',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros en el Mes'
        },
        subtitle: {
            text: 'EsteHotel'
        },
        xAxis: {
            categories: [],
            title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'VALOR TOTAL RESERVAS POR  DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'reservas',
            data: []

        }]
    }

    $("#div_grafica_barras_suma_pago_reservas").html($("#cargador_empresa").html());

    var url = "grafica_registros_suma_pago_reservas/" + anio + "/" + mes + "";


    $.get(url, function (resul) {
        var datos = jQuery.parseJSON(resul);
        var totaldias = datos.totaldias;
        var registrosdia = datos.registrosdia;
        var i = 0;
        for (i = 1; i <= totaldias; i++) {

            options.series[0].data.push(registrosdia[i]);
            options.xAxis.categories.push(i);


        }


        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);

    })


}

/**
 * metodo para  cargar la informacion de los meses
 * @param {*} anio 
 */


function cargar_meses(anio) {


    var barChartData = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: ' para el año: 2018',
            borderWidth: 1,
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        },]

    };




    var ctx = document.getElementById("myChart").getContext('2d');






    var dataset = [];
    vue_global.ajax_peticion('obtener_pagos', null, [(respuesta) => {
        console.log(respuesta, typeof (respuesta))
        respuesta.forEach(element => {
            dataset.push(element.pago);
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [{
                    label: 'Total por mes',
                    data: dataset,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    fontSize:31,
                    text: 'Valor total por mes año actual'
                }
            },
            chartArea: {
                backgroundColor: 'rgba(251, 243, 243, 0.4)'
            }
        });
    }]);
}














