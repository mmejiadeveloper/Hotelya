var vue_hoteles = new Vue({
    el: '#app',
    data: {
        /**
         * paginador
         */
        pagina: 1,
        numero: 4,

        habitaciones: [],
        registro: {
            numero_habitacion: '',
            tipohabitacion: '',
            idhabitacion: '',
            estado: '',
            precio: '',
        },
    },
    methods: {

        editar_habitacion(habitacion) {

            $('#myModal').modal('show');
            this.registro.numero_habitacion = habitacion.numeroHabitacion;
            this.registro.tipohabitacion = habitacion.tipo;
            this.registro.idhabitacion = habitacion.idhabitaciones;
            this.registro.estado = habitacion.estado;
            this.registro.precio = habitacion.precio;

        },
        /**
         * Este metodo enviar la informacion de la habitacion editada enviado la informacion bindeada en this.registro 
         * desde el v-model del HTML
         */
        enviar_editar_habitacion() {

            swal({
                title: 'Información',
                text: "Desea Editar la información de la habitación ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                vue_global.ajax_peticion('editarHabitacion', this.registro, [(respuesta) => {

                    swal({
                        title: 'Información',
                        text: respuesta.mensaje,
                        type: respuesta.evento,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay',
                    }).then((result) => {
                        if (respuesta.tipo == 1) {
                            $('#myModal').modal('hide');
                            location.reload();
                        }
                    });


                }]);

            })

        },
        /**
         * paginador  metodos 
         */
        redondear_numero(num, precision) {
            precision = Math.pow(10, precision);
            return Math.ceil(num * precision) / precision;
        },
    },
    /**
     * Mounted es lo PRIMERO que ocurre cuando se carga la pagina
     */
    mounted() {

        /**
         * Cuando se carga la pagina necesito recibir las habitaciones que voy a mostrar
         */
        vue_global.ajax_peticion('listarhabitaciones', null, [(respuesta) => {
            this.habitaciones = respuesta.datos;
        }]);
    }

});