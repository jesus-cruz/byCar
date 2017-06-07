<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "busseatsmanager";


$GLOBALS['conn'] = new mysqli($servername, $username, $password, $databasename);
// Check connection
if ($GLOBALS['conn']->connect_error) {
	die("Connection failed: " . $GLOBALS['conn']->connect_error);
}

if(isset($_POST['action']) && !empty($_POST['action'])) {

	$action = $_POST['action'];
	switch($action) {
		case "SEND_MESSAGE": sendMessage($_POST['message'], $_POST['user_id_0'], $_POST["user_id_1"]); break;
		case "GET_MESSAGES": getMessagesList($_POST['user_id_0'], $_POST["user_id_1"]); break;
	}
	
	public function sendMessage($message,$id_0, $id_1)
	{
		$sql = "insert into...";
		$GLOBALS['conn']->querry($sql); //Inserta el mensaje enviado en la BBDD
	}

	public function getMessagesList($id_0, $id_1)
	{
		$sql = "SELECT FROM mensages WHERE origen =" . $id_0 . "AND destino=" . $id_1 . "'";
		$list = $GLOBALS['conn']->querry($sql);

		echo json_encode($list);
	}
}
?>