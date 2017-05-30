<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">       
</head>
    
<body>

    <h1 class="tituloPagina">Registrarse</h1>
    <form action="./verificarTel.php" method="GET">
        <div class="cajaTexto">
            <label for="nombreR">Nombre:</label><br> 
            <input type="text" name="nombreR" id="nombreR"><br>   
        
            <label for="emailR">Email:</label><br>
            <input type="text" name="emailR" id="emailR"><br>       

            <label for="passwordR">Password:</label><br>
            <input type="text" name="passwordR" id="passwordR"><br>

            <label for="telefonoR">Telefono:</label><br>
            <input type="text" name="telefonoR" id="telefonoR"><br>
        
            <label for="dniR">DNI:</label><br>
            <input type="text" name="dniR" id="dniR"><br>
        
            <label for="fotoR">Foto:</label><br>
            <input type="file" name="fotoR" id="fotoR"><br>
        </div>

        <input class="boton" type="submit" value="Registrarse" name="botonRegistro">

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