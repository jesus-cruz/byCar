<?php 
/* Peticion POST a un servicio web ficticio usando JSON
 * la respuesta también será en JSON
 * El login y el password son "prueba", pasamos también el número del móvil
 * Nos devuelve un código aleatorio de 5 cifras
 * Devolvemos al js ese código
 */

    $numeroMovil = $_POST['telefono'];

	$apiMovil = new APIMovil();
	$apiMovil->procesaPeticion();

	class APIMovil{

	// Return a random number which length is always 5
	function getAleatorio(){
		$number = rand ( 0, 99999 );
		echo json_encode(str_pad($number,5,"0", STR_PAD_LEFT));
	}

	public function procesaPeticion(){
		header('Content-type: application/JSON');
		$method = $_SERVER['REQUEST_METHOD'];
		switch ($method) {
			case 'POST':	// 
				$this->getAleatorio();
				break;
			default:
				$this->response(405);
				break;
		}
	}
}

?>
