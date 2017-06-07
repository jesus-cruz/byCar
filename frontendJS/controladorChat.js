$(document).ready(function(){
	//Documento preparado
	//Recuperamos mediante ajax todos los chats entre los usuarios
	//getChatMessages();
	//Evento para que el mensaje pase a la lista
	insertMessageInList("asd", "Hola buenas, a que hora le viene bien?");
	$(".mytext").on("keydown", function(event){
		if (event.which == 13){
			var text = $(this).val();
			if (text !== ""){
				insertMessageInList("me", text);              
				$(this).val('');
			}
		}
	});
});

//id_0 -> id del usuario que ejecuta esta llamada
function getChatMessages(id_0,id_1) {
	$.ajax({
		type: "post",
		url: "backendPHP/chat.php",
		data: {	
			action: "GET_MESSAGES", 
			user_id_0:id_0, 
			user_id_1:id_1},
			dataType: "post",
			cache: "false",
			success:function(data){
			//Have to-> decode the JSON
			decodeMessageListAsJSON(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){

		}
	});
}
/*agnade un mensajde de chat a la BBDD*/
function addChatMessage(id_0,id_1,message_){
	$.ajax({
		type: "post",
		url: "backendPHP/chat.php",
		data: {	
			action: "GET_MESSAGES", 
			user_id_0:id_0, 
			user_id_1:id_1,
			message: message_},
			dataType: "post",
			cache: "false",
			success:function(data){

			},
			error: function(XMLHttpRequest, textStatus, errorThrown){

			}
		});
}

/*Descodifica y muestra por pantalla la lista de mensajes enviados*/
function decodeMessageListAsJSON(data) {
	// body...
}

var me = {};
me.avatar = "http://sumedico.com/wp-content/uploads/2017/02/donald_trump_enfermedades.jpg";

var you = {};
you.avatar = "https://s-media-cache-ak0.pinimg.com/736x/76/47/9d/76479dd91dc55c2768ddccfc30a4fbf5.jpg";


/*Interta un mensaje en la pagina.*/
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

function createMessageElementMe(text, date) {

	var HTML_ = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                        '<div class="avatar"><img class="img-circle" style="width:60px ; height:60px;" src="'+ me.avatar +'" /></div>' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';

	addToList(HTML_);
}

function createMessageElementYou(text, date) {

	var HTML_ = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+ date +'</small></p>' +
                            '</div>' +
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:60px" src="'+ you.avatar+ '" /></div>' +                                
                  '</li>';

	addToList(HTML_); 
}

function addToList(element) {
	$('ul').append(element);	
}

function resetChat(){
	$("ul").empty();
}

