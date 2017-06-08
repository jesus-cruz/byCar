<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="styles.css">
</header>

<head>
    <title>Buscador de viajes</title>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<script src="testKeanu.js"></script>
</head>

<body>
    <h1 class=tituloPagina>Buscador de viajes</h1>
    <p class="textoPresentacion">Bienvenido a nuestro buscador de vehículos compartidos, a continuación 
    puedes buscar los viajes disponibles, para reservar o publicar viajes debes
    estar registrado y haber iniciado sesión</p>
    <div class="cajaTexto">
        <label for="buscarOrigen"> Origen </label> <br>
        <select name="selectorDestino" class="selectorDesplegable" id="buscarOrigen">
                <option value="placeHolder">Seleccione la ciudad de origen</option>
        </select><br>
        
        <label for="destino"> Destino </label><br>
        <select name="selectorDestino" class="selectorDesplegable" id="buscarDestino">
                <option value="placeHolder">Seleccione la ciudad de destino</option>
        </select><br>

        <label for="fecha"> Fecha (dd/mm/aaaa) </label><br>
        <input type="date" id="buscarFecha" name="fecha"><br>
    
    </div>
    <button class="boton" type="button" onclick="">Buscar viaje</button><br>

    <div class="enlaces">
    <a href="./login.php">Iniciar sesion</a><br>
    <a href="./registro.php">Registrarse</a><br>
    </div>

	<div id="resBusqueda"><b>search results will appear here</b></div> 
    

	<div id="LTrayectos"><b>list of trips will appear here</b></div>



	<div id="infoTrayecto"><b>trip info will appear here</b></div> 

</body>



</html>
