<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    
    <script type="text/javascript" src="frontendJS/controladorCodigo.js"></script>
    
</head>
    
<body>

    <h1 class="tituloPagina">Verifique el código con el teléfono: 
        <input type="text" name="telefono" id="telefono"><br> </h1>    
    
    <form action="backendPHP/verificarCodigo.php" method="GET">
        <div class="cajaTexto">
            <label for="codigo">Código:</label><br> 
            <input type="text" name="campoCodigo" id="campoCodigo"><br>   
        </div>

        <input class="boton" type="submit" value="Enviar Código" name="botonCodigo">

    </form>

</body>




</html>