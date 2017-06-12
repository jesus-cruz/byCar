/*  Controlador general de la página del conductor
 *  Autor: jesus-cruz
 *
 *  Puede crear trayectos: precio, número de plazas, origen, destinos, hora de 
 *  salida inicial y de llegada a cada destino además del precio a cada destino
 *
 *  El conductor puede editar los datos o borrarlo si no hay pasajeros, si hay
 *  puede marcarlo como cancelado
 *
 *  Puede ver los pasajeros apuntados, pero no el email o el tfno
 *
 */

$(document).ready(function () {
    // Por defecto mostramos los botones para seleccionar la accion a realizar
    cambiarEstado("vacio");
    
    // Crear un nuevo trayecto
    $("#botonCrear").click(function () {
        cambiarEstado("crear");
    });

    // Listar los trayectos propios
    $("#botonListarTrayectos").click(function () {
        cambiarEstado("listarTrayectos");
    });

    // Listar pasajeros de un trayecto
    $("#botonListarPasajeros").click(function () {
        cambiarEstado("listarPasajeros");
    });

    // Editar un trayecto
    $("#botonEditar").click(function () {
        cambiarEstado("editar");
    });

    // Borrar un trayecto
    $("#botonBorrar").click(function () {
        cambiarEstado("borrar");
    });

    // Cancelar un trayecto
    $("#botonCancelar").click(function () {
        cambiarEstado("cancelar");
    });
      
    
    $("#crearTrayectoForm").click(function () {
        crearTrayecto();
    });
    
    $("#botonAgregarDestino").click(function () {
        agregarDestino();
    });
});

function cambiarEstado(estado) {
    vaciar();
    switch (estado) {
        case "crear":
            $("#cajaCrear").show();
            break;
        case "vacio":
            vaciar();
            break;
        case "listarTrayectos":
            addTrayectosList();
            $('#cajaListarTrayectos').show();
            break;
        default:

    }
}

function vaciar() {
    $("#cajaCrear").hide();
    $("#cajaListarTrayectos").hide();
    $("#cajaListarPasajeros").hide();
    $("#cajaEditar").hide();
    $("#cajaBuscar").hide();
    $("#cajaPublicar").hide();
}

function crearTrayecto() {
    if ( comprobarCampos()){
        // Si hay datos suficientes crearemos el destino
        $.ajax({
        type: "POST",
        url: "backendPHP/guardarViaje.php",
        data: $("#formCrear").serialize(),
        success: function (data) {
            alert("Viaje guardado" + data);
            vaciar();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
        }
    });
    } else {
        alert("Error en los campos, introduzca los necesarios y al menos un destino");
    }
}

function agregarDestino(){
    if ( comprobarCampos()){
        // Si hay datos suficientes crearemos el destino
        $.ajax({
        type: "POST",
        url: "backendPHP/guardarDestino.php",
        data: $("#formCrear").serialize(),
        success: function (data) {
            alert(data);
        }
    });
    } else {
        alert("Error en los campos, introduzca los necesarios y al menos un destino");
    }
    // Primero añadimos el trayecto
    
    // Añadimos al menos una parada, al añadirla limpiamos los campos
}


function comprobarCampos(){
    // Comprobar campos
    return true;
    if( $("#fechaSalida").val()  == "" ||
        $("#nPlazas").val()      == "" ||
        $("#destino").val()      == "" ||
        $("#origen").val()       == "" || 
        $("#horaLlegada").val()  == "" ||
        $("#horaSalida").val()   == "" ||
        $("#fechaLlegada").val() == "" ||
        $("#precio").val()       == "" ){
        return false;
    } else {
        return true;
    }
}

function backToMainPage(){
  window.location.href = "principal.php";
}


function openChatWith(id){
    sessionStorage.setItem('you_id', id);
    window.location.href = "chatPage.php";
}

