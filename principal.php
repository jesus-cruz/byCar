<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="styles.css">
</header>

<head>
    <title>Buscador de viajes</title>
    <meta charset="UTF-8">
    <!-- Ajax and JQuerry -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- JavaScript-->
    <script type="text/javascript" src="frontendJS/controladorSelectorViajes.js"></script>
    <!-- Bootstrap css and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="userinfobox"></div>
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
            <br>

            <fieldset>
                <legend>Busqueda avanzada</legend>

                <select name="selectorPrecioMin" class="selectorDesplegable selectorAvanzado" id="buscarPrecioMin">
                    <option value="placeHolder">Precio Minimo</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                </select>

                <select name="selectorPrecioMax" class="selectorDesplegable selectorAvanzado" id="buscarPrecioMax">
                    <option value="placeHolder">Precio Maximo</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                </select>

                <select name="selectorValoracion" class="selectorDesplegable selectorAvanzado" id="buscarValoracion">
                    <option value="placeHolder">Valoracion del Conductor</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>

                </select>
            </fieldset>

        </div>
        <button class="boton" type="button" id="botonBusqueda" onclick="getAvailableTrips()">Buscar viaje</button><br>

        <div class="enlaces">
            <a href="./login.php">Iniciar sesion</a><br>
            <a href="./registro.php">Registrarse</a><br>
        </div>

        <!-- <h2 class=tituloPagina>Viajes disponibles:</h2> -->
        <div id="resBusqueda">

        </div> 

    </body>



    </html>
