<?php

namespace byCar\GENERAL_DATABASE;

class databaseSuperClass
{

	var $db = null;

	function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "bycardb";


		$this->db = new \mysqli($servername, $username, $password, $databasename);
		// Check connection
		if ($this->db->connect_error) {
			die("Connection failed: " . $this->db->connect_error);
		}

	}

	//Ejecuta una sentencia SQL y devuelve el numero de filas afectadas
	public function executeSQL($sql)
	{
		$this->db->query($sql);
		return $this->db->affected_rows;
	}
	
	public function closeConn()
	{
		$this->db->close();
	}
}
?>