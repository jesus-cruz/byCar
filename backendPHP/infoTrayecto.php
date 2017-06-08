<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT * FROM viajes WHERE id=".$q;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql2="SELECT * FROM usuarios WHERE id=".$row["conductorID"];
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			echo $row2["id"]." ".$row2["flag"]." ".$row2["nombreUsuario"]." ".$row2["email"]." ".$row2["telefono"]." <br>";
		}
		
	}
}

$conn->close();


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql="SELECT * FROM pasajerosviaje WHERE idViaje=".$q;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql2="SELECT * FROM usuarios WHERE id=".$row["idPasajero"];
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			echo $row2["id"]." ".$row2["flag"]." ".$row2["nombreUsuario"]." <br>";
		}
		
	}
}




$conn->close();
?>
</body>
</html>