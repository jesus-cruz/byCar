/* Controlador para el registro de un nuevo usuario 
 * Author: jesus-cruz
 */

$(document).ready(function () {
    
    $("#botonRegistrar").click(function() {
       if ( !comprobarCampos() ){
           alert("Por favor, rellene todos los campos");
       } else {
           registrarUsuario();
           verificarMovil();
       }
    });    
});
    

function comprobarCampos(){
    // Comprobamos los campos
    if( $("#nombre").val()   == "" ||
        $("#tipo").val()     == "" ||
        $("#email").val()    == "" || 
        $("#password").val() == "" ||
        $("#telefono").val() == "" ||
        $("#dni").val()      == "" ||
        $("#foto").val()     == "" ){
        return false;
    } else {
        return true;
    }
}

function registrarUsuario(){    
    // Registramos el teléfono
    $.ajax({
        type: "POST",
        url: "backendPHP/registrarUsuario.php",
        data: $("#formRegistrarse").serialize(),
        success: function (data) {
            alert(data);
        }
    });
}

function verificarMovil(){
    // Script en php llamado en un servicio web, formato JSON de envio y respuesta
    // POST desde php
    // El login y el passsword del servicio es prueba, tb pasamos el movil
    // Devuelve un codigo aleatorio de 5 cifras y lo escribimos en el html con js
}