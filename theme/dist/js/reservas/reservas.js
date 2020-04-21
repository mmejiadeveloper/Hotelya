var app=new Vue({
    el:'#app',
    data:{
        mostrar:0,
        reservas:[],
        idreserva:'',
        registroPagoreserva:{
            idreserva:'',
            pago:'',
        },
        registro:{
            idreservas:'',
            cantidadPersonas:'',
            tipohabitacion:'',
            fechaIngreso:'',
            fechaSalida:'',
            nombres:'',
            apellidos:'',
            nacionalidad:'',
            documento:'',
            confirmacion:''            
        },

    },
    methods:{

        registrar_pagoReserva(id) {

            $('#myModal').modal('show');
            
            this.registroPagoreserva.idreserva=id;
        },

        /**
         * Este metodo registra el pago de la reserva en this.registroPagoreserva
         * desde el v-model del HTML
         */
        asignar_pagoreserva() {

            swal({
                title: 'Información',
                text: "Desea registrar la pago de la reserva ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                           
                vue_global.ajax_peticion('pagos/registrar_pagoreserva', this.registroPagoreserva, [(respuesta) => {
                    
                    swal({
                        title: 'Información',
                        text: respuesta.mensaje,
                        type: respuesta.evento,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay',
                    }).then((result) => {
                        if(respuesta.tipo==1){
                            $('#myModal').modal('hide');
                            location.reload();
                        }
                    });

                 
                }]);

            })
 
        },


        /**
         *  solo  necisito pasar este id  al metodo  para poder editar un campo 
         * @param {*} id 
         */
       
        enviarDato(id) {

            swal({
                title: 'Información',
                text: "Desea confirmar la reserva ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                
                vue_global.ajax_peticion('reservas/ed_reserva', {id_reserva:id}, [(respuesta) => {
                    console.log(respuesta)
                    if (respuesta.tipo==1) {
                        // location.href = 'reservas_administrar';
                        vue_global.ajax_peticion('reservas/listar_reservas', null, [(respuesta) => {
                            this.reservas = respuesta.datos;
                        }]);
                    }
                }]);


            })
            this.mostrar=1; 
        },
       
    },
    /**
     * Mounted es lo PRIMERO que ocurre cuando se carga la pagina
     */
    mounted() {

        /**
         * Cuando se carga la pagina necesito recibir las habitaciones que voy a mostrar
         */
        vue_global.ajax_peticion('reservas/listar_reservas', null, [(respuesta) => {
            this.reservas = respuesta.datos;
        }]);
    },
    computed: {
        mensaje_cargar(){
            return vue_global.mensaje_carga;
        },
        ajax_estado(){
            return vue_global.ajax_estado;
        }
    }
});

