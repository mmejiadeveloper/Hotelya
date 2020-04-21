var ajax_rp = null;

$(document).ready(function () {
    // $('#myForm').validator()

    $("a").click(function (e) {
        var type = $(this).attr("type");
        switch_login_screen(type);
    });
    $("#passwd_r2,#email_r").on("blur change keyup", function (e) {
        var pw1 = $("#passwd").val();
        var pw2 = $("#passwd_r2").val();
        var a = $(e.target);
        if (pw1 != pw2) {
            console.info(pw1, pw2);
            $("#rg").attr("disabled", "disabled");
            if (e.type == "change" || e.type == "blur") {
                active_error("Las contraseñas no conciden");
            }
            return false;
        } else {
            $("#rg").attr("disabled", false);
            if (e.type == "change" || e.type == "blur") {
                active_error("");
            }
        }
        if ((pw1.length > 1 && pw1.length <= 6) || (pw2.length > 1 && pw2.length <= 6)) {
            active_error("Las contraseñas deben tener mínimo 6 caracteres.");
            return false;
        }
        if (a.attr("id") == "email_r" & a.val().length > 0) {
            if (e.type == "change" || e.type == "blur") {
                if (!validate_email(a.val())) {
                    active_error("El correo electronico ingresado no es valido");
                    return false;
                }
                else {
                    active_error("");
                }
            }
        }
    });

    $("#rememberpw").click(function (e) {
        $("#lg_screen").hide(300)
        $("#rp_screen").show(300)
        // $("#lg_screen").siblings().eq(0).text("Recordar contraseña");
    });

    $("[rpb]").click(function (e) {
        MostrarProcensando(1);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        ajax_rp = $.ajax({
            type: "POST",
            url: "password_restore",
            data: { email: $("[name='email_rec']").val() },
            success: function (response) {
                console.info(response);
                try {
                    var object_messages = JSON.parse(response);
                    swal({
                        title: 'Información',
                        type: object_messages.type,
                        text: object_messages.message,
                    })

                } catch (error) {

                }
            }
        });
    });


    $("[restopw]").click(function (e) {
        var msj = '';
        var id_mensaje = 0;
        console.log($("#email").val().length);
        if ($("#email").val().length > 0 && $("#email").val() != "") {
            if ($("#password").val().length > 0 && $("#password").val() != "") {

                if ($("#password-confirm").val().length > 0 && $("#password-confirm").val() != "") {
                    if ($("#password").val() == $("#password-confirm").val()) {
                        // alert("deja cambiar");
                        msj = 'Desea reiniciar la contrasena de su cuenta ?';
                        id_mensaje = 1;
                    } else {
                        msj = 'Las contrasenas no coinciden';
                    }
                } else {
                    // por favor verifique la contrasena
                    msj = 'Por favor verifique la contrasena';
                }
            }
            else {
                console.log('www111');
                //ingrese la nueva contrasena
                msj = 'Ingrese la nueva contrasena';
            }
        }
        swal({
            title: 'Información',
            text: msj,
            type: id_mensaje === 1 ? 'question' : 'error',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            showCancelButton: id_mensaje === 1 ? true : false,
        }).then((result) => {
            if (id_mensaje === 1) {
                // if (result.value == true) {
                console.log(id_mensaje, result);
                vue_global.ajax_peticion('../changepassword', { email: $("#email").val(), password: $("#password").val() }, [(respuesta) => {
                    console.log(respuesta);
                    if (respuesta) {
                        if (respuesta.type == 1) {

                            swal({
                                title: 'Información',
                                text: respuesta.message,
                                type: respuesta.type === 1 ? 'success' : 'error',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar',
                                cancelButtonText: 'Cancelar',
                                showCancelButton: false,
                            }).then((result) => {
                                if (respuesta.type === 1) {
                                    location.href = '/login';
                                }
                            })

                        }
                    }
                }]);

                /*  $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });
 
                 ajax_rp = $.ajax({
                     type: "POST",
                     url: "../changepassword",
                     data: null,
                     success: function (response) {
                         console.info(response);
 
                     }
                 }); */

                // }
            }

        })

    });
});

function switch_login_screen(id) {
    if (id == 1) {
        // $("#lg_screen").siblings().eq(0).text("Registro de usuarios");
        $("#rg_screen").show(300)
        $("#lg_screen").hide(300)
    } else {
        $("#rg_screen").hide(300)
        $("#lg_screen").show(300)
        $("#rp_screen").hide(300)
    }
}

function active_error(mensaje) {
    if (mensaje.length <= 0) {
        $("#error").hide();
        $("#rg").attr("disabled", false);

    } else {
        $("#error").show();
        $("#rg").attr("disabled", "disabled");
    }
    $("#error").find("em").text("Error: " + mensaje);
}

function validate_email(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}