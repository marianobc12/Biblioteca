function modificar_cliente() {
    $("#guardar-mod-cliente").fadeIn().prop("disabled", false);
    $("#cancelar-mod-cliente").fadeIn().prop("disabled", false);
    $("#modificar-mod-cliente").hide();
    $("#eliminar-mod-cliente").hide();

    $(".tarjeta-usuario :input").prop("disabled", false);
}

function cancelar_cliente() {
    $("#guardar-mod-cliente").hide();
    $("#cancelar-mod-cliente").hide();
    $("#modificar-mod-cliente").fadeIn();
    $("#eliminar-mod-cliente").fadeIn();
}

function verificar_login() {
    var Dni = document.getElementById("Dni").value;
    var Contraseña = document.getElementById("Contraseña").value;
    if (Dni.length > 8 || Dni.length < 8) {
        document.getElementById("contenido-modal").innerHTML = "El D.N.I tiene que tener 8 caracteres";
        $('#Modal-Alerta').modal();
        return false;
    } else {
        if (Contraseña == "") {
            document.getElementById("contenido-modal").innerHTML = "Ingrese su contraseña";
            $('#Modal-Alerta').modal();
            return false;
        }
    }

}

function cambio_contraseña() {
    $('#Modal-Contraseña').modal();
}