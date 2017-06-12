<?php
$q = intval($_GET['q']);
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

$sql="SELECT * FROM viajes WHERE id=".$q;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
	while($row = $result->fetch_assoc()) {
		$sql2="SELECT * FROM usuarios WHERE id=".$row["conductorID"];
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows > 0) {
                echo "<table id='tablaInfoViaje'>
                <tr>
                <th>ID USUARIO</th>
                <th>NOMBRE USUARIO</th>
                <th>EMAIL</th>
                <th>TELEFONO</th>
                <th>CHAT</th>
                </tr>";
    
			$row2 = $result2->fetch_assoc();
            
              
            echo "<tr>";
			echo "<td>" . $row2["id"] . "</td>";
            echo "<td>" . $row2["nombreUsuario"] . "</td>";
            echo "<td>" . $row2["email"] . "</td> ";
            echo "<td>" . $row2["telefono"] . "</td> ";
            
			// echo "<td>" . "<a href='./chat.php?q=" .$row2['id']. "'> Chat</a>"  . "</td>";
			echo "<td>" . "<button class='boton' onclick='openChatWith(".$row2['id'].")'> Chat </button>" ."</td>";
            
			//echo $row2["id"]." ".$row2["nombreUsuario"]." ".$row2["email"]." ".$row2["telefono"]." <br>";
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
            echo "<tr>";
			echo "<td>" . $row2["id"] . "</td>";
            echo "<td>" . $row2["nombreUsuario"] . "</td>";
            echo "<td>" . " " . "</td> ";
            echo "<td>" . " " . "</td> ";
            
			//echo "<td>" . "<a href='./chat.php?q=" .$row2["id"]. "'> Chat</a>"  . "</td>";
			echo "<td>" . "<button class='boton' onclick='openChatWith(".$row2['id'].")'> Chat </button>" ."</td>";
            
			//echo $row2["id"]." ".$row2["flag"]." ".$row2["nombreUsuario"]." <br>";
		}
		
	}
    echo "</table>";
}




$conn->close();
?>
