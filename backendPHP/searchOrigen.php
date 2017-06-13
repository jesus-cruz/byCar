<?php
$q = intval($_GET['q']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bycardb";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql="SELECT * FROM viajes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()){ 
    		echo "<option value='".$row['origen']."'>".$row['origen']."</option>";
	}
}

$conn->close();
?>
