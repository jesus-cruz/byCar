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
    
}


























