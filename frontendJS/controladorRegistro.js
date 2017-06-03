/* Controlador para el registro de un nuevo usuario 
 * Author: jesus-cruz
 */

$(document).ready(function () {
    
    $("#botonRegistrar").click(function() {
       if ( !comprobarCampos() ){
           alert("Por favor, rellene todos los campos");
       } else {
           registrarUsuario();
       }
    });    
});
    

function comprobarCampos(){
    // Comprobamos los campos
    if( $("#nombre").val()   == "" ||
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
    
    $.ajax({
        type: "POST",
        url: "scripts/registrarUsuario.php",
        data: $("#formRegistrarse").serialize(),
        success: function (data) {
            alert(data);
        }
    });
    
    
}