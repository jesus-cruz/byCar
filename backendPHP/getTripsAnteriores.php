<?php
$q = intval($_GET['q']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bycardb";
$actual = date(' Y-m-j H:i:s');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
    


$sql="SELECT * FROM pasajerosviaje WHERE idPasajero=".$q;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table id='tablaviajes'>
    <tr>
    <th>ID VIAJE</th>
    <th>HORA SALIDA</th>
    <th>PRECIO</th>
    <th>ID CONDUCTOR</th>
    <th>ANULAR</th>
    </tr>";
    
	while($row = $result->fetch_assoc()) {
		$sql2="SELECT * FROM viajes WHERE id=".$row["idViaje"];
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
            
            $sql3="SELECT * FROM viajes WHERE id=".$row["idViaje"];
		    $result3 = $conn->query($sql3);	
		    if ($result3->num_rows > 0) {
			     $row3 = $result3->fetch_assoc();
                $datetime1 = new DateTime($actual);
                $datetime2 = new DateTime($row3["horaSalida"]);
                if($datetime1 > $datetime2){
            
                    
            
                    echo "<tr>";
                    echo "<td>" . "<label id='".$row2["id"]."' class='clickable'>" . $row2["id"] . "</label>" . "</td>";
                    echo "<td>" . $row2["horaSalida"] . "</td>";
                    echo "<td>" . $row2["precio"] . "</td>";
                    echo "<td>" . $row2["conductorID"] . "</td> ";
                    
                    $diff = $datetime2->diff($datetime1);
                    $hours = $diff->h;
                    $hours = $hours+($diff->days*24);
                    if($hours>24 && $hours<7*24){
                        echo "<td>" . " <a  href='./backendPHP/comentarios.php?q=" .$row2["id"]. "'> Comentar </a> " . "</td>";
                    }
                    else{
                        echo "<td>" . " <label id='nocomment'> Comentar </label> " . "</td>";
                    }
                }
			}	 
		}
		
	}
    echo "</table>";
}



$conn->close();
?>
