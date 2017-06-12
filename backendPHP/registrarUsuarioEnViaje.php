<?php 
use byCar\GENERAL_DATABASE;

require_once('databaseSuperClass.php');

$sql = "INSERT INTO pasajerosviaje(idViaje, idPasajero) VALUES ('".$_POST['trip_id_']."','".$_POST['user_id_']."');";

$manager = new byCar\GENERAL_DATABASE\databaseSuperClass();
echo $manager->executeSQL($sql);

?>