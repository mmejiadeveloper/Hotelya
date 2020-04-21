var vue_hoteles = new Vue({
    el: '#app',
    data: {
        nhabitacion: '',
        habitaciones: [],
        registroestado:{
            idhabitacion:'',
        },
        registro: {
            documento: '',
            nombre: '',
            tipohabitacion: '',
            fechaIngreso: '',
            fechaSalida: '',
            apellidos: '',
            cantidadPersona: 0,
            numero_habitacion: '',
            total: '',
            idhabitacion:'',
        },

    },
    methods: {

        registrar_habitacion(habitacion) {

            $('#myModal').modal('show');
            this.registro.numero_habitacion = habitacion.numeroHabitacion;
            this.registro.tipohabitacion = habitacion.tipo;
            this.registro.idhabitacion = habitacion.idhabitaciones;
            
        },
        /**
         * Este metodo registra la habirtacion enviado la informacion bindeada en this.registro 
         * desde el v-model del HTML
         */
        asignar_habitacion() {

            swal({
                title: 'Información',
                text: "Desea registrar la habitación ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                           
                vue_global.ajax_peticion('hoteles/registrar_habitacion', this.registro, [(respuesta) => {
                    
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
         * cambiar el esatado de la habitacion de ocupado a libre
         * @param {*} id 
         */

        cambiar_estado_libre(id){


            swal({
                title: 'Información',
                text: "Desea liberar la habitaci\u00F3n ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                

                    this.registroestado.idhabitacion=id;
    
                    vue_global.ajax_peticion('hoteles/cambiarestado', this.registroestado, [(respuesta) => {
                    
                        swal({
                            title: 'Información',
                            text: respuesta.mensaje,
                            type: respuesta.evento,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay',
                        }).then((result) => {
                            if(respuesta.tipo==1){
                                $('#myModal').modal('hide');
                                // location.reload();
                                vue_global.ajax_peticion('hoteles/listar_habitaciones', null, [(respuesta) => {
                                    this.habitaciones = respuesta.datos;
                                }]);
                            }
                        });
                    
                    }]);
               
            })


            

        },
        generacionFactura(habitacion,id) {

            
            // vue_global.ajax_peticion('generarFactura', null, [(respuesta) => {
             
            //     console.log(respuesta.datos);
            // }]);

            location.href="generarFactura/"+habitacion+"/"+id;
        }

    },
    /**
     * Mounted es lo PRIMERO que ocurre cuando se carga la pagina
     */
    mounted() {

        /**
         * Cuando se carga la pagina necesito recibir las habitaciones que voy a mostrar
         */
        vue_global.ajax_peticion('hoteles/listar_habitaciones', null, [(respuesta) => {
            this.habitaciones = respuesta.datos;
        }]);
    }

});





