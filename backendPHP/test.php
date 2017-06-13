<?php
use PHPUnit\Framework\TestCase;


class MyClassTest extends TestCase {

    public function testDDBB()
    {
        $conn = new mysqli("localhost", "root", "", "bycardb");
        // Check connection
        $this->assertFalse($conn->connect_error);
        $this->assertTrue(!$conn->connect_error);
    }

    public function testDatetimeDiff()
    {
        $datetime1 = new DateTime('2017-06-09 22:00:00');
        $datetime2 = new DateTime('2017-06-10 22:00:00');
        
        $this->assertTrue($datetime1<$datetime2);
    }

    public function testPuntuaciones()
    {
        $p = new Puntuar();
        $p->escribirPuntuacion(3, 'dsfss', 3);
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT conductorID FROM viajes WHERE id=" . $idViaje;
        $result = $this->conn->query($sql);
        $this->assertEquals (1,$result->num_rows);    
    }

    public function testGeneral()
    {
    	$manager = new databaseSuperClass();
    	$result = $manager->executeSQL('SELECT * FROM viajes');

    	$this->assertTrue($result>=1);
    }
}
?>