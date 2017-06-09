/* Controlador para el registro de un nuevo usuario 
 * Author: jesus-cruz
 */

$(document).ready(function () {
    
    $("#botonRegistrar").click(function() {
       if ( !comprobarCampos() ){
           alert("Por favor, rellene todos los campos");
       } else {
           registrarUsuario();
           subirImagen();
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
        var tfno = $("#telefono");
        localStorage.setItem("tfno",tfno);
        return true;
    }
}

function registrarUsuario(){    
    // Registramos el usuario
    $.ajax({
        type: "POST",
        url: "backendPHP/registrarUsuario.php",
        data: $("#formRegistrarse").serialize(),
        success: function (data) {
            switch(data){
                case '1':
                    alert("Usuario creado con éxito");
                    break;
                case '-1':
                    alert("Tipo de usuario erróneo");
                    break;
                case '-2':
                    alert("Ya existe un usuario con ese nombre");
                    break;
                case '-3':
                    alert("Error en algún parámetro");
                    break;
                default: 
                    alert("Error desconocido");   
                    break;
            }
        }
    });
}

function subirImagen(){  
    $("#formFoto").submit();
}

