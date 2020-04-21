var vue_global = new Vue({
    data: {
        mensaje_carga: '',
        ajax_estado: 2
    },
    methods: {
        /**
         * Este metodo es para enviar peticiones ajax-axios al cualquier controlador de laravel
         * @param {*} url ##Esta es la ruta o el nombre de la ruta en el web.php
         * @param {*} datos ##Esta va a ser la informacion que voy a enviar desde javascript a el controlador
         * @param {*} callback ##Esto es lo que voy a recibir, o lo que va a pasar despues de que ocurra el resultado de la peticion
         */
        ajax_peticion(url, datos = null, callback = []) {
            this.mensaje_carga = 'Cargando resultados por favor espere...'
            this.ajax_estado = 1;
            var formData = new FormData();
            //Pregunto si se estan enviando datos para operaciones
            if (datos != null) {
                var str_datos = JSON.stringify(datos);
                formData.append("data", str_datos);
            }
            axios
                .post(url, formData
                    , { headers: { "Content-type": "multipart/form-data" } }
                )
                .then(respuesta => {
                    if (callback.length > 0) {
                        this.mensaje_carga = ''
                        this.ajax_estado = 0;
                        callback.forEach(element => {
                            if (element != null) {
                                element(respuesta.data);
                            }
                        });
                    }
                });
        },

    }
})

function MostrarProcensando(disparador) {
    disparador = disparador || 0;
    switch (disparador) {
        case 1:
            swal({
                title: "Información",
                html: "<span style='color:#e8c957'><i class='fas fa-sync fa-spin fa-5x fa-spinner'></i></span></br></br><span>Procesando información, por favor espere.</span>",
                confirmButtonColor: "rgb(78, 155, 127)",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            break;
        case 2:
            swal.close();
            break;

    }

}


$(document).ready(function () {
    var is_blocked = false;






    $('.treeview').click(function (e) {

        is_blocked = !is_blocked;

        console.log(is_blocked);
        if (!is_blocked) {
            $(this).removeClass("active")
        } else {
            $(this).addClass("active")
        }



        /*  console.log('view');
         bool = !bool;
         $(this).hasClass("active") = !$(this).hasClass("active");
         if ($(this).hasClass("active")) {
             $(this).removeClass("active")
         }
         if (!$(this).hasClass("active")) {
             $(this).addClass("active")
         } */





    });
});

