<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "database";

session_start();

$GLOBALS['conn'] = new mysqli($servername, $username, $password, $databasename);
// Check connection
if ($GLOBALS['conn']->connect_error) {
	die("Connection failed: " . $GLOBALS['conn']->connect_error);
}

if(isset($_POST['action']) && !empty($_POST['action'])) {

	$action = $_POST['action'];

	switch($action) {
		case "SET_MESSAGE": sendMessage($_POST['message'], 2 , $_POST["user_id_1"]); //$_SESSION['id']; //HARDCOREADO PARA PRUEBAS
		break;
		case "GET_MESSAGES": getMessagesList(2 , $_POST["user_id_1"]); //$_SESSION['id']; //HARDCOREADO PARA PRUEBAS
		break;
	}
	
}
$GLOBALS['conn']->close();

function sendMessage($message,$from, $to)
{

	$message = substr($message, 0, 140);	//limitamos a 140 caracteres

	$sql = "INSERT INTO Mensajes (origen, destino, contenido, horaMensaje) VALUES ('".$from."','".$to."','".$message."','".date("Y-m-d H:i:s")."')";

	if($GLOBALS['conn']->query($sql)){ //Inserta el mensaje enviado en la BBDD
		echo "Exito";
	}else{
		echo $GLOBALS['conn']->error;
	}
}

function getMessagesList($from, $to)
{

	$sql = "SELECT * FROM Mensajes WHERE origen ='".$from."' AND destino='".$to."' OR origen ='".$to."' AND destino='".$from."'";
	$result = $GLOBALS['conn']->query($sql);

	$return_arr = array();

	if ($result->num_rows > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($return_arr, $row);
		}
	}
	echo json_encode($return_arr);
}
?>