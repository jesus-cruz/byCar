<!DOCTYPE html>
<html>

<head>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- <script src="jquery-3.2.1.min.js"></script> -->
	<script src="frontendJS/controladorPaginaPasajero.js"></script>
	<link rel="stylesheet" type="text/css" href="./CSS files/pasajeroStyles.css">

	<?php
        session_start(); //reanuda la sesion    
        if( !isset($_SESSION['usuarioActual']) || $_SESSION['flag']!=0){ 
        //no hay nada en la sesion o alguien que no es conductor pretende acceder a esta pagina
        	header("location: login.php");
        }
        ?>

    </head>

    <body>
        <div class="grupoBotones">
    	<button onclick="backMainPage()" class="boton">Volver al principal</button>
        </div>
    	<br>
        <fieldset><legend>Viajes Actuales</legend>        
           <div id="LTrayectos"><b>list of trips will appear here</b></div>
       </fieldset>
       <br>


       <fieldset><legend>Info del viaje seleccionado</legend>
        <div id="infoTrayecto"> </div> 
    </fieldset>

    <br>
    <fieldset><legend>Viajes Pasados</legend>
        <div id="LTrayectosAnteriores"><b>Viajes anteriores</b></div>
    </fieldset>
    <br>

</body>



</html>