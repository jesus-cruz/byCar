<?php 

echo json_encode($_POST);

$tabla = new ActualizarViaje();
$tabla->updateTrip($_POST['id'],
	$_POST['fechaSalida'],
	$_POST['horaSalida'],
	$_POST['nPlazas'],
	$_POST['horaLlegada'],
	$_POST['fechaLlegada'],
	$_POST['precio']);

class ActualizarViaje 
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

	public function updateTrip($id,$fechaSalida,$horaSalida,$nPlazas,$horaLlegada,$fechaLlegada,$precio)
    {
        $sql = sprintf("UPDATE viajes SET horaSalida='%s',horaLlegada='%s',nPlazas='%s',precio='%s' WHERE id = '%s'",
        	$fechaSalida." ".$horaSalida,$fechaLlegada." ".$horaLlegada, $nPlazas, $precio, $id);
        echo $sql;
        $this->db->query($sql);
    }
}
?>