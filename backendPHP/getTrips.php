<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "byCarDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT * FROM pasajerosviaje WHERE idPasajero=".$q;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql2="SELECT * FROM viajes WHERE id=".$row["idViaje"];
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			echo "<label id='".$row2["id"]."' class='clickable'>";
			echo $row2["id"]." ".$row2["horaSalida"]." ".$row2["precio"]." ".$row2["conductorID"]."</label> <br>";
		}
		
	}
}



$conn->close();
?>
</body>
</html>