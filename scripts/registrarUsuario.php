<?php   
    $nombre = $_POST['nombre'];
    $email  = $_POST['email'];
    $passwd = $_POST['password'];
    $tlfno = $_POST['telefono'];
    $dni = $_POST['dni'];

    $tablaUsuariosModelo = new TablaUsuarios();
    //$tablaUsuariosModelo->__construct();
    $tablaUsuariosModelo->añadirUsuario($nombre,$email,$passwd,$tlfno,$dni);
    

class TablaUsuarios
{
    var $db = null;
    
	// Creamos uno conexión a la base de datos
	function __construct() {
        $db_host = "localhost";
        $db_name = "database";
        $db_user = "root";
        $db_pass = "";

        try  {
            $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
   	}

	// Añadimos un usuario habiéndonos conectado antes
	public function añadirUsuario($nombre,$email,$passwd,$tlfno,$dni){
        if ( is_null($this->db) ){
            $this->__construct();
        }
        $nombre = '"' . $nombre . '"';
        $email = '"' . $email . '"';
        $passwd = '"' . $passwd . '"';
        $tlfno = '"' . $tlfno . '"';
        $dni = '"' . $dni . '"';
        
        $usuario= $this->db->query('INSERT INTO Usuarios ( nombreUsuario,
        email, password, telefono, dni) 
            VALUES ( '  
                   .$nombre .'
                ,' .$email .'
                ,' .$passwd .'
                ,' .$tlfno .'
                ,' .$dni .')');
        }
}


?>