<?php

$puntos=$_POST['star'];
$comentario=$_POST["comentario"];
$q = intval($_GET['q']); //id viaje

$p = new Puntuar();
$p->escribirPuntuacion($puntos, $comentario, $q);


class Puntuar{
    var $conn = null;
    
    function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "bycardb");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
  	}
        
    
    public function escribirPuntuacion($puntos, $comentario, $idViaje){

 
            session_start();
            $comentario= "'" . $comentario . "'";
              
            //sacar el id del conductor que esta haciendo ese viaje para poder meterlo a la bd
            $sql = "SELECT conductorID FROM viajes WHERE id=" . $idViaje;
            $result = $this->conn->query($sql);
            if (!$result) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            if ($result->num_rows >0) {
                $row = $result->fetch_assoc();
                $idConductor =  $row["conductorID"];
            } 

            //escribir todo en al bd
            
                $sql = 'INSERT INTO comentarios (idViaje, comentario, puntuacion, conductor) VALUES ( '  . $idViaje   .',' . $comentario .',' . $puntos  . ',' . $idConductor . ')';
                $resultado = $this->conn->query($sql);
                if(!$resultado){
                    echo "mal";
                }
        else{
                header("location: ../principalP.php");
        }
    } 
    
    
    


}

?>