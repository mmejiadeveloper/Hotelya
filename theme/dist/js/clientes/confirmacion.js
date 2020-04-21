
var appc=new Vue({
    el:'#appc',
    data:{
        confirmaciones:[],
        accion:'',
        registro:{
            documento:'',
            fechainicial:''
        }
    },
    methods:{
        obtener_consulta() {
            vue_global.ajax_peticion('consulta_reserva', this.registro, [(respuesta) => {
                if (respuesta.estado == 1) {
                    console.log(respuesta.datos);
                    this.confirmaciones = respuesta.datos;
                    this.accion=1;
                } else {
                    alert('Hubo un problema con la carga de la informaci\u00f3n');

                }
            }]);
        },

        eliminarReserva(){
            vue_global.ajax_peticion('reservas/destroy',this.registro,[(respuesta) => {

                swal({
                    title: 'Información',
                    text: respuesta.mensaje,
                    type: respuesta.evento,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay',
                })
               
            }]);
        },
        /**
         * metodo para la factura de reservas
         * @param {*} habitacion 
         * @param {*} id 
         */
        generacionFactura(cedula) {

           
            location.href="generarFacturaReserva/"+cedula;
        }

    }

})