function addTrayectosList(){

    //Hacemos el ajax para sacar todos los viajes
    $.ajax({
        type: "post",
        url: "backendPHP/buscadorViajes.php",
        data:{ action: "getAllTrips",},
        dataType: "json",
        success: function(data){
           createTrayectosItems(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
        }
    });
}

function createTrayectosItems(data){

    $('#cajaListarTrayectos').empty();
    
    for (var i = 0; i < data.length; i++) {
        var list = createPassengersList(data[i].pasajeros);

        var salida = data[i].horaSalida;
        var llegada = data[i].horaLlegada;
        var npas = data[i].pasajeros.length;

        var builder = '<div class="container">'+
            '<div class="test">'+
                '<div class="variables">'+
                    '<fieldset><form id="form_'+data[i].id+'" name="formCrear">'+
                        '<legend>Informacion del viaje</legend>'+
                        '<span>'+
                            'Fecha de salida:'+
                            '<input type="date" id="fechaSalida_" name="fechaSalida" value="'+salida.substring(0,10)+'">'+
                        '</span>'+
                        '<span>'+
                            'Hora de salida:'+
                            '<input type="text" id="horaLlegada_" name="horaSalida" value="'+salida.substring(11,30)+'">'+
                       '</span>'+
                        '<span>'+
                            'Número de plazas:'+
                            '<input type="text" id="nPlazas_" name="nPlazas" value="'+data[i].nPlazas+'">'+
                        '</span>'+
                        '<span>'+
                            '<label class="ciudades">'+data[i].origen+'</label>'+
                        '</span>'+
                        '<br'+
                        '<span>'+
                            '<label class="ciudades">'+data[i].destino+'</label>'+
                        '</span>'+
                        '<span>'+
                         'Fecha de llegada:'+
                         '<input type="date" id="fechaLlegada_" name="fechaLlegada" value="'+llegada.substring(0,10)+'">'+
                        '</span>'+
                        '<span>'+
                        'Hora de llegada:'+
                            '<input type="text" id="horaLlegada_" name="horaLlegada" value="'+llegada.substring(11,30)+'">'+
                        '</span>'+
                        '<span>'+
                            'Precio:'+
                            '<input type="text" id="precio_" name="precio" value="'+data[i].precio+'">'+
                        '</span>'+
                        '<input type="text" id="hidden" name="id" value="'+data[i].id+'">'+

                '</form></fieldset>'+
            '</div>'+
            '<div>'+
             '<button class="cancel" onclick="cancelTrip('+data[i].id+','+npas+')"> Cancelar viaje. </button>'+
             '<button class="cancel accept" onclick="saveChanges('+data[i].id+')"> Guardar Cambios. </button>'+
         '</div>'+
         '<div>'+
            '<div class="test">'+
                '<ul>'+
                 list+
                '</ul>'+
                '<div>'+
                '</div>'+

            '</div>'+
        '</div>';
        $('#cajaListarTrayectos').append(builder);
    }
}

function createPassengersList(pasajeros) {
    var builder="";
    if(pasajeros.length==0){
        return "<li>No hay ningun pasajero en este viaje</li>";
    }

    for (var i = 0; i < pasajeros.length; i++) {

        builder = builder + '<li onclick="openChatWith('+ pasajeros[i].idPasajero +')">Pasajero '+ pasajeros[i].nombre +'</li>'
    }
    return builder;
}

function cancelTrip(id,num_pasajeros){
    
    var action="";
    if(num_pasajeros==0){
        action = "delete"; //Lo borramos como cancelado
    }else{
        action= "update"; //Lo marcamos como cancelado
    }

     $.ajax({
        type: "POST",
        url: "backendPHP/borrarModificarViaje.php",
        data:{
            action:action,
            id:id,
        },
           
        success: function (data) {
            if(num_pasajeros==0){
                alert("Viaje borrado");
            }else{
                alert("Viaje marcado como cancelado");
            }
            vaciar();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
        },
    });
}

function saveChanges(id){

    $.ajax({
        type: "POST",
        url: "backendPHP/actualizarViaje.php",
        data: $("#form_"+id).serialize(),
           
        success: function (data) {
            alert("Cambios guardados");
            vaciar();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
        },
    });
}















