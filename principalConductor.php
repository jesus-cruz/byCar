<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS files/conductorStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="frontendJS/controladorConductor.js"></script>

    <?php
        session_start(); //reanuda la sesion    
        if( !isset($_SESSION['usuarioActual']) || $_SESSION['flag']!=1){ 
        //no hay nada en la sesion o alguien que no es conductor pretende acceder a esta pagina
            header("location: login.php");
        }
    ?>

</head>

<body>

    <div class="grupoBotones">
        <button class="boton" id="botonCrear" type="button" onclick="">Crear  trayecto</button>

        <button class="boton" id="botonListarTrayectos" type="button" onclick="">Listar traytectos</button>

        <button class="boton" id="botonCerrarSesion" type="button" onclick="backToMainPage()">Volver al principal</button>
    </div>


    <div class="cajaTexto" id="cajaCrear">
        <h1 class="tituloPagina">Crear un nuevo trayecto</h1>
        <form id="formCrear" name="formCrear">

            <br>Fecha de salida<br>
            <input type="date" id="fechaSalida" name="fechaSalida">

            <br>Hora de salida<br>
            <input type="text" id="horaSalida" name="horaSalida">

            <br>Número de plazas<br>
            <input type="text" id="nPlazas" name="nPlazas">

            <br>Origen<br>
            <input type="text" id="origen" name="origen">

            <br>Destino <br>
            <input type="text" id="destino" name="destino">

            <br>Fecha de llegada<br>
            <input type="date" id="fechaLlegada" name="fechaLlegada">

            <br>Hora de llegada<br>
            <input type="text" id="horaLlegada" name="horaLlegada">

            <br>Precio<br>
            <input type="text" id="precio" name="precio">
            
        </form>
        <input type="button" id="crearTrayectoForm"  class="boton" value="Crear">
        
    </div>

    <div class="cajaTexto" id="cajaListarTrayectos">
        <h1 class="tituloPagina">Lista de trayectos propios</h1>

    </div>
</div>

</body>



</html>