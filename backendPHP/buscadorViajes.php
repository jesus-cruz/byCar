<?php


$tablaviajes = new BusquedaViajes();

if(isset($_POST['action']) && !empty($_POST['action'])) {

	$action = $_POST['action'];
	$tablaviajes = new BusquedaViajes();
	
	switch($action) {
		case "getAvailableCitysOrigin": $tablaviajes->getAvailableCitysOrigin();
			break;
		case "getAvailableCitysDest": $tablaviajes->getAvailableCitysDest();
			break;
		case "getTrips": $tablaviajes->getAvailableTrips($_POST['from'], $_POST['to'],
			$_POST['day'], $_POST['month'],$_POST['year'],
			$_POST['minprice'], $_POST['maxprice'],
			$_POST['valoracion']);
			break;
		case "getAllTrips": 
				session_start();
				$tablaviajes->getAllTrips($_SESSION['id']);
			break;
	}

	$tablaviajes->closeConn();
}

class BusquedaViajes 
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

	//Los parametros de fecha deben llevar el siguiente estilo ####-##-##;
	public function getAvailableTrips($from, $to, $day, $month, $year, $minprice, $maxprice, $valoracion)
	{	
		//saca todos los viajes que hacen match con el origne, destino, dia
		$sql = "SELECT * FROM viajes WHERE origen = '" .$from. "' AND destino = '".$to."' AND horaSalida REGEXP '".$year."-".$month."-".$day." ..:..:..' AND precio >= ".$minprice." AND precio <= ".$maxprice."";

		$result = $this->db->query($sql);
		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {

				$row['valoracion'] = $this->getDriverScore($row['conductorID']);
				$row['ultimos_comentarios'] = $this->getLastComments($row['conductorID']);

				if($row['valoracion'] >= $valoracion && $this->getOcuppiedSeatsTrip($row['id']) < $row['nPlazas']){
					array_push($return_arr, $row);
				}
			}
		}
		echo json_encode($return_arr);
	}

	//Usado por el conductor para recuperar sus trayectos
	public function getAllTrips($id){

		$sql = "SELECT * FROM viajes WHERE conductorID= ".$id;

		$result = $this->db->query($sql);
		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				
				$row['pasajeros'] =  $this->getPasajeros($row['id']);
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

		echo json_encode($return_arr,JSON_UNESCAPED_UNICODE);
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

		echo json_encode($return_arr,JSON_UNESCAPED_UNICODE);
	}
	//Saca de la tabla mensajes la puntuacion del conductor con ID dado
	private function getDriverScore($id)
	{
		$sql = "SELECT puntuacion FROM comentarios WHERE conductor =".$id;
		$result = $this->db->query($sql);

		$ret_value = 0;
		$counter = 0;

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				$ret_value = $ret_value + $row['puntuacion'];
				$counter++;
			}
		}

		if($counter == 0){
			return "Nadie ha puntuado a este conductor todavia";	   //Puntuacion por defecto
		}
		return floor($ret_value/$counter); //Redondeo a la baja de todas las puntuaciones
	}

	//Devuelve un array con los ultimos cometarios del coductor
	public function getLastComments($conductor_id)
	{
		$sql = "SELECT comentario FROM comentarios WHERE conductor=".$conductor_id." ORDER BY idComen";
		$result = $this->db->query($sql);
		$retArray = array();
		$counter=0;

		if($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				if($counter==5){
					break;
				}
				array_push($retArray,$row);
				$counter++;
			}
		}

		return $retArray;
	}

	//numero de asientos ocupados para este viaje
	private function getOcuppiedSeatsTrip($id)
	{	
		$result = $this->db->query("SELECT idPasajero FROM pasajerosviaje WHERE idViaje = '".$id."'");
		$ret = $this->db->affected_rows;
		return $ret;
	}
	//Devuelve los pasajeros apuntados en este viaje
	public function getPasajeros($id)
	{
		$result = $this->db->query("SELECT * FROM pasajerosviaje WHERE idViaje = '".$id."'");
		$return_arr = array();

		if ($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {

				$name = mysqli_fetch_assoc($this->db->query("SELECT nombreUsuario FROM usuarios WHERE id=".$row['idPasajero']));
				$row['nombre'] = $name['nombreUsuario'];
				array_push($return_arr, $row);
			}
		}
		return $return_arr;
	}

	public function closeConn()
	{
		$this->db->close();
	}

}
?>