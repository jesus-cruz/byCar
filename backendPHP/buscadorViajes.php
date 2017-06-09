<?php



if(isset($_POST['action']) && !empty($_POST['action'])) {

	$action = $_POST['action'];
	$tablaviajes = new BusquedaViajes();

	switch($action) {
		case "getAvailableCitysOrigin": $tablaviajes->getAvailableCitysOrigin();
		break;
		case "getAvailableCitysDest": $tablaviajes->getAvailableCitysDest();
		break;
		case "getTrips": $tablaviajes->getAvailableTrips($_POST['from'], $_POST['to'],$_POST['day'],$_POST['month'],$_POST['year']);
		break;
	}
	
}


class BusquedaViajes 
{

	var $db = null;

	function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "byCarDB";

		
		$this->db = new mysqli($servername, $username, $password, $databasename);
			// Check connection
		if ($this->db->connect_error) {
			die("Connection failed: " . $this->db->connect_error);
		}
		
	}        

	//Los parametros de fecha deben llevar el siguiente estilo ####-##-##;
	public function getAvailableTrips($from, $to, $day , $month, $agno)
	{
		$sql = "SELECT * FROM viajes WHERE origen = '" .$from. "' AND destino = '".$to."' AND horaSalida REGEX '"
		.$year."-".$month."-".$day." ..:..:..'";

		$result = $this->db->query($sql);
		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($return_arr, $row);
			}
		}
		echo json_encode($return_arr);
	}

	public function getAvailableCitysOrigin(){

		$sql = "SELECT origen FROM viajes";
		$result = $this->db->query($sql);
		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($return_arr, $row);
			}
		}

		echo json_encode($return_arr);
	}

	public function getAvailableCitysDest()
	{
		$sql = "SELECT destino FROM viajes";
		$result = $this->db->query($sql);
		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($return_arr, $row);
			}
		}

		echo json_encode($return_arr);
	}
}
?>