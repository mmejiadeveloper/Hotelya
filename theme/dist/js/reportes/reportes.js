var app=new Vue({
    el:"#app",
    data:{
        filtros:{
            fechaInicial:'',
            fechaFinal:'',
        },
        filtrosporurl:''
    },
    methods:{
        mostrar_reporte(tipo,modo){
            this.filtros.tipo = tipo;
            this.filtros.modo = modo;

            if(this.filtros.fechaInicial.length > 0 && this.filtros.fechaFinal.length > 0 ){
                app.filtrosporurl = app.filtros.fechaInicial + "|" + app.filtros.fechaFinal + "|" +app.filtros.tipo + "|" +app.filtros.modo ;
                location.href = "crearPDF?datos="+app.filtrosporurl;
               
            }else{
                alert("Seleccione un rango de fechas para continuar");
            }
        }
    }


})