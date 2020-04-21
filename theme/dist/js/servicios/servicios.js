var vue_hoteles = new Vue({
    el: '#app',
    data: {
        nhabitacion: '',
        servicios: [],
        registro: {
            wifi: '',
            parqueadero: '',
            camadoble1persona: '',
            camadoble2persona: '',
            camarote: '',
            idservicio: '',
            idhotel: '',
        },

    },
    methods: {

        registrar_servicio(ids, idh) {

            $('#myModal').modal('show');
            this.registro.idservicio = ids;
            this.registro.idhotel = idh;

        },
        /**
         * Este metodo registra la habirtacion enviado la informacion bindeada en this.registro 
         * desde el v-model del HTML
         */
        asignar_servicio() {

            swal({
                title: 'Información',
                text: "Desea actualizar los servicios ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                vue_global.ajax_peticion('servicios/registrar_servicios', this.registro, [(respuesta) => {

                    swal({
                        title: 'Información',
                        text: respuesta.mensaje,
                        type: respuesta.evento,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay',
                    }).then((result) => {
                        if (respuesta.tipo == 1) {
                            $('#myModal').modal('hide');
                        }
                    });


                }]);

            })

        },

    },
    /**
     * Mounted es lo PRIMERO que ocurre cuando se carga la pagina
     */
    mounted() {

        /**
         * Cuando se carga la pagina necesito recibir los servicios que voy a mostrar
         */
        vue_global.ajax_peticion('servicios/listar_servicios', null, [(respuesta) => {
            this.servicios = respuesta.datos;
        }]);
    }

});


