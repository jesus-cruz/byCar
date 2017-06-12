<!DOCTYPE html>
<html>

<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<!-- <script src="jquery-3.2.1.min.js"></script> -->
	<script src="frontendJS/controladorAdmin.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS files/adminStyles.css">
	<?php
        session_start(); //reanuda la sesion    
        if( !isset($_SESSION['usuarioActual']) || $_SESSION['flag']!=2 ){ 
        //no hay nada en la sesion o alguien que no es conductor pretende acceder a esta pagina
        	header("location: login.php");
        }
        ?>

    </head>

    <body>

    	<div id="Lusuarios"></div>
    	<br>
    	<button onclick="backToMainPage()" class ="boton">Volver a la pagina principal</button>

    </body>



    </html>