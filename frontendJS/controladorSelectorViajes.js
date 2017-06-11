$(document).ready(function() {
	
	getAvaliableCitys();
	$("#resBusqueda").hide();

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
			var lst = [];
			for (var i = 0; i < data.length; i++) {
				if($.inArray(data[i].origen, lst) === -1){
					lst.push(data[i].origen);
				}
			}
			addElementsInListToSelector('#buscarOrigen',lst);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
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
			var lst = [];
			for (var i = 0; i < data.length; i++) {
				if($.inArray(data[i].destino, lst) === -1){
					lst.push(data[i].destino);
				}
			}
			addElementsInListToSelector('#buscarDestino',lst);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
	});
}

//añade los elementos de la lista a el selector con el id que toma como argumento
function addElementsInListToSelector(id,lst) {

	lst.sort();
	for (var i = 0; i < lst.length; i++) {
		$(id).append($('<option>', {
			value: lst[i],
			text: lst[i]
		}));
	}
}

//recuperamos mediante ajax 
function getAvailableTrips() {

	clearTripList();


	var from_ = $('#buscarOrigen :selected').text();
	var to_ = $('#buscarDestino :selected').text();
	
	var date = document.getElementById('buscarFecha').value; //YYYY-MM-DD

	var year_ = date.substring(0,4);
	var month_ = date.substring(5,7);
	var day_ = date.substring(8,10);

	var minprice_ = $('#buscarPrecioMin :selected').text();
	if(minprice_ == "Precio Minimo"){
		minprice_ = "0"; 
	}

	var maxprice_ = $('#buscarPrecioMax :selected').text();
	if(maxprice_ == "Precio Maximo"){
		maxprice_ = "10000"; 
	}

	var valoracion_ = $('#buscarValoracion :selected').text();
	if(valoracion_ == "Valoracion del Conductor"){
		valoracion_ = "1";
	}

	//$_POST['from'], $_POST['to'],$_POST['day'],$_POST['month'],$_POST['year'], $_POST['minprice'], $_POST['maxprice'], $_POST['valoracion'];
	$.ajax({
		type: "post",
		url: "backendPHP/buscadorViajes.php",
		dataType: "json",
		data:{  		
		action: "getTrips",
		from: from_,
		to: to_,
		day: day_,
		month: month_,
		year: year_,
		minprice : minprice_,
		maxprice : maxprice_,
		valoracion : valoracion_,
	},
	success: function(data){
			
			var builder = '<a href="#" class="list-group-item list-group-item-danger">No hay ningun viaje disponible para los datos de busqueda introducidos</a>'
			if(data.length == 0){
				addTripToList(builder);
			}

			for (var i = 0; i < data.length; i++) {
				builder = createElementBulder(data[i]);
				addTripToList(builder);
			}
			window.scrollTo(0,document.body.scrollHeight);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
	});

	
}
function createElementBulder(rowdata) {

	var type = "";
	var paradas = "";
	if(rowdata.precio < 10){
		type = "<a href='#' class='list-group-item list-group-item-success' onclick='tripSelected("+rowdata.id+")' >";
	}else if(rowdata.precio < 30){
		type = "<a href='#' class='list-group-item list-group-item-warning' onclick='tripSelected("+rowdata.id+")'>"
	}else{
		type = "<a href='#' class='list-group-item list-group-item-danger' onclick='tripSelected("+rowdata.id+")'>"
	}

	var builder = type +
                "<div class='cuadroViaje'>"+
                    "<span class='titulo'>"+ rowdata.origen +"-"+ rowdata.destino +"</span>"+
                    "<span>Hola salida:" + rowdata.horaSalida +"</span>"+
                  //  "<span>Hola llegada:" 00:00:00"</span>"+
                   	"<span class='precio'>"+rowdata.precio+"€</span>"+
                    "<span class='valoracion'>Valoracion Conductor: "+rowdata.valoracion+"</span>"+
                "</div>"+
            "</a>";

    return builder;
}


function addTripToList(element) {
	$('#resBusqueda').append(element);
}
function clearTripList(argument) {
	$('#resBusqueda').empty();
	$("#resBusqueda").show();
}

function tripSelected(id){
	alert("Cicked "+id);
}
//TODO-> añadir una llamada de ajax para que cuando clickes osbre un viaje se te apunte el $SESSION_ que estas logqueasfsea