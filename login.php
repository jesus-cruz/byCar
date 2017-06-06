<!DOCTYPE html>
<html>

<header>
    <link rel="stylesheet" type="text/css" href="styles.css">
</header>

<body>

    <h1 class="tituloPagina">Iniciar sesion</h1>
    <form action="backendPHP/verificarUsuario.php" method="POST">
        <div class="cajaTexto">
            <label for="usuario"> Usuario:</label><br>
            <input type="text" name="usuario" id="usuario"><br>

            <label for="password"> Password:</label><br>
            <input type="password" name="password" id="password"><br>
        </div>
        <input class="boton" type="submit" value="Entrar">

    </form>

</body>




</html>
