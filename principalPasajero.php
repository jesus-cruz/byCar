<!DOCTYPE html>
<html>

<header>
    <link rel="stylesheet" type="text/css" href="styles.css">
</header>

<body>

	    <?php
        session_start(); //reanuda la sesion
        
        if( !isset($_SESSION['usuarioActual'])  ||  $_SESSION['flag']!=0 ){ //no hay nada en la sesion o alguien que no es pasajero pretende acceder a esta pagina
            header("location: login.php");
        }

    ?>
    
    
    <div class="cajaTexto">
        <label for="buscarOrigen"> De</label><br>
        <input type="text" id="buscarOrigen" name="buscarOrigen"><br>

        <label for="destino"> A</label><br>
        <input type="text" id="destino" name="destino"><br>

        <label for="fecha"> Fecha</label><br>
        <input type="text" id="fecha" name="fecha"><br>
    <br>
    <button type="button" onclick="">Buscar viaje</button>
    
    <h2>Puntuar viaje</h2>
    <input type="text" id="buscarViaje" name="buscarViaje"><br>
    
    
    <a href="backendPHP/cerrarSesion.php">Cerrar sesion</a><br>
    </div> 
    <?php
       // echo"usuario " . $_SESSION["usuarioActual"] . " id ->" . $_SESSION['id'];
    ?>
    
</body>

</html>
