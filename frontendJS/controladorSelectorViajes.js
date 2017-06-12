var SESSION = {};
SESSION.id = null;
SESSION.name = null;
SESSION.flag = null;


$(document).ready(function() {
	
	getAvaliableCitys();
	$("#resBusqueda").hide();
	checkForSession();

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
	var lista = createCommentsList(rowdata);
	var builder = type +
	"<div class='cuadroViaje'>"+
	"<span class='titulo'>"+ rowdata.origen +"-"+ rowdata.destino +"</span>"+
	"<span>Hola salida:" + rowdata.horaSalida +"</span>"+
	"<span class='precio'>"+rowdata.precio+"€</span>"+
	"<span class='valoracion'>Valoracion Conductor: "+rowdata.valoracion+"</span>"+
	"</div>"+
	"<div><ul aria-label='Comentarios sobre este Conductor'>"+lista+"</ul></div>"
	"</a>";

	return builder;
}
function createCommentsList(rowdata){

	var builder = "";

	for (var i = 0; i < rowdata.ultimos_comentarios.length; i++) {
		builder = builder + "<li>"+rowdata.ultimos_comentarios[i].comentario+"</li>";
	}
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
	if(SESSION.flag == 0){
		setUserInTrip(SESSION.id, id);
	}else{
		alert("Inice sesion como pasajero para poder reservar");
	}
}
function setUserInTrip(user_id,trip_id){
	$.ajax({
		type: "post",
		url: "backendPHP/registrarUsuarioEnViaje.php",
		dataType: "text",
		data:{
			trip_id_: trip_id,
			user_id_: user_id,
		},
		success:function(data) {
			if(data==-1){
				alert("ya estas en este viaje, user: "+user_id +", trip:"+trip_id);
			}else{
				alert("Viaje reservado!, user: "+user_id +", trip:"+trip_id);
				loadPersonalPage();
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
	});
}

//Mira  a ver si hay alguna session inciada, si es asi muestra al user en la barrita de arriba
function checkForSession() {

	$.ajax({
		type: "post",
		dataType: "JSON",
		url: "backendPHP/checkSession.php",	
		success: function(data){

			SESSION.id = data.id;
			SESSION.name = data.usuarioActual;
			SESSION.flag = data.flag;

			manageLogginElements(data);

		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
	});
}
function manageLogginElements(data) {
	var tipo;

	if(data.flag == 0){
		tipo = "Pasajero";
	}else if(data.flag == 1){
		tipo = "Conductor";
	}else if(data.flag == 2){
		tipo = "Admin";
	}else{
		tipo = "Unknown type";
	}

	if(data.id != null){ //hay alguien logueado

		$('#userinfobox').show();
		$('.enlaces').hide();
		$('#userinfobox').append("<span onclick='userBoxClicked()'><label> Loggeado como:"
			+ data.usuarioActual +
			" identificador: "
			+ data.id +
			" tipo: "
			+ tipo +"</label></span><span class='cerrarSesion' onclick='cerrarSesion()'><label>Cerrar Sesion</label></span>");
	}else{ //No hay nadie logueado

		$('#userinfobox').hide();
		$('.enlaces').show();
	}
}
function userBoxClicked(){
	//Deberia de pasar a la pagina de 
	loadPersonalPage();
}
function cerrarSesion(){
	$.get("backendPHP/cerrarSesion.php");
	$('#userinfobox').hide();
	$('.enlaces').show();
}

//Si la sesion esta activa, carga el contenido en la pagina
function loadPersonalPage() {
	if(SESSION.flag == 0){
		window.location.href = "principalP.php";
	}else if(SESSION.flag == 1){
		window.location.href = "principalConductor.php";
	}else if(SESSION.flag == 2){
		window.location.href = "principalAdmin.php";
	}
}