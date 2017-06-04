$(document).ready(function(){
	//Documento preparado
	//Recuperamos mediante ajax todos los chats entre los usuarios
	getChatMessages();
});
//id_0 -> id del usuario que ejecuta esta llamada
function getChatMessages(id_0,id_1) {
	$.ajax({
		type: "post";
		url: "backendPHP/chat.php";
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
function addChatMessage(id_0,id_1,message_){
	$.ajax({
		type: "post";
		url: "backendPHP/chat.php";
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