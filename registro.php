<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    
    <script type="text/javascript" src="frontendJS/controladorRegistro.js"></script>

</head>
    
<body>

    <h1 class="tituloPagina">Registrarse</h1>
    <form name="formRegistrarse" id="formRegistrarse" enctype="multipart/form-data">
        <div class="cajaTexto">
            <label for="nombre">Nombre:</label><br> 
            <input type="text" name="nombre" id="nombre"><br>   
            
            <label for="tipo"> Tipo de usuario:</label><br>
            <select name="tipo">
                <option value="0">Pasajero</option>
                <option value="1">Conductor</option>
            </select><br>
            
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email"><br>       

            <label for="password">Password:</label><br>
            <input type="text" name="password" id="password"><br>

            <label for="telefono">Telefono:</label><br>
            <input type="text" name="telefono" id="telefono"><br>
        
            <label for="dni">DNI:</label><br>
            <input type="text" name="dni" id="dni"><br>
        
            <label for="foto">Foto:</label><br>
            <input type="file" name="fileToUpload" id="foto"><br>
        </div>

        <input class="boton" type="button" value="Registrarse" name="botonRegistro" id="botonRegistrar">

    </form>
    
    <form action="./verificarCodigo.php" method="GET">
        <div class="cajaTexto">
            <label for="codigo">Código:</label><br> 
            <input type="text" name="codigo" id="codigo"><br>   
        </div>

        <input class="boton" type="submit" value="Enviar Código" name="botonCodigo">

    </form>

</body>




</html>