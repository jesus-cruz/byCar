$(document).ready(function () {
    var tfno = localStorage.getItem("tfno");
    $("#telefono").val(tfno)
    $("#telefono").prop("readonly", true);
    verificarMovil(tfno);   
});
    


function verificarMovil(){
    // Script en php llamado en un servicio web, formato JSON de envio y respuesta
    // POST desde php
    // El login y el passsword del servicio es prueba, tb pasamos el movil
    // Devuelve un codigo aleatorio de 5 cifras y lo escribimos en el html con js
    $.ajax({
        type: "POST",
        url: "backendPHP/verificarMovil.php",
        data: $("#telefono").serialize(),
        success: function (data) {
            // Nos devuelve el código a introducir y lo escribimos 
            $("#campoCodigo").val(data.replace(/"/g,''));
        }
    });
}