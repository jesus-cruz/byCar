<?php

use byCar\GENERAL_DATABASE as GDB;
require 'databaseSuperClass.php';

$manager = new GDB\databaseSuperClass();

if($_POST['action']=="delete"){

	$sql = sprintf("DELETE FROM viajes WHERE id='%s'",$_POST['id']);
	echo $sql;

	$ret = $manager->executeSQL($sql);

	echo $ret;


}else if($_POST['action']=="update"){

	$sql = sprintf("UPDATE viajes SET cancelado='1' WHERE id='%s';",$_POST['id']);

	$ret = $manager->executeSQL($sql);

	echo $ret;

}

?>