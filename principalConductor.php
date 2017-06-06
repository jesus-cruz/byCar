<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">       
</head>
    
<head>

</head>

<body>

	<?php
        session_start(); //reanuda la sesion
        
        if( !isset($_SESSION['usuarioActual']) || $_SESSION['flag']!=1 ){ //no hay nada en la sesion o alguien que no es conductor pretende acceder a esta pagina
            header("location: login.php");
        }

    ?>

    <h1 class="tituloPagina"> Buscar un viaje</h1>
    <div class="cajaTexto">
    <label for="buscarOrigen"> Origen </label>
    <input type="text" id="buscarOrigen" name="buscarOrigen"> 

    <label for="destino"> Destino </label> 
    <input type="text" id="destino" name="destino"> 
    
    <label for="fecha"> Fecha</label> 
    <input type="text" id="fecha" name="fecha"><br>
    </div>
    
    <button class="boton" type="button" onclick="">Buscar viaje</button><br>
    
    
    <h1 class="tituloPagina"> Publicar un viaje</h1>
    <div class="cajaTexto">
    <label for="origenViaje"> Origen</label><br>
    <input type="text" id="origenViaje" name="origenViaje"><br>

    <label for="destinoViaje"> Destinos (separados por comas)</label><br>
    <input type="text" id="destino" name="destinoViaje"><br>
    
    <label for="fechaViaje"> Fecha </label><br>
    <input type="text" id="fechaViaje" name="fechaViaje"><br>
    
    <label for="precioV"> Precio</label><br>
    <input type="text" id="precioV" name="precioV"><br>
        
    <label for="precioV"> Plazas </label><br>
    <input type="text" id="plazasV" name="plazasV"><br>
    
    <label for="horaSal"> Hora de salida</label><br>
    <input type="text" id="horaSalida" name="horaSalida"><br>
    
    <label for="horaSal"> Hora de llegada</label><br>
    <input type="text" id="horaLlegada" name="horaLlegada"><br>
    </div> 
    
    <button class="boton" type="button" onclick="">Publicar trayecto</button>

    <a href="backendPHP/cerrarSesion.php">Cerrar sesion</a>
    
    <?php
        //echo"usuario " . $_SESSION['usuarioActual'] . " id-> " . $_SESSION['id'];
    ?> 
</body>



</html>
