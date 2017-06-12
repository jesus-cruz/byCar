

<?php
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

$sql="SELECT * FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table id='tablausuarios'>
    <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>BORRAR</th>
    </tr>";
	while($row = $result->fetch_assoc()) {
		
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombreUsuario'] . "</td>";    
        if($row['flag']!=2)
            echo "<td>" . " <label id='".$row["id"]."' class='delete'> delete </label> " . "</td>";
        else
            echo "<td>" . " <label id='".$row["id"]."' class='notdelete'> delete </label> " . "</td>";
        echo "</tr>";
        
			//echo "<br>";
		  
		
	}
    echo "</table>";
}



$conn->close();
?>


