<?php   

$fechaSalida = $_POST['fechaSalida'];
$horaSalida = $_POST['horaSalida'];
$nPlazas   = $_POST['nPlazas'];
$destino  = $_POST['destino'];
$horaLlegada = $_POST['horaLlegada'];
$fechaLlegada = $_POST['fechaLlegada'];
$precio = $_POST['precio'];
$origen = $_POST['origen'];

session_start();
$conductorID = $_SESSION['id'];
$tablaViajesModelo = new TablaViajes();
$tablaViajesModelo->añadirViaje($fechaSalida,$horaSalida,$nPlazas,$conductorID,$origen,$destino,$precio,$fechaLlegada,$horaLlegada);


class TablaViajes
{
    var $db = null;
    
	// Creamos uno conexión a la base de datos
    function __construct() {
        $db_host = "localhost";
        $db_name = "bycardb";
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
    
	// Añadimos un usuario habiéndonos conectado antes
    public function añadirViaje($fechaSalida,$horaSalida,$nPlazas,$conductorID,$origen,$destino,$precio,$fechaLlegada,$horaLlegada)
    {
        // Comprobamos si estamos conectados a la db
        if ( is_null($this->db) ){
            $this->__construct();
        }
        
        // Formateamos la fecha
        $fechaSalida = strtotime($fechaSalida);
        $horaSalida = strtotime($horaSalida);
        $fechaHoraSalida= '"' . date("Y-m-d", $fechaSalida) . ' ' . date("h:i:sa", $horaSalida) . '"';
        $fechaHoraLlegada = '"' . date("Y-m-d", strtotime($fechaLlegada)) . ' ' . date("h:i:sa", strtotime($horaLlegada)) . '"';
        
        
        $nPlazas = '"' . $nPlazas . '"';
        $conductorID = '"' . $conductorID . '"';
        $origen = '"' . $origen . '"';
        $destino = '"' . $destino . '"';


        $sql = 'INSERT INTO viajes ( horaSalida,conductorID,
        nPlazas, origen, destino, precio, horaLlegada)     VALUES ( '  
        .$fechaHoraSalida   .'
        ,' .$conductorID .'
        ,' .$nPlazas     .'
        ,' .$origen      .'
        ,' .$destino     .'
        ,' .$precio     .'
        ,' .$fechaHoraLlegada .'
        )';

        
        $usuario = $this->db->query($sql);            
    }
}


?>