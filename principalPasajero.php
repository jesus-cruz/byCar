<!DOCTYPE html>
<html>

<head>

</head>

<body>

	    <?php
        session_start(); //reanuda la sesion
        
        if( !isset($_SESSION['usuarioActual'])  ||  $_SESSION['flag']!=0 ){ //no hay nada en la sesion o alguien que no es pasajero pretende acceder a esta pagina
            header("location: login.php");
        }

    ?>
    

    <label for="buscarOrigen"> De</label>
    <input type="text" id="buscarOrigen" name="buscarOrigen">

    <label for="destino"> A</label>
    <input type="text" id="destino" name="destino">
    
    <label for="fecha"> Fecha</label>
    <input type="text" id="fecha" name="fecha">
    
    
    <button type="button" onclick="">Buscar viaje</button>
    
    <a href="backendPHP/cerrarSesion.php">Cerrar sesion</a>
    
    <?php
       // echo"usuario " . $_SESSION["usuarioActual"] . " id ->" . $_SESSION['id'];
    ?>

</body>

</html>
