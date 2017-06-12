
<?php
$q = intval($_GET['q']);
$s = intval($_GET['s']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bycardb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="DELETE FROM pasajerosviaje WHERE idPasajero=".$s." AND idViaje=".$q; 
$result = $conn->query($sql);




$conn->close();
?>


