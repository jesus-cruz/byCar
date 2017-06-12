<?php
use byCar\GENERAL_DATABASE;

require_once('databaseSuperClass.php');

$sql = "SELECT fotoPath FROM usuarios WHERE ID=".$_POST['id'];

$manager = new byCar\GENERAL_DATABASE\databaseSuperClass();
echo $manager->executeSQL($sql);

?>