<?php

if(isset($_POST['action']) && !empty($_POST['action'])) {

	$action = $_POST['action'];
	$chat = new ChatManager();

	switch($action) {
		case "SET_MESSAGE": $chat->sendMessage($_POST['message'], 2 , $_POST["user_id_1"]); //$_SESSION['id']; //HARDCOREADO PARA PRUEBAS
		break;
		case "GET_MESSAGES": $chat->getMessagesList(2 , $_POST["user_id_1"]); //$_SESSION['id']; //HARDCOREADO PARA PRUEBAS
		break;
	}

	$chat->closeConn();
}

class ChatManager 
{
	var $db = null;
	
	function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "bycardb";

		
		$this->db = new mysqli($servername, $username, $password, $databasename);
			// Check connection
		if ($this->db->connect_error) {
			die("Connection failed: " . $this->db->connect_error);
		}

	}

	public function sendMessage($message,$from, $to)
	{

		$message_date = date("Y-m-d H:i:s");
		$message_hash = substr(hash("ripemd160", $from.$to.$message.$message_date),0,60); //Se usan los 60 primeros digitos del hash como id

		$message = substr($message, 0, 140);	//limitamos a 140 caracteres

		$sql = "INSERT INTO mensajes (origen,destino,contenido,idMensaje,horaMensaje) VALUES ('".$from."','".$to."','".$message."','".$message_hash."','".$message_date."')";

		if($this->db->query($sql)){ //Inserta el mensaje enviado en la BBDD
			echo json_encode(array('time' => $message_date,
				'message' => $message, 
			));
		}else{
			echo json_encode(array('errorname' => $this->db->error,));
		}
	}

	public function getMessagesList($from, $to)
	{

		$sql = "SELECT * FROM mensajes WHERE origen ='".$from."' AND destino='".$to."' OR origen ='".$to."' AND destino='".$from."' ORDER BY horaMensaje";
		$result = $this->db->query($sql);

		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($return_arr, $row);
			}
		}
		echo json_encode($return_arr);
	}

	public function closeConn()
	{
		$this->db->close();
	}
}
?>