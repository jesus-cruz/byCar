<?php   
    $horaSalida = $_POST['horaSalida'];
    $nPlazas   = $_POST['nPlazas'];
    $destino  = $_POST['destino'];
    $horaLlegada = $_POST['horaLlegada'];
    $precio = $_POST['precio'];

    session_start();
    $conductorID = $_SESSION['id'];

    $tablaViajesModelo = new TablaViajes();
    $idViaje = $tablaViajesModelo->obtenerIdViaje($nPlazas,$conductorID);
    $tablaViajesModelo->añadirParada($destino,$horaLlegada,$idViaje,$precio);

class TablaViajes
{
    var $db = null;
    
	// Creamos uno conexión a la base de datos
	function __construct() {
        $db_host = "localhost";
        $db_name = "byCarDB";
        $db_user = "root";
        $db_pass = "";

        try  {
            $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
   	}

    // Hay problemas con la hora, de momento usare el numero de plazas
    public function obtenerIdViaje($nPlazas,$conductorID){
        $nPlazas = '"' . $nPlazas . '"';
        $conductorID = '"' . $conductorID . '"';
        $sql = 'SELECT id FROM viajes WHERE  (nPlazas='
            . $nPlazas 
            . ' AND conductorID='
            . $conductorID 
            .')';
        
        $result = $this->db->query($sql); 

        $result = $result->fetch(PDO::FETCH_BOTH);
        $result = $result[0];
        
        return $result;
    }
    //INSERT INTO paradas ( idViaje,precioParada) VALUES ( 15,25)
    public function añadirParada($destino,$horaLlegada,$idViaje,$precio){
        $destino = '"' . $destino . '"';
        $horaLlegada = '"' . $horaLlegada . '"';
        $idViaje = '"' . $idViaje . '"';
        $precio = '"' . $precio . '"';
        $sql = 'INSERT INTO paradas ( ciudadParada, idViaje,
        precioParada)     VALUES ( '  
                       .$destino    .'
                    ,' .$idViaje    .'
                    ,' .$precio    .'
                    )';
        
        $usuario = $this->db->query($sql);  
    }

}


?>