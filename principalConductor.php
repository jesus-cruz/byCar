<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS files/conductorStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="frontendJS/controladorConductor.js"></script>
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

        <div class="grupoBotones">
            <button class="boton" id="botonCrear" type="button" onclick="">Crear  trayecto</button>

            <button class="boton" id="botonListarTrayectos" type="button" onclick="">Publicar trayecto</button>

            <button class="boton" id="botonListarPasajeros" type="button" onclick="">Publicar trayecto</button>

            <button class="boton" id="botonEditar" type="button" onclick="">Publicar trayecto</button>

            <button class="boton" id="botonBorrar" type="button" onclick="">Publicar trayecto</button>

            <button class="boton" id="botonCancelar" type="button" onclick="">Publicar trayecto</button>
        </div>




        <div class="cajaTexto" id="cajaCrear">
            <h1 class="tituloPagina">Crear un nuevo trayecto</h1>
            <form id="formCrear">
                Hora de salida<br>
                <input type="text" name="firstname">
                
                <br> Hora de llegada<br>
                <input type="text" name="firstname">
                
                <br> Precio<br>
                <input type="text" name="lastname">
                <br>
                
                Número de plazas<br>
                <input type="text" name="firstname">
                <br>
                
                Hora de salida<br>
                <input type="text" name="firstname">
                <br>
                
                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="cajaTexto" id="cajaListarTrayectos">
            <h1 class="tituloPagina">Lista de trayectos propios</h1>
        </div>

        <div class="cajaTexto" id="cajaListarPasajeros">
            <h1 class="tituloPagina">Lista de pasajeros</h1>
        </div>

        <div class="cajaTexto" id="cajaEditar">
            <h1 class="tituloPagina"> Editar un trayecto</h1>
        </div>

        <div class="cajaTexto" id="cajaBuscar">
            <h1 class="tituloPagina"> Buscar un viaje</h1>
            <div class="cajaTexto">
                <label for="buscarOrigen"> Origen </label><br>
                <input type="text" id="buscarOrigen" name="buscarOrigen"> <br>

                <label for="destino"> Destino </label> <br>
                <input type="text" id="destino" name="destino"> <br>

                <label for="fecha"> Fecha</label> <br>
                <input type="text" id="fecha" name="fecha"><br>
            </div>

            <button class="boton" type="button" onclick="">Buscar viaje</button><br>
        </div>


        <div class="cajaTexto" id="cajaPublicar">
            <h1 class="tituloPagina"> Publicar un viaje</h1>
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


        <div class="cajaTexto">
            <a href="backendPHP/cerrarSesion.php">Cerrar sesion</a>
        </div>
        <?php
        //echo"usuario " . $_SESSION['usuarioActual'] . " id-> " . $_SESSION['id'];
    ?>
</body>



</html>