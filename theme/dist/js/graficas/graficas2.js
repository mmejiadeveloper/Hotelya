
/**
 * este metodo  cambia el valor del año  y el mes 
 */
function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();
   

    cargar_grafica_barras_huespedes(anio_sel,mes_sel);
    cargar_grafica_lineas_huespedes(anio_sel,mes_sel);
    cargar_grafica_barras_suma_pago_huespedes(anio_sel,mes_sel);
}


    /**
     * graficas para huespedes
     */

    function cargar_grafica_barras_huespedes(anio,mes){

        var options={
             chart: {
                     renderTo: 'div_grafica_barras_huespedes',
                    type: 'column'
                },
                title: {
                    text: 'N\u00FAmero de Registros en el Mes'
                },
                subtitle: {
                    text: 'EsteHotel'
                },
                xAxis: {
                    categories: [],
                     title: {
                        text: 'D\u00EDas del mes'
                    },
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'CANTIDAD DE HABITACIONES ARRENDADAS POR  D\u00CDA'
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
                    name: 'habitaciones',
                    data: []
        
                }]
        }
        
        $("#div_grafica_barras_huespedes").html( $("#cargador_empresa").html() );
        
        var url = "grafica_registros_huespedes/"+anio+"/"+mes+"";
        
        
        $.get(url,function(resul){
        var datos= jQuery.parseJSON(resul);
        var totaldias=datos.totaldias;
        var registrosdia=datos.registrosdia;
        var i=0;
            for(i=1;i<=totaldias;i++){
            
            options.series[0].data.push( registrosdia[i] );
            options.xAxis.categories.push(i);
        
        
            }
        
        
         //options.title.text="aqui e podria cambiar el titulo dinamicamente";
         chart = new Highcharts.Chart(options);
        
        })
        
        
        }
        
        
        
        function cargar_grafica_lineas_huespedes(anio,mes){
        
        var options={
             chart: {
                    renderTo: 'div_grafica_lineas_huespedes',
                   
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
                        text: 'CANTIDAD HABITACIONES ARRENDAS POR DIA'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: ' habitaciones'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'habitaciones',
                    data: []
                }]
        }
        
        $("#div_grafica_lineas_huespedes").html( $("#cargador_empresa").html() );
        var url = "grafica_registros_huespedes/"+anio+"/"+mes+"";
        $.get(url,function(resul){
        var datos= jQuery.parseJSON(resul);
        var totaldias=datos.totaldias;
        var registrosdia=datos.registrosdia;
        var i=0;
            for(i=1;i<=totaldias;i++){
            
            options.series[0].data.push( registrosdia[i] );
            options.xAxis.categories.push(i);
        
        
            }
         //options.title.text="aqui e podria cambiar el titulo dinamicamente";
         chart = new Highcharts.Chart(options);
        
        })
        
        
        }
        
        /**
         * grafica para la suma por dias de los huespedes
         */
        
        function cargar_grafica_barras_suma_pago_huespedes(anio,mes){
        
            var options={
                 chart: {
                         renderTo: 'div_grafica_barras_suma_pago_huespedes',
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
                            text: 'VALOR TOTAL HUESPEDES POR  DIA'
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
                        name: 'habitaciones',
                        data: []
            
                    }]
            }
            
            $("#div_grafica_barras_suma_pago_huespedes").html( $("#cargador_empresa").html() );
            
            var url = "grafica_registros_suma_pago_huespedes/"+anio+"/"+mes+"";
            
            
            $.get(url,function(resul){
            var datos= jQuery.parseJSON(resul);
            var totaldias=datos.totaldias;
            var registrosdia=datos.registrosdia;
            var i=0;
                for(i=1;i<=totaldias;i++){
                
                options.series[0].data.push( registrosdia[i] );
                options.xAxis.categories.push(i);
            
            
                }
            
            
             //options.title.text="aqui e podria cambiar el titulo dinamicamente";
             chart = new Highcharts.Chart(options);
            
            })
            
            
            }