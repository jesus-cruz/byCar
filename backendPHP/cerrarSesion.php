<?php
    
    session_start(); //reanudar la sesion que este abierta...
    session_destroy();
    header("location: ../login.php");

?>
    
