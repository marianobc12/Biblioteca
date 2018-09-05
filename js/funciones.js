function modificar_cliente() {
    $("#guardar-mod-cliente").fadeIn();
    $("#cancelar-mod-cliente").fadeIn();
    $("#modificar-mod-cliente").hide();
    $("#eliminar-mod-cliente").hide();
    $(".tarjeta-usuario :input:not([type=button])").prop("disabled", false);
}

function cancelar_cliente() {
    $("#guardar-mod-cliente").hide();
    $("#cancelar-mod-cliente").hide();
    $("#modificar-mod-cliente").fadeIn();
    $("#eliminar-mod-cliente").fadeIn();
    $(".tarjeta-usuario :input:not([type=button])").prop("disabled", true);
}


function modificar_libro() {
    $("#guardar-mod-libro").fadeIn();
    $("#cancelar-mod-libro").fadeIn();
    $("#modificar-mod-libro").hide();
    $("#eliminar-mod-libro").hide();
    $(".tarjeta-usuario :input:not([type=button])").prop("disabled", false);
}

function cancelar_libro() {
    $("#guardar-mod-libro").hide();
    $("#cancelar-mod-libro").hide();
    $("#modificar-mod-libro").fadeIn();
    $("#eliminar-mod-libro").fadeIn();
    $(".tarjeta-usuario :input:not([type=button])").prop("disabled", true);
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

function eliminar_usuario() {
    $('#Modal-Eliminar_Usuario').modal();
}

function eliminar_libro() {
    $('#Modal-Eliminar_Libro').modal();
}

function eliminar_prestamo(){
    $('#Modal-Eliminar-Prestamo').modal();
}

function verificar_contraseña(){
    var contraseña1=document.getElementById("Contraseña_Nueva1").value;
    var contraseña2=document.getElementById("Contraseña_Nueva2").value;
    if (contraseña1!=contraseña2) {
        document.getElementById("aviso-error-contra").style.display="block";
        return false;
    }else{
        return true;
    }
    
}