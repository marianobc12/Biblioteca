function Validar_Usuario(){
    var Dni=document.getElementById('Dni').value;
    if (Dni==""){
        document.getElementById('contenido-modal').innerHTML="Ingrese el D.N.I";
        $('#Modal-Alerta').modal('show');
        return false;
    }
}