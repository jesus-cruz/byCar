<?php

$nombre = $_POST['nombre'];
$flag   = $_POST['tipo'];
$email  = $_POST['email'];
$passwd = $_POST['password'];
$tlfno = $_POST['telefono'];
$dni = $_POST['dni'];

$tablaUsuariosModelo = new TablaUsuarios();
    //$tablaUsuariosModelo->__construct();
$tablaUsuariosModelo->añadirUsuario($nombre,$flag,$email,$passwd,$tlfno,$dni);


class TablaUsuarios
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

    private function comprobarFlag($flag){
        switch ($flag) {
            // Flag de tipo de usuario Pasajero
            case 0:               
            return true;
            break;
            // Flag de tipo de usuario Conductor
            case 1:
            return true;
            break;
            // Cualquier otro tipo
            default:
            return false;
            break;
        }
    }
    
	// Añadimos un usuario habiéndonos conectado antes
    public function añadirUsuario($nombre,$flag,$email,$passwd,$tlfno,$dni){
        // Comprobamos si estamos conectados a la db
        if ( is_null($this->db) ){
            $this->__construct();
        }
        // Caso de flag erróneo
        if ( !$this->comprobarFlag($flag) ){
            echo -1;
            return;
        }
        
        $nombre = '"' . $nombre . '"';
        $flag = '"' . $flag . '"';
        $email = '"' . $email . '"';
        $passwd = '"' . $passwd . '"';
        $tlfno = '"' . $tlfno . '"';
        $dni = '"' . $dni . '"';
        
        /* Antes de insertar un usuario comprobamos que no haya otro con el mismo 
         * nombre de usuario
         */
        $sql = 'SELECT * FROM usuarios WHERE nombreUsuario=' . $nombre;
        $resultado = $this->db->query($sql);
        // Ya existe un usuario con ese nombre
        if ($resultado->rowCount() > 0) {
            echo -2;
            return;
        }
        else {
            $sql = 'INSERT INTO usuarios ( flag,nombreUsuario,
            email, password, telefono, dni) 
            VALUES ( '  
            .$flag   .'
            ,' .$nombre .'
            ,' .$email  .'
            ,' .$passwd .'
            ,' .$tlfno  .'
            ,' .$dni    .'
            )';

            $usuario = $this->db->query($sql); 
            // Error al formar la query
            if ( $usuario == FALSE){
                echo -3;    
                return;
            // Éxito
            } else {
                echo 1;
                //header("location: ../login.php");
            }
        }       
    }
}


?>