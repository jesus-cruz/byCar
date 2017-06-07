var me = {};
me.avatar = "http://sumedico.com/wp-content/uploads/2017/02/donald_trump_enfermedades.jpg";

var you = {};
you.avatar = "https://s-media-cache-ak0.pinimg.com/736x/76/47/9d/76479dd91dc55c2768ddccfc30a4fbf5.jpg";
you.id = 1; //Harcodeado para testeo;

$(document).ready(function(){
	//Documento preparado
	//Recuperamos mediante ajax todos los chats entre los usuarios
	getChatMessages(you.id);
	//Evento para que el mensaje pase a la lista
	$(".mytext").on("keydown", function(event){
		if (event.which == 13){
			var text = $(this).val();
			if (text !== ""){
				writeMessage(text);              
				$(this).val('');
			}
		}
	});
});

//id_0 -> id del usuario que ejecuta esta llamada
function getChatMessages(other_id) {
	$.ajax({
		type: "post",
		url: "backendPHP/chat.php",
		data: {	
			action: "GET_MESSAGES", 
			user_id_1: other_id,
		},
		dataType: "json",
		cache: "false",
		success:function(data){
			decodeMessageListAsJSON(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
	});
}
/*agnade un mensajde de chat a la BBDD, la fecha se coge por PHP, se le pasa el ID del destinatario*/
function insertChatMessageInDB(other_id,message_){

	$.ajax({
		type: "post",
		url: "backendPHP/chat.php",
		data: {	
			action: "SET_MESSAGE", 
			user_id_1: other_id,
			message: message_ ,
		},
		dataType: "text",
		cache: "false",
		success:function(data){		
			alert(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
		}
	});

}

/*Descodifica y muestra por pantalla la lista de mensajes enviados*/
function decodeMessageListAsJSON(data) {
	var who = "";

	for (var i = 0 ; i < data.length; i++) {
		if(data[i].origen == you.id){
			who = 'other';
		}else{
			who = 'me';
		}
		insertMessageInList(who, data[i].contenido,data[i].horaMensaje);
	}
}


/*Escribe un mensaje en la bbdd y lo inserta en la lista y */
function writeMessage(text){

	insertChatMessageInDB(you.id,text)
	insertMessageInList("me",text);
	

}

/*Solo para testear, funcion no necesario*/
function writeMessageYOU(text){

	if(insertChatMessageInDB(me.id,text)){
		insertMessageInList("you",text);
	}

}

/*Interta un mensaje en la lista visible*/
function insertMessageInList(who, text, date){

	var control = "";
	var date = new Date();

	if(who=="me"){
		createMessageElementMe(text,date);
	}
	else{
		createMessageElementYou(text,date);
	}

}

/*Crea un elemento de tipo mensage y lo añade a la lista*/
function createMessageElementYou(text, date) {

	var HTML_ = '<li style="width:100%;">' +
	'<div class="msj macro">' +
	'<div class="avatar"><img class="img-circle" style="width:60px ; height:60px;" src="'+ you.avatar +'" /></div>' +
	'<div class="text text-l">' +
	'<p>'+ text +'</p>' +
	'<p>'+ date +'</p>' +
	'</div>' +
	'</div>' +
	'</li>';

	addToList(HTML_);
}

function createMessageElementMe(text, date) {

	var HTML_ = '<li style="width:100%;">' +
	'<div class="msj-rta macro">' +
	'<div class="text text-r">' +
	'<p>'+ text +'</p>' +
	'<p>'+ date +'</p>' +
	'</div>' +
	'<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:60px ; height:60px;" src="'+ me.avatar+ '" /></div>' +                                
	'</li>';

	addToList(HTML_); 
}

function addToList(element) {
	$('ul').append(element);	
}

function resetChat(){
	$("ul").empty();
}

