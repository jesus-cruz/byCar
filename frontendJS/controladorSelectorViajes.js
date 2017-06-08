$(document).ready(function() {
	getAvaliableCitys();
});

//recupera de la bbdd la lista de las ciudades disponibles y las muestra en los selectores.
function getAvaliableCitys(){

	getAvaliableCitysOrigin();
	getAvaliableCitysDest();

}

function getAvaliableCitysOrigin() {
	$.ajax({
		type: "post",
		url: "backendPHP/buscadorViajes.php",
		data:{ action: "getAvailableCitysOrigin",},
		dataType: "json",
		success: function(data){
			//intsert the JSON into the selector
			data.sort();
			for (var i = data.length - 1; i >= 0; i--) {
				$('#buscarOrigen').append($('<option>', {
					value: data[i].origen,
					text: data[i].origen
				}));
			}
		},
	});
}

function getAvaliableCitysDest(){
	$.ajax({
		type: "post",
		url: "backendPHP/buscadorViajes.php",
		dataType: "json",
		data:{ action:"getAvailableCitysDest",},
		success: function(data){
			//intsert the JSON into the selector
			data.sort();
			for (var i = data.length - 1; i >= 0; i--) {
				$('#buscarDestino').append($('<option>', {
					value: data[i].destino,
					text: data[i].destino
				}));
			}
		},
	});
}

//recuperamos mediante ajax 
function getAvailableTrips() {
	var a = $('#buscarOrigen :selected').text();
	var b = $('#buscarDestino :selected').text();
	
	var date = document.getElementById('buscarFecha').value;
	//YYYY-MM-DD
	var y = date.substring(0,4);
	var m = date.substring(5,7);
	var d = date.substring(8,10);

		$.ajax({
		type: "post",
		url: "backendPHP/buscadorViajes.php",
		dataType: "json",
		data:{  //$_POST['from'], $_POST['to'],$_POST['day'],$_POST['month'],$_POST['year']
			action:"getTrips",
			from: a,
			to: b,
			day: d,
			month: m,
			year: y,
		},
		success: function(data){
			//TODO->añadirlos a la lista que creamos a continuacion.
		},
	});
}